<?php

require('views/admin/layout.php');
$gallery = $data['gallery'];
$productInfo = $data['productInfo'];
?>
<div class="left">
    <p>
        مدیریت تصاویر :
        <span style="color: #ff5661">
    (
            <?= $productInfo['title']; ?>
            )
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
    </style>




    <form id="form2" action="adminproduct/gallery/<?= @$productInfo['id']; ?>" enctype="multipart/form-data"
          method="post"
          style="float: right;width: 100%">
        <div class="add_div" style="float: right;margin-bottom: 60px">
        <span class="titleSpan" style="float: right;margin-top: unset">
انتخاب تصویر :
        </span>
            <input style="float: right" type="file" name="image" value="<?= @$productInfo['title']; ?>">
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

    <form id="form3" action="adminproduct/deletegallery/<?= $productInfo['id']; ?>" method="post">
        <table class="list" cellspacing="0">
            <tr>

                <td>
                    ردیف
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
            foreach ($gallery as $row) {
                ?>
                <tr>

                    <td>
                        <?= $i; ?>
                    </td>
                    <td>
                        <img style="width: 150px;margin-top: 10px"
                             src="public/images/products/<?= $row['idproduct']; ?>/gallery/small/<?= $row['img']; ?>.jpg"/>
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