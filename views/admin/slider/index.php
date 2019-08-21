<?php
$active = 'slider';
require('views/admin/layout.php');
$slider = $data['slider'];

?>
<div class="left">
    <p>
مدیریت اسلایدشو‌:
        <span style="color: #ff5661">
</span>
    </p>

    <style>
        .btntop {
            display: block;
            float: left;
            width: 70px;
            height: 25px;
            text-align: center;
            background: #00b1bb;
            border-radius: 4px;
            color: white;
            font-size: 10pt;
            margin: 10px;
            cursor: pointer;
        }
        input[type=text]{
            border: 1px solid #cccccc;
            border-radius: 4px;
            width: 300px;
            padding: 5px;
        }
    </style>




    <form id="form2" action="adminslider/index" enctype="multipart/form-data"
          method="post"
          style="float: right;width: 100%">

        <div class="add_div">
            <span class="titleSpan" style="float: right;margin-top: unset">
                وارد کردن عنوان اسلاید :
            </span>
            <input type="text" name="title">
        </div>
        <div class="add_div">
            <span class="titleSpan" style="float: right;margin-top: unset">
                وارد کردن لینک اسلاید :
            </span>
            <input type="text" name="link">
        </div>

        <div class="add_div" style="float: right;margin-bottom: 60px">
        <span class="titleSpan" style="float: right;margin-top: unset">
انتخاب تصویر :
        </span>
            <input style="float: right" type="file" name="image" value="">
            <a onclick="submitForm2();" style="float: right;margin-top: unset" class="btntop">
                افزودن
            </a>
        </div>
    </form>
    <script>
        function submitForm2() {
            $('#form2').submit();
        }
        function submitForm3() {
            $('#form3').submit();
        }
    </script>


    <a class="btntop" onclick="submitForm3();" style="background: #ff5661">
        حذف
    </a>

    <form id="form3" action="adminslider/delete" method="post">
        <table class="list" cellspacing="0">
            <tr>

                <td>
                    ردیف
                </td>
                <td>
                    عنوان اسلاید
                </td>
                <td>
                    تصویر
                </td>
                <td>
                    انتخاب
                </td>
            </tr>
            <?php
            $i = 1;
            foreach ($slider as $row) {
                ?>
                <tr>

                    <td>
                        <?= $i; ?>
                    </td>
                    <td>
                        <?= $row['title'] ?>
                    </td>
                    <td>
                        <img style="width: 350px;margin-top: 10px"
                             src="<?= $row['img'] ?>"/>
                    </td>
                    <td>
                        <input type="checkbox" name="id[]" value="<?= $row['id']; ?>">
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