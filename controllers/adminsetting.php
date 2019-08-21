<?php
class Adminsetting extends Controller
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
        if(isset($_POST['limit_slider'])){
            $this->model->addSetting($_POST);
        }
        $this->view('admin/setting/index');
    }
}
?>