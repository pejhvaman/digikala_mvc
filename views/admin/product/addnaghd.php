<script src="public/ckeditor/ckeditor.js"></script>
<?php
require('views/admin/layout.php');
$productInfo = $data['productInfo'];
$naghdInfo = $data['naghdInfo'];
$edit = 0;
if (isset($naghdInfo['title'])) {
    $edit = 1;
}
?>
<div class="left">

    <p>
        <?php if ($edit == 0) { ?>
            افزودن نقد :
        <?php } else { ?>
            ویرایش نقد :
            <?php
        }
        ?>

        <span style="color: #ff5661">
        (
            <?= $productInfo['title']; ?>
            )
        </span>

    </p>
    <style>
        .add_div {
            width: 100%;
            float: right;
            margin: 10px 0;
        }

        .add_div textarea {
            width: 700px;
            height: 200px;
            vertical-align: top;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .add_div .titleSpan {
            margin: 4px 10px 0 10px;
            display: inline-block;
            width: 150px;
            font-size: 10pt;
        }

        .left input {
            width: 400px;
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
    <form action="adminproduct/addnaghd/<?= @$productInfo['id']; ?>/<?= @$naghdInfo['id']; ?>" method="post" style="float: right;width: 100%">
        <div class="add_div">
        <span class="titleSpan">
عنوان نقد و بررسی :
        </span>
            <input type="text" name="title" value="<?= $naghdInfo['title']; ?>">
        </div>


        <div class="add_div">
             <span class="titleSpan">
متن کامل :
             </span>
            <textarea class="editor1" id="editor1" name="description"><?= $naghdInfo['description']; ?></textarea>
        </div>

        <script>
            CKEDITOR.replace('editor1', {
                language: 'fa'
            });
        </script>


        <button>
            اجرای عملیات
        </button>
    </form>
</div>

</div>
