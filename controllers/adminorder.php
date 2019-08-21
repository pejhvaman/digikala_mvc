<?php

class Adminorder extends Controller
{
    function __construct()
    {
        parent::__construct();
        $level = Model::getUserLevel();
        if ($level != 1 and $level != 2) {    //chon dashboard baraye har do bayad baz bashad...
            header('location:' . URL . 'adminlogin');
        }
    }

    function index()
    {
        $orders = $this->model->getOrders();
        $data = ['orders'=>$orders];
        $this->view('admin/order/index', $data);
    }
    function detail($orderId){

        $orderInfo = $this->model->getOrderInfo($orderId);
        $orderstatus=$this->model->orderStatus();
        $data = ['orderInfo'=>$orderInfo, 'orderstatus'=>$orderstatus];
        $this->view('admin/order/detail', $data);
    }
    function editorder($orderId){
        $data=$_POST;
        $this->model->editOrder($orderId, $data);
    }
    function factor($orderId){
        $orderInfo = $this->model->getOrderInfo($orderId);
        $data = ['orderInfo'=>$orderInfo];
        $this->view('admin/order/factor', $data, 1, 1);
    }
    function deleteorder(){
        $this->model->deleteOrder($_POST);
        header('location:'.URL.'adminorder');
    }
}


?>