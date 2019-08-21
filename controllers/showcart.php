<?php

class Showcart extends Controller
{
    function __construct()
    {

    }

    function index(){
        $basketInfo = $this->model->getBasketReview();
        //print_r($basketInfo);
        $basket = $basketInfo[0];
        $priceTotalAll= $basketInfo[1];
        $data = ['basket'=>$basket ,'priceTotalAll'=>$priceTotalAll];
        $this->view('showcart/index', $data);
    }
    function deletebasket($basketId){
        $this->model->deleteBasket($basketId);
        $basketInfo = $this->model->getBasketReview();    //bad az hazfe yeki az sefareshat bayad liste sabadde khari update shavad...
        echo json_encode($basketInfo);
    }


    //bad az entekhabe tedade sefaresh bayad liste sabadde khari update shavad...
    function updatebasket(){
        $this->model->updateBasket($_POST);
        $basketInfo = $this->model->getBasketReview();
        echo json_encode($basketInfo);          //bayad echo shavad ta bargardande shavad...
    }
}


?>