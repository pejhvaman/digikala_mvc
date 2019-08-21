<?php
$active = 'category';
require('views/admin/layout.php');

$category = [];
if (isset($data['category'])) {
    $category = $data['category'];
}

$parents = [];
if (isset($data['parents'])) {
    $parents = $data['parents'];
    $parents = array_reverse($parents);
}
$categoryInfo = [];
if (isset($data['categoryInfo'])) {
    $categoryInfo = $data['categoryInfo'];
}
$edit = $data['edit'];
?>
<div class="left">
    <?php if ($edit == '') { ?>
        <p>
            افزودن دسته جدید :
        </p>
        <?php
    } else {
        ?>
        <p>
            ویرایش :
        </p>
        <?php
    }
    ?>
    <style>
        .add_div {
            height: 40px;
            float: right;
            margin: 10px 0;
        }

        .add_div span {
            margin: 4px 10px 0 10px;
            display: inline-block;
            width: 150px;
        }

        .left input {
            width: 230px;
            height: 33px;
            border: 1px solid #eeeeee;
            border-radius: 4px;
            margin-left: 20px;
            font-family: yekan;
            color: #5d5d62;
            font-size: 10pt;
        }

        .left button {
            width: 110px;
            height: 35px;
            border-radius: 40px;
            background: #eeeeee;
            box-shadow: 1px 2px 3px #cccccc;
            font-family: yekan;
            font-size: 9pt;
            border: unset;
            color: #5d5d62;
            margin-right: 30px;
        }

        .left select {
            border: 1px solid #ccc;
            font-family: yekan;
            margin-top: 10px;
            height: 36px;
            width: 234px;
            border-radius: 4px;
            color: #5d5d62;
            font-size: 10pt;
            margin-right: 3px;
        }

        .left select option {
            font-family: yekan;
            color: #5d5d62;
            font-size: 10pt;
        }
    </style>
    <form action="" method="post" style="float: right;width: 100%">
        <div class="add_div" style="width: 100%">
        <span>
عنوان دسته :
        </span>
            <input type="text" name="title" value="<?php if ($edit == '') {
            } else {
                echo $categoryInfo['title'];
            } ?>">
        </div>

        <div class="add_div">
        <span>
دسته والد :
        </span>
        </div>
        <select name="parent" autocomplete="off">
            <option>
                انتخاب کنید...
            </option>
            <?php
            $categories = $data['category'];
            $categoryId = $data['categoryId'];

            if ($edit == '') {
                $selectedId = $categoryId;
            } else {
                $selectedId = $categoryInfo['parent'];
            }
            foreach ($categories as $row) {
                if ($row['id'] == $selectedId) {
                    $selected = 'selected';
                } else {
                    $selected = '';
                }
                ?>
                <option value="<?= $row['id']; ?>" <?= $selected; ?>>
                    <?= $row['title']; ?>
                </option>
                <?php
            }
            ?>
        </select>
        <button>
            اجرای عملیات
        </button>
    </form>
</div>

</div>