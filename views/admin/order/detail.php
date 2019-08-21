<?php
$orderInfo = $data['orderInfo'];
//print_r($orderInfo);
$basket = unserialize($orderInfo['basket']);

$pay = $orderInfo['pay'];
$time_sabt = $orderInfo['time_sabt'];
$pasttime = time() - $time_sabt;
$mohlat = payMohlat * 3600;
?>
<style>
    #main {
        width: 1200px;
        margin: 15px auto;
        background: white;
        border-radius: 4px;

        box-shadow: 2px 2px 3px #bcbcbc;
        padding: 15px;
    }
    #main::after{
        content: '';
        clear: both;
        display: block;
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


    <?php
    require('views/admin/layout.php');
    ?>
    <div class="left">
        <form method="post" action="adminorder/editorder/<?= $orderInfo['id'] ?>">

            <a href="adminorder/factor/<?= $orderInfo['id'] ?>" class="btn_green" style="float: left">
                مشاهده فاکتور
            </a>

            <style>
                .errorpart {
                    width: 100%;
                    height: 50px;
                    border: 2px solid #ff4d3a;
                    border-radius: 8px;
                    font-family: yekan;
                    color: #ff4d3a;
                    float: right;
                    text-align: center;
                    line-height: 50px;
                    margin-top: 15px;
                }
            </style>
            <?php

            if ($pasttime > $mohlat) {
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

                #main h4 {
                    font-size: 13pt;
                    font-weight: normal;
                    float: right;
                    font-family: yekan;
                }

            </style>

            <h4>
                جزئیات سفارش با آی دی
                <?= $orderInfo['id']; ?>
            </h4>

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
                }

                #info p {
                    font-family: yekan;
                    font-size: 10pt;
                    color: #4a4b51;
                    padding-right: 20px;
                }

                #targetInfo input[type=text] {
                    font-family: yekan;
                    border: 1px solid #cccccc;
                    border-radius: 4px;
                }
            </style>
            <div id="info">
                <p>
                    وضعیت پرداخت:
                    <select name="pay_status">
                        <option <?php if ($orderInfo['pay'] == 1) {
                            echo 'selected="selected"';
                        } ?> value="1">
                            پرداخت شده
                        </option>
                        <option <?php if ($orderInfo['pay'] != 1) {
                            echo 'selected="selected"';
                        } ?> value="0">
                            در انتظار پرداخت
                        </option>
                    </select>

                </p>
                <p>
                    وضعیت سفارش:
                    <select name="order_status">
                        <?php
                        $orderstatus = $data['orderstatus'];
                        foreach ($orderstatus as $row) {
                            ?>
                            <option <?php if ($orderInfo['status'] == $row['id']) {
                                echo 'selected="selected"';
                            } ?> value="<?= $row['id'] ?>">
                                <?= $row['title'] ?>
                            </option>


                            <?php
                        }
                        ?>
                    </select>

                </p>
                <p>
                    نوع ارسال:
                    <?php
                    echo $orderInfo['postTypeTitle'];
                    ?>
                </p>
                <p>
                    شیوه پرداخت :
                    <?= $orderInfo['payTypeTitle'] ?>
                    (
                    <?php
                    $date = $orderInfo['pay_year'] . '/' . $orderInfo['pay_month'] . '/' . $orderInfo['pay_day'];
                    $time = $orderInfo['pay_hour'] . ':' . $orderInfo['pay_minute'];
                    echo $date . '-' . $time;
                    ?>
                    )
                </p>
                <p>
                    شماره کارت :
                    <?= $orderInfo['pay_card'] . '-' . $orderInfo['pay_bank'] ?>
                </p>
                <p>
                    شماره تراکنش :
                    <?php
                    echo $orderInfo['beforepay'];
                    ?>
                </p>
                <?php

                if ($pay == 0 and ($pasttime <= $mohlat)) {
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

                        <input type="text" name="address" value="<?= $orderInfo['address'] ?>">
                    </td>
                    <td>
                        <input type="text" name="code_posti" value="<?= $orderInfo['code_posti'] ?>">
                    </td>
                    <td>
                        <input type="text" name="mobile" value="<?= $orderInfo['mobile'] ?>">
                    </td>
                    <td>
                        <?= $orderInfo['tel'] ?>
                    </td>
                </tr>

            </table>

            <span onclick="submitForm();" class="btn_green" style="float: left">
            ثبت اطلاعات جدید
        </span>

        </form>
    </div>
</div>
<script>
    function submitForm() {
        $('form').submit();
    }
</script>