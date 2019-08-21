<style>


    #main {
        width: 1170px;
        float: right;
        margin: 15px 73px;
        background: white;
        border-radius: 4px;

        box-shadow: 2px 2px 3px #bcbcbc;
        padding: 15px;
    }

    .rahgiri {
        width: 1090px;
        background: #f5f5f5;
        border-radius: 100px;
        padding: 40px;
        float: right;
        font-family: yekan;
    }

    .rahgiri .dashed {
        width: 60px;
        height: 2px;
        float: right;
    }

    .rahgiri .dashed span {
        display: block;
        float: right;
        width: 10px;
        height: 2px;
        background: #0090cd;
        margin-left: 5px;
    }

    .rahgiri .steps {
        padding: 0;
        float: right;
        height: 60px;
    }

    .rahgiri .steps li {
        float: right;
        width: 157px;
        height: 20px;
        position: relative;
        margin-right: 10px;
    }

    .rahgiri .steps .circle {
        display: block;
        float: right;
        position: absolute;
        width: 20px;
        height: 20px;
        border: 4px solid #b4b4b4;
        border-radius: 100%;
        top: -13px;
    }

    .rahgiri .steps li.activeStep .circle {
        border: 4px solid #0090cd;

    }

    .rahgiri .steps li.activeStep .line {
        background: #0090cd;
    }

    .rahgiri .steps li.activeStep .step_title {
        color: #0090cd;
    }

    .rahgiri .steps li.Done .circle {
        background: #0090cd url(public/images/slices.png) no-repeat -809px -474px;
    }

    .rahgiri .steps .line {
        display: block;
        float: right;
        position: absolute;
        width: 125px;
        height: 2px;
        background: #b4b4b4;
        right: 35px;
    }

    .rahgiri .steps .step_title {
        display: block;
        float: right;
        position: absolute;
        color: #b4b4b4;
        font-size: 10pt;
        top: 16px;
        right: -20px;
    }

    .rahgiri_detail {
        width: 100%;
        float: right;
        border: none !important;
        margin-bottom: 10px;
    }

    .rahgiri_detail tr {
        background: white !important;
        height: 90px !important;
    }

    .rahgiri_detail tr td {
        width: 33%;
    }

    .rahgiri_detail .onavane_ersal {
        color: #858585;
    }

    .rahgiri_detail .tozihate_ersal {
        color: #0090cd;
    }

    #top_header {
        width: 1170px;

        font-family: yekan;
    }

    #top_header h4 {
        font-weight: normal;
        font-size: 13pt;
        display: inline-block;
        margin-bottom: 10px;
    }

    .btn_green {
        display: block;
        width: 180px;
        height: 40px;
        border-radius: 4px;
        box-shadow: 2px 2px 3px #d0d0d0;
        background: #00cc56;
        font-family: yekan;
        text-align: center;
    }

    #top_header .btn_green {
        float: left;
        position: relative;
        top: 12px;
        left: 0;
        margin: 20px 0;
    }

    #top_header span {
        font-size: 12pt;
        color: white;
        text-align: center;
        line-height: 40px;
    }

    .item_uBuy {
        width: 100%;
        font-family: yekan;
        margin: 15px 0;
    }

    .item_uBuy table {
        width: 100%;
        border-radius: 4px;
        border: 1px solid #eeeeee;
    }

    .item_uBuy tr:first-child {
        background: #eeeeee;
        height: 50px;
        color: #949494;
        font-size: 12pt;
    }

    .item_uBuy tr td {
        text-align: center;
        border-top: 1px solid #eeeeee;
        border-left: 1px solid #eeeeee;
    }

    .item_uBuy tr td:not(:first-child) {
        width: 17%;
        text-align: center;
    }

    .item_uBuy tr td:first-child {
        width: 46%;
    }

    .item_uBuy tr td:last-child {
        border-left: none;
    }

    .item_uBuy tr td .right {
        float: right;
        padding: 15px;
    }

    .item_uBuy tr td .right img {
        width: 120px;
        height: 120px;
        vertical-align: middle;
    }

    .item_uBuy tr td .left {
        float: right;
        padding: 15px;
        font-size: 11pt;
        color: #919191;
    }

    .item_uBuy tr td .left span {
        display: block;
        margin: 3px 0;
    }

    .item_uBuy tr td .left span:first-child {
        font-size: 13pt;
        color: #575757;
    }

    .garanty_listSelector {
        width: 80px;
        height: 40px;
        background: #edf1f4;
        border: 1px solid #d1d4d7;
        border-radius: 4px;
        position: relative;
        text-align: center;
        cursor: pointer;
        margin: auto;
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
        width: 79px;
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

    .item_uBuy tr td .price {
        color: #4a4b51;
        font-size: 15pt;
    }

    .tuman {
        color: #7a7a7a;
        font-size: 10pt;
    }

    .item_uBuy tr td .remove_item {
        display: block;
        position: relative;
        width: 16px;
        height: 16px;
        background: url(public/images/refresh-arrow.png) no-repeat;
        right: 8px;
    }
</style>

<div id="main">
    <div class="rahgiri">
        <div style="position: relative;right: 240px;top: 25px;width:70%;float: right;">
            <div class="dashed">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul class="steps">
                <li class="activeStep Done">
                    <span class="circle"></span>
                    <span class="line"></span>
                    <span class="step_title">
ورود به دیجی کالا
                    </span>
                </li>
                <li class="activeStep Done">
                    <span class="circle"></span>
                    <span class="line"></span>
                    <span class="step_title">
اطلاعات ارسال سفارش
                    </span>
                </li>
                <li class="activeStep">
                    <span class="circle"></span>
                    <span class="line"></span>
                    <span class="step_title">
بازبینی سفارش
                    </span>
                </li>
                <li style="width: 45px">
                    <span class="circle"></span>
                    <span class="step_title" style="width: 90px">
اطلاعات پرداخت
                    </span>
                </li>
            </ul>
            <div class="dashed">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

    <div id="top_header">
        <a href="showcart4" class="btn_green" style="color: white;line-height: 40px">
ثبت اطلاعات و ادامه خرید
        </a>
    </div>
    <div class="item_uBuy">
        <table cellspacing="0">
            <tr>
                <td>
                    شرح محصول
                </td>
                <td>
                    تعداد
                </td>
                <td>
                    قیمت واحد
                </td>
                <td>
                    قیمت کل
                </td>
                <td>

                </td>
            </tr>
            <?php
            $basketInfo = $data['basketInfo'];
            $basket = $basketInfo[0];
            foreach ($basket as $row) {
                ?>
                <tr>
                    <td>
                        <div class="right">
                            <img src="public/images/products/<?= $row['id'] ?>/product_220.jpg"/>
                        </div>
                        <div class="left">
                        <span>
<?= $row['title']; ?>
                        </span>
                            <span>
                                رنگ :
                                <?= $row['colorTitle']; ?>
                        </span>
                            <span>
                        گارانتی :
                                <?= $row['garantyTitle']; ?>
                    </span>
                        </div>
                    </td>
                    <td>

                    <span class=" yekan">
                        <?= $row['tedad']; ?>
                    </span>

                    </td>
                    <td>
                        <span class="price">
                            <?= $row['price']; ?>
                        </span>
                        <span class="tuman">تومان</span>
                    </td>
                    <td>
                        <span class="price"><?= $row['price'] * $row['tedad'] ?></span>
                        <span class="tuman">تومان</span>
                        <br>
                        <span style="color: #ea4938"><?= $row['discountTotal'] ?></span>
                        <span style="color: #ea4938" class="tuman">تومان</span>
                    </td>
                    <td style="background: rgba(0,155,255,0.16)">
                        <a href="showcart">
                            <span class="remove_item"></span>
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>

    </div>

    <style>
        #total_price {
            float: right;
            width: 100%;
            height: 243px;
            border: 1px solid #eeeeee;
            border-radius: 4px;
            margin: 15px 0;
            font-family: yekan;
        }

        #total_shop, #send_price, #total_payment, #total_discount {
            width: 100%;
            height: 60px;
            border-bottom: 1px solid #eeeeee;
        }

        #total_shop, #send_price {
            color: #5d5d62;
        }

        #total_shop .tuman, #send_price .tuman, #total_payment .tuman, #total_discount .tuman {
            float: left;
            line-height: 60px;
            margin: 0 10px 0 20px;
        }

        #total_shop .title, #send_price .title, #total_payment .title, #total_discount .title {

            line-height: 60px;
            margin: 0 20px;
        }

        #total_payment {
            border-bottom: unset !important;
            color: rgba(0, 174, 97, 0.82);
            background: rgba(0, 174, 97, 0.2);
        }

        #total_payment .tuman {
            color: rgba(0, 174, 97, 0.82);

        }

        #total_discount {
            color: #ff6d5a !important;
            background: rgba(255, 109, 90, 0.19);
        }

        #total_discount .tuman {
            color: #ff6d5a !important;

        }

        .tot_price {
            float: left;
            line-height: 60px;
        }

        .top_header2 {
            width: 1170px;

            font-family: yekan;
        }

        .top_header2 h4 {
            font-weight: normal;
            font-size: 13pt;
            display: inline-block;
            margin-bottom: 10px;
        }

    </style>
    <div class="top_header2">
        <h4>
            خلاصه صورتحساب شما
        </h4>
    </div>
    <div style="width: 100%;float: right">
        <div id="total_price">
            <div id="total_shop">
                <span class="title">
                جمع کل خرید شما:
                </span>
                <span class="tuman">
                تومان
                </span>
                <span class="tot_price">
                <?= $basketInfo[1]; ?>
                </span>
            </div>
            <div id="send_price">
                <span class="title">
هزینه ارسال، بسته بندی و بیمه:
                </span>
                <span class="tuman">
                تومان
                </span>
                <span class="tot_price">
                <?= $data['postPrice']; ?>
                </span>
            </div>
            <div id="total_discount">
                <span class="title">
جمع کل تخفیف:
                </span>
                <span class="tuman">
                تومان
                </span>
                <span class="tot_price">
               <?= $basketInfo[2]; ?>
                </span>
            </div>
            <div id="total_payment">
                <span class="title" style="font-size:15pt; ">
مبلغ قابل پرداخت:
                </span>
                <span class="tuman">
                تومان
                </span>
                <span class="tot_price">
                    <?php
                    $payPrice = $basketInfo[1] + $data['postPrice'] - $basketInfo[2];
                    echo $payPrice;
                    ?>
                </span>
            </div>
        </div>
    </div>
    <style>

        #send_info {
            width: 100%;
            float: right;
            border: 1px solid #eeeeee;
            border-radius: 4px;
        }

        #send_info td {
            height: 65px;
            border-left: 1px solid #eeeeee;
            border-bottom: 1px solid #eeeeee;
        }

        #send_info td:last-child {
            border-left: unset !important;;
        }

        #send_info td:first-child {
            width: 65px;
        }

        #send_info tr:last-child td {
            border-bottom: unset !important;;
        }

        #send_info img {
            display: block;
            width: 32px;
            height: 32px;
            margin-right: 15px;
        }


    </style>
    <?php
    $addressInfo = $data['addressInfo'];
    ?>
    <div class="top_header2">
        <h4>
            اطلاعات ارسال سفارش
        </h4>
    </div>
    <table id="send_info">
        <tr>
            <td>
                <img src="public/images/delivery-truck.png">
            </td>
            <td class="yekan" style="color: #4a4b51">
این سفارش به
                <?= $addressInfo['family'] ?>
                به آدرس
                <?= $addressInfo['address'] ?>
                و شماره تماس
                <?= $addressInfo['mobile'] ?>
                تحویل داده می شود.
            </td>
        </tr>
        <tr>
            <td>
                <img src="public/images/maps-and-flags.png">
            </td>
            <td class="yekan" style="color: #4a4b51">
                این سفارش از طریق پست
                <?php
                $postTypeId = $data['postTypeId'];
                if($postTypeId==1){
                    echo 'پیشتاز';
                }elseif ($postTypeId==2){
                    echo 'سفارشی';
                }
                ?>
                با هزینه
                <?= $data['postPrice'] ?>
                تومان به شما تحویل داده خواهد شد.

            </td>
        </tr>
    </table>
    <a href="showcart4" class="btn_green" style="float: left;margin: 20px 0;color: white;line-height: 40px;text-align: center;">
        ثبت اطلاعات و ادامه خرید
    </a>
</div>
<script>

    $('.garanty_listSelector').click(function () {
        $('ul', this).slideToggle(200);
    });
    $('.garanty_listSelector ul li').click(function () {
        var txt = $(this).text();
        $('.garanty_listSelector .garanty_title').text(txt);
    });
</script>
