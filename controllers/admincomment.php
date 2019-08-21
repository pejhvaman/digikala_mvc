<?php

class Admincomment extends Controller
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
        $comments = $this->model->getComment();
        $data = ['comments'=>$comments];
        $this->view('admin/comment/index', $data);
    }

    function confirm(){
        $data = $_POST;
        $this->model->confirm($data);
        header('location:'.URL.'admincomment');
    }
    function unconfirm(){
        $ids = $_POST['id'];
        $this->model->unconfirm($ids);
        header('location:'.URL.'admincomment');
    }
    function delete(){
        $ids = $_POST['id'];
        $this->model->delete($ids);
        header('location:'.URL.'admincomment');
    }
}

?>