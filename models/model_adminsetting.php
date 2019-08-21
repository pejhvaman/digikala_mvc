<?php
class model_adminsetting extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    function addSetting($data){
        foreach ($data as $settingName=>$value){
            $sql="update tbl_option set value=? WHERE setting=?";
            $params = [$value, $settingName];
            $this->doQuery($sql, $params);
        }
    }
}