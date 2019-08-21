<?php

class Checkout extends Controller
{
    function __construct()
    {

    }

    function index($orderId)
    {
        if (isset($_GET['Authority'])) {
            $res = $this->model->zarinpalCheckout($_GET);
            $data = ['orderInfo' => $res];
        }

        if (isset($orderId)) {
            $res = $this->model->getOrderInfo($orderId);
            $data = ['orderInfo' => $res];
        }

        $this->view('checkout/index', $data);
    }

    function payonline($orderId)
    {
        $this->model->payOnline($orderId);
    }

    function showerror()
    {
        $Error = $_GET['error'];
        $orderId = $_GET['orderId'];
        $data = ['Error' => $Error, 'orderId' => $orderId];
        $this->view('checkout/showerror', $data);
    }
    function creditcard($orderId){
        if(isset($_POST['day'])){
            //print_r($_POST);
            $this->model->updateCreditcard($_POST, $orderId);
        }

        $orderInfo = $this->model->getOrderInfo($orderId);
        $data = ['orderInfo'=>$orderInfo];
        $this->view('checkout/creditcard', $data);
    }
}


?>