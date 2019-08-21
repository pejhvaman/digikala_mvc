<?php

class model_panel extends Model
{
    private $userId;

    function __construct()
    {
        parent::__construct();
        //Model::sessionInit();
        $this->userId = Model::sessionGet('userId');
    }

    function getUserInfo()
    {

        $userId = $this->userId;
        $sql = "select * from tbl_user WHERE id=?";
        $res = $this->doSelect($sql, [$userId], 1);
        return $res;
    }

    function getStat()
    {

        $stat = [];

        $userId = $this->userId;
        $sql = 'select * from tbl_order WHERE userId=?';
        $res = $this->doSelect($sql, [$userId]);
        $stat['order_num'] = sizeof($res);

        $sql = 'select * from tbl_order WHERE userId=? AND status=?';
        $res = $this->doSelect($sql, [$userId, 1]);
        $stat['entezar_num'] = sizeof($res);

        $sql = 'select * from tbl_order WHERE userId=? AND status=?';
        $res = $this->doSelect($sql, [$userId, 2]);
        $stat['pardazesh_num'] = sizeof($res);

        $sql = 'select * from tbl_comment WHERE user=?';
        $res = $this->doSelect($sql, [$userId]);
        $stat['nazar_num'] = sizeof($res);


        $sql = 'select * from tbl_message WHERE userId=? AND status=?';
        $res = $this->doSelect($sql, [$userId, 0]);
        $stat['unread_mess_num'] = sizeof($res);

        return $stat;
    }

    function getMessage()
    {
        $userId = $this->userId;
        $sql = 'select * from tbl_message WHERE userId=?';
        $res = $this->doSelect($sql, [$userId]);

        foreach ($res as $row) {
            $sql = 'update tbl_message set status=1 WHERE id=?';
            $this->doQuery($sql, [$row['id']]);
        }

        return $res;
    }

    function getOrder()
    {
        $userId = $this->userId;
        $sql = 'select tbl_order.* , tbl_order_status.title from tbl_order LEFT JOIN tbl_order_status ON
tbl_order.status=tbl_order_status.id
WHERE userId=?';
        $res = $this->doSelect($sql, [$userId]);
        return $res;
    }

    function getFolder()
    {
        $userId = $this->userId;
        $sql = 'select * from tbl_favorite WHERE userId=? AND parent=0';
        $res = $this->doSelect($sql, [$userId]);
        return $res;
    }

    function getFavorite($folderId)
    {
        $userId = $this->userId;
        if ($folderId != 0) {
            $sql = 'select tbl_favorite.* , tbl_product.title as productTitle from tbl_favorite LEFT JOIN tbl_product ON tbl_favorite.idproduct=tbl_product.id WHERE userId=? AND parent=?';
        } elseif ($folderId == 0) {
            $sql = 'select tbl_favorite.* , tbl_product.title as productTitle from tbl_favorite LEFT JOIN tbl_product ON tbl_favorite.idproduct=tbl_product.id WHERE userId=? AND parent!=?';
        }
        $res = $this->doSelect($sql, [$userId, $folderId]);
        return $res;
    }

    function saveEdit($folderId, $newName)
    {
        $sql = "update tbl_favorite set title=? WHERE id=?";
        $this->doQuery($sql, [$newName, $folderId]);
    }

    function deleteFavorite($favoriteId)
    {
        $sql = "delete from tbl_favorite WHERE id=?";
        $this->doQuery($sql, [$favoriteId]);
    }

    function getComment()
    {
        $userId = $this->userId;
        $sql = 'select tbl_comment.* , tbl_product.title as proTitle from tbl_comment LEFT JOIN tbl_product ON tbl_comment.idproduct=tbl_product.id
        WHERE user=?';
        $res = $this->doSelect($sql, [$userId]);
        return $res;
    }

    function deleteComment($commentId)
    {
        $userId = $this->userId;
        $sql = "delete from tbl_comment WHERE user=? AND id=?";
        $this->doQuery($sql, [$userId, $commentId]);
    }

    function getCode()
    {
        $userId = $this->userId;
        $sql = "select * from tbl_offcode WHERE userId=?";
        $res = $this->doSelect($sql, [$userId]);
        $today_o = self::jalaliDate();

        foreach ($res as $key => $row) {
            $sql = 'select * from tbl_order WHERE userId=? AND code=?';
            $orders = $this->doSelect($sql, [$userId, $row['code']]);
            $res[$key]['orders'] = $orders;


            $expire = $row['tarikh_end'];

            $today = new DateTime($today_o);
            $expire = new DateTime($expire);
            $status = '';

            if ($expire->format('Y-m-d') >= $today->format('Y-m-d')) {
                $status = 'معتبر';
            } else {
                $status = 'باطل شده';
            }
            $res[$key]['status'] = $status;

        }

        return $res;
    }

    function addCode($data)
    {
        $code = $data['code'];
        $userId = $this->userId;
        $sql = "update tbl_offcode set userId=? WHERE code=?";
        $this->doSelect($sql, [$userId, $code]);
    }

    function editProfile($data)
    {
        $userId = $this->userId;

        $day = $data['day'];
        $month = $data['month'];
        $year = $data['year'];
        $tavalod = $year . '/' . $month . '/' . $day;

        $sql = "update tbl_user set email=?, family=?, code_meli=?, tel=?, mobile=?, tavalod=?,address=?, sex=?, khabarname=? WHERE id=?";
        $params = [$data['email'], $data['family'], $data['code_meli'], $data['tel'], $data['mobile'], $tavalod, $data['address'], $data['sex'], @$data['khabarname'], $userId];
        $this->doQuery($sql, $params);
    }

    function changePass($data)
    {
        $pass_old = $data['password'];
        $pass_new = $data['pass_new'];
        $pass_confirm = $data['pass_confirm'];

        $userInfo = $this->getUserInfo();
        $userId = $this->userId;

        $error='';

        if($pass_old==$userInfo['password']){
            if($pass_new==$pass_confirm) {
                $sql = "update tbl_user set password=? WHERE id=?";
                $this->doQuery($sql, [$pass_new, $userId]);
            }else{
                $error = 'تکرار رمز جدید شما اشتباه است.';
            }
        }else{
            $error = 'رمز عبور فعلی صحیح نیست.';
        }
        header('location:'.URL.'panel/changepass?error='.$error);

    }

}

?>