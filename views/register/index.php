<style>
    #main {
        width: 1200px;
        margin: 15px auto
    }

    #register_content {
        width: 985px;
        height: 530px;
        margin: 40px auto;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 1px 3px #bcbcbc;
    }

    #register_content_right {
        width: 500px;
        height: 530px;
        background: white;
        float: right;
    }

    #register_content_left {
        width: 485px;
        height: 530px;
        background: #f6f6f6;
        float: right;
    }

    #register_content_right h1 {
        width: 445px;
        height: 75px;
        margin: auto;
        font-family: yekan;
        color: #626262;
        padding-right: 50px;
        line-height: 70px;
        font-weight: normal;

    }

    #register_form {
        width: 100%;
        height: 455px;

    }

    #register_form_main {
        width: 480px;
        height: 390px;
        margin: auto;
        border-top: 1px solid #dddddd;
        border-bottom: 1px solid #dddddd;
    }

    #register_form_main label {
        display: block;
        width: 390px;
        height: 30px;
        font-family: yekan;
        font-size: 11pt;
        color: #646464;
        margin-right: 40px;
        margin-top: 20px;
    }

    #register_form_main .info_input {
        width: 390px;
        height: 40px;
        margin-right: 40px;
        border-radius: 4px;
        border: 1px solid #c3c3c3;
        font-family: yekan;
        direction: ltr;
        text-align: left;
        padding-left: 10px;
    }

    #register_form_main p {
        width: 370px;
        font-family: yekan;
        margin: 10px 70px 20px 0;
        color: #4a4b51;
    }

    #register_form_main p a {
        color: #009fea;
    }

    #register_form_main #reg_btn {
        width: 390px;
        height: 50px;
        margin: auto;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 2px 2px 3px #c3c3c3;
    }

    #register_form_main #reg_btn:hover #reg_btn_icon span {
        background: #00a6ad;
    }

    #register_form_main #reg_btn #reg_btn_icon span {
        transition: background-color 500ms ease;
    }

    #register_form_main #reg_btn:hover #reg_btn_text {
        background: #008489;
    }

    #register_form_main #reg_btn #reg_btn_text {
        transition: background-color 500ms ease;
    }

    #register_form_main #reg_btn #reg_btn_icon {
        display: block;
        width: 65px;
        height: 100%;
        float: right;
    }

    #register_form_main #reg_btn #reg_btn_icon span {
        display: block;
        width: 65px;
        height: 100%;
        float: right;
        background: #00b6bb
    }

    #register_form_main #reg_btn #reg_btn_icon span i {
        margin: 0;
        display: block;
        width: 30px;
        height: 25px;
        background: url(public/images/slices.png) no-repeat -1317px -86px;
        position: relative;
        right: 22px;
        top: 9px
    }

    #register_form_main #reg_btn #reg_btn_text {
        display: block;
        width: 325px;
        height: 100%;
        background: #00969c;
        font-family: yekan;
        color: #eeeef9;
        float: right;
        line-height: 48px;
        text-align: center;
    }

    #register_loginpart {
        width: 70%;
        height: 63px;
        margin: auto;
    }

    #register_loginpart p {
        font-family: yekan;
        text-align: center;
        font-size: 14pt;
        color: #5d5d62;
        margin: 0;
        margin-top: 14px;
    }

    #register_loginpart p a {
        color: #009fea;
    }

    #register_content_left_icon {
        width: 100%;
        height: 250px;

    }

    #register_content_left_icon i {
        display: inline-block;
        width: 70px;
        height: 60px;
        background: url(public/images/slices.png) no-repeat -867px -84px;
        position: relative;
        right: 215px;
        top: 90px;
    }

    #register_content_left_op {
        height: 280px;
        width: 100%;
    }

    #register_content_left_op ul {
        padding: 0;
        width: 400px;
        height: 100%;
        margin: auto;
    }

    #register_content_left_op ul li {
        width: 100%;
        height: 40px;
        font-family: yekan;
        line-height: 35px;
        color: #8e8f89;
    }

    #register_content_left_op ul li i {
        display: block;
        float: right;
        width: 22px;
        height: 22px;
        margin-left: 15px;
        background: url(public/images/slices.png) no-repeat;
        position: relative;
        top: 3px;
        font-size: 9pt;
    }

    .reg_checkbox_input {
        width: 22px;
        height: 22px;
        float: right;
        position: relative;
        top: 4px;
        right: 40px;
        margin: 0;
        opacity: 0;
        z-index: 2;
    }

    .register_form_main_condition {
        position: relative;
    }

    .reg_checkbox_label {
        position: absolute;
        display: block;
        float: right;
        width: 20px !important;
        height: 20px !important;
        border: 1px solid #626262;
        top: 4px;
        right: 41px;
        margin: 0 !important;
        border-radius: 2px;

    }

    .checked {
        background: #00969c url(public/images/slices.png) no-repeat -671px -119px;
        border: 1px solid #00969c;
    }
</style>

<div id="main">
    <div id="register_content">
        <div id="register_content_right">
            <h1>به دیجی کالا بپیوندید</h1>
            <div id="register_form">
                <div id="register_form_main">
                    <div id="register_form_main_email">
                        <label>
                            شماره همراه یا پست الکترونیک
                        </label>
                        <input class="info_input" placeholder="Phone number or Email">
                    </div>
                    <div id="register_form_main_password">
                        <label>
                            کلمه عبور
                        </label>
                        <input class="info_input" type="password" placeholder="Password">
                    </div>
                    <div class="register_form_main_condition">
                        <label class="reg_checkbox_label"></label>
                        <input class="reg_checkbox_input" type="checkbox"/>
                        <p>
                            <a href="/privacy">حریم خصوصی </a>
                            و
                            <a>شرایط و قوانین </a>
                            استفاده از سرویس های سایت دیجی‌کالا را مطالعه نموده و با کلیه موارد
                            آن موافقم.
                        </p>
                    </div>
                    <div id="reg_btn">
                        <a id="reg_btn_icon">
                            <span>
                                <i></i>
                            </span>
                        </a>
                        <a id="reg_btn_text">
                            ثبت نام در دیجی کالا
                        </a>
                    </div>
                </div>
                <div id="register_loginpart">
                    <p>
                        قبلا در دیجی کالا ثبت نام کرده اید؟
                        <a>
                            ورود به دیجی کالا
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div id="register_content_left">
            <div id="register_content_left_icon">
                <i>
                </i>
            </div>
            <div id="register_content_left_op">
                <ul>
                    <li>
                        <i style="background-position: -1283px -202px;"></i>
                        سریعتر و ساده تر خرید کنید
                    </li>
                    <li>
                        <i style="background-position: -1283px -241px;"></i>
                        به سادگی سوابق خرید و فعالیت های خود را مدیریت کنید
                    </li>
                    <li>
                        <i style="background-position: -1283px -280px;"></i>
                        لیست علاقمندی های خود را بسازید و تغییرات آنها را دنبال کنید
                    </li>
                    <li>
                        <i style="background-position: -1283px -320px;"></i>
                        نقد، بررسی و نظرات خود را با دیگران به اشتراک گذارید
                    </li>
                    <li>
                        <i style="background-position: -1283px -363px;"></i>
                        در جریان فروش های ویژه و قیمت روز محصولات قرار بگیرید
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
<script>

    $('.reg_checkbox_input').click(function () {
        if ($(this).is(':checked')) {
            $(this).parents('.register_form_main_condition').find('.reg_checkbox_label').addClass('checked');
        } else {
            $(this).parents('.register_form_main_condition').find('.reg_checkbox_label').removeClass('checked');
        }
    });

</script>