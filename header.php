<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?= URL ?>">
    <meta charset="UTF-8">
    <title>
        فروشگاه اینترنتی دیجی کالا
    </title>
    <script src="public/js/jquery-3.3.1.min.js"></script>
    <script src="public/js/jquery.flipTimer.js"></script>
    <link href="public/css/flipTimer.css" rel="stylesheet">
</head>
<body style="background: #<?= body_color ?>;margin: 0">

<style>
    @font-face {
        font-family: 'yekan';
        src: url('public/font/Yekan.ttf') format('truetype'), url('public/font/Yekan.eot?#iefix') format("embedded-opentype");
    }

    .yekan {
        font-family: yekan;
    }

    .fontssm {
        font-size: 10pt
    }

    .fontsm {
        font-size: 10.5pt
    }

    .fontmd {
        font-size: 11pt
    }

    .fontlg {
        font-size: 11.5pt
    }

    div, a, p, span, ul, li {
        text-align: right;
        direction: rtl;
    }

    a {
        text-decoration: none !important;
        color: #4a4b51;
    !important;
    }

    .btntop {
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

    .btn_green {
        display: block;
        width: 126px;
        height: 40px;
        border-radius: 4px;
        box-shadow: 2px 2px 3px #d0d0d0;
        background: #00977f;

        text-align: center;
        cursor: pointer;
        line-height: 40px;
        color: white;
        float: left;
        margin-left: 10px;
    }

    .row2 {
        width: 100%;
        float: right;
        margin-bottom: 15px;
    }
</style>

<header style="width:100%;height: 98px;margin: 0 auto;background: white">
    <div id="header" style="width: 1200px;height: 98px;margin: auto">
        <div id="header_left" style="float: left;width: 156px;height: 78px;display: block;">
            <img src="public/images/logo.png" style="margin-top:15px ;width: 156px;height: 58px;display: block;">
        </div>
        <div id="header_right" style="width: 706px;height:98px;float: right ">
            <div id="header_right_up" style="height: 30px;margin-top:10px">
                <span style="width:18px;height: 18px;background: url(public/images/lock.png);display: block;float: right"></span>
                <a class="yekan fontsm" href="<?= URL ?>login" style="float:right;color:#80807e;margin-right: 10px">فروشگاه
                    اینترنتی دیجی کالا ، وارد شوید</a>
                <span style="width:15px;height: 15px;background: url(public/images/signup.png);display: block;float: right;margin-right: 25px;margin-top: 3px"></span>
                <a class="yekan fontsm" href="<?= URL ?>register" style="float:right;color:#80807e;margin-right: 10px">ثبت
                    نام
                    کنید</a>
            </div>
            <div id="header_right_down" style="width: 750px;height: 40px;margin-top: 5px;position: relative">
                <div id="header_right_down_shoppingBasket" style="width: 190px;height: 38px;float: right">
                    <a href="/ShopBasket"
                       style="width:55px;height: 38px ;background: #00d471 url(public/images/shopping-cart.png) no-repeat center;border-radius: 0 4px 4px 0;display: block;float: right"></a>
                    <a class="yekan fontsm" href="/ShopBsket"
                       style="color:white;padding-right: 20px;line-height: 36px ;background:#008c4b;width: 115px;height: 38px;display: block;float: right;border-radius: 4px 0 0 4px;box-sizing: unset !important;">
                        سبد خرید
                        <span style="width: 25px;height: 25px;background:#00d471;border-radius: 100%;display: block;float:left; margin-top: 6px;margin-left: 30px;line-height: 25px;text-align: center ">0</span>
                    </a>
                </div>
                <input class="yekan fontsm" placeholder="محصول ، دسته یا برند مورد نظرتان را جستجو کنید . . ."
                       id="search_top"
                       style="width:465px;height: 34px;float: right;border:1px solid #d5d7d3;margin-right: 10px;padding-right: 10px;border-radius: 0 4px 4px 0 "/>
                <span style="width: 42px;height: 38px;background: #afb1ae url(public/images/search.png) no-repeat center;position: absolute;border-radius: 4px 0 0 4px"></span>
            </div>
        </div>
    </div>
</header>

<style>
    a {
        color: unset
    }

    nav {
        box-shadow: 0 2px 2px #c7cac6;
        -webkit-box-shadow: 0 2px 2px #c7cac6;
        -moz-box-shadow: 0 2px 2px #c7cac6;
        border-top: 1px solid #e8ece7;
    }

    ul {
        margin: 0;
    }

    li {
        list-style: none
    }

    #menu_top > ul {
        margin: 0 !important;
        padding: 0;
        position: relative;
        z-index: 3; /*chon arrow sidebar ha z-index=2 dasht be in 3 dadam... */
    }

    #menu_top > ul > li {
        float: right;
        height: 40px;
    }

    #menu_top > ul > li > a {
        padding: 0 10px;
        height: 40px;
        display: block;
        line-height: 38px;
        color: #4a4b51 !important;

    }

    #menu_top > ul > li > ul {
        position: absolute;
        width: 1200px;
        height: 40px;
        background: white;
        right: 0;
        padding: 0;
        border-top: 1px solid #e8ece7;
        box-shadow: 0 2px 2px #c7cac6;
        line-height: 30px;
        display: none;
    }

    #menu_top > ul > li > ul > li {
        float: right;
    }

    #menu_top > ul > li > ul > li > a {
        display: block;
        height: 40px;
        line-height: 37px;
        padding: 0 10px;
    }

    .menu_down_icon {
        width: 9px;
        height: 9px;
        background: url(public/images/arrow-down.png);
        display: inline-block;
        float: left;
        margin-top: 15px;
        margin-right: 8px;
    }

    .menu3_col {
        width: 299px;
        height: 100%;
        float: right;
        border-left: 1px solid #e8ece7;

    }

    .menu3_col_ul {
        padding-right: 10px;
    }

    .menu3_col_ul li {
        padding-right: 15px;
    }

    .level3_blue {
        padding-right: 0 !important;
        color: #06cbb0;
        font-size: 11pt !important;
    }

    .submenu3 {
        display: none;

    }

    .menu-active {
        background: white;
        box-shadow: 0 -1px 2px #c7cac6;
    }

    .menu-active > a {
        color: #cb0027;
    }

    #menu_top {
        cursor: pointer;
    }

    #menu_navTag {
        width: 100%;
        height: 40px;
        background: #<?= menu_color ?>;
    }
</style>

<nav id="menu_navTag">
    <div id="menu_top" style="width:1200px;height: 40px;margin:auto">
        <ul>

            <?php
            $model = new Model;
            $menu = $model->getMenu();

            foreach ($menu as $level1) {
                ?>

                <li data-time="<?= $level1['id'] ?>">
                    <a class="yekan fontlg">
                        <?= $level1['title']; ?>
                        <span class="menu_down_icon"></span>
                    </a>
                    <ul>
                        <?php
                        $children1 = $level1['children'];
                        foreach ($children1 as $level2) {
                            ?>
                            <li data-time="<?= $level2['id'] ?>">
                                <a class="yekan ">
                                    <?= $level2['title']; ?>
                                </a>

                                <div class="submenu3"
                                     style="width: 100%;height: 360px;position: absolute;background: white;border-top: 1px solid #e8ece7;right: 0">


                                    <ul class="menu3_col menu3_col_ul yekan fontsm">
                                        <?php
                                        $children2 = $level2['children'];
                                        $i = 1;
                                        foreach ($children2

                                        as $level3) {
                                        ?>


                                        <?php
                                        if ($i % 12 == 0) {
                                        ?>
                                    </ul>
                                    <ul class="menu3_col menu3_col_ul yekan fontsm">
                                        <?php
                                        }
                                        ?>

                                        <li class="level3_blue">
                                            <a>
                                                <?= $level3['title']; ?>
                                            </a>
                                        </li>

                                        <?php
                                        $i++;

                                        if(isset($level3['children'])){

                                        $children3 = $level3['children'];
                                        foreach ($children3

                                        as $level4) {
                                        ?>

                                        <?php
                                        if ($i % 12 == 0) {
                                        ?>
                                    </ul>
                                    <ul class="menu3_col menu3_col_ul yekan fontsm">
                                        <?php
                                        }
                                        ?>

                                        <li>
                                            <a>
                                                <?= $level4['title']; ?>
                                            </a>
                                        </li>
                                        <?php
                                        $i++;
                                        }//foreach level4
                                        }//if isset...
                                        }//foreach level3
                                        ?>

                                    </ul>
                                    <img src="public/images/mobile.png"
                                         style="position: absolute;left:10px;bottom: 10px;"/>

                                </div>

                            </li>
                        <?php } ?>
                    </ul>
                </li>

                <?php
            }
            ?>

        </ul>
    </div>
</nav>

