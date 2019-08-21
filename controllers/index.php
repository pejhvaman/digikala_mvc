<?php


class Index extends Controller
{
    function __construct()
    {
        //echo 'We are in index controller!<br>';
    }

    function index(){

       $slider1 = $this->model->getSlider1();
       $slider2 = $this->model->getSlider2();
       $mobileScrollSlider = $this->model->mobileScrollSlider();
       $mostseen = $this->model->mostSeen();
       $lastProduct = $this->model->lastProduct();

       $slider2_item = $slider2[0];
       $date_end = $slider2[1];
       $data = [$slider1, $slider2_item,$date_end, $mobileScrollSlider,$mostseen, $lastProduct];
        $this->view('index/index',$data);
    }
    function sayhello()
    {
        //echo $this->model->test2();
    }

    function clicksite()
    {
        //echo 'We are in clicksite method!<br>';
    }


}

//echo 'index controller has been required!<br>';

?>