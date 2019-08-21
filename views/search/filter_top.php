<style>
    .filter_top_div {
        width: 1070px;
        height: 35px;
        padding-right: 10px;
    }

    .filter_top_ul {
        padding: 0;
        width: 100%;
        height: 100%;
    }

    .filter_top_ul > li {
        width: 130px;
        float: right;
        font-family: yekan;
        font-size: 10pt;
        border: 1px solid #dadcd9;
        background: #edefec;
        border-radius: 5px;
        margin-left: 5px;
        top: 4px;
        padding-right: 10px;
        position: relative;
        box-shadow: 2px 2px 2px #c7cac6;
    }

    .filter_top_ul > li > img {
        float: left;
        position: relative;
        top: 9px;
        left: 10px;
    }

    .saperatorLine_content {

        height: 1px;
        background: #c8cac7;
        margin: 15px;

    }

    .filter_top_options_div {
        display: none;
        width: 170px;
        height: 200px;
        background: white;
        overflow-y: auto;
        overflow-x: hidden;
        position: absolute;
        box-shadow: 2px 2px 3px #e1e3dd;
        border-right: 1px solid #c8cac7;
        border-radius: 0 0 4px 4px;
        right: -2px;
        top: 25px;
        z-index: 2;
    }

    .filter_top_options_ul {
        font-size: 9pt;
        padding: 0;
        padding-top: 8px;
    }

    .filter_top_options_ul > li {
        padding-right: 8px;
    }

    .saperatorLine_filterTop {
        height: 1px;
        margin: 5px;
        background: #d6d8d5;
    }

    .square {
        display: block;
        float: right;
        width: 12px;
        height: 12px;
        position: relative;
        background: url(public/images/basic-square.png);
        top: 5px;
        margin-left: 5px;
    }

    .square_hover {
        background: url(public/images/rounded-black-square-shape.png) !important;
    }

    .square_click {
        background: url(public/images/check-sign-in-a-rounded-black-square.png) !important;
    }

    .show_selected_filter_div {
        width: 1070px;
        padding-right: 10px;
    }

    .show_selected_filter_div::after {
        content: "";
        clear: both;
        display: block;
    }

    .selected_filter_span {
        display: block;
        float: right;
        width: 170px;
        height: 25px;
        border-radius: 4px;
        border: 1px solid #b3b5b3;
        background: #dbddda;
        font-family: yekan;
        font-size: 9pt;
        margin: 2px;
        line-height: 25px;
        box-shadow: 2px 2px 2px #c7cac6;
    }

    .selected_filter_icon {
        display: block;
        float: left;
        width: 9px;
        height: 9px;
        background: url(public/images/cancel.png) no-repeat;
        position: relative;
        top: 8px;
        left: 5px;
        cursor: pointer;
    }
</style>
<div class="show_selected_filter_div">

</div>

<div class="filter_top_div">
    <ul class="filter_top_ul">
        <?php
        $attr = $data['attr'];
        foreach ($attr as $row) {
            ?>
            <li>
                    <span class="title_of_filter">
<?= $row['title'] ?>
                    </span>
                <img src="public/images/left-arrow.png"/>
                <div class="filter_top_options_div">
                    <ul class="filter_top_options_ul yekan">
                        <li data-id="0">
                            <span class="square"></span>
                            نمایش همه
                        </li>
                        <div class="saperatorLine_filterTop"></div>
                        <?php
                        $values = $row['values'];
                        foreach ($values as $value) {
                            ?>
                            <li data-id="<?= $value['id'] ?>" data-idattr="<?= $row['id'] ?>">
                                <span class="square"></span>
                                <?= $value['val'] ?>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </li>

            <?php
        }
        ?>

    </ul>
</div>
<div class="saperatorLine_content"></div>
<script>


    var FilterUnderMouse = $('.filter_top_div > ul > li');
    FilterUnderMouse.hover(function () {
        $('.filter_top_options_div', this).slideDown(100);
    }, function () {
        $('.filter_top_options_div', this).slideUp(100);
    });

    var FilterOption = $('.filter_top_options_ul li');
    FilterOption.hover(function () {
        $('.square', this).addClass('square_hover');

    }, function () {
        $('.square', this).removeClass('square_hover');
    });

    var show_selected_filter_div = $('.show_selected_filter_div');

    FilterOption.click(function () {
        var title = $(this).parents('li').find('.title_of_filter').text();
        var selected_filter_option = $(this).text();
        var id = $(this).attr('data-id');
        var idAttr = $(this).attr('data-idattr');

        var show_selected_filter_span = show_selected_filter_div.find('span[data-id=' + id + ']');
        var len = show_selected_filter_span.length;
        if (len > 0) {
            show_selected_filter_span.remove();
        } else {
            var span = '<span data-id="' + id + '" class="selected_filter_span">' + title + ':' + selected_filter_option + '<i class="selected_filter_icon" onclick="removeFilter(this)"></i><input type="hidden" name="attr-'+idAttr+'[]" value="'+id+'"></span>';
            show_selected_filter_div.append(span);
        }
        $('.square', this).toggleClass('square_click');

        doSearch();

    });

    function removeFilter(tag) {
        var span_to_remove = $(tag).parents('span');
        span_to_remove.remove();
        var id_OFspan_to_remove = span_to_remove.attr('data-id');
        $('.filter_top_options_ul li[data-id=' + id_OFspan_to_remove + ']').find('.square').removeClass('square_click');
    }



</script>
