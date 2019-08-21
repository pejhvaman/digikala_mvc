<?php
$active = 'user';
require('views/admin/layout.php');
$users = $data['users'];
?>
<div class="left">
    <p>
        مدیریت اعضا :
    </p>

    <style>
        .selectTag {
            font-family: yekan;
            font-size: 10pt;
            border: 1px solid #cccccc;
            border-radius: 4px;
        }
        input,textarea{
            font-family: yekan;
            font-size: 10.5pt;
            border: 1px solid #cccccc;
            border-radius: 4px;
            width: 95%;
        }
    </style>


    <a class="btntop" onclick="submitFormMulti();" style="margin:0 10px 10px 0;float: left;height: 28px">
        اجرای عملیات
    </a>

    <select class="selectTag" name="action" style="float: left">
        <option value="1">تبدیل به مدیر اصلی</option>
        <option value="2">تبدیل به کارمند</option>
        <option value="3">تبدیل به کاربر عادی</option>
        <option value="4">حذف</option>
    </select>
    <script>
        function submitFormMulti() {
            var selectedAction = $('.selectTag option:selected').val();
            var action = '';
            if(selectedAction==1){
                action='adminuser/changelevel1';
            }
            if(selectedAction==2){
                action='adminuser/changelevel2';
            }
            if(selectedAction==3){
                action='adminuser/changelevel3';
            }
            if(selectedAction==4){
                action='adminuser/delete';
            }
            var form = $('form');
            form.attr('action', action);
            form.submit();
        }
    </script>

    <form action="" method="post">
        <table class="list" cellspacing="0">
            <tr>
                <td>
                    ردیف
                </td>
                <td>
                    تاریخ عضویت
                </td>
                <td>
                    نام و نام خانوادگی
                </td>
                <td>
                    شماره موبایل
                </td>
                <td>
                    سطح دسترسی
                </td>
                <td>
                    انتخاب
                </td>
            </tr>
            <?php
            $i = 1;
            foreach ($users as $row) {
                ?>
                <tr>
                    <td>
                        <?= $i; ?>
                    </td>
                    <td>
                        <?= $row['tarikh']; ?>
                    </td>
                    <td>
                        <?= $row['family']; ?>
                    </td>

                    <td>
                        <?= $row['mobile']; ?>

                    </td>
                    <td>
                        <?= $row['levelTitle'] ?>

                    </td>
                    <td>
                        <input type="checkbox" name="id[]" value="<?= $row['id']; ?>" style="margin: auto">
                    </td>
                </tr>
                <?php
                $i++;
            }
            ?>

        </table>
    </form>
</div>

</div>