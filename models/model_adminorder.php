<?php

class model_adminorder extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getOrders()
    {
        $sql = "select * from tbl_order ORDER BY id DESC ";
        $res = $this->doSelect($sql);
        return $res;
    }

    function getOrderInfo($orderId)
    {
        $sql = "select o.*, pa.title as payTypeTitle, po.title as postTypeTitle 
        from tbl_order o
        LEFT JOIN tbl_pay_type pa ON o.pay_type=pa.id
        LEFT JOIN tbl_post_type po ON o.post_type=po.id
        WHERE o.id=?";
        $res = $this->doSelect($sql, [$orderId], 1);
        return $res;
    }

    function editOrder($orderId, $data)
    {
        $address = $data['address'];
        $code_posti = $data['code_posti'];
        $mobile = $data['mobile'];
        $pay = $data['pay_status'];
        $status = $data['order_status'];

        $sql = "update tbl_order set address=?, code_posti=?, mobile=?, pay=?, status=? WHERE id=?";
        $params = [$address, $code_posti, $mobile, $pay, $status, $orderId];
        $this->doQuery($sql, $params);

        header('location:' . URL . 'adminorder/detail/' . $orderId);
    }

    function orderStatus()
    {
        $sql = "select * from tbl_order_status";
        $res = $this->doSelect($sql);
        return $res;
    }

    function deleteOrder($data)
    {
        $ids = implode(',', $data['id']);
        $sql = "delete from tbl_order WHERE id IN (" . $ids . ")";
        $this->doQuery($sql);
    }
}

?>