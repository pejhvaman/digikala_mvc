<?php
$active = 'setting';
require('views/admin/layout.php');
$option = Model::getOption();

?>
<script src="public/jscolor/jscolor.js"></script>
<div class="left">
    <p>
        تنظیمات کلی :
    </p>

    <style>
        .row2 h4 {
            font-size: 14pt;
        }

        .row2 .title2 {
            width: 200px;
            font-size: 10.5pt;
        }

        .row2 .title2, .row2 span {
            margin: 0 20px 0 5px;
            float: right;
            display: inline-block;

        }

        .row2 select {
            float: right;
            height: 24px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .row2 select option {
            width: 100px;
        }

        .row2 input[type=text] {
            border: 1px solid #cccccc;
            border-radius: 4px;
            font-family: yekan;
            width: 200px;
            direction: ltr;
            padding: 0 4px;
            color: #4a4b51;
        }
    </style>

    <form id="order" action="adminsetting/index" method="post">
        <div class="row2">
           <span class="title2">
               تعداد محصولات در اسلایدرها :
           </span>
            <input type="text" name="limit_slider" value="<?= $option['limit_slider'] ?>" onfocus="this.value=''">
        </div>
        <div class="row2">
           <span class="title2">
شماره های تماس :
           </span>
            <input type="text" name="tel" value="<?= $option['tel'] ?>">
        </div>
        <div class="row2">
           <span class="title2">
ایمیل ارتباط با ما :
           </span>
            <input type="text" name="email" value="<?= $option['email'] ?>">
        </div>
        <div class="row2">
           <span class="title2">
مهلت پرداخت :
           </span>
            <input type="text" name="mohlatPay" value="<?= $option['mohlatPay'] ?>">
        </div>
        <div class="row2">
           <span class="title2">
مسیر اصلی سایت :
           </span>
            <input style="direction: ltr" type="text" name="root" value="<?= $option['root'] ?>">
        </div>
        <div class="row2">
           <span class="title2">
کد درگاه زرین پال :
           </span>
            <input type="text" name="zarinpalMID" value="<?= $option['zarinpalMID'] ?>">
        </div>

        <div class="row2">
           <span class="title2">
رنگ بدنه سایت :
           </span>
            <input style="height: 24px;width: 50px;font-family: Tahoma" id="color1" class="jscolor" type="text" name="body_color" value="<?= $option['body_color'] ?>">
            <span style="width: 40px" class="btntop" onclick="document.getElementById('color1').jscolor.show();">
                انتخاب
            </span>
        </div>
        <div class="row2">
           <span class="title2">
رنگ منوی سایت :
           </span>
            <input style="height: 24px;width: 50px;font-family: Tahoma" id="color2" class="jscolor" type="text" name="menu_color" value="<?= $option['menu_color'] ?>">
            <span style="width: 40px" class="btntop" onclick="document.getElementById('color2').jscolor.show();">
                انتخاب
            </span>
        </div>


        <span onclick="submitForm('order')" class="btn_green" style="float: left">
           ثبت اطلاعات
        </span>
    </form>
</div>

<script>
    function submitForm(formId) {
        $('#' + formId).submit();
    }
</script>

</div>