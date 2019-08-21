<?php

class Product extends Controller
{
    function __construct()
    {

    }

    function index($id = 1, $activeTab='naghd')
    {
        $productInfo = $this->model->productInfo($id);
        $gallery = $this->model->gallery($id);
        $data = ['productInfo' => $productInfo , 'gallery'=>$gallery, 'activeTab'=>$activeTab];
        $this->view('product/index', $data);
    }

    function tab($id, $idcategory)
    {
        $number = $_POST['number'];
        if ($number == 0) {
            $naghd = $this->model->naghd($id);
            $data = [$naghd];
            $this->view('product/tab1', $data, 1, 1);
        }
        if ($number == 1) {
            $fanni = $this->model->fanni($idcategory,$id);
            $data = [$fanni];
            $this->view('product/tab2', $data, 1, 1);
        }
        if ($number == 2) {
            $comment_param_result = $this->model->getCommentParam($idcategory,$id);
            $comment_param = $comment_param_result[0];
            $scoresum = $comment_param_result[1];
            $comment = $this->model->getComment($id);
            $data = [$comment_param, $comment , $scoresum];
            $this->view('product/tab3', $data, 1, 1);
        }
        if ($number == 3) {
            $getQuestion = $this->model->getQuestion($id);
            $questions = $getQuestion[0];
            $answers = $getQuestion[1];
            $this->view('product/tab4', [$questions, $answers], 1, 1);
        }

    }
    function addtobasket($productId,$color='',$garanty=''){
        $this->model->addToBasket($productId,$color,$garanty);
    }
}

?>