<script src="public/ckeditor/ckeditor.js"></script>
<?php
$active = 'product';
require('views/admin/layout.php');
$productInfo = $data['productInfo'];

$edit = 0;
if (isset($productInfo['title'])) {
    $edit = 1;
}
?>
<div class="left">

    <p>
        <?php if ($edit == 0) { ?>
            افزودن محصول جدید :
        <?php } else { ?>
            ویرایش محصول :
            <?php
        }
        ?>

    </p>
    <style>

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
            float: left;
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

        .selected_item {
            width: 200px;
            display: inline-block;

            margin: 5px;
            position: relative;
            border-radius: 4px;
            border: 1px solid #cccccc;
            top: 0;
            text-align: center !important;
            line-height: 34px;
            font-size: 10pt;
            background: #e7e7e7;
        }

        .circule_color {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            position: absolute;
            top: 7px;
            right: 2px;
            float: right;
        }

        .close_itemm {
            display: inline-block;
            float: left;
            width: 16px;
            height: 16px;
            background: url('public/images/cancel1.png') no-repeat center;
            position: absolute;
            top: 10px;
            left: 2px;
            cursor: pointer;
        }
    </style>
    <form action="adminproduct/addproduct/<?= @$productInfo['id']; ?>" enctype="multipart/form-data" method="post" style="float: right;width: 100%">
        <div class="add_div">
        <span class="titleSpan">
عنوان محصول :
        </span>
            <input type="text" name="title" value="<?= @$productInfo['title']; ?>">
        </div>

        <div class="add_div">
        <span class="titleSpan">
دسته والد :
        </span>
            <?php
            $categories = $data['category'];
            $categoryId = @$productInfo['idcategory'];
            ?>

            <select name="categoryId" autocomplete="off">
                <option>
                    انتخاب کنید...
                </option>
                <?php

                foreach ($categories as $row) {
                    if ($row['id'] == $categoryId) {
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
        </div>

        <div class="add_div">
             <span class="titleSpan">
تصویر :
             </span>
            <input type="file" name="image" value="">
            <?php
            if(isset($productInfo['title'])) {
                ?>
                <div style="width: 220px;height: 220px;float: left;position: absolute;left: 150px;top: 280px;
                        background: url(public/images/products/<?= @$productInfo['id']; ?>/product_220.jpg) no-repeat center;">

                </div>
                <?php
            }
            ?>
        </div>
        <div class="add_div">
             <span class="titleSpan">
قیمت :
             </span>
            <input type="text" name="price" value="<?= @$productInfo['price']; ?>">
        </div>
        <div class="add_div">
             <span class="titleSpan">
تخفیف(%) :
             </span>
            <input type="text" name="discount" value="<?= @$productInfo['discount']; ?>">
        </div>
        <div class="add_div">
             <span class="titleSpan">
معرفی اجمالی :
             </span>
            <textarea class="editor1" id="editor1" name="introduction"><?= @$productInfo['introduction']; ?></textarea>
        </div>

        <script>
            CKEDITOR.replace('editor1',{
                language: 'fa'
            });
        </script>

        <div class="add_div">
             <span class="titleSpan">
                 تعداد موجود :
             </span>
            <input type="text" name="tedad_mojood" value="<?= @$productInfo['tedad_mojood']; ?>">
        </div>
        <div class="add_div">
        <span class="titleSpan">
رنگ بندی :
        </span>

            <select autocomplete="off">
                <option>
                    انتخاب کنید...
                </option>
                <?php
                $color = $data['color'];

                foreach ($color as $row) {
                    ?>
                    <option data-title="<?= $row['title']; ?>"
                            onclick=addColor(this,"<?= $row['hex']; ?>","<?= $row['id']; ?>");
                            value="<?= $row['id']; ?>">
                        <?= $row['title']; ?>
                    </option>
                    <?php
                }
                ?>
            </select>
            <?php
            $colorInfo = $productInfo['colorInfo'];
            $colorInfo=array_filter($colorInfo);
            foreach ($colorInfo as $row) {
                ?>
                <span class="selected_item" style="width: 100px;">
                    <input type="hidden" value="<?= $row['id']; ?>" name="color[]">
                    <span class="circule_color" style="background:<?= $row['hex']; ?>"></span>
                    <i onclick="removeItem(this);" class="close_itemm"></i>
                    <?= $row['title']; ?>
                </span>
                <?php
            }
            ?>
        </div>
        <div class="add_div">
        <span class="titleSpan">
انتخاب گارانتی :
        </span>

            <select autocomplete="off">
                <option>
                    انتخاب کنید...
                </option>
                <?php
                $garanty = $data['garanty'];

                foreach ($garanty as $row) {
                    ?>
                    <option data-title="<?= $row['title']; ?>" onclick=chooseGaranty(this,"<?= $row['id']; ?>");
                            value="<?= $row['id']; ?>">
                        <?= $row['title']; ?>
                    </option>
                    <?php
                }
                ?>
            </select>
            <?php
            $garantyInfo = $productInfo['garantyInfo'];
            $garantyInfo = array_filter($garantyInfo);
           // print_r($garantyInfo);
            foreach ($garantyInfo as $row) {
                ?>
                <span class="selected_item">
                    <input type="hidden" value="<?= $row['id'] ?>" name="garanty[]">
                    <i onclick="removeItem(this);" class="close_itemm"></i>
                    <?= $row['title']; ?>
                </span>
                <?php
            }
            ?>
        </div>
        <button>
            اجرای عملیات
        </button>
    </form>
</div>

</div>
<script>
    function addColor(tag, colorHex, colorId) {
        var optionTag = $(tag);
        var colorName = optionTag.attr('data-title');
        var spanTag = '<span class="selected_item" style="width: 100px;"><input type="hidden" value="' + colorId + '" name="color[]"><span class="circule_color" style="background:' + colorHex + '"></span><i onclick="removeItem(this);" class="close_itemm"></i>' + colorName + '</span>';
        var addDiv = optionTag.parents('.add_div');
        addDiv.append(spanTag);
    }

    function chooseGaranty(tag, garantyId) {
        var optionTag = $(tag);
        var garantyName = optionTag.attr('data-title');
        var spanTag = '<span class="selected_item"><input type="hidden" value="' + garantyId + '" name="garanty[]"><i onclick="removeItem(this);" class="close_itemm"></i>' + garantyName + '</span>';
        var addDiv = optionTag.parents('.add_div');
        addDiv.append(spanTag);
    }

    function removeItem(tag) {
        var closeIcon = $(tag);
        var spanItem = closeIcon.parents('.selected_item');
        spanItem.remove();
    }
</script>