<style>
    .amazing_off {
        width: 100%;
        height: 50px;
        background: #ffdfde url(public/images/percentage.png) no-repeat 99% center;
        position: relative;
        border-radius: 4px 4px 0 0;
        overflow: hidden;
    }

    .flipTimer {
        position: absolute;
        transform: scale(0.3);
        top: -25px;
        left: -165px;
    }

    .flipTimer, .flipTimer div {
        direction: ltr !important;
    }

    .amazing_off .off_bar {
        display: inline-block;
        width: 190px;
        height: 30px;
        border-radius: 5px;
        overflow: hidden;
        float: left;
        position: relative;
        left: 190px;
        top: 10px;
    }

    .amazing_off .off_bar .off_rightBar {
        display: block;
        float: right;
        width: 120px;
        height: 100%;
        background: #ff5651;
    }

    .amazing_off .off_bar .off_leftBar {
        display: block;
        float: left;
        width: 70px;
        height: 100%;
        background: #db4b47;

    }

    .amazing_off .off_bar .off_rightBar .off_mount {
        display: inline-block;
        font-size: 17pt;
        color: white;
        position: relative;
        right: 15px;
    }

    .amazing_off .off_bar .off_rightBar .off_hezar, .amazing_off .off_bar .off_rightBar .off_tuman {
        font-size: 8pt;
        color: white;
        display: inline-block;
        position: relative;
        float: left;
    }

    .amazing_off .off_bar .off_rightBar .off_hezar {
        left: 20px;
    }

    .amazing_off .off_bar .off_rightBar .off_tuman {
        top: 5px;
        left: 10px;
    }

    .amazing_off .off_bar .off_leftBar .off_word {
        display: block;
        font-size: 14pt;
        color: white;
        text-align: center;
    }
</style>

<div class="amazing_off">
        <span class="off_bar">
            <span class="off_rightBar">
                <span class="off_mount ">
                    <?= $productInfo['discount_price'] ?>
                </span>
                <!--<span class="off_hezar yekan">هزار</span>-->
                <span class="off_tuman yekan">تومان</span>
            </span>
            <span class="off_leftBar">
                <span class="off_word yekan">تخفیف</span>
            </span>
        </span>
    <div class="flipTimer">
        <div class="hours"></div>
        <div class="minutes"></div>
        <div class="seconds"></div>
    </div>
</div>

<script>
    $('.flipTimer').flipTimer({
        direction: 'down',
        date: '<?= $productInfo['special_date'] ?>',
        callback: function () {
            $('.slider2_content_right').css('opacity', 0.2);
            $('.slider2_content_left').css('opacity', 0.2);
            $('#off_finished').fadeIn(100);
        }
    });
</script>