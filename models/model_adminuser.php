<?php

class model_adminuser extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getUsers()
    {
        $sql = "select tbl_user.*, tbl_level.title as levelTitle 
        from tbl_user
        LEFT JOIN tbl_level
        ON tbl_user.level=tbl_level.id
        ORDER BY id DESC";
        $res = $this->doSelect($sql);
        return $res;
    }
    function changeLevel1($ids){
        $ids = implode(',', $ids);
        $sql = "update tbl_user set level=1 WHERE id IN (".$ids.") ";
        $this->doQuery($sql);
    }
    function changeLevel2($ids){
        $ids = implode(',', $ids);
        $sql = "update tbl_user set level=2 WHERE id IN (".$ids.") ";
        $this->doQuery($sql);
    }
    function changeLevel3($ids){
        $ids = implode(',', $ids);
        $sql = "update tbl_user set level=3 WHERE id IN (".$ids.") ";
        $this->doQuery($sql);
    }
    function delete($ids){
        $ids = implode(',', $ids);
        $sql = "delete from tbl_user WHERE id IN (".$ids.") ";
        $this->doQuery($sql);
    }
}

?>