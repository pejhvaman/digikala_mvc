<?php
$active = 'category';
require('views/admin/layout.php');
$attrval = $data['attrval'];
$attrInfo = $data['attrInfo'];
?>
<div class="left">

    <p>
        مقادیر ویژگی :

        <span style="color: #ff5661">
        (
<?= $attrInfo['title'] ?>
            )
        </span>

    </p>
    <style>
        .add_div {
            width: 100%;
            float: right;
            margin: 10px 0;
        }

        .add_div .titleSpan {
            margin: 4px 10px 0 10px;
            display: inline-block;
            width: 150px;
            font-size: 10pt;
        }

        .left input {
            width: 200px;
            height: 33px;
            border: 1px solid #cccccc;
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
            cursor: pointer;
        }

    </style>
    <form action="admincategory/attrval/<?= $attrInfo['id'] ?>" method="post" style="float: right;width: 100%">
        <input type="hidden" name="submitted">
        <?php
        foreach ($attrval as $val) {
            ?>
            <div class="add_div">
                <span class="titleSpan">
                    مقدار ویژگی :
                </span>
                <input type="text" name="attrval-<?= $val['id'] ?>" value="<?= $val['val'] ?>">
            </div>

            <?php
        }
        ?>

        <?php
        $sizeofval=sizeof($attrval);
        for($i=0;$i<10-$sizeofval;$i++) {
            ?>
            <div class="add_div">
                <span class="titleSpan">
                    مقدار ویژگی :
                </span>
                <input type="text" name="attrvalnew[]" value="">
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
