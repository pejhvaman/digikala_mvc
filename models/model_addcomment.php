<?php

class model_addcomment extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function proInfo($proId)
    {
        $sql = 'select * from tbl_product WHERE id = ?';
        $res = $this->doSelect($sql, [$proId], 1);
        return $res;
    }

    function getParams($proId)
    {
        $proInfo = $this->proInfo($proId);
        $catId = $proInfo['idcategory'];

        $sql = "select * from tbl_comment_param WHERE idcategory=?";
        $res = $this->doSelect($sql, [$catId]);
        return $res;
    }

    function saveComment($data, $proId)
    {
        //print_r($data);
        //echo '<br>';
        $params = $this->getParams($proId);
        $param_res = [];
        foreach ($params as $param) {
            $paramId = $param['id'];
            $value = $data['param' . $paramId];
            $param_res[$paramId] = $value;
        }
        //print_r($param_res);
        $title = $data['title'];
        $positive = $data['positive'];
        $negative = $data['negative'];
        $comment = $data['comment'];

        self::sessionInit();
        $userId = self::sessionGet('userId');

        $sql = 'select * from tbl_comment WHERE idproduct=? AND user=?';
        $res = $this->doSelect($sql, [$proId, $userId]);

        if(isset($res[0])){
            $sql = 'update tbl_comment set title=?, comment_text=?,positive_point=?, negative_point=? WHERE id=?';
            $array = [$title, $comment, $positive, $negative, $res[0]['id']];
        }//update
        else{
            $sql = 'insert into tbl_comment (title, comment_text,positive_point, negative_point, idproduct, param, user) VALUES (?,?,?,?,?,?,?)';
            $array = [$title, $comment, $positive, $negative, $proId, serialize($param_res), $userId];
        }//insert

        $this->doQuery($sql, $array);

        header('location:'.URL.'addcomment/index/'.$proId);
    }
    function commentInfo($proId){

        self::sessionInit();
        $userId = self::sessionGet('userId');

        $sql = "select * from tbl_comment WHERE idproduct=? AND user=?";
        $array = [$proId, $userId];
        $res = $this->doSelect($sql, $array, 1);
        return $res;
    }
}


?>