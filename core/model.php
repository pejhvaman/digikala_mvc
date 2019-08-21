<?php


class Model
{
    public static $conn = '';

    function __construct()
    {
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'digi_mvc';
        $attr = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES "utf8"');
        self::$conn = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $username, $password, $attr);
        self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (function_exists('jdate') == false) {
            require('public/jdf/jdf.php');
        }
    }

    public static function getOption()
    {
        $sql = 'select * from tbl_option ';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        // print_r($result);
        $result_new = [];
        foreach ($result as $option) {
            $setting = $option['setting'];
            $value = $option['value'];
            $result_new[$setting] = $value;
        }

        return $result_new;
    }

    function calculateDiscount($price, $discount)
    {
        $discount_price = ($price * $discount) / 100;
        $total_price = $price - $discount_price;
        return [$discount_price, $total_price];
    }

    function doSelect($sql, $values = [], $fetch = '', $fetchStyle = PDO::FETCH_ASSOC)
    {
        $stmt = self::$conn->prepare($sql);
        foreach ($values as $key => $value) {
            $stmt->bindValue($key + 1, $value);
        }
        $stmt->execute();
        if ($fetch == '') {
            $result = $stmt->fetchAll($fetchStyle);
        } else {
            $result = $stmt->fetch($fetchStyle);
        }
        return $result;
    }

    function doQuery($sql, $values = [])
    {
        $stmt = self::$conn->prepare($sql);
        foreach ($values as $key => $value) {
            $stmt->bindValue($key + 1, $value);
        }
        $stmt->execute();
    }

    function create_thumbnail($file, $pathToSave = '', $w, $h = '', $crop = false)
    {
        $new_height = $h;
        list($width, $height) = getimagesize($file);
        $r = $width / $height;
        if ($crop) {
            if ($width > $height) {
                $width = ceil($width - ($height * abs($r - $w / $h)));
            } else {
                $height = ceil($height - ($height * abs($r - $w / $h)));
            }
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w / $h > $r) {
                $newwidth = $h * $r;
                $newheight = $h;
            } else {
                $newheight = $w * $r;
                $newwidth = $w;
            }
        }
        $what = getimagesize($file);
        switch (strtolower($what['mime'])) {
            case 'image/png':
                $src = imagecreatefrompng($file);
                break;
            case 'image/jpeg':
                $src = imagecreatefromjpeg($file);
                break;
            case 'image/gif':
                $src = imagecreatefromgif($file);
                break;
            default:
                //die();
        }
        if ($new_height != '') {
            $newheight = $new_height;
        }
        $dst = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        imagejpeg($dst, $pathToSave, 95);
        return $dst;
    }

    public static function sessionInit()
    {
        session_start();
    }

    public static function sessionSet($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public static function sessionGet($name)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        } else {
            return false;
        }
    }

    public static function getBasketCookie()
    {
        if (isset($_COOKIE['basket'])) {
            $cookie = $_COOKIE['basket'];
        } else {
            $value = time();
            $expire = time() + 7 * 24 * 3600;
            setcookie('basket', $value, $expire, '/');
            $cookie = $value;
        }
        return $cookie;
    }

    function getBasket()
    {

        $sql = "select b.tedad,b.id as basketRow,p.*,c.title as colorTitle,g.title as garantyTitle
        from tbl_basket b
        LEFT JOIN tbl_product p ON b.idproduct=p.id
        LEFT JOIN tbl_color c ON b.color=c.id
        LEFT JOIN tbl_garranty g ON b.garanty=g.id
        WHERE cookie=?
        ";
        $cookie = self::getBasketCookie();
        $params = [$cookie];
        $result = $this->doSelect($sql, $params);

        $discountTotalAll = 0;
        foreach ($result as $key => $row) {
            $discount = ($row['discount'] * $row['price']) / 100;
            $discountTotal = $discount * $row['tedad'];
            $result[$key]['discountTotal'] = $discountTotal;
            $discountTotalAll = $discountTotalAll + $discountTotal;
        }


        $priceTotalAll = 0;
        foreach ($result as $row) {
            $price = $row['price'];
            $tedad = $row['tedad'];
            $priceTotal = $price * $tedad;
            $priceTotalAll = $priceTotalAll + $priceTotal;
        }

        return [$result, $priceTotalAll, $discountTotalAll];
    }

    function calculatePostPrice($cityId)
    {


        $basketInfo = $this->getBasket();
        $basket = $basketInfo[0];
        $priceTotalAll = $basketInfo[1];


        $weightTotalAll = 0;
        foreach ($basket as $row) {
            $weight = $row['weight'];
            $tedad = $row['tedad'];
            $weightTotal = $weight * $tedad;
            $weightTotalAll = $weightTotalAll + $weightTotal;
        }
        $payType = 1;

        $object = new frotel_helper('http://webservice1.link/ws/v1/rest/');


        $postId = 1;
        $price1 = $object->getPrices($cityId, $priceTotalAll * 10, $weightTotalAll, $payType, $postId);


        if ($payType == 1) {
            $post_price_pishtaz = $price1['posti'][$postId]['post'];
        } else {
            $post_price_pishtaz = $price1['naghdi'][$postId]['post'];
        }


        $postId = 2;
        $price2 = $object->getPrices($cityId, $priceTotalAll, $weightTotalAll, $payType, $postId);
        if ($payType == 1) {
            $post_price_sefareshi = $price2['posti'][$postId]['post'];
        } else {
            $post_price_sefareshi = $price2['naghdi'][$postId]['post'];
        }


        $prices = ['pishtaz' => floor($post_price_pishtaz / 10), 'sefareshi' => floor($post_price_sefareshi / 10)];
        return $prices;
    }

    public static function jalaliDate($format = 'Y/n/j')
    {
        $date = jdate($format);
        return $date;
    }

    public static function jalaliToMiladi($jalali, $format = '/')
    {
        $jalali_date_explode = explode('/', $jalali);
        $year = $jalali_date_explode[0];
        $month = $jalali_date_explode[1];
        $day = $jalali_date_explode[2];

        $date = jalali_to_gregorian($year, $month, $day);
        $date = implode($format, $date);

        $date = new DateTime($date);
        $date = $date->format('Y/m/d');

        return $date;
    }

    public static function miladiToJalali($miladi, $format = '/')
    {
        $miladi_date_explode = explode('/', $miladi);
        $year = $miladi_date_explode[0];
        $month = $miladi_date_explode[1];
        $day = $miladi_date_explode[2];

        $date = gregorian_to_jalali($year, $month, $day);
        $date = implode($format, $date);

        return $date;
    }

    function getMenu($parentId = 0)
    {
        $sql = "select * from tbl_category WHERE parent=?";
        $result = $this->doSelect($sql, [$parentId]);


        foreach ($result as $row) {
            $children = $this->getMenu($row['id']);
            if (sizeof([$children]) > 0) {            //bayad $chilred dakhele [.] bashad be khatere sizeof()...!
                $row['children'] = $children;
                $row = array_filter($row);
            }
            @$data[] = $row;
        }
        return @$data;
    }
    public static function getUserLevel()
    {
        self::sessionInit();
        $userId = self::sessionGet('userId');
        $sql = "select * from tbl_user WHERE id=?";
        $userInfo =self::doSelect($sql, [$userId], 1);
        return $userInfo['level'];
    }
}


class frotel_helper
{
    /**
     * آدرس وب سرویس
     *
     * @var string
     */
    private $url;
    /**
     * کلید API
     *
     * @var string
     */
    private $api_key;

    const METHOD_POST = 'post';
    const METHOD_GET = 'get';

    /**
     * روش پرداخت به صورت پرداخت در محل
     */
    const BUY_COD = 1;
    /**
     * روش پرداخت به صورت آنلاین
     */
    const BUY_ONLINE = 2;

    /**
     * روش ارسال به صورت پیشتاز
     */
    const DELIVERY_PISHTAZ = 1;
    /**
     * روش ارسال به صورت سفارشی
     */
    const DELIVERY_SEFARESHI = 2;
    /**
     * روش ارسال با هزینه ثابت
     */
    const DELIVERY_FIXED = 20;

    /**
     * list of errors
     *
     * @var array
     */
    private $errors = array();

    /**
     * @param string $webserviceUrl
     * @param string $apiKey
     */
    public function __construct($webserviceUrl)
    {
        $this->url = $webserviceUrl;
        $this->api_key = 'F4960daa89D73A33332382fE661E7a18';
    }

    /**
     * get frotel service price
     *
     * @return array|bool
     */
    public function frotelService()
    {
        return $this->call('order/frotelService.json', array());
    }

    /**
     * محاسبه هزینه ارسال یک سفارش با روش ارسال و پرداخت مشخص
     *
     * @param int $src_city شناسه شهر مبدا
     * @param int $des_city شناسه شهر مقصد
     * @param int $price جمع کل هزینه سفارش
     * @param int $weight وزن کل سفارش + وزن بسته بندی
     * @param int $send_type روش ارسال
     * @param int $buy_type روش پرداخت
     * @return array|bool
     */
    public function fPrice($src_city, $des_city, $price, $weight, $send_type, $buy_type)
    {
        $params = array(
            'src_city' => $src_city,
            'des_city' => $des_city,
            'price' => $price,
            'weight' => $weight,
            'send_type' => $send_type,
            'buy_type' => $buy_type
        );

        return $this->call('order/fPrice.json', $params);
    }

    /**
     * محاسبه هزینه ارسال یک سفارش
     *
     * @param int $des_city شناسه شهر مقصد
     * @param int $price وزن کل سفارش
     * @param int $weight وزن کل سفارش + وزن بسته بندی
     * @param array $buy_type آرایه ای از روش های پرداخت
     * @param array $send_type آرایه ای از روش های ارسال
     * @return array|bool
     * @throws FrotelResponseException
     */
    public function getPrices($des_city, $price, $weight, $buy_type, $send_type)
    {
        $params = array(
            'des_city' => $des_city,
            'price' => $price,
            'weight' => $weight,
            'buy_type' => $buy_type,
            'send_type' => $send_type
        );

        return $this->call('order/getPrices.json', $params);
    }

    /**
     * تفکیک سبد خرید براساس فروشنده و نوع محصولات
     *
     * @param array $basket اطلاعات محصولات سبد خرید
     *
     * $basket = [
     *  [       // product 1
     *      'product_id' => 123456, // شناسه محصول
     *      'count'      => 1,      // تعداد محصول خریداری شده
     *      'options'    => [       // ویژگی های محصول - اختیاری
     *          // option id => value_id or value
     *          12 => 4
     *          1  => 'ReZa'
     *      ]
     *  ],
     *  [       // product 2
     *      'product_id' => 987654, // شناسه محصول
     *      'count'      => 1,      // تعداد محصول خریداری شده
     *  ],
     *        // ....
     * ]
     * @return array|bool
     */
    public function separationCart($basket)
    {
        $params = array(
            'basket' => $basket
        );

        return $this->call('order/separationCart.json', $params);
    }

    /**
     *  روش های ارسال و پرداخت یک سبد خرید
     *
     * @param array $basket اطلاعات محصولات سبد خرید
     *
     * $basket = [
     *  [       // product 1
     *      'product_id' => 123456, // شناسه محصول
     *      'count'      => 1,      // تعداد محصول خریداری شده
     *      'options'    => [       // ویژگی های محصول - اختیاری
     *          // option id => value_id or value
     *          12 => 4
     *          1  => 'ReZa'
     *      ]
     *  ],
     *  [       // product 2
     *      'product_id' => 987654, // شناسه محصول
     *      'count'      => 1,      // تعداد محصول خریداری شده
     *  ],
     *        // ....
     * ]
     * @param int $province شناسه استان مقصد
     * @param int $city شناسه شهر مقصد
     * @param int $seller شناسه فروشنده
     * @param string $coupon کد تخفیف (کوپن یا کارت هدیه)
     * @return array|bool
     */
    public function costCalculation($basket, $province, $city, $seller, $coupon = '')
    {
        $params = array(
            'basket' => $basket,
            'province' => $province,
            'city' => $city,
            'seller' => $seller,
            'coupon' => $coupon
        );

        return $this->call('order/costCalculation.json', $params);
    }

    /**
     * ثبت سفارش محصولات فیزیکی
     *
     * @param string $name نام خریدار
     * @param string $family نام خانوادگی خریدار
     * @param int $gender جنسیت خریدار
     * @param string $mobile شماره موبایل
     * @param string $phone شماره تلفن ثابت
     * @param string $email ایمیل خریدار
     * @param int $province شناسه استان مقصد
     * @param int $city شناسه شهر مقصد
     * @param string $address آدرس خریدار
     * @param string $postCode کد پستی
     * @param int $buy_type روش پرداخت
     * @param int $send_type روش ارسال
     * @param array $basket اطلاعات محصولات سبد خرید
     * @param int $postPrice هزینه ارسال - زمانی که نوع ارسال به صورت هزینه ثابت انتخاب شده باشد باید هزینه ارسال به وب سرویس ارسال شود - مختص فروشنده
     * @param bool $free_send ارسال رایگان - مختص فروشنده
     * @param string $pm پیام خریدار
     * @param array $fields اطلاعات درخواستی فروشنده (اختیاری)
     * @param string $coupon کد تخفیف (کوپن یا کارت هدیه)
     * @return array|bool
     * @throws FrotelResponseException
     */
    public function registerOrder($name, $family, $gender, $mobile, $phone, $email, $province, $city, $address, $postCode, $buy_type, $send_type, $basket, $postPrice = 0, $free_send = false, $pm = '', $fields = array(), $coupon = '')
    {
        $params = array(
            'name' => $name,
            'family' => $family,
            'gender' => $gender,
            'mobile' => $mobile,
            'phone' => $phone,
            'email' => $email,
            'province' => $province,
            'city' => $city,
            'address' => $address,
            'code_posti' => $postCode,
            'buy_type' => $buy_type,
            'send_type' => $send_type,
            'pm' => $pm,
            'basket' => $basket,
            'fields' => $fields,
            'post_price' => $postPrice,
            'free_send' => $free_send,
            'coupon' => $coupon
        );
        return $this->call('order/registerOrder.json', $params);
    }

    /**
     * ثبت سفارش محصولات فیزیکی
     *
     * @param string $name نام خریدار
     * @param string $family نام خانوادگی خریدار
     * @param int $gender جنسیت
     * @param string $mobile شماره موبایل
     * @param string $phone شماره تلفن ثابت
     * @param string $email ایمیل - لینک های دانلود به ایمیل خریدار ارسال می شود
     * @param array $basket اطلاعات محصولات سبد خرید
     * @param string $pm پیام خریدار
     * @param array $fields اطلاعات درخواستی فروشنده (اختیاری)
     * @param string $coupon کد تخفیف (کوپن یا کارت هدیه)
     * @return array|bool
     * @throws FrotelResponseException
     */
    public function registerOrderVirtual($name, $family, $gender, $mobile, $phone, $email, $basket, $pm = '', $fields = array(), $coupon = '')
    {
        $params = array(
            'name' => $name,
            'family' => $family,
            'gender' => $gender,
            'mobile' => $mobile,
            'phone' => $phone,
            'email' => $email,
            'pm' => $pm,
            'basket' => $basket,
            'fields' => $fields,
            'coupon' => $coupon
        );
        return $this->call('order/registerOrderVirtual.json', $params);
    }

    /**
     * ثبت سفارش محصولات خدماتی
     *
     * @param string $name نام خریدار
     * @param string $family نام خانوادگی خریدار
     * @param int $gender جنسیت
     * @param string $mobile شماره موبایل
     * @param string $phone شماره تلفن ثابت
     * @param string $email ایمیل
     * @param int $province شناسه استان مقدص
     * @param int $city شناسه شهر مقصد
     * @param string $address آدرس خریدار
     * @param string $postCode کد پستی
     * @param array $basket اطلاعات محصولات سبد خرید
     * @param string $pm پیام خریدار
     * @param array $fields اطلاعات درخواستی فروشنده (اختیاری)
     * @param string $coupon کد تخفیف (کوپن یا کارت هدیه)
     * @return array|bool
     * @throws FrotelResponseException
     */
    public function registerOrderService($name, $family, $gender, $mobile, $phone, $email, $province, $city, $address, $postCode, $basket, $pm = '', $fields = array(), $coupon = '')
    {
        $params = array(
            'name' => $name,
            'family' => $family,
            'gender' => $gender,
            'mobile' => $mobile,
            'phone' => $phone,
            'email' => $email,
            'province' => $province,
            'city' => $city,
            'address' => $address,
            'code_posti' => $postCode,
            'pm' => $pm,
            'basket' => $basket,
            'fields' => $fields,
            'coupon' => $coupon
        );
        return $this->call('order/registerOrderService.json', $params);
    }

    /**
     * رهگیری سفارش
     *
     * @param string $factor شماره فاکتور سفارش - فاکتور فروتل
     * @return array|bool
     * @throws FrotelResponseException
     */
    public function tracking($factor)
    {
        $params = array(
            'factor' => $factor
        );
        return $this->call('order/tracking.json', $params);
    }

    /**
     * دریافت فرم ارجاع به بانک
     *
     * @param string $factor شماره فاکتور سفارش - فاکتور فروتل
     * @param int $bankId شناسه درگاه بانکی انتخاب شده توسط خریدار
     * @param string $callback آدرس بازگشت از بانک
     * @return array|bool
     * @throws FrotelResponseException
     */
    public function pay($factor, $bankId, $callback)
    {
        $params = array(
            'factor' => $factor,
            'bank' => $bankId,
            'callback' => $callback
        );
        return $this->call('payment/pay.json', $params);
    }

    /**
     * بررسی صحت پرداخت
     *
     * @param string $factor شماره فاکتور سفارش - فاکتور فروتل
     * @param int $paymentId شناسه پرداخت - پارامتر _i در زمان بازگشت از بانک
     * @param string $ref شناسه ارجاع - پارامتر sb در زمان بازگشت از بانک
     * @return array|bool
     * @throws FrotelResponseException
     */
    public function checkPay($factor, $paymentId, $ref)
    {
        $params = array(
            'factor' => $factor,
            'paymentId' => $paymentId,
            'ref' => $ref
        );
        return $this->call('payment/checkPay.json', $params);
    }

    /**
     * بررسی کد کوپن
     *
     * @param string $coupon کد تخفیف (کوپن یا کارت هدیه)
     * @return array|bool
     * @throws FrotelResponseException
     */
    public function checkCoupon($coupon)
    {
        $params = array(
            'code' => $coupon
        );

        return $this->call('order/checkCoupon.json', $params);
    }

    /**
     * call method in webservice
     *
     * @param string $url
     * @param array $params
     * @param string $methodType
     * @return array|bool
     * @throws FrotelResponseException
     * @throws FrotelWebserviceException
     */
    private function call($url, $params, $methodType = self::METHOD_POST)
    {
        // flush error list
        $this->errors = array();
        if (stripos($url, 'http://') === false)
            $url = $this->url . $url;
        $params['api'] = $this->api_key;
        $data = http_build_query($params);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, $methodType === self::METHOD_POST);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        if ($this->isJson($result)) {
            $result = json_decode($result, true);
            return $this->parseResponse($result);
        }
        throw new FrotelResponseException('Failed to Parse Response');
    }

    /**
     * check valid json
     *
     * @param $string
     * @return bool
     */
    private function isJson($string)
    {
        return ((is_string($string) && (is_object(json_decode($string)) || is_array(json_decode($string))))) ? true : false;//PHP Version 5.2.17 server
    }

    /**
     * parse webservice response
     *
     * @param array $response
     * @return bool
     * @throws FrotelResponseException
     * @throws FrotelWebserviceException
     */
    private function parseResponse($response)
    {
        if (!isset($response['code'], $response['message'], $response['result']))
            throw new FrotelResponseException('پاسخ دریافتی از سرور معتبر نیست.');
        if ($response['code'] == 0)
            return $response['result'];
        $this->errors[] = $response['message'];
        throw new FrotelWebserviceException($response['message']);
    }

    /**
     * get list of errors
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}

class FrotelResponseException extends Exception
{
}

class FrotelWebserviceException extends Exception
{
}


?>