<?php


class Search extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index($catId)
    {
        $attr = $this->model->getAttr($catId);
        $attrRight = $this->model->getAttrRight($catId);
        $colors = $this->model->getColors();
        $data = ['attr' => $attr, 'attrRight' => $attrRight, 'colors'=>$colors];
        $this->view('search/index', $data);

    }

    function doSearch()
    {

        $res = $this->model->doSearch($_POST);
        echo json_encode($res);
    }

}

?>