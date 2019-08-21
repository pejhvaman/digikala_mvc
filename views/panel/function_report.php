<?php
$stat = $data['stat'];
?>
<div class="data_box">
    <div class="data_header">
        گزارش عملکرد
    </div>
    <div class="data_content">
        <table>
            <tr>
                <td>
                    <span class="data_title">
تعداد کل سفارشات:
                    </span>
                    <span class="data_value">
<?= $stat['order_num'] ?>
                        </span>
                </td>
                <td>
                    <span class="data_title">
کل دیجی بن دریافتی:                    </span>
                    <span class="data_value">
b
                        </span>
                </td>
                <td>
                    <span class="data_title">
تعداد نظرات ارسال شده:                    </span>
                    <span class="data_value">
<?= $stat['nazar_num'] ?>
                        </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="data_title">
سفارشات در انتظار تایید:                    </span>
                    <span class="data_value">
<?= $stat['entezar_num'] ?>
                    </span>
                </td>
                <td>
                    <span class="data_title">
کل دیجی بن مصرفی:
                    </span>
                    <span class="data_value">
e
                        </span>
                </td>
                <td>
                    <span class="data_title">
تعداد نقدهای ارسال شده:
                    </span>
                    <span class="data_value">
f
                        </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="data_title">
سفارشات در حال پردازش:
                    </span>
                    <span class="data_value">
<?= $stat['pardazesh_num'] ?>
                    </span>
                </td>
                <td>
                    <span class="data_title">
کل دیجی بن باطل شده:
                    </span>
                    <span class="data_value">
h
                        </span>
                </td>
                <td>
                    <span class="data_title">
تعداد پیغام های خوانده نشده:                    </span>
                    <span class="data_value">
<?= $stat['unread_mess_num'] ?>
                        </span>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="data_title">
سفارشات ارسال شده:
                    </span>
                    <span class="data_value">
j
                        </span>
                </td>
                <td>
                    <span class="data_title">
دیجی بن مصرف شده در سفارشات در حال پردازش:
                    </span>
                    <span class="data_value">
k
                        </span>
                </td>
            </tr>
        </table>
    </div>
</div>