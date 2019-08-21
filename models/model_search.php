<?php

class model_search extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getAttr($catId)
    {
        $sql = "select * from tbl_attr WHERE idcategory=? AND filter=1";
        $res = $this->doSelect($sql, [$catId]);
        //print_r($res);
        foreach ($res as $key => $item) {
            $sql = "select * from tbl_attr_val WHERE attrId=?";
            $result = $this->doSelect($sql, [$item['id']]);
            $res[$key]['values'] = $result;
        }
        //print_r($res);
        return $res;
    }

    function getAttrRight($catId)
    {
        $sql = "select * from tbl_attr WHERE idcategory=? AND filter_right=1";
        $res = $this->doSelect($sql, [$catId]);
        //print_r($res);
        foreach ($res as $key => $item) {
            $sql = "select * from tbl_attr_val WHERE attrId=?";
            $result = $this->doSelect($sql, [$item['id']]);
            $res[$key]['values'] = $result;
        }
        //print_r($res);
        return $res;
    }

    function getProducts($exist, $keyword, $orderType1, $orderType2)
    {
        $string = ' where 1=1 ';
        if ($exist == 1) {
            $string = $string . ' and tedad_mojood > 0';
        }
        if ($keyword != '') {
            $string = $string . ' and title like "%' . $keyword . '%" ';
        }
        $order = 'order by';
        if ($orderType1 == 1) {
            $order = $order . ' price';
        }
        if ($orderType1 == 2) {
            $order = $order . ' seen';
        }
        if ($orderType1 == 3) {
            $order = $order . ' id';
        }
        if ($orderType2 == 1) {
            $order = $order . ' asc';
        }
        if ($orderType2 == 2) {
            $order = $order . ' desc';
        }

        $sql = "select * from tbl_product " . $string . " " . $order . " ";
        $res = $this->doSelect($sql);
        return $res;
    }

    function productAttrVal()
    {
        $sql = "select * from tbl_product_attr";
        $res = $this->doSelect($sql);

        $productAttrVal = [];

        foreach ($res as $row) {
            $proId = $row['idproduct'];
            $attrId = $row['idattr'];
            $valId = $row['valId'];
            if (!isset($productAttrVal[$proId])) {
                $productAttrVal[$proId] = [];
            }
            $productAttrVal[$proId][$attrId] = $valId;
        }

        return $productAttrVal;

    }

    function doSearch($data)
    {


        @$exist = $data['exist'];
        @$keyword = $data['keyword'];


        @$colors = $data['colorsToChoose']; //hatmn bayad entekhab shavad...

        $orderType1 = $data['orderType1'];
        $orderType2 = $data['orderType2'];


        $products = $this->getProducts($exist, $keyword, $orderType1, $orderType2);
        $productAttrVal = $this->productAttrVal();


        $productTotal = [];

        foreach ($products as $proKey => $product) {
            foreach ($data as $key => $arrayValId) {
                $attr = explode('-', $key);
                @$attrId = $attr[1];
                $proId = $product['id'];
                @$proValId = $productAttrVal[$proId][$attrId];
                if (isset($proValId)) {
                    if (!in_array($proValId, $arrayValId)) {
                        unset($products[$proKey]);
                    }
                }
            }

            if (isset($data['colorsToChoose'])) {

                $proColors = $product['colors'];
                $proColors = explode(',', $proColors);
                $common = array_intersect($colors, $proColors);

                if (sizeof($common) == 0) {
                    unset($products[$proKey]);
                }
            }
        }
        $productTotal = array_filter($products);

        @$limit = $data['limit'];

        @$current_page = $data['current_page'];

        $offset = ($current_page-1)*$limit;
        $page_num = sizeof($productTotal)/$limit;
        $page_num = ceil($page_num);

        $productTotal = array_slice($productTotal, $offset, $limit);


        return [$productTotal, $page_num];
    }

    function getColors()
    {
        $sql = "select * from tbl_color";
        $res = $this->doSelect($sql);
        return $res;
    }
}


?>