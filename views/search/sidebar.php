<style>
    #sidebar {
        width: 240px;
        float: right;
        background: white;
        box-shadow: 2px 2px 3px #e1e3dd;
        border-radius: 2px;
        overflow: hidden;
    }

    .dasteBandi, .filter_label {
        display: block;
        float: right;
        width: 220px;
        height: 55px;
        padding: 0 10px;
    }

    .Onvan {

        font-family: yekan;
        line-height: 53px;
        padding-right: 10px;
    }

    .arrow_up_Onvan {
        display: block;
        float: left;
        width: 13px;
        height: 9px;
        background: url(public/images/up-arrow.png) no-repeat;
        margin-top: 22px;;
    }

    #sidebar .dasteBandi_ul {
        padding-right: 10px;
        font-family: yekan;
        font-size: 11pt;
        color: #5d5d62;
    }

    .dasteBandi_ul ul {
        padding-right: 20%;
    }

    .dasteBandi_div {
        width: 210px;
        float: right;
        padding: 15px;
    }

    .saperatorLine_sidebar {
        width: 210px;
        height: 1px;
        background: #b3b4b1;
        margin: 0 15px;
        float: right;
    }

    .checkBox_input {
        width: 18px;
        height: 18px;
        float: right;
        position: relative;
        top: 3px;
        right: -10px;
        margin: 0;
        opacity: 0;
        z-index: 2;
    }

    .checkBox_label {
        position: absolute;
        display: block;
        float: right;
        width: 18px !important;
        height: 18px !important;
        border: 1px solid #626262;
        top: 3px;
        right: -10px;
        margin: 0 !important;
        border-radius: 2px;

    }

    .checked {
        background: #00969c url(public/images/slices.png) no-repeat -672px -120px;
        border: 1px solid #00969c;
    }

    .filter_div {
        float: right;
        width: 210px;
        padding: 15px;
    }

    .filter_ul {
        font-family: yekan;
        padding-right: 20px;
        font-size: 11pt;
        color: #5d5d62;
    }

    .filter_ul li {
        position: relative;
    }

    .color_filter {
        display: block;
        width: 22px;
        height: 22px;
        border-radius: 50%;
        float: right;
        position: relative;
        top: 2px;
        margin-left: 7px;
    }
</style>
<div id="sidebar">
    <label class="dasteBandi">
           <span class="Onvan">
               دسته بندی
           </span>
        <span class="arrow_up_Onvan"></span>
    </label>
    <div class="dasteBandi_div">
        <ul class="dasteBandi_ul">
            <li>
                کالای دیجیتال
                <ul>
                    <li>
                        موبایل
                        <ul>
                            <li>
                                گوشی موبایل
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="saperatorLine_sidebar"></div>
    <?php
    $attrRight = $data['attrRight'];
    foreach ($attrRight as $row) {
        ?>
        <label class="filter_label">
           <span class="Onvan">
<?= $row['title'] ?>
           </span>
            <span class="arrow_up_Onvan"></span>
        </label>
        <div class="filter_div">
            <ul class="filter_ul">

                <?php
                $rightValues = $row['values'];
                foreach ($rightValues as $val) {
                    ?>
                    <li>
                        <label class="checkBox_label"></label>
                        <input name="attr-<?= $row['id'] ?>[]" value="<?= $val['id'] ?>" class="checkBox_input" type="checkbox"/>
                        <?= $val['val'] ?>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <?php
    }
    ?>



    <label class="filter_label">
           <span class="Onvan">
بر اساس رنگ
           </span>
        <span class="arrow_up_Onvan"></span>
    </label>

    <div class="filter_div" style="background: #f6f7f9">
        <ul class="filter_ul">
            <?php
            $colors = $data['colors'];
            foreach ($colors as $color) {
                ?>
                <li>
                    <label class="checkBox_label"></label>
                    <input name="colorsToChoose[]" value="<?= $color['id']; ?>" class="checkBox_input" type="checkbox"/>
                    <span class="color_filter" style="background: <?= $color['hex']; ?>"></span>
                    <?= $color['title']; ?>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>
<script>
    $('.checkBox_input').click(function () {
        if ($(this).is(':checked')) {
            $(this).parents('li').find('.checkBox_label').addClass('checked');
        } else {
            $(this).parents('li').find('.checkBox_label').removeClass('checked');
        }
        doSearch();
    });

</script>