<?php

class Admindashboard extends Controller
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
        $orderStat = $this->model->getStat();
        $data = ['orderStat' => $orderStat];
        $this->view('admin/dashboard/index', $data);
    }

}

?>