<?php

class Admincategory extends Controller
{
    function __construct()
    {
        parent::__construct();
        $level = Model::getUserLevel();
        if ($level != 1) {
            header('location:' . URL . 'adminlogin');
        }
    }

    function index()
    {
        $category = $this->model->getChildren(0);
        $data = ['category' => $category];
        $this->view('admin/category/index', $data);
    }

    function showchildren($idcategory = 0)
    {
        $categoryInfo = $this->model->categoryInfo($idcategory);
        $children = $this->model->getChildren($idcategory);
        $parents = $this->model->getParents($idcategory);
        $data = ['categoryInfo' => $categoryInfo, 'category' => $children, 'parents' => $parents];
        $this->view('admin/category/index', $data);
    }

    function addcategory($categoryId = 0, $edit = '')
    {
        if (isset($_POST['title'])) {
            $title = $_POST['title'];
            $parent = $_POST['parent'];
            $this->model->addCategory($title, $parent, $edit, $categoryId);
        }
        $category = $this->model->getCategory();
        $categoryInfo = $this->model->categoryInfo($categoryId);
        $data = ['category' => $category, 'categoryId' => $categoryId, 'edit' => $edit, 'categoryInfo' => $categoryInfo];
        $this->view('admin/category/addcategory', $data);
    }

    function deletecategory($parentId = 0)
    {
        $ids = $_POST['id'];
        $this->model->deleteCategory($ids);
        header('location:' . URL . 'admincategory/showchildren/' . $parentId);
    }

    function showattr($categoryId, $attrId = 0)
    {
        $attr = $this->model->getAttr($categoryId, $attrId);
        $categoryInfo = $this->model->categoryInfo($categoryId);
        $attrInfo = $this->model->attrInfo($attrId);
        $data = ['attr' => $attr, 'categoryInfo' => $categoryInfo, 'attrInfo' => $attrInfo];
        $this->view('admin/category/showattr', $data);
    }

    function addattr($categoryId, $parentId = '', $editId = '')
    {

        if (isset($_POST['title'])) {
            $this->model->addAttr($_POST, $categoryId, $editId);
            header('location:' . URL . 'admincategory/showattr/' . $categoryId . '/' . $parentId);
        }
        $attr = $this->model->getAttr($categoryId, 0);
        $categoryInfo = $this->model->categoryInfo($categoryId);
        $attrInfo = $this->model->attrInfo($editId);
        $editInfo = $this->model->attrInfo($editId);
        $data = ['attr' => $attr, 'categoryInfo' => $categoryInfo, 'parentId' => $parentId, 'attrInfo' => $attrInfo, 'editInfo' => $editInfo];
        $this->view('admin/category/addattr', $data);
    }

    function deleteattr($categoryId, $attrId = 0)
    {
        echo $categoryId . '<br>';
        echo $attrId . '<br>';
        $ids = $_POST['id'];
        $this->model->deleteAttr($ids);
        header('location:' . URL . 'admincategory/showattr/' . $categoryId . '/' . $attrId);
    }

    function attrval($attrId)
    {

        if (isset($_POST['submitted'])) {
            $this->model->saveAttrVal($_POST, $attrId);
        }

        $res = $this->model->getAttrVal($attrId);
        $attrInfo = $this->model->attrInfo($attrId);
        $data = ['attrval' => $res, 'attrInfo' => $attrInfo];
        $this->view('admin/category/attrval', $data);
    }

}


?>