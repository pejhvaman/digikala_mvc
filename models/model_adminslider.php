<?php


class model_adminslider extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    function getSlider(){
        $sql = "select * from tbl_slider1 ORDER BY id DESC ";
        $res = $this->doSelect($sql);
        return $res;
    }
    function addSlider($data, $files)
    {

        $title = $data['title'];
        $link = $data['link'];

        $file = $files['image'];
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileTmp = $file['tmp_name'];
        $fileType = $file['type'];
        $fileError = $file['error'];
        $uploadOk = 1;
        $targetMain = 'public/images/slider/';
        $newName = time();
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

            $sql = 'insert into tbl_slider1 (img , link, title) VALUES (?,?,?)';
            $params = [$target, $link, $title];
            $this->doQuery($sql , $params);
        }
    }
    function delete($data){
        $ids = $data['id'];
        $ids = implode(',', $ids);
        $sql="delete from tbl_slider1 WHERE id IN (".$ids.") ";
        $this->doQuery($sql);
    }
}


?>