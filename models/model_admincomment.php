<?php

class model_admincomment extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getComment()
    {
        $sql = "select * from tbl_comment ORDER BY id DESC ";
        $res = $this->doSelect($sql);
        return $res;
    }

    function confirm($data)
    {

        foreach ($data['id'] as $id) {
            $sql = "update tbl_comment set title=?, comment_text=?, positive_point=?, negative_point=? WHERE id=?";
            $params = [$data['title' . $id], $data['comment_text' . $id], $data['positive_point' . $id], $data['negative_point' . $id], $id];
            $this->doQuery($sql, $params);
        }

        $ids = implode(',', $data['id']);
        $sql = "update tbl_comment set confirm=1 WHERE id IN (" . $ids . ")";
        $this->doQuery($sql);
    }

    function unconfirm($ids)
    {
        $ids = implode(',', $ids);
        $sql = "update tbl_comment set confirm=0 WHERE id IN (" . $ids . ")";
        $this->doQuery($sql);
    }

    function delete($ids)
    {
        $ids = implode(',', $ids);
        $sql = "delete from tbl_comment WHERE id IN (" . $ids . ")";
        $this->doQuery($sql);
    }

}

?>