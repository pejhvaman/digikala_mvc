<style>
    #introduction .my_sefaresh {
        font-size: 11pt;
        float: right;
        width: 100%;
    }
    #addcode{
        width: 100%;
        float: right;
    }
    #addcode p{
        font-family: yekan;
        font-size: 12pt;
        color: #4a4b51;
        margin: 4px 0 20px 10px;
        float: right;
    }
    #addcode input{
        border: 1px solid #cccccc;
        border-radius: 4px;
        width: 250px;
        padding-right: 8px;
        font-family: yekan;
    }
    .add_btn{
        display:inline-block;
        width: 100px;
        height: 36px;
        border-radius: 4px;
        color: white;
        line-height: 36px;
        text-align: center;
        background: #00a1aa;
        margin-right: 10px;
        cursor: pointer;
    }
</style>

<section class="my_sefaresh" style="<?php if($activeTab=='digibon'){echo 'display: block';} ?>">
    <div id="addcode" >
        <p>
            افزودن دیجی بن :
        </p>
        <input name="code" class="code">
        <span onclick="addCode();" class="add_btn">
        ثبت اطلاعات
         </span>
    </div>
    <table class="order_table" cellspacing="0">
        <tr>
            <td>
                ردیف
            </td>
            <td>
                کد
            </td>
            <td>
                شرح
            </td>
            <td>
                تاریخ ثبت
            </td>
            <td>
                تاریخ انقضا
            </td>
            <td>
                اعتبار اولیه
            </td>
            <td>
                اعتبار مصرفی
            </td>
            <td>
                مانده
            </td>
            <td>
                وضعیت
            </td>
            <td>
                جزئیات
            </td>
        </tr>
        <?php
        $codes = $data['codes'];
        $i = 1;
        foreach ($codes as $code) {
            ?>

            <tr>
                <td>
                    <?= $i; ?>
                </td>
                <td>
                    <?= $code['code'] ?>
                </td>
                <td>
                    بن تخفیف سفارش شما
                </td>
                <td>
                    <?= $code['tarikh_sabt'] ?>
                </td>
                <td>
                    <?= $code['tarikh_end'] ?>
                </td>
                <td>
                    <?= $code['max'] ?>
                </td>
                <td>
                    <?= $code['used'] ?>
                </td>
                <td>
                    <?= $code['max'] - $code['used'] ?>
                </td>
                <td>
                    <?= $code['status'] ?>
                </td>
                <td>
                    <i onclick="showDetail(this)" class="detail_icon"></i>
                </td>
            </tr>
            <tr class="more_detail_sefaresh">
                <td colspan="10" style="border: 6px inset #a9a9a9">
                    <div class="detail_content">
                        <table cellspacing="0">
                            <tr>
                                <td>
                                    سفارش
                                </td>
                                <td>
                                    نوع
                                </td>
                                <td>
                                    تاریخ
                                </td>
                            </tr>
                            <?php
                            $orders = $code['orders'];
                            foreach ($orders as $order) {
                                ?>
                                <tr>
                                    <td>
                                        <?= $order['beforepay'] ?>
                                    </td>
                                    <td>
                                        خرید
                                    </td>
                                    <td>
                                        <?= $order['pay_year'].'/'.$order['pay_month'].'/'.$order['pay_day'] ?>
                                    </td>

                                </tr>
                                <?php
                            }
                            ?>
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

    function addCode() {
        var code = $('.code').val();
        var url = 'panel/addcode';
        var data = {'code':code};
        $.post(url, data, function (msg) {
            window.location='panel/index/digibon';
        });
    }

    function showDetail(tag) {
        var iTag = $(tag);
        iTag.toggleClass('activeDetail');
        var parentTag = iTag.parents('tr');
        parentTag.next().fadeToggle(400);
    }
</script>