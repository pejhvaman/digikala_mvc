
<div id="main" style="width: 1200px;margin: 15px auto;">

    <script src="public/js/jquery.elevatezoom.js"></script>
    <script src="public/js/scroll/jquery.mCustomScrollbar.js"></script>
    <link href="public/js/scroll/jquery.mCustomScrollbar.css" rel="stylesheet">
    <script src="public/3D/jsc3d.js"></script>
    <script src="public/3D/jsc3d.touch.js"></script>
    <script src="public/3D/jsc3d.webgl.js"></script>

    <?php
    $productInfo= $data['productInfo'];
    if($productInfo['special']==1) {
        require('amazing_off.php');
    }
    require ('details.php');
    ?>



    <style>
        #tab {
            padding: 0;
            width: 100%;
            height: 60px;
            float: right;
            margin-top: 15px;
            background: #f9f9f5;
            border: 1px solid #d3d3cf;
        }

        #tab li {
            float: right;
            width: 200px;
            height: 100%;
            font-family: yekan;
            font-size: 13pt;
            text-align: center;
            color: #4f4f4f;
            line-height: 60px;
            border-left: 1px solid #e2e2de;
            position: relative;
            cursor: pointer;
        }

        #tab li::before {
            content: "";
            background: url(public/images/slices.png) no-repeat;
            display: block;
            position: absolute;
            width: 30px;
            height: 26px;
            top: 16px;
            right: 20px;
        }

        #tab li.activeTab {
            background: white !important;
            border-top: 4px solid #008cff;
            margin-top: -3px;
            color: #008cff;
        }

        #tab .naghd::before {
            background-position: -102px -265px;
        }

        #tab .fanni::before {
            background-position: -310px -265px;
        }

        #tab .nazar::before {
            background-position: -260px -265px;
        }

        #tab .soal::before {
            background-position: -205px -265px;
        }

        #tab .naghd.activeTab::before {
            background-position: -102px -307px;
        }

        #tab .fanni.activeTab::before {
            background-position: -310px -307px;
        }

        #tab .nazar.activeTab::before {
            background-position: -260px -307px;
        }

        #tab .soal.activeTab::before {
            background-position: -205px -307px;
        }
    </style>

    <ul id="tab">
        <li class="naghd activeTab">

            نقد و بررسی
        </li>
        <li class="fanni">
            مشخصات
        </li>
        <li class="nazar">

            نظرات کاربران
        </li>
        <li class="soal">

            پرسش و پاسخ
        </li>
    </ul>
    <style>
        #introduction {
            width: 100%;
            float: right;
            background: white;
            border-right: 1px solid #d3d3cf;
            border-left: 1px solid #d3d3cf;
            border-bottom: 1px solid #d3d3cf;
            padding-bottom: 15px;
        }
    </style>
    <div id="introduction">
        <?php
        require ('tabs.php');
        ?>
    </div>


</div>


<?php

require ('gallery.php');

?>
