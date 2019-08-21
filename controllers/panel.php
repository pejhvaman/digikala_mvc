<?php

class Panel extends Controller
{
    public $checkLogin='';
    function __construct()
    {
        Model::sessionInit();
        $this->checkLogin = Model::sessionGet('userId');
        if($this->checkLogin == false){
            header('location:'.URL.'login');
        }
    }
    function index($activeTab='message'){
        $res = $this->model->getUserInfo();
        $stat = $this->model->getStat();
        $message = $this->model->getMessage();
        $order = $this->model->getOrder();
        $folder = $this->model->getFolder();
        $comments = $this->model->getComment();
        $codes = $this->model->getCode();
        $data = ['userInfo'=>$res, 'stat'=>$stat, 'message'=>$message ,'order'=>$order, 'folder'=>$folder, 'comments'=>$comments, 'codes'=>$codes, 'activeTab'=>$activeTab];
        $this->view('panel/index', $data);
    }
    function getfavorite(){
        $folderId = $_POST['folderId'];
        $res = $this->model->getFavorite($folderId);
        echo json_encode($res);
    }
    function saveedit(){
        $folderId = $_POST['folderId'];
        $newName = $_POST['newName'];
        $this->model->saveEdit($folderId, $newName);
    }
    function deletefavorite(){
        $favoriteId = $_POST['favoriteId'];
        $this->model->deleteFavorite($favoriteId);
    }
    function deletecomment($commentId){
        $this->model->deleteComment($commentId);
    }
    function addcode(){
        $this->model->addCode($_POST);
    }
    function profile(){
        $profile = $this->model->getUserInfo();
        $data = ['profile'=>$profile];
        $this->view('panel/profile', $data);
    }
    function editprofile(){
        $data = $_POST;
        $this->model->editProfile($data);
        header('location:'.URL.'panel/profile');
    }
    function changepass(){
        if(isset($_POST['password'])){
            $data=$_POST;
            $this->model->changePass($data);
        }

        $this->view('panel/changepass');
    }
}

?>