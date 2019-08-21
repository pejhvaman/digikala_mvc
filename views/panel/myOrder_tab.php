<style>
    #introduction .my_sefaresh {
        font-size: 11pt;
        float: right;
        width: 100%;
    }

    .rahgiri {
        width: 1044px;
        background: #f5f5f5;
        border-radius: 0 0 4px 4px;
        padding: 40px;
        float: right;
        margin: 0 0 15px 0;
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
        width: 115px;
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

    .rahgiri .steps li.Done .circle {
        border: 4px solid #0090cd;
        background: #0090cd url(public/images/slices.png) no-repeat -809px -474px;
    }

    .rahgiri .steps .line {
        display: block;
        float: right;
        position: absolute;
        width: 80px;
        height: 2px;
        background: #b4b4b4;
        right: 35px;
    }

    .rahgiri .steps li.Done .line {
        background: #0090cd;
    }

    .rahgiri .steps .step_title {
        display: block;
        float: right;
        position: absolute;
        color: #b4b4b4;
        font-size: 10pt;
        top: 16px;
        right: -13px;
    }

    .rahgiri .steps li.Done .step_title {
        color: #0090cd;
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

</style>
<section class="my_sefaresh">
    <table class="order_table" cellspacing="0">
        <tr>
            <td>
                ردیف
            </td>
            <td>
                کد
            </td>
            <td>
                تاریخ
            </td>
            <td>
                مبلغ کد
            </td>
            <td>
                وضعیت
            </td>
            <td>
                عملیات پرداخت
            </td>
            <td>
                نوع
            </td>
            <td>
                جزئیات
            </td>
        </tr>

        <?php
        $order = $data['order'];
        $i = 1;
        foreach ($order as $row) {
            $staus = $row['status'];
            ?>

            <tr>
                <td>
                    <?= $i ?>
                </td>
                <td>
                    <?= $row['id'] ?>
                </td>
                <td>
                    <?= $row['date'] ?>
                </td>
                <td style="font-family: Tahoma">
                    <?= number_format($row['amount']) ?>
                </td>
                <td>
                    <?= $row['title'] ?>
                </td>
                <td>
                    پرداخت
                </td>
                <td>
                    سفارش
                </td>
                <td>
                    <i onclick="showDetail(this)" class="detail_icon"></i>
                </td>
            </tr>
            <tr class="more_detail_sefaresh">
                <td colspan="8" style="border: 6px inset #a9a9a9">
                    <div class="detail_content">
                        <table cellspacing="0">
                            <tr>
                                <td>
                                    کالا
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
                                    تخفیف کل
                                </td>
                                <td>
                                    مبلغ کل
                                </td>
                            </tr>
                            <?php

                            $basket = unserialize($row['basket']);
                            foreach ($basket as $row2) {
                                    $price=$row2['price'];
                                    $tedad=$row2['tedad'];
                                    $discount=$row2['discount'];
                                    $priceAll=$price*$tedad;
                                    $discountAll=$discount*$priceAll/100; //just discount on the product NOT other discount...
                                ?>
                                <tr>
                                    <td>
                                        <?= $row2['title'] ?>
                                    </td>
                                    <td>
                                        <?= $tedad ?>
                                    </td>
                                    <td>
                                        <?= $price ?>
                                    </td>
                                    <td>
                                        <?= $priceAll ?>
                                    </td>
                                    <td>
                                        <?= $discountAll ?>
                                    </td>
                                    <td>
                                        <?= $priceAll-$discountAll ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>

                        <h4>
                            رهگیری سفارش
                        </h4>
                        <div class="rahgiri">
                            <div style="position: relative;right: 170px;top: 25px;width:70%;float: right;">
                                <div class="dashed">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <ul class="steps">
                                    <li class="<?php if($staus>=2){echo 'Done';} ?>">
                                        <span class="circle"></span>
                                        <span class="line"></span>
                                        <span class="step_title">
                                                تایید سفارش
                                            </span>
                                    </li>
                                    <li class="<?php if($staus>=4){echo 'Done';} ?>">
                                        <span class="circle"></span>
                                        <span class="line"></span>
                                        <span class="step_title">
پرداخت
                                            </span>
                                    </li>
                                    <li class="<?php if($staus>=6){echo 'Done';} ?>">
                                        <span class="circle"></span>
                                        <span class="line"></span>
                                        <span class="step_title">
پردازش انبار
                                            </span>
                                    </li>
                                    <li class="<?php if($staus>=7){echo 'Done';} ?>">
                                        <span class="circle"></span>
                                        <span class="line"></span>
                                        <span class="step_title">
آماده ارسال
                                            </span>
                                    </li>
                                    <li class="<?php if($staus>=9){echo 'Done';} ?>" style="width: 40px">
                                        <span class="circle"></span>
                                        <span class="step_title">
تحویل شده
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


                        <table class="rahgiri_detail" cellspacing="0">
                            <tr>
                                <td>
                                            <span class="onavane_ersal">
                                                روش ارسال :
                                            </span>
                                    <span class="tozihate_ersal">
                                        <?php
                                        if($row['post_type']==1){
                                            echo 'پیشتاز';
                                        }elseif ($row['post_type']==2){
                                            echo 'سفارشی';
                                        }
                                        ?>
                                    </span>
                                </td>
                                <td>
                                            <span class="onavane_ersal">
زمان ارسال :
                                            </span>
                                    <span class="tozihate_ersal">
-
                                    </span>
                                </td>
                                <td>
                                             <span class="onavane_ersal">
کد مرسوله :
                                             </span>
                                    <span class="tozihate_ersal">
                                        <?= $row['barcode'] ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                             <span class="onavane_ersal">
آدرس تحویل :
                                             </span>
                                    <span class="tozihate_ersal">
<?= $row['address'] ?>
                                    </span>
                                </td>
                                <td>
                                            <span class="onavane_ersal">
تحویل گیرنده :                                              </span>
                                    <span class="tozihate_ersal">
<?= $row['family'] ?>
                                    </span>
                                </td>
                                <td>
                                            <span class="onavane_ersal">
                                                شماره تماس :
                                           </span>
                                    <span class="tozihate_ersal">
<?= $row['mobile'] ?>
                                    </span>
                                </td>
                            </tr>
                        </table>

                    </div>
                </td>
            </tr>

            <?php
            $i++;
        }
        ?>

    </table>
</section>
<script>
    function showDetail(tag) {
        var iTag = $(tag);
        iTag.toggleClass('activeDetail');
        var parentTag = iTag.parents('tr');
        parentTag.next().fadeToggle(400);
    }
</script>