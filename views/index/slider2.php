<style>
    #slider2 {
        width: 100%;
        height: 380px;
        background: white;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 2px 2px 2px #c7cac6;
        position: relative;
        margin-bottom: 15px;
    }

    #slider2_content {
        width: 700px;
        float: right;
        height: 100%;
    }

    #slider2_content a {
        display: block;
        width: 100%;
        height: 100%;
    }

    .slider2_content_left p {
        font-size: 15pt;
        margin-top: 60px;
        text-align: center;
    }

    .slider2_content_left img {
        width: 220px;
        height: 220px;
        margin-right: 60px;
    }

    #slider2_content .slider2_content_right {
        height: 100%;
        width: 360px;
        float: right;
    }

    #slider2_content .slider2_content_left {
        height: 100%;
        width: 340px;
        float: left;
    }

    #slider2_navigator {
        width: 189px;
        height: 100%;
        float: left;
        background: #f6f8f0;
        border-right: 1px solid #e0e2db;
    }

    #slider2_navigator ul {
        padding: 0;
        height: 100%;
    }

    #slider2_navigator ul li {
        height: 38px;
    }

    #slider2_navigator ul li a {
        display: block;
        height: 38px;
        width: 189px;
        text-align: center;
        line-height: 37px;
        cursor: pointer;
    }

    .slider2_off_proposal {
        width: 320px;
        height: 30px;
        font-size: 13pt;
        color: red;
        padding-right: 40px;
        margin-top: 50px;
        margin-bottom: 0;
    }

    .slider2_price {
        width: 250px;
        height: 35px;
        margin-right: 40px;
        font-size: 15pt;
        color: white;
    }

    .slider2_price_old {
        width: 89px;
        height: 100%;
        background: #8e8f89;
        text-align: center;
        float: right;
        position: relative;
    }

    .slider2_price_old::before {
        content: " ";
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 9.5px 11px 9.5px 0;
        border-color: transparent #8e8f89 transparent transparent;
        position: absolute;
        right: 89px;
        top: 8px;
        z-index: 2;
    }

    .slider2_price_old div {
        width: 90%;
        height: 0;
        border-bottom: 1px solid #3c3c41;
        position: absolute;
        transform: rotate(-19deg);
        top: 17px;
        right: 3px;
    }

    .slider2_price_new {
        width: 159px;
        height: 100%;
        background: #ff3c44;
        text-align: center;
        float: left;
        position: relative;
    }

    .slider2_price_new::before {
        content: " ";
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 10px 12px 10px 0;
        border-color: transparent #ffffff transparent transparent;
        position: absolute;
        right: 0;
        top: 7px;
    }

    .slider2_pro_description {
        width: 100%;
        height: 140px;
        margin-top: 20px;
    }

    .slider2_pro_description p {
        margin: 0;
        font-family: yekan;
        font-size: 10pt;
        margin-right: 40px;
    }

    .flipTimer {
        position: absolute;
        transform: scale(0.3);
        bottom: 15px;
        right: -135px;
    }

    .flipTimer, .flipTimer div {
        direction: ltr !important;
    }

    #off_finished {
        position: absolute;
        font-size: 65pt;
        color: #d23530;
        text-align: center;
        width: 700px;
        height: 100%;
        line-height: 370px;
        display: none;
        z-index: 2;
    }

    #slider2_navigator .activeslide_2 {
        background: #e83228;
        color: white;
        position: relative;
    }

    #slider2_navigator .activeslide_2::after {
        content: " ";
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 19px 0 19px 18px;
        border-color: transparent transparent transparent #e83228;
        position: absolute;
        right: -18px;
        top: 0;
    }
</style>

<div id="slider2">
    <div class="flipTimer">
        <div class="hours"></div>
        <div class="minutes"></div>
        <div class="seconds"></div>
    </div>

    <div id="off_finished" class="yekan" >
        تمام شد!
    </div>

    <div id="slider2_content">

        <?php
        $slider2 = $data[1];
        foreach ($slider2 as $row) {
            ?>

            <a href="<?= URL ?>product/index/<?= $row['id']; ?>" class="slider2_item">
                <div class="slider2_content_right">
                    <p class="slider2_off_proposal yekan">
                        پیشنهاد شگفت انگیز امروز
                    </p>
                    <div class="slider2_price yekan">
                        <div class="slider2_price_old">
                            <div></div>
                            <?= $row['price']; ?>
                        </div>
                        <div class="slider2_price_new">
                            <?= $row['final_price'] ?>
                             تومان
                        </div>
                    </div>
                    <div class="slider2_pro_description">
                        <p>
                            جنس:
                        </p>
                        <p>
                            گنجایش:
                        </p>
                        <p>
                            وزن:
                        </p>
                    </div>

                </div>
                <div class="slider2_content_left">
                    <p class="yekan">
                       <?= $row['title']; ?>
                    </p>
                    <img src="public/images/products/<?= $row['id']; ?>/product_220.jpg"/>
                </div>
            </a>


            <?php
        }
        ?>


    </div>
    <div id="slider2_navigator">
        <ul>
            <?php
            $slider2 = $data[1];
            $date_end = $data[2];
            foreach ($slider2 as $row) {
                ?>
                <li>
                    <a class="yekan fontsm">
                        <?= $row['title']; ?>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet consectetur impedit, magni neque nulla optio possimus rerum sapiente. Distinctio, eos, nam. A deleniti eos excepturi hic laborum tempora tenetur unde.
        </p>
    </div>
</div>

<script>
    $('.flipTimer').flipTimer({
        direction: 'down',
        date: '<?= $date_end ?>',
        callback: function () {
            $('.slider2_content_right').css('opacity', 0.2);
            $('.slider2_content_left').css('opacity', 0.2);
            $('#off_finished').fadeIn(100);
        }
    });
    /*slider2*/

    var slider2tag = $('#slider2');
    var slider2items = slider2tag.find('.slider2_item');
    var numitems2 = slider2items.length;
    var nextslide2 = 1;
    var timeOut2 = 3000;
    var slider2nav = slider2tag.find('#slider2_navigator ul li');

    function slider2() {
        if (nextslide2 > numitems2) {
            nextslide2 = 1;
        }
        if (nextslide2 < 1) {
            nextslide2 = numitems2;
        }

        slider2items.hide();
        slider2items.eq(nextslide2 - 1).fadeIn(100);
        slider2nav.removeClass('activeslide_2');
        slider2nav.eq(nextslide2 - 1).addClass('activeslide_2');
        nextslide2++;
    }

    slider2();
    var sliderstop2 = setInterval(slider2, timeOut2);
    slider2tag.mouseleave(function () {
        clearInterval(sliderstop2);
        sliderstop2 = setInterval(slider2, timeOut2);
    });


    $('#slider2 #slider2_navigator li').click(function () {
        clearInterval(sliderstop2);
        var index2 = $(this).index();
        gotoslide_2(index2);
    });

    function gotoslide_2(index2) {
        nextslide2 = index2 + 1;
        slider2();
    }
</script>