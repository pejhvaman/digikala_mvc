
<style>
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
        width: 1120px;
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
                <li class="activeStep">
                    <span class="circle"></span>
                    <span class="line"></span>
                    <span class="step_title">
ورود به دیجی کالا
                    </span>
                </li>
                <li>
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
    <style>
        #content {
            float: right;
            width: 1100px;
            padding: 100px 50px;
            font-family: yekan;
        }

        #cright {
            float: right;
            width: 549px;
            border-left: 1px solid #e3e3e3;
            text-align: center;
        }

        #cleft {
            float: left;
            width: 550px;
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
            margin: auto;
        }

        #cright i , #cleft i{
            display: block;
            width: 55px;
            height: 55px;
            position: relative;
            margin: auto;
            top: 10px;
        }

        .are_u_in_new {
            font-size: 13pt;
            text-align: center;
            margin: 15px 0 5px 0;
        }

        .getIn {
            font-size: 10pt;
            text-align: center;
            color: #5d5d62;
            margin: 5px 0 15px 0;
        }
    </style>
    <div id="content">
        <div id="cright">
            <i style=" background: url(public/images/slices.png) no-repeat -795px -22px;"></i>
            <p class="are_u_in_new">
                عضو دیجی کالا هستید؟
            </p>
            <p class="getIn">
                برای تکمیل فرایند خرید خود وارد شوید
            </p>
            <a href="login" class="btn_green" style="background: #00a1aa;color: white;text-align: center;line-height: 40px;">
                ورود به دیجی کالا
            </a>
        </div>
        <div id="cleft">
            <i style=" background: url(public/images/slices.png) no-repeat -795px -90px;"></i>
            <p class="are_u_in_new">
                تازه وارد هستید؟
            </p>
            <p class="getIn">
                برای تکمیل فرایند خرید خود ثبت نام کنید
            </p>
            <a href="register" class="btn_green" style="color: white;text-align: center;line-height: 40px;">
ثبت نام در دیجی کالا
            </a>
        </div>
    </div>
</div>
