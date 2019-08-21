<?php
$userInfo = $data['userInfo'];
?>
<div class="data_box">
    <div class="data_header">
        اطلاعات کاربری
    </div>
    <div class="data_content">
        <table>
            <tr>
                <td>
                    <span class="data_title">
                        نام و نام خانوادگی :
                    </span>
                    <span class="data_value">
<?= $userInfo['family'] ?>
                    </span>
                </td>
                <td>
                    <span class="data_title">
آدرس الکترونیک :
                    </span>
                    <span class="data_value">
<?= $userInfo['email'] ?>
                    </span>
                </td>
                <td>
                    <span class="data_title">
کد ملی :
                    </span>
                    <span class="data_value">
<?= $userInfo['code_meli'] ?>
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="data_title">
شماره تلفن ثابت :
                    </span>
                    <span class="data_value">
<?= $userInfo['tel'] ?>
                    </span>
                </td>
                <td>
                    <span class="data_title">
شماره تلفن همراه :
                    </span>
                    <span class="data_value">
<?= $userInfo['mobile'] ?>
                    </span>
                </td>
                <td>
                    <span class="data_title">
تاریخ تولد :
                    </span>
                    <span class="data_value">
<?= $userInfo['tavalod'] ?>
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="data_title">
شماره کارت :                     </span>
                    <span class="data_value">
<?= $userInfo['creditcard'] ?>
                    </span>
                </td>
                <td>
                    <span class="data_title">
جنسیت :
                     </span>
                    <span class="data_value">
                        <?php
                        if ($userInfo['sex'] == 1) {
                            echo 'مرد';
                        } else {
                            echo 'زن';
                        }
                        ?>
                        </span>
                </td>
                <td>
                    <span class="data_title">
دریافت خبرنامه :
                    </span>
                    <span class="data_value">

<?php
if ($userInfo['khabarname'] == 0) {
    echo 'خیر';
} else {
    echo 'بله';
}
?>

                    </span>
                </td>
            </tr>
            <tr class="Buttons">
                <td colspan="3">
                    <a href="panel/changepass">
                            <span class="changePassword">
                                تغییر رمز عبور
                            </span>
                    </a>
                    <a href="panel/profile">
                            <span class="editData">
                                ویرایش اطلاعات
                            </span>
                    </a>
                </td>
            </tr>
        </table>
    </div>
</div>