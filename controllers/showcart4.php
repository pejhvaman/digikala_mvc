<?php

class Showcart4 extends Controller
{
    function __construct()
    {

    }

    function index($Status='')
    {
        $data = ['Status'=>$Status];
        //print_r($data);
        $this->view('showcart4/index',$data);

    }

    function checkcode($code)
    {
        $res = $this->model->checkCode($code);
        $finalPriceWithCodeOff = $this->model->calculateFinalPrice($code);
        $array = [$res , $finalPriceWithCodeOff];
        echo json_encode($array);
    }

    function calculatefinalprice()
    {
        $finalPrice = $this->model->calculateFinalPrice($_POST['code']);
        echo $finalPrice;
    }
    function saveorder(){
        $this->model->saveOrder($_POST);
    }
}


?>