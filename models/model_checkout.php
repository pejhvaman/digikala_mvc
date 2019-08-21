<?php

class model_checkout extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function zarinpalCheckout($data)
    {
        $Status = $data['Status'];
        $Authority = $data['Authority'];
        $sql = "select * from tbl_order where beforepay=?";
        $result = $this->doSelect($sql, [$Authority], 1);
        $Amount = $result['amount'];

        $Payment = new Payment;
        $result = $Payment->zarinpalVerify($Amount, $Authority);
        $Status = $result['Status'];
        $Errors = $result['Errors'];
        $RefID = $result['RefID'];

        if ($Status == 100) {
            $sql = "update tbl_order set pay=1,afterpay=? WHERE beforepay=?";
            $params = [$RefID, $Authority];
            $this->doQuery($sql, $params);
        }

        $sql = "select * from tbl_order WHERE beforepay=?";
        $result = $this->doSelect($sql, [$Authority], 1);
        return $result;

    }

    function getOrderInfo($id)
    {
        $sql = 'select * from tbl_order WHERE id=?';
        $res = $this->doSelect($sql, [$id], 1);
        return $res;
    }

    function payOnline($orderId)
    {
        $orderInf0 = $this->getOrderInfo($orderId);
        $payType = $orderInf0['pay_type'];

        if ($payType == 4) {
            $sql = 'update tbl_order set pay_type=1 WHERE id=?';
            $this->doQuery($sql, [$orderId]);
            $payType = 1;
        }

        if ($payType == 1) {
            $Amount = $orderInf0['amount'];
            $Description = 'خرید از سایت';
            $Mobile = $orderInf0['mobile'];

            $Payment = new Payment;
            $result = $Payment->zarinpalRequest($Amount, $Description, 'pejhmanyzdnkhah2110@gmail.com', $Mobile);
            $Status = $result['Status'];
            $Authority = $result['Authority'];
            $Errors = $result['Errors'];

            if ($Status == 100) {
                header('location:https://www.zarinpal.com/pg/StartPay/' . $Authority);
            } else {

                header('location:' . URL . 'checkout/showerror?error=' . $Errors . '&orderId=' . $orderId);
            }

        }//zarinpal

        if ($payType == 2) {

        }//saman
        if ($payType == 2) {

        }//parsian
    }

    function updateCreditcard($data, $orderId)
    {
        $day = $data['day'];
        $month = $data['month'];
        $year = $data['year'];
        $creditcard = $data['creditcard'];
        $bank = $data['bank'];
        $hour = $data['hour'];
        $minute = $data['minute'];

        $sql = "update tbl_order set pay_day=?, pay_month=?, pay_year=?, pay_card=?, pay_bank=?, pay_hour=?, pay_minute=?, pay_type=4 WHERE id=?";
        $params = [$day, $month, $year, $creditcard, $bank, $hour, $minute, $orderId];
        $this->doQuery($sql, $params);

    }
}

?>