<?php

class Addcomment extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function index($productId){
        $params = $this->model->getParams($productId);
        $proInfo = $this->model->proInfo($productId);
        $commentInfo = $this->model->commentInfo($productId);
        $data = ['params'=>$params,'proInfo'=>$proInfo, 'commentInfo'=>$commentInfo];
        $this->view('addcomment/index', $data);
    }
    function savecomment($proId){

        $this->model->saveComment($_POST, $proId);

    }
}


?>