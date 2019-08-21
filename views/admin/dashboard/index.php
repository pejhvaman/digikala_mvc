<?php
$active = 'dashboard';
require('views/admin/layout.php');
$orderStat = $data['orderStat'];

$keys = array_keys($orderStat);
/*$keys = implode(',', $keys);*/

$values = array_values($orderStat);
$values = implode(',', $values);
?>
<script src="public/highcharts/highcharts.js"></script>
<script src="public/highcharts/exporting.js"></script>
<div class="left">
    <p>
        داشبورد :
    </p>

    <style>
        .row2 h4 {
            font-size: 14pt;
        }

        .row2 .title {
            width: 150px;
        }

        .row2 .title, .row2 span {
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
        .left{
            border: none;
            box-shadow: unset;
        }
    </style>


    <div class="row2">
            <span class="title">

            </span>
    </div>
    <style>
        #container *{
            direction: ltr;
            font-family: yekan;
            font-weight: normal;
            color: #4a4b51;
        }
    </style>

    <div id="container" style="min-width: 310px;height: 400px;margin: 0 auto"></div>


    <script>

        $(function () {
            $('#container').highcharts({
                title: {
                    text: 'نمودار آمار فروش در 7 روز گذشته',
                    x: -20
                },
                subtitle: {
                    text: 'فروشگاه کلیک سایت',
                    x: -20
                },
                xAxis: {
                    categories: [<?php foreach ($keys as $key){echo "'$key',";} ?>]
                },
                yAxis: {
                    title: {
                        text: 'تعداد سفارش'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#f00'
                    }]
                },
                tooltip: {
                    valueSuffix: ' عدد '
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },
                series: [{
                    name: 'تعداد فروش',
                    data: [<?= $values; ?>]
                }]
            });
        });

    </script>

</div>

</div>