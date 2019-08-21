<?php

class model_showcart4 extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function checkCode($code)
    {
        $sql = 'select * from tbl_offcode WHERE code=?';
        $res = $this->doSelect($sql, [$code]);
        if (sizeof($res) > 0) {
            return $res[0]['percent'];
        } else {
            return 0;
        }

    }

    function calculateFinalPrice($code)
    {
        $basketInfo = $this->getBasket();
        $basketPrice = $basketInfo[1];
        $basketDiscount = $basketInfo[2];

        self::sessionInit();
        $addressInfo = self::sessionGet('addressInfo');
        $addressInfo = unserialize($addressInfo);
        $cityId = $addressInfo['city'];
        $postPriceBoth = $this->calculatePostPrice($cityId);
        /*print_r($addressInfo);
        echo '<br>';*/


        $postTypeId = self::sessionGet('posttypeId');
        $postPrice = 0;
        if ($postTypeId == 1) {
            $postPrice = $postPriceBoth['pishtaz'];
        } else if ($postTypeId == 2) {
            $postPrice = $postPriceBoth['sefareshi'];
        }

        $check = $this->checkCode($code);
        $codeOff = 0;
        if ($check != 0) {
            $codeOff = ($check * $basketPrice) / 100;
        }

        $finalPrice = $basketPrice - $basketDiscount + $postPrice - $codeOff;
        return $finalPrice;
    }

    function saveOrder($data)
    {

        self::sessionInit();
        $addressInfo = self::sessionGet('addressInfo');
        $addressInfo = unserialize($addressInfo);
        $family = $addressInfo['family'];
        $mobile = $addressInfo['mobile'];
        $tel = $addressInfo['phone'];
        $code_posti = $addressInfo['postcode'];
        $ostan = $addressInfo['state_name'];
        $city = $addressInfo['city_name'];
        $address = $addressInfo['address'];

        $basketInfo = $this->getBasket();
        $basket = $basketInfo[0];
        $basket = serialize($basket);
        $basketPrice = $basketInfo[1];
        $basketDiscount = $basketInfo[2];

        $postPrice = $this->calculatePostPrice($addressInfo['city']);

        $posttypeId = self::sessionGet('posttypeId');
        if ($posttypeId == 1) {
            $postPrice = $postPrice['pishtaz'];
        } elseif ($posttypeId == 2) {
            $postPrice = $postPrice['sefareshi'];
        }

        $offCode = $data['code'];
        $offCodePercent = $this->checkCode($offCode);
        $effectCode = ($basketPrice * $offCodePercent) / 100;

        $finalPrice = $basketPrice - $basketDiscount + $postPrice - $effectCode;

        $userId = self::sessionGet('userId');

        $Description = 'خرید از سایت';

        $payType = $data['pay_type'];

        $beforepay = '';

        if ($payType == 1) {
            $Payment = new Payment;
            $result = $Payment->zarinpalRequest($finalPrice, $Description, 'pejhmanyzdnkhah2110@gmail.com', $mobile);
            $Status = $result['Status'];
            $Authority = $result['Authority'];
            $beforepay = $Authority;
        }
        $time=time();

        $sql = "insert into tbl_order (family, ostan, city, code_posti, mobile, tel, address, basket, post_price, amount, post_type, userId, status, beforepay, pay_type, time_sabt) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $params = [$family, $ostan, $city, $code_posti, $mobile, $tel, $address, $basket, $postPrice, $finalPrice, $posttypeId, $userId, 1, $beforepay, $payType, $time];
        $this->doQuery($sql, $params);

        if ($payType == 1) {
            if ($Status == 100) {
                header('location:https://www.zarinpal.com/pg/StartPay/' . $Authority);
            } else {
                header('location:' . URL . 'showcart4/index/' . $Status);
            }
        }
        if ($payType == 4) {
            $sql = 'select * from tbl_order ORDER BY id DESC limit 1';
            $res = $this->doSelect($sql, [], 1);
            header('location:' . URL . 'checkout/index/' . $res['id']);
        }
    }
}


?>