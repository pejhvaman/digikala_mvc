<style>
    #sidebar_right {
        width: 290px;
        float: right;
        margin-top: 5px;
    }

    #sidebar_right > a > img {
        border-radius: 4px;
        margin: 0 0 10px 0;
        box-shadow: 2px 2px 2px #c7cac6;
    }

    #sidebar_right #digikala_tv a > img {
        box-shadow: 2px 2px 2px #c7cac6;
    }

    #sidebar_right #sidebar_off img {
        box-shadow: 2px 2px 2px #c7cac6;
    }

    #digikala_tv, #sidebar_off {
        padding: 0;
        width: 290px;
    }

    #digikala_tv li, #sidebar_off li {
        margin-bottom: 10px;
    }

    #digikala_tv li a, #sidebar_off li a {
        position: relative;
        display: block
    }

    .tvImg {
        width: 100%;
        height: 180px;
        border-radius: 4px
    }

    .offImg {
        width: 100%;
        height: 265px;
        border-radius: 4px
    }

    .playCircle {
        display: block;
        width: 70px;
        height: 70px;
        border-radius: 100%;
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        margin: auto auto;
        background: rgba(250, 250, 250, .4)
    }

    .playIcon {
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        margin: auto auto;
    }

    #digikala_tv li a::before {
        content: "";
        display: block;
        width: 100%;
        height: 180px;
        background: rgba(0, 0, 0, .3);
        position: absolute;
        border-radius: 4px;
    }

    #digikala_tv li .playCircle {
        transition: all 500ms ease;
    }

    #digikala_tv li:hover .playCircle {
        background: rgba(250, 250, 250, .6) !important;
    }

    #lastNews_sideBar {
        background: white;
        width: 290px;
        box-shadow: 2px 2px 2px #c7cac6;
        border-radius: 4px;
        float: right;
        margin-bottom: 15px;
    }

    #lastNews_sideBar h3 {
        height: 40px;
        background: #f4faf1;
        margin: 0;
        padding-right: 15px;
        line-height: 42px;
        border-radius: 4px 4px 0 0;
    }

    #lastNews_sideBar ul {
        padding: 0;

    }

    #lastNews_sideBar ul li a {
        display: block;
        padding: 10px;
        float: right;
    }

    #lastNews_sideBar .lastNews_sidebar_right img {
        width: 60px;
        height: 60px;
        border-radius: 100%;
    }

    #lastNews_sideBar p {
        margin: 0;
    }

    #lastNews_sideBar .lastNews_sidebar_right {
        float: right;
    }

    #lastNews_sideBar .lastNews_sidebar_left {
        float: right;
        padding-right: 15px;
        width: 190px;
    }

</style>
<div id="sidebar_right">
    <a>
        <img src="public/images/iransakht_banner_v001.png"/>
    </a>

    <ul id="digikala_tv">
        <li>
            <a>
                <img class="tvImg" src="public/images/Digikala_TV.jpg"/>
                <span class="playCircle">
                        <img class="playIcon" src="public/images/play-button.png"/>
                    </span>
            </a>
        </li>
        <li>
            <a>
                <img class="tvImg" src="public/images/Apple_iPad_Pro_Video_Review.jpg"/>
                <span class="playCircle">
                        <img class="playIcon" src="public/images/play-button.png"/>
                    </span>
            </a>
        </li>
    </ul>

    <ul id="sidebar_off">
        <li>
            <a>
                <img class="offImg" src="public/images/off-shmen.jpeg"/>
            </a>
        </li>
        <li>
            <a>
                <img class="offImg" src="public/images/off-plate.jpeg"/>
            </a>
        </li>
        <li>
            <a>
                <img class="offImg" src="public/images/off-football.jpeg"/>
            </a>
        </li>
    </ul>

    <div id="lastNews_sideBar">

        <h3 class="yekan fontmd">تازه ترین خبرها</h3>

        <ul>
            <li>
                <a>
                    <div class="lastNews_sidebar_right">
                        <img src="public/images/prime.jpg"/>
                    </div>

                    <div class="lastNews_sidebar_left">
                        <p class="yekan fontsm">
                            دردسرهای آمازون در فروش مواد غذایی
                        </p>
                        <p class="yekan" style="font-size: 8pt;color: #979995">
                            دوشنبه 11 تیر 1397
                        </p>
                    </div>
                </a>
            </li>
            <li>
                <a>
                    <div class="lastNews_sidebar_right">
                        <img src="public/images/skin-type.jpg"/>
                    </div>

                    <div class="lastNews_sidebar_left">
                        <p class="yekan fontsm">
                            من چه نوع پوستی دارم؟شناخت انواع پوست و شیوه مراقبت از آنها
                        </p>
                        <p class="yekan" style="font-size: 8pt;color: #979995">
                            دوشنبه 11 تیر 1397
                        </p>
                    </div>
                </a>
            </li>
        </ul>

    </div>

    <style>
        #brand_sidebar {
            margin-top: 10px;
        }

        #brand_sidebar a {
            width: 140px;
            height: 96px;
            float: right;
            background: #fff;
            margin-bottom: 10px;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 2px 2px 2px #c7cac6;
            line-height: 108px;
        }

        #brand_sidebar a:nth-child(even) {
            margin-left: 0;
            float: left;
        }

        #brand_sidebar a img {
            width: 100%;

        }
    </style>

    <div id="brand_sidebar">
        <a>
            <img src="public/images/panasonic.png"/>
        </a>
        <a>
            <img src="public/images/samsung-brand.jpg"/>
        </a>
        <a>
            <img src="public/images/adata.png"/>
        </a>
        <a>
            <img src="public/images/x.vision-9e3e8d.png"/>
        </a>
        <a>
            <img src="public/images/pars-khazar-38a235.png"/>
        </a>
        <a>
            <img src="public/images/lg.png"/>
        </a>
    </div>

</div>