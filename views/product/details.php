<style>
    #details {
        width: 100%;
        float: right;
        border-radius: 0 0 4px 4px;
        overflow: hidden;
        box-shadow: 0 2px 3px #ceced4;
        background: white;
    }

    #details .pro_gallery {
        width: 500px;
        float: right;
    }

    #details .more_details {
        width: 660px;
        float: left;
    }

    #details .share_fav {
        width: 100%;
        height: 40px;
        padding-top: 20px;
        margin-bottom: 20px;
    }

    #details .share_fav i {
        display: block;
        float: left;
        width: 24px;
        height: 24px;

    }

    #share {
        background: url(public/images/share.png) no-repeat;
        cursor: pointer;
    }

    #favorite {
        background: url(public/images/favorite.png) no-repeat;
        margin-left: 20px;
        cursor: pointer;
    }

    .big_pic_pro {
        width: 300px;
        height: 300px;
        position: relative;
        right: 100px;
        margin-bottom: 71px;
    }

    .saperatorLine {
        width: 94%;
        height: 1px;
        background: #dbddda;
        margin: 0 15px 0 0;
        float: right;
    }

    .small_pic_pro_div {
        width: 100%;
        float: right;
    }

    .small_pic_pro_ul {
        width: 100%;
        padding: 0;
        float: left;
        margin-bottom: 10px;
    }

    .small_pic_pro_ul li {
        float: right;
        width: 100px;
        height: 100px;
        cursor: pointer;
    }

    .small_pic_pro_ul #etc_gallery {
        display: block;
        width: 24px;
        height: 24px;
        background: url(public/images/more.png);
        float: left;
        margin-left: 23px;
        margin-top: 18px;
    }

    #more_border {
        display: block;
        width: 70px;
        height: 60px;
        border: 1px solid #b3b5b3;
        border-radius: 10px;
        float: left;
        margin-left: 15px;
        margin-top: 20px;
    }

    .small_pic_pro_ul li img {
        width: 100%;
        height: 60px;
        margin-top: 20px;
    }
</style>
<div id="details">
    <div class="pro_gallery">
        <div class="share_fav">
            <i id="share"></i>
            <i id="favorite"></i>
        </div>
        <img class="big_pic_pro" src="public/images/products/<?= $productInfo['id'] ?>/product_300.jpg"
             data-zoom-image="public/images/products/<?= $productInfo['id'] ?>/product_600.jpg"/>
        <div class="saperatorLine"></div>
        <div class="small_pic_pro_div">
            <ul class="small_pic_pro_ul">

                <?php
                $gallery = $data['gallery'];

                foreach ($gallery as $row) {
                    if ($row['threed'] == 0) {
                        ?>
                        <li data-main-image="public/images/products/<?= $row['idproduct']; ?>/gallery/large/<?= $row['img']; ?>.jpg">
                            <img src="public/images/products/<?= $row['idproduct']; ?>/gallery/small/<?= $row['img']; ?>.jpg"/>
                        </li>
                        <?php
                    }
                }
                ?>

                <li data-main-image="">
                        <span id="more_border">
                             <span id="etc_gallery"></span>
                         </span>
                </li>
            </ul>
        </div>
    </div>
    <script>
        $('.big_pic_pro').elevateZoom({zoomWindowOffetx: -800, borderSize: 1, lensSize: 100});
    </script>
    <style>
        .more_details .pro_title {
            width: 650px;
            float: left;
            height: 95px;
            background: #eff0ee;
            margin-top: 10px;
            margin-left: 10px;
            border-radius: 4px;
            overflow: hidden;
        }

        .more_details .pro_title p {
            margin: 0;
            float: right;
            font-family: yekan;
            margin-right: 20px;
        }

        .star_rating_div {
            width: 80px;
            float: left;
            text-align: left;
            position: relative;
            top: 10px;
            left: 20px;
        }

        .star_rating_span {
            display: inline-block;
            height: 16px;
            width: 80px;
            overflow: hidden;
        }

        .gray_stars {
            display: inline-block;
            float: left;
            width: 80px;
            height: 16px;
            background: url(public/images/stargray.png) repeat;
        }

        .red_stars {
            display: block;
            float: left;
            width: 66%;
            height: 16px;
            background: url(public/images/starred.png) repeat;
            position: absolute;
            left: 0;
        }

        .star_rating_div .rate_mount {
            display: block;
            float: right;
            font-size: 12pt;
            color: #8e8f89;
        }
    </style>
    <div class="more_details">
        <div class="pro_title">
            <p style="font-size: 15pt;color: #5d5d62;margin-top: 20px">
                <?= $productInfo['title']; ?>
            </p>
            <!--<p style="font-size: 10pt;color: #8e8f89">Honor 9 STF-L09 Dual SIM 64GB Mobile Phone</p>-->
            <div class="star_rating_div">
                            <span class="star_rating_span">
                                 <span class="gray_stars"></span>
                                  <span class="red_stars"></span>
                             </span>
                <span class="rate_mount yekan">
                                    از
                                    69
                                    رای
                    </span>
            </div>
        </div>
        <style>
            .more_details_right {
                width: 400px;
                height: 452px;
                float: right;
            }

            .more_details_left {
                width: 259px;
                height: 420px;
                float: left;
                border-right: 1px solid #f1f1f1;
                margin-top: 17px;
            }

            .more_details_right .choose_color {
                width: 100%;
                float: right;
                margin-top: 35px;
            }

            .more_details_right .choosing_title {
                font-size: 12pt;
                margin: 0;
                color: #8e8f89;
                font-weight: normal;
                margin-top: 15px;
            }

            .more_details_right .choose_color .colors {
                padding: 0;
                width: 100%;
                float: right;
            }

            .more_details_right .choose_color .colors li {
                float: right;
                width: 50px;
                height: 30px;
                border: 1px solid #cbcbd0;
                border-radius: 4px;
                overflow: hidden;
                margin-left: 5px;
                font-family: yekan;
                font-size: 10pt;
                padding-right: 40px;
                position: relative;
                line-height: 30px;
                background: #f3f5f6;
                color: #4f4f4f;
                cursor: pointer;
            }

            .more_details_right .choose_color .colors .color_circle {
                display: block;
                float: right;
                position: absolute;
                width: 20px;
                height: 20px;
                border-radius: 50%;
                top: 5px;
                right: 10px;
            }

            .more_details_right .choose_color .colors .color_circle.activeColor:after {
                content: "";
                position: absolute;
                width: 15px;
                height: 15px;
                background: url(public/images/slices.png) no-repeat -166px -81px;
                top: 3px;
                right: 3px;
            }

            .garanty_listSelector {
                width: 300px;
                height: 40px;
                background: #edf1f4;
                border: 1px solid #d1d4d7;
                border-radius: 4px;
                position: relative;
                text-align: center;
                cursor: pointer;
            }

            .garanty_listSelector::after {
                content: "";
                width: 28px;
                height: 17px;
                background: url(public/images/slices.png) no-repeat -135px -77px;
                position: absolute;
                right: 4px;
                top: 8px;
            }

            .garanty_listSelector::before {
                content: "";
                width: 28px;
                height: 17px;
                background: url(public/images/slices.png) no-repeat -30px -458px;
                position: absolute;
                left: 5px;
                top: 11px;
            }

            .garanty_listSelector .garanty_title {
                font-size: 10pt;
                line-height: 40px;
                color: #4f4f4f;
                position: relative;
            }

            .garanty_listSelector ul {
                display: none;
                padding: 0;
                width: 299px;
                float: right;
                border: 1px solid #d1d4d7;
                box-shadow: 2px 2px 2px #cdcdcd;
                margin-top: 3px;
                position: absolute;
                z-index: 3;
                background: white;
            }

            .garanty_listSelector ul li {
                font-family: yekan;
                font-size: 10.5pt;
                padding: 2px 5px;
                color: #4f4f4f;
            }
        </style>

        <div class="more_details_right">
            <div class="choose_color">
                <h4 class="choosing_title yekan">
                    انتخاب رنگ :
                </h4>
                <?php
                $all_colors = $productInfo['all_colors'];
                ?>
                <ul class="colors">
                    <?php

                    foreach ($all_colors as $color) {

                        ?>
                        <li>
                            <span data-id="<?= $color['id'] ?>" class="color_circle" style="background: <?= $color['hex']; ?>"></span>
                            <?= $color['title']; ?>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <h4 class="choosing_title yekan" style="display: inline-block">
                انتخاب گارانتی :
            </h4>
            <div class="garanty_listSelector">
                    <span class="garanty_title yekan">
انتخاب کنید...
                    </span>

                <ul>
                    <?php
                    $all_garranties = $productInfo['all_garranties'];
                    foreach ($all_garranties as $garranty) {
                        ?>
                        <li data-id="<?= $garranty['id']; ?>">
                            <?= $garranty['title']; ?>
                        </li>
                        <?php
                    }
                    ?>
                </ul>

            </div>
            <style>
                .price_det {
                    float: right;
                    width: 100%;
                    margin-top: 60px;
                }

                .price_det span {
                    font-family: yekan;
                    float: right;
                }

                .price_det .discount {
                    display: inline-block;
                    width: 150px;
                    height: 28px;
                    border-radius: 4px 0 0 4px;
                    overflow: hidden;
                    margin-top: 2px;
                }

                .price_det .discount .discount_title {
                    display: inline-block;
                    text-align: center;
                    width: 60px;
                    height: 100%;
                    font-family: yekan;
                    font-size: 9pt;
                    color: white;
                    background: #ff4f56;
                    line-height: 28px;
                    position: relative;
                }

                .price_det .discount .discount_title::after {
                    content: " ";
                    width: 0;
                    height: 0;
                    border-style: solid;
                    border-width: 9px 14px 9px 0;
                    border-color: transparent #ffffff transparent transparent;
                    position: absolute;
                    top: 5px;
                    right: 0;
                }

                .price_det .discount .discount_mount {
                    display: inline-block;
                    text-align: center;
                    width: 90px;
                    height: 100%;
                    font-family: yekan;
                    font-size: 9pt;
                    color: white;
                    background: #d14146;
                    line-height: 28px;
                }

            </style>
            <div class="price_det">
                <span style="font-size: 10pt;margin-left: 8px;color: #4f4f4f;margin-top: 2px">قیمت : </span>
                <span style="font-size: 12pt;margin-left: 8px;color: #4f4f4f;text-decoration: line-through;">
<?= $productInfo['price']; ?>
                </span>
                <span style="font-size: 9pt;margin-left: 12px;color: #4f4f4f;margin-top: 5px">تومان</span>
                <span class="discount">
                        <span class="discount_title">تخفیف</span>
                        <span class="discount_mount">
<?= $productInfo['discount_price']; ?>
                        </span>
                    </span>

            </div>

            <style>
                .compare_addcart {
                    float: right;
                    width: 100%;
                    margin-top: 70px;
                }

                .compare_addcart .compare {
                    display: inline-block;
                    width: 160px;
                    height: 40px;
                    border-radius: 2px;
                    overflow: hidden;
                    box-shadow: 1px 2px 2px #aeaeae;
                    background: #8f8f8f;
                    margin-left: 15px;
                    font-family: yekan;
                    color: white;
                    font-size: 12pt;
                    text-align: center;
                    line-height: 39px;
                }

                .compare_addcart .addtocard {
                    display: inline-block;
                    width: 200px;
                    height: 40px;
                    border-radius: 2px;
                    box-shadow: 1px 2px 2px #aeaeae;
                    overflow: hidden;
                    background: #00cc56;
                    font-family: yekan;
                    color: white;
                    font-size: 12pt;
                    text-align: center;
                    line-height: 39px;
                    cursor: pointer;
                }

                .compare_addcart .addtocard i {
                    display: block;
                    float: right;
                    width: 50px;
                    height: 100%;
                    background: #00e460 url(public/images/slices.png) no-repeat -145px -411px;
                }
            </style>

            <div class="compare_addcart">
                    <span class="compare">
                        مقایسه کن
                        <i></i>
                    </span>
                <span class="addtocard" onclick="addToBasket('<?= $productInfo['id'];?>');">
                        <i></i>
                        افزودن به سبد خرید
                    </span>
            </div>

        </div>
        <script>

            var garanty_selected = '';

            function addToBasket(productId) {
                var color = $('.colors').find('.color_circle.activeColor').attr('data-id');
                var url = '<?= URL ?>product/addtobasket/'+productId+'/'+color+'/'+garanty_selected;
                var data = {};
                $.post(url , data , function (msg) {
                    console.log(msg);
                });
            }
        </script>

        <div class="more_details_left">

        </div>
        <div class="saperatorLine"></div>
        <style>
            #services_op {
                float: right;
                height: 80px;
                background: white;
                overflow: hidden;
                margin-top: 11px;
            }

            #services_op ul {
                padding: 0;
                height: 100%;
            }

            #services_op ul li {
                width: 130px;
                height: 100%;
                float: right;
            }

            #services_op ul li a {
                display: block;
                height: 100%;
                color: #3b3c38;
                line-height: 80px;

            }

            #services_op ul li a i {
                display: block;
                width: 28px;
                height: 28px;
                float: right;
                margin: 24px 24px 0 10px;
                background: url(public/images/slices.png) no-repeat;
            }
        </style>
        <div id="services_op">
            <ul>
                <li>
                    <a class="yekan fontssm">
                        <i style=" width: 40px;height: 40px;background-position: -313px -470px;"></i>
                        تحویل اکسپرس
                    </a>
                </li>
                <li>
                    <a class="yekan fontssm">
                        <i style="background-position: -206px -470px;"></i>
                        7 روز ضمانت بازگشت
                    </a>
                </li>
                <li>
                    <a class="yekan fontssm">
                        <i style="background-position: -260px -470px;"></i>
                        پرداخت در محل
                    </a>
                </li>
                <li>
                    <a class="yekan fontssm">
                        <i style="background-position: -100px -470px;"></i>
                        تضمین بهترین قیمت
                    </a>
                </li>
                <li>
                    <a class="yekan fontssm">
                        <i style="background-position: -156px -470px;"></i>
                        ضمانت اصل بودن کالا
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    var color = $('.choose_color .colors li');
    color.click(function () {
        $('.color_circle').removeClass('activeColor');
        $('.color_circle', this).addClass('activeColor');
    });

    $('.garanty_listSelector').click(function () {
        $('ul', this).slideToggle(200);
    });
    $('.garanty_listSelector ul li').click(function () {
        garanty_selected=$(this).attr('data-id');
        var txt = $(this).text();
        $('.garanty_listSelector .garanty_title').text(txt);
    });


    /*  $('.small_pic_pro_div ul li').click(function () {
          $('.darkpage').fadeIn(200);
          $('.pro_gallery2').fadeIn(200);
          $('#body').addClass('activeBody');
          var index = $(this).index();
          //alert(index);
          var mainImageUrl = $(this).attr('data-main-image');
          //alert(mainImageUrl);
          showGallery(mainImageUrl, index+1);
      });*/

</script>