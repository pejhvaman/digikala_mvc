<?php

class model_showcart extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

    }

    function getBasketReview()
    {
        return parent::getBasket(); // TODO: Change the autogenerated stub
    }

    function deleteBasket($basketId)
    {
        $sql = "delete from tbl_basket WHERE id=?";
        $params = [$basketId];
        $this->doQuery($sql, $params);
    }

    function updateBasket($data)
    {
        $tedad = $data['tedad'];
        $basketrow = $data['basketRow'];
        $sql = "update tbl_basket set tedad=? WHERE id=?";
        $params = [$tedad, $basketrow];
        $this->doQuery($sql, $params);
    }
}

?>