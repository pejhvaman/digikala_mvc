<?php

class model_showcart2 extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function addAddress($data, $editAddressId)
    {
        $family = $data['family'];
        $mobile = $data['mobile'];
        $phone = $data['phone'];
        $ostan = $data['state'];
        $city = $data['city'];
        $mahale = $data['mahale'];
        $address = $data['address'];
        $postcode = $data['postcode'];
        $state_name = $data['state_name'];
        $city_name = $data['city_name'];

        Model::sessionInit();
        $userId = Model::sessionGet('userId');

        if ($editAddressId == '') {
            $sql = 'insert into tbl_user_address (userId,family,mobile,phone,ostan,city,mahale,address,postcode,state_name,city_name) VALUES (?,?,?,?,?,?,?,?,?,?,?)';
            $params = [$userId, $family, $mobile, $phone, $ostan, $city, $mahale, $address, $postcode, $state_name, $city_name];
        } else {
            $sql = 'update tbl_user_address set family=?,mobile=?,phone=?,ostan=?,city=?,mahale=?,address=?,postcode=?,state_name=?,city_name=? WHERE id=?';
            $params = [$family, $mobile, $phone, $ostan, $city, $mahale, $address, $postcode, $state_name, $city_name, $editAddressId];
        }
        $this->doQuery($sql, $params);
    }

    function getAddress()
    {
        $sql = 'select * from tbl_user_address WHERE userId=?';
        Model::sessionInit();
        $userId = Model::sessionGet('userId');
        $params = [$userId];
        $result = $this->doSelect($sql, $params);
        return $result;
    }

    function getAddressInfo($addressUserId)
    {
        $sql = 'select * from tbl_user_address WHERE id=?';
        $params = [$addressUserId];
        $result = $this->doSelect($sql, $params, 1);
        return $result;
    }

    function getPostType()
    {
        $sql = 'select * from tbl_post_type';
        $result = $this->doSelect($sql);
        return $result;
    }

    function getPostPrice($data)
    {
        $addressId = $data['addressId'];
        $sql = 'select * from tbl_user_address WHERE id=?';
        $params = [$addressId];
        $res = $this->doSelect($sql, $params, 1);
        self::sessionInit();
        self::sessionSet('addressInfo',serialize($res));
        $cityId = $data['cityId'];
        $postPrice = $this->calculatePostPrice($cityId);
        echo json_encode($postPrice);
    }
    function sessionPostType($data){
        self::sessionInit();
        self::sessionSet('posttypeId',$data['posttypeId']);
        echo self::sessionGet('posttypeId');
    }
    function deleteAddress($id){
        $sql = "delete from tbl_user_address WHERE id=?";
        $this->doQuery($sql , [$id]);
    }
}


