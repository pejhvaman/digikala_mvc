<?php


class Adminslider extends Controller
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

        if(isset($_POST['title'])){
            $this->model->addSlider($_POST, $_FILES);
        }

        $slider = $this->model->getSlider();
        $data=['slider'=>$slider];
        $this->view('admin/slider/index',$data);

    }
    function delete(){
        $this->model->delete($_POST);
        header('location:'.URL.'adminslider/index');
    }
}


?>