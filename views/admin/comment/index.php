<?php
$active = 'comment';
require('views/admin/layout.php');
$comments = $data['comments'];
?>
<div class="left">
    <p>
        مدیریت نظرات :
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
        <option value="1">تایید</option>
        <option value="2">عدم تایید</option>
        <option value="3">حذف</option>
    </select>
    <script>
        function submitFormMulti() {
            var selectedAction = $('.selectTag option:selected').val();
            var action = '';
            if(selectedAction==1){
                action='admincomment/confirm';
            }
            if(selectedAction==2){
                action='admincomment/unconfirm';
            }
            if(selectedAction==3){
                action='admincomment/delete';
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
                    تاریخ
                </td>
                <td>
                    عنوان
                </td>
                <td>
                    نقاط قوت
                </td>
                <td>
                    نقاط ضعف
                </td>
                <td>
                    متن نظر
                </td>
                <td>
                    وضعیت
                </td>
                <td>
                    انتخاب
                </td>
            </tr>
            <?php
            $i = 1;
            foreach ($comments as $row) {
                ?>
                <tr>
                    <td>
                        <?= $i; ?>
                    </td>
                    <td>
                        <?= $row['date_of_comment']; ?>
                    </td>
                    <td>
                        <input name="title<?= $row['id']; ?>" value="<?= $row['title']; ?>"/>
                    </td>

                    <td>
                        <input name="positive_point<?= $row['id']; ?>" value="<?= $row['positive_point']; ?>"/>

                    </td>
                    <td>
                        <input name="negative_point<?= $row['id']; ?>" value="<?= $row['negative_point']; ?>"/>

                    </td>
                    <td>
                        <textarea name="comment_text<?= $row['id']; ?>"><?= $row['comment_text']; ?></textarea>

                    </td>
                    <td>
                        <?php if ($row['confirm'] == 1) {
                            echo 'تایید شده';
                        } else {
                            echo 'تایید نشده';
                        } ?>
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