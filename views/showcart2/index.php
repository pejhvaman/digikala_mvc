<style>
    #search_top {
        height: 38px !important; /* be khatere bbotstrap...*/
    }

    #main {
        width: 1200px;
        float: right;
        margin: 15px 73px;
        background: white;
        border-radius: 4px;
        box-shadow: 2px 2px 3px #bcbcbc;
        overflow: hidden;
    }

    .rahgiri {
        width: 1200px;
        background: #f5f5f5;
        border-radius: 0 0 4px 4px;
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
        width: 24px !important;
        height: 24px !important;
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
        background: #0090cd url(public/images/slices.png) no-repeat -810px -475px;
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
        width: 100%;
        float: right;
        font-family: yekan;
        padding: 20px 20px 0 20px;
    }

    .top_header h4 {
        font-weight: normal;
        font-size: 13pt;
        display: inline-block;
        margin-bottom: 10px;
        color: #5d5d62;
    }

    .gray_btn {
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

    .top_header .gray_btn {
        float: left;
        position: relative;
        top: 0;
        left: 15px;
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
                <li class="activeStep">
                    <span class="circle"></span>
                    <span class="line"></span>
                    <span class="step_title">
اطلاعات ارسال سفارش
                    </span>
                </li>
                <li>
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

    <div id="content">
        <div class="top_header">
            <h4>
                انتخاب آدرس
            </h4>
            <span onclick="showWindow();" class="gray_btn">
افزودن آدرس جدید
            </span>
        </div>
    </div>
    <script>

        function showWindow() {
            editAddressId = '';
            $('#add_address').fadeIn(200);
            $('#darkpage').fadeIn(200);
            $('#addaddress').trigger('reset');
            $('.selectpicker').selectpicker('refresh');
        }
    </script>
    <style>
        #addresses {
            width: 100%;
            float: right;
            padding: 0 20px 20px 20px;
            font-family: yekan;
        }

        #addresses > table {
            width: 100%;
            border: 1px solid #eeeeee;
            border-radius: 4px;
            margin: 10px 0;
        }

        #addresses > table > tbody > tr > td {
            border-top: 1px solid #eeeeee;
            border-right: 1px solid #eeeeee;
            height: 40px;
            padding-right: 10px;
        }

        #addresses > table > tbody > tr:first-child > td {
            border-top: none;
        }

        #addresses > table > tbody > tr:first-child > td:first-child {
            border-right: none;
            width: 60px;
            padding-right: unset;
        }

        #addresses > table > tbody > tr:first-child > td:last-child {
            padding-right: unset;
        }

        .circleTable {
            display: block;
            width: 16px;
            height: 16px;
            border-radius: 100%;
            border: 1px solid #d7d7d7;
            margin: auto;
        }

        #addresses > table > tbody > tr > td .costumerName {
            color: #5d5d62;
            font-size: 13.5pt;
        }

        #addresses > table > tbody > tr > td .titleTable {
            color: #5d5d62;
            font-size: 10.5pt;
        }

        #addresses > table > tbody > tr > td .ostanName, #addresses > table > tbody > tr > td .cityName, #addresses > table > tbody > tr > td .adres, #addresses > table > tbody > tr > td .postCode, #addresses > table > tbody > tr > td .postCode, #addresses > table > tbody > tr > td .emergencyCall, #addresses > table > tbody > tr > td .fixCall {
            color: #5d5d62;
            font-size: 10.5pt;
            margin-right: 10px;
        }

        table.activeAddress .circleTable {
            border: none;
            background: #00b1bb;
            position: relative;
        }

        table.activeAddress .circleTable::after {
            content: " ";
            display: block;
            position: absolute;
            top: 5px;
            right: 5px;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: white;
        }

        table.activeAddress tr:first-child td:first-child {
            background: rgba(0, 138, 77, 0.07);
        }

        table.activeAddress tr td .triangle {
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 0 37px 37px 0;
            border-color: transparent #32ad99 transparent transparent;
            position: absolute;
            top: -1px;
            right: -1px;
        }

    </style>
    <div id="addresses">
        <?php
        $address = $data['address'];
        $first = 1;
        foreach ($address as $row) {
            ?>
            <table data-id="<?= $row['id'] ?>" data-city="<?= $row['city']; ?>" cellspacing="0"
                   class="table_address <?php if ($first == 1) {
                       echo 'activeAddress';
                   } ?>">
                <tr>
                    <td class="selectTd" rowspan="3" style="position: relative">
                        <span class="circleTable"></span>
                        <span class="triangle"></span>
                    </td>
                    <td colspan="3">
                    <span class="costumerName">
<?= $row['family']; ?>
                    </span>
                    </td>
                    <td rowspan="3" style="width: 40px">
                        <table cellspacing="0" cellpadding="0"
                               style="width: 100%;height: 128px;border: none !important;margin: 0 !important;">
                            <tr>
                                <td style="background: rgba(0,169,215,0.22);border-radius: 4px 0 0 0; ">
                                    <i onclick="editAddress(<?= $row['id'] ?>);"
                                       style="cursor: pointer;display: block;width: 16px;height: 16px;background: url(public/images/edit.png) no-repeat;margin: auto">

                                    </i>
                                </td>
                            </tr>
                            <tr>
                                <td style="background: rgba(215,0,111,0.22);border-radius: 0 0 0 4px; padding: 0 !important;border: none">
                                    <i onclick="deleteaddress(<?= $row['id'] ?>)" style="cursor: pointer;display: block;width: 16px;height: 16px;background: url(public/images/cancel1.png) no-repeat;margin: auto">

                                    </i>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="width: 250px">
                    <span class="titleTable">
                        استان :
                    </span>
                        <span class="ostanName">
<?= $row['state_name']; ?>
                        </span>

                    </td>
                    <td rowspan="2">
                    <span class="titleTable">
                        آدرس :
                    </span>
                        <span class="adres">
<?= $row['address']; ?>
                        </span>
                        <br>
                        <span class="titleTable">
                        کدپستی :
                    </span>
                        <span class="postCode">
<?= $row['postcode']; ?>
                        </span>
                    </td>
                    <td style="width: 250px">
                    <span class="titleTable">
                        شماره تماس اضطراری :
                    </span>
                        <span class="emergencyCall">
<?= $row['mobile']; ?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td style="width: 250px">
                    <span class="titleTable">
                        شهر :
                    </span>
                        <span class="cityName">
<?= $row['city_name']; ?>
                        </span>
                    </td>
                    <td style="width: 250px">
                    <span class="titleTable">
                        شماره تماس ثابت :
                    </span>
                        <span class="fixCall">
<?= $row['phone']; ?>
                        </span>
                    </td>
                </tr>
            </table>
            <?php
            $first = 0;
        } ?>
    </div>


    <style>
        #send_type {
            width: 100%;
            float: right;
            padding: 20px;
            font-family: yekan;
        }

        #send_type table {
            width: 100%;
            border: 1px solid #eeeeee;
            border-radius: 4px;
            margin: 10px 0;
        }

        #send_type table tr td {
            height: 90px;
            border-left: 1px solid #eeeeee;
            padding-right: 10px;
        }

        #send_type table tr td i {
            display: block;
            width: 64px;
            height: 64px;
            float: right;
            background: url(public/images/trucking.png) no-repeat;
        }

        #send_type table tr td p {
            font-family: yekan;
            font-size: 12pt;
            color: #5d5d62;
            margin: 10px 80px 0 0;
        }

        #send_type table tr td:last-child {
            padding-right: unset;
        }

        #send_type table tr td:first-child {
            padding-right: unset;
        }

        #send_type table tr td:first-child {
            width: 7%;
        }

        #send_type table tr td:last-child {
            width: 13%;
            border: none;
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

    </style>
    <div id="send_type">
        <div class="top_header">
            <h4>
                شیوه ی ارسال
            </h4>
        </div>
        <?php
        $postType = $data['postType'];
        foreach ($postType as $row) {
            ?>
            <table data-post-type="<?= $row['id'] ?>" class="table_post" cellspacing="0">
                <tr>
                    <td class="selectPostType">
                        <span class="circleTable"></span>
                    </td>
                    <td>
                        <i></i>
                        <p>
                            <?= $row['title'] ?>
                            (هزینه ارسال:طبق تعرفه پست)
                        </p>
                        <p>
                            <?= $row['description'] ?>
                        </p>
                    </td>
                    <td>
                    <span style="display: block;font-size: 10pt;text-align: center;color: #5d5d62;line-height: 10px;height: 25px;">
                        هزینه ارسال
                    </span>
                        <span style="display: block;font-size: 14pt;text-align: center;color: rgba(0,138,77,0.79);line-height: 20px;height: 25px;">
                       <span id="post_price<?= $row['id']; ?>"></span>
                        تومان
                    </span>
                    </td>
                </tr>
            </table>
            <?php
        }
        ?>
    </div>
    <div style="float: right;width: 100%;padding: 20px">
    <span class="blue_btn" style="float: left;text-align: center;line-height: 40px;background: #00a1aa">
        <a href="showcart3" style="color: white;">
        ثبت اطلاعات و ادامه خرید
            </a>
    </span>
    </div>
</div>


<?php
require('addaddress.php');
?>


<script>

    function deleteaddress(id) {
        url = 'showcart2/deleteaddress/'+id;
        data = {};
        $.post(url , data , function (msg) {
            window.location='showcart2';
        });
    }


    function getPostPrice() {
        var url = 'showcart2/getpostprice';
        var tableActive = $('.table_address.activeAddress');
        var cityId = tableActive.attr('data-city');
        var addressId = tableActive.attr('data-id');
        var data = {'cityId': cityId, 'addressId': addressId};
        $.post(url, data, function (msg) {
            console.log(data);
            var pishtaz = msg['pishtaz'];
            var sefareshi = msg['sefareshi'];
            $('#post_price1').text(pishtaz);
            $('#post_price2').text(sefareshi);
        }, 'json');
    }

    getPostPrice();   //baraye inke dar aval ke vared safhe mishavim ejra shavad yek bar

    function sessionPostType() {
        var postTypeId = $('.table_post.activeAddress').attr('data-post-type');
        var url = 'showcart2/sessionposttype';
        var data = {'posttypeId':postTypeId};
        $.post(url,data,function (msg) {

        });
    }

    $('.selectTd').click(function () {
        $('.table_address').removeClass('activeAddress');
        $(this).parents('table').addClass('activeAddress');
        getPostPrice();
    });
    $('.selectPostType').click(function () {
        $('.table_post').removeClass('activeAddress');
        $(this).parents('table').addClass('activeAddress');
        sessionPostType();
    });


    var editAddressId = '';

    function editAddress(addressUserId) {
        editAddressId = addressUserId;
        var url = 'showcart2/editaddress/' + addressUserId;
        var data = {};
        $.post(url, data, function (msg) {
            $('input[name=family]').val(msg['family']);
            $('input[name=mobile]').val(msg['mobile']);
            $('input[name=phone]').val(msg['phone']);
            $('textarea[name=address]').val(msg['address']);
            $('input[name=postcode]').val(msg['postcode']);

            var state = msg['ostan'];
            var city = msg['city'];
            //alert(city);
            var mahale = msg['mahale'];


            $('.state option').each(function (index) {
                var state_val = $(this).val();
                if (state_val == state) {
                    $(this).attr('selected', 'selected');
                    ldMenu(state_val, 'city');
                    $('.selectpicker').selectpicker('refresh');
                }
            });
            $('.city option').each(function (index) {
                var city_val = $(this).val();
                if (city_val == city) {
                    $(this).attr('selected', 'selected');
                    $('.selectpicker').selectpicker('refresh');
                }
            });

            //console.log(msg);
            $('#add_address').fadeIn(200);
            $('#darkpage').fadeIn(200);

        }, 'json');

    }
</script>

