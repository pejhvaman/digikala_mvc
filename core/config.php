<?php
$model = new Model;
$option = Model::getOption();

define('URL', $option['root']);
define('zarinpalMerchantID', $option['zarinpalMID']);
define('CallbackURL', 'http://clicksite.ir/verify.php');
define('WebserviceAddress', 'https://www.zarinpal.com/pg/services/WebGate/wsdl');
define('menu_color', $option['menu_color']);
define('body_color', $option['body_color']);
define('email', $option['email']);
define('tel', $option['tel']);


$zarinpalErrors = [
    '-1' => 'اطلاعات ارسال شده ناقص است.',
    '-2' => 'IP یا مرچنت کد پذیرنده اشتباه است',
    '-3' => 'رقم باید بالای ۱۰۰ تومان باشد',
    '-4' => 'سغح تاییس پصیطوس پاییه تط اظ سغح ومط اي است',
    '-11' => 'درخواست مورد نظر یافت نشد.',
    '-21' => 'هیچ نوع عملیاتی مالی برای این تراکنش یافت نشد.'
];//other errors from Document.pdf
define('zarinpalErrors', serialize($zarinpalErrors));
define('payMohlat', $option['mohlatPay']);


?>