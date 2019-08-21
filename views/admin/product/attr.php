<?php
$active = 'product';
require('views/admin/layout.php');
$attr = $data['attr'];
$productInfo = $data['productInfo'];

?>
<div class="left">

    <p>
        مقدار ویژگی ها :

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
        .shoottoval:hover{
            color: #00a6ad;
        }
    </style>
    <form action="" method="post" style="float: right;width: 100%">
        <input type="hidden" name="submitted">
        <?php
        foreach ($attr as $row) {
            ?>
            <div class="add_div">
                <span class="titleSpan">
<?= $row['title']; ?>
                </span>
                <!--<input type="text" name="pejhman<?/*= $row['id']; */?>" value="<?/*= $row['value']; */?>">-->
                <select name="pejhman<?= $row['id'] ?>" autocomplete="off">
                <?php
                $values = $row['values'];
                foreach ($values as $value) {
                    if($row['valId']==$value['id']){
                        $selectd='selected';
                    }else{
                        $selectd='';
                    }
                    ?>
                    <option value="<?= $value['id'] ?>" <?php if($selectd=='selected'){echo 'selected="selected"';} ?>>
                        <?= $value['val'] ?>
                    </option>
                    <?php
                }
                ?>
                </select>
                <a class="shoottoval" style="font-size: 10pt;" href="admincategory/attrval/<?= $row['id'] ?>">
                    مشاهده مقادیر پیش فرض این ویژگی
                </a>
                <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
            </div>

            <?php
        }
        ?>

        <button>
            اجرای عملیات
        </button>
    </form>
</div>

</div>
