<?php
require('views/admin/layout.php');
$naghd = $data['naghd'];
$productInfo = $data['productInfo'];

?>
<div class="left">
    <p>
        <a>
        مدیریت نقد و بررسی محصول :
        </a>

        <span style="color: #ff5661">
        (
            <?= $productInfo['title']; ?>
            )
        </span>

    </p>


    <style>
        .btntop{
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

    <a class="btntop" href="adminproduct/addnaghd/<?= $productInfo['id']; ?>">
        افزودن
    </a>
    <a class="btntop" onclick="submitForm();" style="background: #ff5661">
        حذف
    </a>
    <form action="adminproduct/deletenaghd/<?= $productInfo['id']; ?>" method="post">
        <table class="list" cellspacing="0">
            <tr>

                <td>
                    عنوان
                </td>
                <td>
                    ویرایش
                </td>
                <td>
                    انتخاب
                </td>
            </tr>
            <?php
            foreach ($naghd as $row) {
                ?>
                <tr>
                    <td>
                        <?= $row['title']; ?>
                    </td>
                    <td>
                        <a href="adminproduct/addnaghd/<?= $row['idproduct']; ?>/<?= $row['id']; ?>">
                            <i class="view" style="background: url('public/images/edit.png') no-repeat center">
                            </i>
                        </a>
                    </td>
                    <td>
                        <input type="checkbox" name="id[]" value="<?= $row['id']; ?>">
                    </td>
                </tr>
                <?php
            }
            ?>

        </table>
    </form>
</div>

</div>