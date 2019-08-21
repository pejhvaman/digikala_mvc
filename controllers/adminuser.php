<?php

class Adminuser extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

        $users = $this->model->getUsers();
        $data = ['users'=>$users];
        $this->view('admin/user/index', $data);
    }
    function changelevel1(){
        $ids = $_POST['id'];
        $this->model->changeLevel1($ids);
        header('location:'.URL.'adminuser/index');
    }

    function changelevel2(){
        $ids = $_POST['id'];
        $this->model->changeLevel2($ids);
        header('location:'.URL.'adminuser/index');
    }

    function changelevel3(){
        $ids = $_POST['id'];
        $this->model->changeLevel3($ids);
        header('location:'.URL.'adminuser/index');
    }

    function delete(){
        $ids = $_POST['id'];
        $this->model->delete($ids);
        header('location:'.URL.'adminuser/index');
    }

}

?>