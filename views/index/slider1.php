<?php
//print_r($data);
//echo '<br>';
?>

<style>
    #slider1 {
        height: 310px;
        border-radius: 4px;
        overflow: hidden;
        background: white;
        box-shadow: 2px 2px 2px #c7cac6;
        margin-bottom: 15px;
        position: relative;
    }

    #slider1_img a {
        display: none;
    }

    #slider1_img img {
        width: 100%;
        height: 260px;
        background: no-repeat;
    }

    #slider1_img {
        height: 260px;
        width: 100%;
        overflow: hidden;
    }

    #slider1_navigator {
        height: 50px;
        background: rgba(0, 0, 0, .5);
    }

    #arrow_next_sidebar1 {
        width: 24px;
        height: 24px;
        position: absolute;
        background: url(public/images/arrowhead-thin-outline-to-the-left.png) no-repeat;
        display: block;
        top: 130px;
        left: 5px;
        cursor: pointer;
        z-index: 2;
    }

    #arrow_previous_sidebar1 {
        width: 24px;
        height: 24px;
        position: absolute;
        background: url(public/images/arrow-point-to-right.png) no-repeat center;
        display: block;
        top: 130px;
        right: 5px;
        cursor: pointer;
        z-index: 2
    }

    #slider1_navigator ul {
        height: 100%;
        padding: 0;
    }

    #slider1_navigator ul li {
        width: 178px;
        height: 100%;
        float: right;
    }

    #slider1_navigator ul li a {
        display: block;
        width: 100%;
        height: 100%;
        text-align: center;
        line-height: 50px;
        cursor: pointer;
        position: relative;
    }

    #slider1 #slider1_navigator .activeslide_1 > a::after {
        content: " ";
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 10px 13px 10px;
        border-color: transparent transparent #ffffff transparent;
        position: absolute;
        right: 0;
        left: 0;
        margin: 0 auto;
        top: -13px
    }

    #slider1 #slider1_navigator .activeslide_1 > a {
        background: white;
        color: #3b3c38;
    }
</style>
<div id="slider1">
    <span id="arrow_previous_sidebar1"></span>
    <span id="arrow_next_sidebar1"></span>

    <div id="slider1_img">

<!--< YADET BASHE DAR DATABASE FORMATE AKSARO BE SURAT JPEG VARED KON... >-->
        <?php
        $slider1 = $data[0];
        foreach ($slider1 as $row) {

            ?>

            <a href="<?= $row['link']; ?>" class="slider1_item">
                <img src="<?= $row['img']; ?>"/>
            </a>

            <?php
        }
        ?>
    </div>

    <div id="slider1_navigator">
        <ul>
            <li>
                <a class="yekan fontlg">
                    منتخب سازهای ایرانی
                </a>
            </li>
            <li>
                <a class="yekan fontlg">
                    دیجی استایل
                </a>
            </li>
            <li>
                <a class="yekan fontlg">
                    کنسول بازی و لوازم جانبی
                </a>
            </li>
            <li>
                <a class="yekan fontlg">
                    خرید به صرفه
                </a>
            </li>
            <li>
                <a class="yekan fontlg">
                    تی شرت مردانه
                </a>
            </li>
        </ul>
    </div>
</div>
<script>

    /*slider1*/
    var slider1tag = $('#slider1');
    var slider1items = slider1tag.find('.slider1_item');
    var numitems = slider1items.length;
    var nextslide = 1;
    var timeOut = 4000;
    var slider1nav = slider1tag.find('#slider1_navigator ul li');

    function slider1() {
        if (nextslide > numitems) {
            nextslide = 1;
        }
        if (nextslide < 1) {
            nextslide = numitems;
        }

        slider1items.hide();
        slider1items.eq(nextslide - 1).fadeIn(100);
        slider1nav.removeClass('activeslide_1');
        slider1nav.eq(nextslide - 1).addClass('activeslide_1');
        nextslide++;
    }

    slider1();
    var sliderstop = setInterval(slider1, timeOut);
    slider1tag.mouseleave(function () {
        clearInterval(sliderstop);
        sliderstop = setInterval(slider1, timeOut);
    });

    function gotoNext() {
        slider1();
    }

    $('#arrow_next_sidebar1').click(function () {
        clearInterval(sliderstop);
        gotoNext();
    });

    function gotoPrevious() {
        nextslide = nextslide - 2;
        slider1();
    }

    $('#arrow_previous_sidebar1').click(function () {
        clearInterval(sliderstop);
        gotoPrevious();
    });

    $('#slider1 #slider1_navigator li').click(function () {
        clearInterval(sliderstop);
        var index = $(this).index();
        gotoslide(index);
    });

    function gotoslide(index) {
        nextslide = index + 1;
        slider1();
    }

</script>