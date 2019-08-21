<?php

class model_index extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    function getSlider1(){
        $sql = 'select * from tbl_slider1';
        $result = $this->doSelect($sql);
        return $result;
    }
    function getSlider2(){
        $sql = 'select * from tbl_product WHERE special=?';
        $result = $this->doSelect($sql, [1]);

        foreach ( $result as $key=>$row ){            //veryyyyy important!!!!
            $final_price = $this->calculateDiscount($row['price'],$row['discount'])[1];
            $result[$key]['final_price']=$final_price;
        }

        //this @ come later for it...!
        @$first_row = $result[0];
        $special_time = $first_row['special_time'];

       $option = self::getOption();
       $duration_special = $option['special_begin'];

        $end_timeOff = $special_time + $duration_special;
        date_default_timezone_set('Asia/Tehran');
        $date = date('F d,Y H:i:s', $end_timeOff);
        return [$result,$date];
    }
    function mobileScrollSlider(){
        $sql = 'select * from tbl_product WHERE mobileScrollSlider=?';
        $result = $this->doSelect($sql, [1]);
        return $result;
    }
    function mostSeen(){
        $res=self::getOption();
        $limit = $res['limit_slider'];

        $sql = 'select * from tbl_product order by seen DESC limit '.$limit.' ';
        $result = $this->doSelect($sql);
        return $result;
    }
    function lastProduct(){
        $res=self::getOption();
        $limit = $res['limit_slider'];
        $sql = 'select * from tbl_product order by id DESC limit '.$limit.' ';
        $result = $this->doSelect($sql);
        return $result;
    }
}

?>