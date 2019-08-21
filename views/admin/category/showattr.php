<?php
$active = 'category';
require('views/admin/layout.php');
$attr = $data['attr'];
$categoryInfo = $data['categoryInfo'];
$attrInfo = $data['attrInfo'];

?>
<div class="left">
    <p>
        <a>
        مدیریت ویژگی ها :
        </a>
        <a style="color: #ff5661" href="admincategory/showattr/<?= $categoryInfo['id']; ?>">
            (
            دسته :
            <?= $categoryInfo['title']; ?>
            )
        </a>

        <?php
        if(isset($attrInfo['title'])){
        ?>
            <span style="color: #ff5661">
            (
        ویژگی :

        <?= $attrInfo['title']; ?>
        )
            </span>
        <?php
        }
        ?>
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

    <a class="btntop" href="admincategory/addattr/<?= $categoryInfo['id']; ?>/<?= $attrInfo['id'] ?>">
        افزودن
    </a>
    <a class="btntop" onclick="submitForm();" style="background: #ff5661">
        حذف
    </a>
    <form action="admincategory/deleteattr/<?= $categoryInfo['id']; ?>/<?= $attrInfo['id'] ?>" method="post">
        <table class="list" cellspacing="0">
            <tr>
                <td>
                    ردیف
                </td>
                <td>
                    عنوان ویژگی
                </td>
                <?php
                if(!isset($attrInfo['id'])) {
                    ?>
                    <td>
                        مشاهده زیر دسته ی ویژگی
                    </td>
                    <?php
                }
                ?>
                <td>
مقادیر ویژگی
                </td>
                <td>
                    ویرایش
                </td>
                <td>
                    انتخاب
                </td>
            </tr>
            <?php
            foreach ($attr as $row) {
                ?>
                <tr>
                    <td>
                        <?= $row['id']; ?>
                    </td>
                    <td>
                        <?= $row['title']; ?>
                    </td>
                    <?php
                    if(!isset($attrInfo['id'])) {
                        ?>
                        <td>
                            <a href="admincategory/showattr/<?= $categoryInfo['id'] ?>/<?= $row['id']; ?>">
                                <i class="view">
                                </i>
                            </a>
                        </td>
                        <?php
                    }
                    ?>
                    <td>
                        <a href="admincategory/attrval/<?= $row['id'] ?>">
                        مقادیر ویژگی
                        </a>
                    </td>
                    <td>
                        <a href="admincategory/addattr/<?= $categoryInfo['id'] ?>/<?= $attrInfo['id'] ?>/<?= $row['id'] ?>">
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