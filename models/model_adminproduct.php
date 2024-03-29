<?php

class model_adminproduct extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getProduct()
    {
        $sql = 'select * from tbl_product';
        $result = $this->doSelect($sql);
        return $result;
    }

    function getCategory()
    {
        $sql = 'select * from tbl_category';
        $result = $this->doSelect($sql);
        return $result;
    }

    function getColor()
    {
        $sql = 'select * from tbl_color';
        $result = $this->doSelect($sql);
        return $result;
    }

    function getGaranty()
    {
        $sql = 'select * from tbl_garranty';
        $result = $this->doSelect($sql);
        return $result;
    }

    function addProduct($data = [], $productId, $file = [])
    {

        $title = $data['title'];
        $categoryId = $data['categoryId'];
        $price = $data['price'];
        $discount = $data['discount'];
        $introduction = $data['introduction'];
        $tedad_mojood = $data['tedad_mojood'];
        $colors = '';
        if (isset($data['color'])) {
            $colors = $data['color'];
            $colors = join(',', $colors);
        }
        $garanties = '';
        if (isset($data['garanty'])) {
            $garanties = $data['garanty'];
            $garanties = join(',', $garanties);
        }

        if ($productId == '') {
            $sql = 'insert into tbl_product (title,idcategory,price,discount,introduction,tedad_mojood,colors,garranty) VALUE (?,?,?,?,?,?,?,?)';
            $values = [$title, $categoryId, $price, $discount, $introduction, $tedad_mojood, $colors, $garanties];
            $this->doQuery($sql, $values);
            $productId = parent::$conn->lastInsertId();
            mkdir('public/images/products/' . $productId);

        } else {
            $sql = 'update tbl_product set title=?,idcategory=?,price=?,discount=?,introduction=?,tedad_mojood=?,colors=?,garranty =? WHERE id=?';
            $values = [$title, $categoryId, $price, $discount, $introduction, $tedad_mojood, $colors, $garanties, $productId];
            $this->doQuery($sql, $values);
        }


        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileTmp = $file['tmp_name'];
        $fileType = $file['type'];
        $fileError = $file['error'];
        $uploadOk = 1;
        $targetMain = 'public/images/products/' . $productId . '/';
        $newName = 'product';
        if ($fileType != 'image/jpg' and $fileType != 'image/jpeg') {
            $uploadOk = 0;
        }
        if ($fileSize > 4190304) {
            $uploadOk = 0;
        }
        if ($uploadOk == 1) {
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $target = $targetMain . $newName . '.' . $ext;
            move_uploaded_file($fileTmp, $target);

            $target220 = $targetMain . $newName . '_220.' . $ext;
            $target300 = $targetMain . $newName . '_300.' . $ext;
            $target600 = $targetMain . $newName . '_600.' . $ext;
            $this->create_thumbnail($target, $target220, 220, 220);
            $this->create_thumbnail($target, $target300, 300, 300);
            $this->create_thumbnail($target, $target600, 600, 600);
        }
    }

    function getProductInfo($productId)
    {
        $sql = 'select * from tbl_product WHERE id=?';
        $result = $this->doSelect($sql, [$productId], 1);
        $colors = $result['colors'];
        $colors = explode(',', $colors);
        $garanties = $result['garranty'];
        $garanties = explode(',', $garanties);
        $result['colorInfo'] = [];
        $result['garantyInfo'] = [];

        foreach ($colors as $color) {
            $sql = 'select * from tbl_color WHERE id=?';
            $colorInfo = $this->doSelect($sql, [$color], 1);
            array_push($result['colorInfo'], $colorInfo);
        }
        foreach ($garanties as $garanty) {
            $sql = 'select * from tbl_garranty WHERE id=?';
            $garantyInfo = $this->doSelect($sql, [$garanty], 1);
            array_push($result['garantyInfo'], $garantyInfo);
        }
        return $result;
    }

    function getNaghd($productId)
    {
        $sql = 'select * from tbl_naghd WHERE idproduct=? ORDER BY id DESC ';
        $result = $this->doSelect($sql, [$productId]);
        return $result;

    }

    function addNaghd($productId, $data = [], $naghdId)
    {
        if ($naghdId == '') {
            $sql = 'insert into tbl_naghd (title , description , idproduct) VALUE (?,?,?) ';
            $values = [$data['title'], $data['description'], $productId];
            $this->doQuery($sql, $values);
        } else {
            $sql = 'update tbl_naghd set title=? , description=? WHERE id=?';
            $params = [$data['title'], $data['description'], $naghdId];
            $this->doQuery($sql, $params);
        }
    }

    function naghdInfo($naghdId)
    {
        $sql = 'select * from tbl_naghd WHERE id=?';
        $result = $this->doSelect($sql, [$naghdId], 1);
        return $result;
    }

    function deleteNaghd($ids = [])
    {
        $ids = join(',', $ids);
        $sql = 'delete from tbl_naghd WHERE id IN (' . $ids . ')';
        $this->doQuery($sql);
    }

    function deleteProduct($ids = [])
    {
        $ids = join(',', $ids);
        $sql = 'delete from tbl_product WHERE id IN (' . $ids . ')';
        $this->doQuery($sql);

        $sql2 = 'delete from tbl_naghd WHERE idproduct IN (' . $ids . ')';
        $this->doQuery($sql2);
    }

    function getAttrVal($attrId){
        $sql = "select * from tbl_attr_val WHERE attrId=?";
        $values = $this->doSelect($sql, [$attrId]);
        return $values;
    }
    function getproductAttr($productId)
    {
        $productInfo = $this->getProductInfo($productId);
        $catId = $productInfo['idcategory'];
        $sql = "select tbl_attr.* , tbl_product_attr.valId from tbl_attr LEFT JOIN tbl_product_attr ON tbl_attr.id = tbl_product_attr.idattr and tbl_product_attr.idproduct=? WHERE idcategory=? AND parent!=0";
        $attrs = $this->doSelect($sql, [$productId, $catId]);



        foreach ($attrs as $key=>$attr){
            $values = $this->getAttrVal($attr['id']);
            $attrs[$key]['values']=$values;
        }
        //print_r($attrs);


        return $attrs;
    }

    function editAttr($data = [], $productId)
    {

        $ids = $data['id'];
        foreach ($ids as $id) {

            $sql = 'delete from tbl_product_attr WHERE idproduct=? and idattr=?';
            $params = [$productId, $id];
            $this->doQuery($sql, $params);


            $sql = 'insert into tbl_product_attr (idproduct , idattr , valId) VALUES (?,?,?)';
            $params = [$productId, $id, $data['pejhman' . $id]];
            $this->doQuery($sql, $params);
        }
    }

    function getGallery($producId)
    {
        $sql = 'select * from tbl_gallery WHERE idproduct=?';
        $result = $this->doSelect($sql, [$producId]);
        return $result;
    }

    function addGallery($productId, $file = [])
    {
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileTmp = $file['tmp_name'];
        $fileType = $file['type'];
        $fileError = $file['error'];
        $uploadOk = 1;
        $targetMain = 'public/images/products/' . $productId . '/gallery/';
        $newName = time();
        if ($fileType != 'image/jpg' and $fileType != 'image/jpeg') {
            $uploadOk = 0;
        }
        if ($fileSize > 4190304) {
            $uploadOk = 0;
        }
        if ($uploadOk == 1) {
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $target = $targetMain . 'large/' . $newName . '.' . $ext;
            move_uploaded_file($fileTmp, $target);

            $target_small = $targetMain . 'small/' . $newName . '.' . $ext;
            $this->create_thumbnail($target, $target_small, 150, 150);

            $sql = 'insert into tbl_gallery (img , idproduct) VALUES (?,?)';
            $params = [$newName , $productId];
            $this->doQuery($sql , $params);
        }
    }
    function deleteGallery($ids=[] , $productId){

        foreach ($ids as $id){
            $sql = 'select * from tbl_gallery WHERE id=?';
            $result = $this->doSelect($sql,[$id],1);
            $filename = $result['img'];
            $dir = 'public/images/products/'.$productId.'/gallery/';
            $dir_small = $dir.'small/'.$filename.'.jpg';
            $dir_large= $dir.'large/'.$filename.'.jpg';

            unlink($dir_small);
            unlink($dir_large);
        }



        $ids_str = join(',' , $ids);
        $sql = 'delete from tbl_gallery where id IN ('.$ids_str.')';
        $this->doQuery($sql);
    }
}

?>