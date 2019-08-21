<?php
$orderInfo = $data['orderInfo'];
//print_r($orderInfo);
$basket = unserialize($orderInfo['basket']);

$pay = $orderInfo['pay'];
$time_sabt = $orderInfo['time_sabt'];
$pasttime=time()-$time_sabt;
$mohlat = payMohlat*3600;
?>
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



    .btn_green {
        display: inline-block;
        width: 126px;
        height: 40px;
        border-radius: 4px;
        box-shadow: 2px 2px 3px #d0d0d0;
        background: #00977f;
        font-family: yekan;
        text-align: center;
        cursor: pointer;
        line-height: 40px;
        color: white;
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
                <li class="activeStep Done">
                    <span class="circle"></span>
                    <span class="line"></span>
                    <span class="step_title">
بازبینی سفارش
                    </span>
                </li>
                <li style="width: 45px" class="activeStep Done">
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

    <style>
        .errorpart{
            width: 100%;
            height: 50px;
            border: 1px solid #ff4d3a;
            border-radius: 4px;
            font-family: yekan;
            color: #ff4d3a;
            float: right;
            text-align: center;
            line-height: 50px;
            margin-top: 15px;
        }
    </style>
    <?php

    if($pasttime>$pasttime) {
        ?>

        <div class="errorpart">
            این سفارش منقضی شده است
            (مهلت پرداخت
            <?= payMohlat ?>
            ساعت می باشد.)
        </div>

        <?php
    }
    ?>

    <style>
        #product, #targetInfo {
            width: 100%;
            float: right;
            font-family: yekan;
            color: #4a4b51;
            border: 1px solid #d5d5d5;
            margin: 20px auto;
            border-radius: 4px;
        }

        table td {
            background: rgba(0, 229, 171, 0.35);
            text-align: center;
        }

        table tr:first-child td {
            background: #eeeeee !important;
        }

        table tr:not(:last-child) td {
            border-bottom: 1px solid #d5d5d5;
        }

        table td:not(:last-child) {
            border-left: 1px solid #d5d5d5;
        }
    </style>

    <?php


    ?>

    <table id="product" cellspacing="0">
        <tr>
            <td>
                عنوان محصول
            </td>
            <td>
                تعداد
            </td>
            <td>
                رنگ
            </td>
            <td>
                گارانتی
            </td>
            <td>
                قیمت
            </td>
            <td>
                تخفیف
            </td>
        </tr>


        <?php
        foreach ($basket as $row) {
            ?>

            <tr>

                <td>
                    <?= $row['title']; ?>
                </td>
                <td>
                    <?= $row['tedad']; ?>
                </td>
                <td>
                    <?= $row['colorTitle']; ?>
                </td>
                <td>
                    <?= $row['garantyTitle']; ?>
                </td>
                <td>
                    <?= $row['price'] * $row['tedad'] ?>
                </td>
                <td>
                    <?= (($row['discount'] * $row['price']) / 100) * $row['tedad'] ?>
                </td>

            </tr>

            <?php
        }
        ?>
    </table>
    <style>
        #info {
            float: right;
            width: 100%;
            border-radius: 5px;
            background: rgba(108, 229, 178, 0.35);
        }

        #info p {
            font-family: yekan;
            font-size: 10pt;
            color: #4a4b51;
            padding-right: 20px;
        }
    </style>
    <div id="info">
        <p>
            وضعیت پرداخت:
            <?php
            if ($orderInfo['pay'] == 1) {
                echo 'پرداخت شده.';
            } else {
                echo 'در انتظار پرداخت.';
            }
            ?>
        </p>
        <p>
            نوع ارسال:
            <?php
            if ($orderInfo['post_type'] == 1) {
                echo 'پیشتاز';
            } else if ($orderInfo['post_type'] == 2) {
                echo 'سفارشی';
            }
            ?>
        </p>
        <p>
            شماره تراکنش :
            <?php
            echo $orderInfo['beforepay'];
            ?>
        </p>
        <?php

        if($pay==0 and ($pasttime<=$mohlat)) {
            ?>
            <p>
                <a href="checkout/payonline/<?= $orderInfo['id']; ?>" class="btn_green">
                    پرداخت آنلاین
                </a>
                <a href="checkout/creditcard/<?= $orderInfo['id']; ?>" class="btn_green">
                    پرداخت با کارت
                </a>
            </p>
            <?php
        }
        ?>
    </div>

    <table id="targetInfo" cellspacing="0">

        <tr>
            <td>
                نام تحویل گیرنده
            </td>
            <td>
                شهر
            </td>
            <td>
                آدرس
            </td>
            <td>
                کد پستی
            </td>
            <td>
                شماره موبایل
            </td>
            <td>
                شماره تماس ثابت
            </td>
        </tr>
        <tr>
            <td>
                <?= $orderInfo['family'] ?>
            </td>
            <td>
                <?= $orderInfo['city'] ?>
            </td>
            <td>
                <?= $orderInfo['address'] ?>
            </td>
            <td>
                <?= $orderInfo['code_posti'] ?>
            </td>
            <td>
                <?= $orderInfo['mobile'] ?>
            </td>
            <td>
                <?= $orderInfo['tel'] ?>
            </td>
        </tr>

    </table>


</div>
