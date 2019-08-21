<form action="showcart4/saveorder" method="post">
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

        .top_header {
            width: 1170px;

            font-family: yekan;
        }

        .top_header h4 {
            font-weight: normal;
            font-size: 14pt;
            display: inline-block;
            margin: 20px 20px 10px 0;
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
            cursor: pointer;
        }

        .top_header .btn_green {
            float: left;
            position: relative;
            top: 12px;
            left: 0;
            margin: 20px 0;
        }

        .top_header span {
            font-size: 12pt;
            color: white;
            text-align: center;
            line-height: 40px;
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
                    <li style="width: 45px" class="activeStep">
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
            #errorpart{
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
        $Status = $data['Status'];
        if($Status!='') {
            ?>

            <div id="errorpart">
                خطا!
                <?php
                $ErrorArray = unserialize(zarinpalErrors);
                $Errors = $ErrorArray[$Status];
                echo $Errors;
                ?>
            </div>

            <?php
        }
        ?>


        <style>
            .discount_gift {
                width: 100%;
                float: right;
                border: 1px solid #eeeeee;
                border-radius: 4px;
                font-family: yekan;
                margin-bottom: 40px;
            }

            .discount_gift td {
                border-right: 1px solid #eeeeee;
                height: 60px;
            }

            .discount_gift td input {
                width: 160px;
                height: 37px;
                border-radius: 4px;
                border: 1px solid #cacaca;
            }

            .discount_gift td:not(:first-child) {
                text-align: center;

            }

            .discount_gift td:first-child {
                border-right: unset !important;
            }


        </style>
        <div class="top_header">
            <h4>
                کد تخفیف
            </h4>
        </div>
        <table class="discount_gift">
            <tr>
                <td style="width: 730px;padding-right: 20px">
                    متن
                </td>
                <td>
                    <input id="code" name="code">
                </td>
                <td>
                <span onclick="checkcode();" class="btn_green"
                      style="margin: auto;color: white;line-height: 40px;text-align: center;background: #00a1aa;cursor: pointer">
                    ثبت کد تخفیف
                </span>
                </td>
            </tr>
        </table>
        <div class="top_header">
            <h4>
                کارت هدیه
            </h4>
        </div>
        <table class="discount_gift">
            <tr>
                <td style="width: 730px;padding-right: 20px">
                    متن
                </td>
                <td>
                    <input>
                </td>
                <td>
                <span  class="btn_green" style="margin: auto;color: white;line-height: 40px;text-align: center">
ثبت کارت هدیه
                </span>
                </td>
            </tr>
        </table>
        <style>
            #total_price {
                width: 100%;
                float: right;
                height: 50px;
                border: 1px solid rgba(0, 169, 215, 0.55);
                border-radius: 4px;
                background: rgba(0, 169, 215, 0.15);
                font-family: yekan;
                margin: 50px 0;
            }

            #total_price span {
                line-height: 50px;

            }
        </style>
        <div id="total_price">
        <span style="float: right;font-size: 12pt;color: #5d5d62;margin-right: 20px">
            مبلغ قابل پرداخت
        </span>
            <span style="float: left;font-size: 10pt;color: #00ae61;margin-left: 20px">
            تومان
        </span>
            <span id="final_price" style="float: left;font-size: 14pt;color: #00ae61;">

        </span>

        </div>
        <style>
            .pay_type {
                width: 100%;
                float: right;
                font-family: yekan;
            }

            .pay_type table {
                width: 100%;
                border: 1px solid #eeeeee;
                border-radius: 4px;
                margin: 10px 0;
            }

            .pay_type table p {
                margin: 3px 15px;
            }

            .pay_type table td {
                height: 120px;
                border-right: 1px solid #eeeeee;
            }

            .pay_type table td:first-child {
                padding: 15px;
            }

            .pay_type table tr td:first-child {
                width: 7%;
                border-right: unset;
            }

            .blue_btn {
                display: block;
                width: 180px;
                height: 40px;
                border-radius: 4px;
                box-shadow: 2px 2px 3px #d0d0d0;
                background: #949494;
                font-family: yekan;
                text-align: center;
                cursor: pointer;
            }

            .circleTable {
                display: block;
                width: 16px;
                height: 16px;
                border-radius: 100%;
                border: 1px solid #d7d7d7;
                margin: auto;
                cursor: pointer;

            }

            .circleTable.activeType {
                border: 1px solid #00b1bb;
                background: #00b1bb;
                position: relative;
            }

            .circleTable.activeType::after {
                content: " ";
                display: block;
                position: absolute;
                top: 5px;
                right: 5px;
                width: 6px;
                height: 6px;
                border-radius: 100%;
                background: white;
            }

            .circle_cont {
                display: inline-block;
            }

            .circle_cont input[name=pay_type] {
                display: none;
            }

        </style>
        <div class="pay_type">
            <div class="top_header">
                <h4>
                    شیوه پرداخت
                </h4>
            </div>
            <table cellspacing="0">
                <tr>
                    <td>
                        <p>
                            پرداخت اینترنتی
                        </p>
                        <div class="circle_cont">
                            <input type="checkbox" name="pay_type" value="1">
                            <span class="circleTable" style="margin: 0 5px;display: inline-block;position: relative;
top: 5px;"></span>
                        </div>
                        <span>
                        درگاه پرداخت اینترنتی زرین پال
                    </span>
                        <div class="circle_cont">
                            <input type="checkbox" name="pay_type" value="2">
                            <span class="circleTable" style="margin: 0 5px;display: inline-block;position: relative;
top: 5px;"></span>
                        </div>
                        <span>
                        درگاه پرداخت اینترنتی بانک سامان
                    </span>
                        <div class="circle_cont">
                            <input type="checkbox" name="pay_type" value="3">
                            <span class="circleTable" style="margin: 0 5px;display: inline-block;position: relative;
top: 5px;"> </span>
                        </div>
                        <span>
                        درگاه پرداخت اینترنتی بانک پارسیان
                    </span>
                    </td>
                </tr>
            </table>
        </div>
        <div class="pay_type">
            <table cellspacing="0">
                <tr>
                    <td style="height: 80px">
                        <div class="circle_cont">
                            <input type="checkbox" name="pay_type" value="4">
                            <span class="circleTable"></span>
                        </div>
                    </td>
                    <td style="height: 80px">
                        <p>
                            کارت به کارت
                        </p>
                        <span style="margin:15px">
                        متن
                    </span>
                    </td>
                </tr>
            </table>
        </div>
        <div class="pay_type">
            <table cellspacing="0">
                <tr>
                    <td style="height: 80px">
                        <div class="circle_cont">
                            <input type="checkbox" name="pay_type" value="5">
                            <span class="circleTable"></span>
                        </div>
                    </td>
                    <td style="height: 80px">
                        <p>
                            واریز به حساب
                        </p>
                        <span style="margin:15px">
                        متن
                    </span>
                    </td>
                </tr>
            </table>
        </div>
        <span onclick="submitForm()" class="btn_green" id="btn_green" style="float: left;line-height: 40px;text-align: center;color: white">
        پرداخت و تکمیل خرید
    </span>
    </div>
    <style>

        .trueCode {
            border: 1px solid #00e5ab !important;
            background: rgba(0, 229, 171, 0.22);
        }

        .falseCode {
            border: 1px solid #ff4d3a !important;
            background: rgba(255, 77, 58, 0.21);
        }
    </style>
    <script>
        function submitForm() {
            $('form').submit();
        }


        $('.circleTable').click(function () {
            var parentDiv = $(this).parents('.circle_cont');
            $('input[name=pay_type]').attr('checked', false);
            parentDiv.find('input[name=pay_type]').attr('checked', true);
        });

        $('.circleTable').click(function () {
            $('.circleTable').removeClass('activeType');
            $(this).addClass('activeType');

        });

        function calculateFinalPrice() {
            var url = 'showcart4/calculatefinalprice';
            var codeInput = $('#code');
            var code = codeInput.val();
            var data = {'code': code};
            $.post(url, data, function (msg) {
                $('#final_price').text(msg);
            });
        }

        calculateFinalPrice();

        function checkcode() {
            var codeInput = $('#code');
            var code = codeInput.val();
            var url = 'showcart4/checkcode/' + code;
            var data = {};
            $.post(url, data, function (msg) {
                if (msg[0] > 0) {
                    codeInput.addClass('trueCode').removeClass('falseCode');
                } else {
                    codeInput.addClass('falseCode').removeClass('trueCode');
                }
                $('#final_price').text(msg[1]);
            }, 'json');
        }
    </script>
</form>