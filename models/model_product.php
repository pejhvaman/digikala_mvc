<?php

class model_product extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function productInfo($id)
    {
        $sql = "select * from tbl_product where id=?";
        $result = $this->doSelect($sql, [$id], 1);

        $price = $result['price'];
        $discount = $result['discount'];
        $calculate_discount = $this->calculateDiscount($price, $discount);
        $result['discount_price'] = $calculate_discount[0];
        $result['total_price'] = $calculate_discount[1];


        $first_row = $result;
        $special_time = $first_row['special_time'];

        $option = self::getOption();
        $duration_special = $option['special_begin'];

        $end_timeOff = $special_time + $duration_special;
        date_default_timezone_set('Asia/Tehran');
        $date = date('F d,Y H:i:s', $end_timeOff);
        $result['special_date'] = $date;


        $colors = $result['colors'];
        $colors = explode(',', $colors);
        $colors = array_filter($colors);
        $all_colors = [];
        foreach ($colors as $color) {
            $colorInfo = $this->colorInfo($color);
            array_push($all_colors, $colorInfo);
        }
        $result['all_colors'] = $all_colors;


        $garranty = $result['garranty'];
        $garranty = explode(',', $garranty);
        $garranty = array_filter($garranty);
        $all_garranties = [];
        foreach ($garranty as $row) {
            $garrantyInfo = $this->garrantyInfo($row);
            array_push($all_garranties, $garrantyInfo);
        }
        $result['all_garranties'] = $all_garranties;

        return $result;
    }

    function colorInfo($id)
    {
        $sql = "select * from tbl_color WHERE id=$id";
        $result = $this->doSelect($sql, [$id], 1);
        return $result;
    }

    function garrantyInfo($id)
    {
        $sql = "select * from tbl_garranty WHERE id=$id";
        $result = $this->doSelect($sql, [$id], 1);
        return $result;
    }

    function naghd($id)
    {
        $sql = "select * from tbl_naghd WHERE idproduct=?";
        $result = $this->doSelect($sql, [$id]);
        return $result;
    }

    function fanni($idcategory, $idproduct)
    {
        $sql = " select * from tbl_attr WHERE idcategory=? and parent=0"; //tbl_attr :) khaaaak! :////
        $idcategory = [$idcategory];
        $result = $this->doSelect($sql, $idcategory);

        foreach ($result as $key => $row) {
            $sql2 = 'select tbl_attr.title,tbl_product_attr.value from tbl_attr LEFT JOIN tbl_product_attr ON tbl_attr.id=tbl_product_attr.idattr AND tbl_product_attr.idproduct=? WHERE tbl_attr.parent=?';
            $param = [$idproduct, $row['id']];
            $result2 = $this->doSelect($sql2, $param);
            $result[$key]['children'] = $result2;
        }

        return $result;
    }

    function getCommentParam($idcategory, $idproduct)
    {
        $sql = 'select * from tbl_comment_param WHERE idcategory=?';
        $prestatement = [$idcategory];
        $result = $this->doSelect($sql, $prestatement);
        //print_r($result);

        $sql = 'select * from tbl_comment WHERE idproduct=?';
        $res = $this->doSelect($sql, [$idproduct]);
        //print_r($res);

        $scoressum = [];
        foreach ($res as $row) {
            $productscores = $row['param'];
            $scoresarray = unserialize($productscores);
            //print_r($scoresarray);
            foreach ($scoresarray as $key => $val) {
                $score_id = $key;
                $score = $val;
                //ta inja halle

                if (!isset($scoressum[$score_id])) {
                    $scoressum[$score_id] = 0;
                }
                //print_r($scoressum[$score_id]);
                //echo '<br>';
                @$scoressum[$score_id] = $scoressum[$score_id] + $score;
                //print_r($scoressum);
            }
        }

        $comment_num = sizeof($res);
        foreach ($scoressum as $key => $val2) {
            $val2 = $val2 / $comment_num;
            $scoressum[$key] = $val2;
        }
        //print_r($scoressum);


        return [$result, $scoressum];
    }

    function getComment($idproduct)
    {
        $sql = 'select * from tbl_comment WHERE idproduct=?';
        $prestmt = [$idproduct];
        $result = $this->doSelect($sql, $prestmt);
        return $result;
    }

    function getQuestion($idproduct)
    {
        $sql = 'select * from tbl_question WHERE parent=0 AND idproduct=?';
        $questions = $this->doSelect($sql, [$idproduct]);

        $sql = 'select * from tbl_question WHERE parent!=0 AND idproduct=?';
        $answers = $this->doSelect($sql, [$idproduct]);

        $answer_new = [];
        foreach ($answers as $answer) {
            $parent = $answer['parent'];
            $answer_new[$parent] = $answer;
        }


        return [$questions, $answer_new];

    }

    function gallery($idproduct)
    {
        $sql = 'select * from tbl_gallery WHERE idproduct=? order by threed DESC ';
        $result = $this->doSelect($sql, [$idproduct]);
        return $result;
    }

    function addToBasket($productId, $color, $garanty)
    {
        $cookie = self::getBasketCookie();

        $sql = 'select * from tbl_basket WHERE cookie=? AND idproduct=? AND color=? AND garanty=?';
        $params = [$cookie, $productId, $color, $garanty];
        $result = $this->doSelect($sql, $params);

        if (isset($result[0])) {
            $sql = "update tbl_basket set tedad=tedad+1 WHERE cookie=? AND idproduct=? AND color=? AND garanty=?";
        } else {
            $sql = "insert into tbl_basket (cookie , idproduct , tedad , color, garanty) VALUES (?,?,1,?,?)";
        }
        $params = [$cookie, $productId, $color, $garanty];
        $this->doQuery($sql, $params);
    }
}

?>