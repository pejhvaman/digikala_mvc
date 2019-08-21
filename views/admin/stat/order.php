<?php
$active = 'amar';
require('views/admin/layout.php');

$stat = $data['stat'];
$orders = $stat['result'];
?>


<style>

    .row2 span {
        margin: 0 20px 0 5px;
        float: right;
        display: inline-block;

    }

    .row2 .spanTag {
        float: right;
        font-size: 11pt;
        color: #4a4b51;
    }
</style>

<div class="left">
    <p>
        گزارشات از تاریخ
        <?= $stat['start_date'] ?>
        تا تاریخ
        <?= $stat['end_date'] ?>
    </p>

    <div class="row2">

        <span class="spanTag">
            تعداد سفارشات در این بازه :
            <?= sizeof($orders); ?>
        </span>
        <span class="spanTag">
            تعداد سفارشات پرداخت شده :
            <?= $stat['paid_order'] ?>
        </span>
        <span class="spanTag">
            درصد سفارشات پرداخت شده :
            <?= ($stat['paid_order'] / sizeof($orders)) * 100 ?>
            %
        </span>
        <span class="spanTag">
            مبلغ کل فروش :
            <?= number_format($stat['amount_total']) ?>
            تومان
        </span>

    </div>
    <table class="list" cellspacing="0">
        <tr>
            <td>
                کد
            </td>
            <td>
                تاریخ
            </td>
            <td>
                تحویل گیرنده
            </td>
            <td>
                مبلغ کل
            </td>
            <td>
                استان
            </td>
            <td>
                شهر
            </td>
            <td>
                جزئیات
            </td>
        </tr>
        <?php
        foreach ($orders as $row) {
            ?>
            <tr>
                <td>
                    <?= $row['id']; ?>
                </td>
                <td>
                    <?= $row['date']; ?>
                </td>
                <td>
                    <?= $row['family']; ?>
                </td>

                <td>
                    <?= $row['amount']; ?>
                </td>
                <td>
                    <?= $row['ostan']; ?>
                </td>
                <td>
                    <?= $row['city']; ?>
                </td>
                <td>
                    <a href="adminorder/detail/<?= $row['id'] ?>">
                        <i class="view" style="background: url('public/images/edit.png') no-repeat center">
                        </i>
                    </a>
                </td>
            </tr>
            <?php
        }
        ?>

    </table>


</div>

</div>