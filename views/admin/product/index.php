<?php
$active = 'product';
require('views/admin/layout.php');
$product = $data['product'];

?>
<div class="left">
    <p>
        مدیریت محصولات :

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

    <a class="btntop" href="adminproduct/addproduct">
        افزودن
    </a>
    <a class="btntop" onclick="submitForm();" style="background: #ff5661">
        حذف
    </a>
    <form action="adminproduct/deleteproduct" method="post">
        <table class="list" cellspacing="0">
            <tr>
                <td>
                    کد
                </td>
                <td style="width: 300px;" >
                    عنوان
                </td>
                <td>
                    قیمت
                </td>
                <td>
                    تخفیف
                </td>
                <td>
                    گالری
                </td>
                <td>
                    نقد و بررسی
                </td>
                <td>
                    ویژگی ها
                </td>
                <td>
                    ویرایش
                </td>
                <td>
                    انتخاب
                </td>
            </tr>
            <?php
            foreach ($product as $row) {
                ?>
                <tr>
                    <td>
                        <?= $row['id']; ?>
                    </td>
                    <td>
                        <?= $row['title']; ?>
                    </td>
                    <td>
                        <?= $row['price']; ?>
                    </td>
                    <td>
                        <?= $row['discount']; ?>
                    </td>

                    <td>
                        <a href="adminproduct/gallery/<?= $row['id']; ?>">
                            <i class="view" style="background: url('public/images/galleryicon.png') no-repeat center">
                            </i>
                        </a>
                    </td>
                    <td>
                        <a href="adminproduct/naghd/<?= $row['id']; ?>">
                            <i class="view" style="background: url('public/images/naghd1.png') no-repeat center">
                            </i>
                        </a>
                    </td>
                    <td>
                        <a href="adminproduct/attr/<?= $row['id'] ?>">
                            <i class="view" style="background: url('public/images/attr.png') no-repeat center">
                            </i>
                        </a>
                    </td>
                    <td>
                        <a href="adminproduct/addproduct/<?= $row['id']; ?>">
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