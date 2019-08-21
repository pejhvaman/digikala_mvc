<?php


class Adminproduct extends Controller
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
        $product = $this->model->getProduct();
        $data = ['product' => $product];
        $this->view('admin/product/index', $data);
    }

    function addproduct($productId = '')
    {

        if(isset($_POST['title']) and $_POST['title']!=''){
            $this->model->addProduct($_POST , $productId , $_FILES['image']);

        }

        $category = $this->model->getCategory();
        $color = $this->model->getColor();
        $garanty= $this->model->getGaranty();
        $productInfo = $this->model->getProductInfo($productId);
        $data = ['category'=>$category , 'color'=>$color , 'garanty'=>$garanty , 'productInfo'=>$productInfo];
        $this->view('admin/product/addproduct' , $data);
    }
    function naghd($productId){

        $productInfo = $this->model->getProductInfo($productId);
        $naghd = $this->model->getNaghd($productId);
        $data = ['naghd'=>$naghd , 'productInfo'=>$productInfo];

        $this->view('admin/product/naghd' , $data);
    }
    function addnaghd($productId , $naghdId=''){

        if(isset($_POST['title'])){
            $this->model->addNaghd($productId , $_POST , $naghdId);
            header('location:'.URL.'adminproduct/naghd/'.$productId);
        }

        $productInfo = $this->model->getProductInfo($productId);
        $naghdInfo = $this->model->naghdInfo($naghdId);
        $data = ['productInfo'=>$productInfo , 'naghdInfo'=>$naghdInfo];
        $this->view('admin/product/addnaghd' , $data);

    }
    function deletenaghd($productId){
        $this->model->deleteNaghd($_POST['id']);
        header('location:'.URL.'adminproduct/naghd/'.$productId);
    }
    function deleteproduct(){
        $this->model->deleteProduct($_POST['id']);
        header('location:'.URL.'adminproduct/index');
    }
    function attr($productId){


        if(isset($_POST['submitted'])){
            $this->model->editAttr($_POST , $productId);
        }

        $attr = $this->model->getproductAttr($productId);
        $productInfo = $this->model->getProductInfo($productId);
        $data = ['attr'=>$attr , 'productInfo'=>$productInfo];
        $this->view('admin/product/attr' , $data);
    }
    function gallery($productId){

        if(isset($_FILES['image'])){
            $this->model->addGallery($productId , $_FILES['image']);
        }

        $gallery = $this->model->getGallery($productId);
        $productInfo = $this->model->getProductInfo($productId);
        $data=['gallery'=>$gallery , 'productInfo'=>$productInfo];
        $this->view('admin/product/gallery',$data);
    }
    function deletegallery($productId){
        $this->model->deleteGallery($_POST['id'] , $productId);
        header('location:'.URL.'adminproduct/gallery/'.$productId);
    }
}

?>