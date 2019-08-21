<style>
    #main {
        width: 1300px;
        margin: 15px auto;
        padding: 10px;
        background: white;
        border-radius: 5px;
        font-family: yekan;
        font-size: 12pt;
        font-weight: normal !important;
    }

    #main::after {
        content: "";
        clear: both;
        display: block;
    }
</style>

<div id="main">


    <style>
        .right {
            width: 200px;
            float: right;
            color: #5d5d62;
            border: 1px solid #bdbdbd;
            border-radius: 4px;
            font-weight: normal !important;

        }

        .left {
            width: 1060px;
            float: left;
            padding: 10px;
            color: #5d5d62;
            border: 1px solid #bdbdbd;
            border-radius: 4px;
            box-shadow: 2px 2px 3px #e2e2e2;
            font-weight: normal !important;
        }

        .right ul {
            padding: 0;
            margin: 0;
        }

        .right ul li {
            background: rgba(255, 72, 63, 0.14);
            height: 32px;
        }

        .right ul li.active {
            background: rgba(97, 255, 236, 0.14);

        }

        .right .icon_right {
            display: block;
            float: right;
            width: 16px;
            height: 16px;
            position: relative;
            right: 10px;
            top: 9px;
            background: url('public/images/dot-and-circle.png') no-repeat center;
        }

        .right ul li a {
            display: block;
            border-bottom: 1px dashed #bdbdbd;
            height: 100%;
            padding-right: 35px;
            line-height: 34px;
        }

        .left p {
            border: 1px dashed #bdbdbd;
            font-size: 11pt;
            border-radius: 4px;
            background: rgba(0, 240, 231, 0.14);
            padding: 0 10px 0 10px;
            height: 35px;
            line-height: 35px;
        }

        table.list {
            width: 100%;
            border-radius: 4px;
            border: 1px solid #bdbdbd;
        }

        table.list td {
            padding: 2px;
            border-bottom: 1px solid #bdbdbd;
        }

        table.list td:first-child {
            width: 5%;
        }

        table.list td:not(:last-child) {
            border-left: 1px solid #bdbdbd;
        }

        table.list tr:last-child td {
            border-bottom: unset;
        }

        table.list tr {
            text-align: center;
        }

        table.list tr:nth-child(even) td {
            background: rgba(0, 240, 231, 0.11);
        }

        table.list a {
            display: block;
            height: 32px;

        }

        table.list .view {
            display: block;
            width: 16px;
            height: 16px;
            background: url('public/images/eye.png') no-repeat center;
            position: relative;
            top: 9px;
            right: 15px;
        }

        .left .leftarrow:not(:first-child) {
            display: inline-block;
            width: 16px;
            height: 16px;
            background: url('public/images/previous.png') no-repeat center;
            position: relative;
            top: 6px;
            margin: 0 5px 0 5px;
        }

        .left a {

        }

        .add_div {
            width: 100%;
            float: right;
            margin: 10px 0;
        }

        .add_div textarea {
            width: 700px;
            height: 200px;
            vertical-align: top;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .add_div .titleSpan {
            margin: 4px 10px 0 10px;
            display: inline-block;
            width: 150px;
            font-size: 10pt;
        }

    </style>

    <div class="right">
        <?php
        @$level = Model::getUserLevel();
        ?>
        <ul>
            <li class="<?php if ($active == 'dashboard') {
                echo 'active';
            } ?>">
                <i class="icon_right"></i>
                <a href="admindashboard/index">
                    داشبورد
                </a>
            </li>
            <?php
            if ($level == 1) {
                ?>
                <li class="<?php if ($active == 'category') {
                    echo 'active';
                } ?>">
                    <i class="icon_right"></i>
                    <a href="admincategory/index">
                        مدیریت دسته بندی
                    </a>
                </li>
                <?php
            }
            ?>
            <li class="<?php if ($active == 'product') {
                echo 'active';
            } ?>">
                <i class="icon_right"></i>
                <a href="adminproduct/index">
                    مدیریت محصولات
                </a>
            </li>
            <li class="<?php if ($active == 'order') {
                echo 'active';
            } ?>">
                <i class="icon_right"></i>
                <a href="adminorder/index">
                    مدیریت سفارشات
                </a>
            </li>
            <?php
            if ($level == 1) {
                ?>
                <li class="<?php if ($active == 'amar') {
                    echo 'active';
                } ?>">
                    <i class="icon_right"></i>
                    <a href="adminstat/index">
                        آمار و گزارشات
                    </a>
                </li>
                <?php
            }
            ?>
            <li class="<?php if ($active == 'comment') {
                echo 'active';
            } ?>">
                <i class="icon_right"></i>
                <a href="admincomment/index">
                    نظرات
                </a>
            </li>
            <li class="<?php if ($active == 'setting') {
                echo 'active';
            } ?>">
                <i class="icon_right"></i>
                <a href="adminsetting/index">
                    تنظیمات
                </a>
            </li>
            <li class="<?php if ($active == 'slider') {
                echo 'active';
            } ?>">
                <i class="icon_right"></i>
                <a href="adminslider/index">
                    مدیریت اسلایدشو
                </a>
            </li>
            <li class="<?php if ($active == 'user') {
                echo 'active';
            } ?>">
                <i class="icon_right"></i>
                <a href="adminuser/index">
                    مدیریت اعضا
                </a>
            </li>
        </ul>
    </div>
    <script>
        function submitForm() {
            $('form').submit();
        }
    </script>