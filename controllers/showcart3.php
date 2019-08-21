<?php

class Showcart3 extends Controller
{
    function __construct()
    {

    }

    function index(){


        $basketInfo = $this->model->getBasketReview();
        $postPrice = $this->model->postPrice();

        $addressInfo = Model::sessionGet('addressInfo');
        $addressInfo = unserialize($addressInfo);

        $postTypeId = Model::sessionGet('posttypeId');

        $data = ['basketInfo'=>$basketInfo , 'postPrice'=>$postPrice , 'addressInfo'=> $addressInfo , 'postTypeId'=>$postTypeId];
        $this->view('showcart3/index' , $data);
    }
}


?>