<?php
$active = 'category';
require('views/admin/layout.php');
$category = $data['category'];
$parents = [];
if (isset($data['parents'])) {
    $parents = $data['parents'];
    $parents = array_reverse($parents);
}
$categoryInfo = [];
if (isset($data['categoryInfo'])) {
    $categoryInfo = $data['categoryInfo'];
}
?>
<div class="left">
    <p>
        مدیریت دسته بندی :
        <?php
        foreach ($parents as $row) {
            ?>
            <i class="leftarrow"></i>
            <a href="admincategory/showchildren/<?= $row['id']; ?>">
                <?= $row['title']; ?>

            </a>

            <?php
        }
        ?>
        <i class="leftarrow"></i>
        <a href="admincategory/<?php if (isset($categoryInfo['id'])) {
            echo 'showchildren/' . $categoryInfo['id'];
        } else {
            echo 'index';
        } ?>">

            <?php
            if (isset($categoryInfo['title'])) {
                echo $categoryInfo['title'];
            } else {
                echo 'همه ی دسته های اصلی :';
            }
            ?>

        </a>
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

    <a class="btntop" href="admincategory/addcategory/<?= @$categoryInfo['id']; ?>">
        افزودن
    </a>
    <a class="btntop" onclick="submitForm();" style="background: #ff5661">
        حذف
    </a>
    <form action="admincategory/deletecategory/<?= @$categoryInfo['id']; ?>" method="post">
    <table class="list" cellspacing="0">
        <tr>
            <td>
                ردیف
            </td>
            <td>
                عنوان دسته
            </td>
            <td>
                مشاهده زیر دسته ها
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
        foreach ($category as $row) {
            ?>
            <tr>
                <td>
                    <?= $row['id']; ?>
                </td>
                <td>
                    <?= $row['title']; ?>
                </td>
                <td>
                    <a href="admincategory/showchildren/<?= $row['id']; ?>">
                        <i class="view">
                        </i>
                    </a>
                </td>
                <td>
                    <a href="admincategory/showattr/<?= $row['id']; ?>">
                        <i class="view" style="background: url('public/images/attr.png') no-repeat center">
                        </i>
                    </a>
                </td>
                <td>
                    <a href="admincategory/addcategory/<?= $row['id']; ?>/edit">
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