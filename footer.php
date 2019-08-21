<?php
$option = Model::getOption();

?>
<style>
    .footer {
        width: 100%;
        height: 310px;
        float: right;
        margin-top: 40px;
    }
    .footer h3{
        color: #404040;
    }

    .footer_top {
        height: 45px;
        background: #5d5d62;
    }

    .footer_top_main {
        width: 1200px;
        height: 100%;
        margin: auto;
    }

    .footer_top_main p {
        color: white;
        margin: 0;
        line-height: 45px;
        float: right;
    }

    .footer_contact {
        width: 642px;
        height: 45px;
        padding: 0;
        float: left;
    }

    .footer_contact li {
        width: 214px;
        height: 100%;
        float: left;
    }

    .footer_contact li a {
        display: block;
        width: 214px;
        height: 100%;
        color: white;
        font-family: yekan;
        line-height: 47px;
        text-align: left;
    }

    .footer_contact li a i {
        display: inline-block;
        width: 20px;
        height: 20px;
        float: left;
        background: url(public/images/slices.png);
        margin-right: 10px;
        margin-top: 10px;
    }

    .footer_main {
        width: 100%;
        height: 265px;
        background: #d1d1d1;
    }
</style>
<footer class="footer">
    <div class="footer_top">
        <div class="footer_top_main">
            <p class="yekan fontlg">
                7 روز هفته، 24 ساعته پاسخگوی شما هستیم.
            </p>
            <ul class="footer_contact">

                <li>
                    <a style="direction: ltr;text-align: left">
<?= email ?>
                        <i style="background-position: -317px -418px"></i>
                    </a>
                </li>
                <li>
                    <a>
                        سوالات متداول
                        <i style="background-position: -357px -418px"></i>
                    </a>
                </li>
                <li>
                    <a>
                        <?= tel ?>
                        <i style="background-position: -397px -418px"></i>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <style>
        .footer_main_midle {
            width: 1200px;
            height: 100%;
            margin: auto;
        }

        .footer_main_midle_right {
            width: 250px;
            height: 100%;
            float: right;
            box-sizing: unset !important;
        }

        .footer_main_midle_between {
            width: 250px;
            height: 100%;
            float: right;
        }

        .footer_main_midle_left {
            width: 570px;
            height: 100%;
            float: left;
            box-sizing: unset !important;
        }

        .footer_main_midle_right ul, .footer_main_midle_between ul {
            padding: 0;
            width: 100%;
            height: 100%;
            margin: 0 !important;
            box-sizing: unset !important;
        }

        .footer_main_midle_right ul li a {
            font-family: yekan;
            color: #4a4b51;

        }

        .footer_main_midle_between ul li a {
            font-family: yekan;
            color: #4a4b51;
        }

        .footer_main_midle_left input {
            width: 430px;
            height: 39px;
            border: 1px solid #b3b3bc;
            border-radius: 4px;
        }

        .footer_main_midle_left span {
            display: block;
            width: 114px;
            height: 41px;
            float: left;
            margin-left: 5px;
            font-family: yekan;
            color: white;
            line-height: 42px;
            background: #00b6bb;
            border-radius: 4px;
            box-shadow: 2px 2px 2px #c7cac6;
            text-align: center;
        }

        .footer_main_midle_left i {
            display: block;
            width: 29px;
            height: 29px;
            background: url(public/images/slices.png);
        }

        .footer_main_midle_left a {
            display: block;

        }

        .footer_main_midle_left .footer_img {
            width: 150px;
            height: 48px;
            float: left;
            margin: 50px 10px 0 0;
        }

        .footer_img img {
            width: 150px;
            height: 48px;
            opacity: 0.8;
        }

        .footer_social {
            display: block;
            float: right;
            width: 29px;
            height: 29px;
            margin-left: 8px;
            margin-top: 60px;
        }

        .footer_main_midle_left .email_reg:hover {
            background: #0044bb;
        }

        .footer_main_midle_left .email_reg {
            transition: background-color 500ms ease;
        }


    </style>
    <div class="footer_main">
        <div class="footer_main_midle">
            <div class="footer_main_midle_right">
                <ul>

                    <li>
                        <a>
                            <h3>
                                راهنمای خرید از دیجی کالا
                            </h3>
                        </a>
                    </li>

                    <li>
                        <a>
                            ثبت سفارش
                        </a>
                    </li>

                    <li>
                        <a>
                            رویه های ارسال سفارش
                        </a>
                    </li>

                    <li>
                        <a>
                            معرفی دیجی بن
                        </a>
                    </li>
                </ul>
            </div>
            <div class="footer_main_midle_between">
                <ul>

                    <li>
                        <a>
                            <h3>
                                خدمات مشتریان
                            </h3>
                        </a>
                    </li>

                    <li>
                        <a>
                            پاسخ به پرسش های متداول
                        </a>
                    </li>

                    <li>
                        <a>
                            رویه های بازگرداندن کالا
                        </a>
                    </li>

                    <li>
                        <a>
                            شرایط استفاده
                        </a>
                    </li>
                    <li>
                        <a>
                            حریم خصوصی
                        </a>
                    </li>
                </ul>
            </div>
            <div class="footer_main_midle_left">
                <h3 class="yekan">
                    از تخفیف‌ها و جدیدترین‌های دیجی کالا باخبر شوید!
                </h3>
                <input class="yekan" placeholder="آدرس ایمیل خود را وارد کنید"/>
                <span class="email_reg">
                    تایید ایمیل
                   </span>
                <a class="footer_img">
                    <img src="public/images/apple%20footer.png"/>
                </a>
                <a class="footer_img">
                    <img src="public/images/cafebazaar-digikala.png"/>
                </a>
                <a class="footer_social">
                    <i style="background-position:-618px -621px"></i>
                </a>
                <a class="footer_social">
                    <i style="background-position:-576px -621px"></i>
                </a>
                <a class="footer_social">
                    <i style="background-position:-536px -621px"></i>
                </a>
                <a class="footer_social">
                    <i style="background-position:-494px -621px"></i>
                </a>
                <a class="footer_social">
                    <i style="background-position:-452px -621px"></i>
                </a>

            </div>
        </div>
    </div>
</footer>



<script>
    var timer = {};

    $('#menu_top li').hover(function () {
        var tag = $(this);
        var timeAttr = tag.index('li');
        clearTimeout(timer[timeAttr]);
        timer[timeAttr] = setTimeout(function () {
            $('> ul', tag).fadeIn(0);
            tag.addClass('menu-active');
            $('> .submenu3', tag).fadeIn(0);
        }, 500)
    }, function () {
        var tag = $(this);
        var timeAttr = tag.index('li');
        clearTimeout(timer[timeAttr]);
        timer[timeAttr] = setTimeout(function () {
            $('> ul', tag).fadeOut(0);
            tag.removeClass('menu-active');
            $('> .submenu3', tag).fadeOut(0);
        }, 600);
    });




    var footer_img = $('.footer_img img');
    footer_img.hover(function () {
        $(this).css('opacity', 1);
    }, function () {
        $(this).css('opacity', 0.8);
    });
</script>

</body>
</html>
