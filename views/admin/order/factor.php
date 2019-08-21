<!doctype html>
<html lang="en">
<head>
    <base href="<?= URL ?>">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>factor</title>
</head>
<body>

<style>
    table{
        direction: rtl;
        font-family: Tahoma;

    }

    .firstTable {
        border: 1px solid black;
    }

    .secondTable {
        width: 100%;
    }

    .secondTable td{
        padding: 5px;
        font-size: 10pt;
    }
    .secondTable p{
        font-size: 10pt;
        margin: 4px 0;
    }

    .bordertop {
        border-top: 1px solid black
    }

    .borderright {
        border-right: 1px solid black
    }

    .borderbottom {
        border-bottom: 1px solid black
    }

    .borderleft {
        border-left: 1px solid black
    }
    .padding5{
        padding: 5px;
    }
    .padding15{
        padding: 15px;
    }
    .textalign{
        text-align: center;
    }


</style>
<?php
$orderInfo = $data['orderInfo'];
$basket = unserialize($orderInfo['basket']);

?>
<table class="firstTable" cellspacing="0" cellpadding="0" width="500px" align="center">
    <tr>
        <td width="100%">
            <table class="secondTable" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="borderleft" width="120px">
                        <img width="90px" src="public/images/logo.png">
                    </td>
                    <td class="borderleft textalign" style="font-weight: bold">
                        نام فروشگاه
                    </td>
                    <td style="text-align: center;" width="140px">
                        <?php
                        require ('public/barcode/BarcodeGenerator.php');
                        require ('public/barcode/BarcodeGeneratorHTML.php');
                        require ('public/barcode/BarcodeGeneratorJPG.php');
                        require ('public/barcode/BarcodeGeneratorPNG.php');
                        require ('public/barcode/BarcodeGeneratorSVG.php');

                        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                        $barcode = $generator->getBarcode($orderInfo['id'], $generator::TYPE_CODE_128);

                        echo '<img src="data:image/png;base64,'.base64_encode($barcode).'">';
                        ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table class="secondTable" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="vertical-align: top" width="320px" class="bordertop borderleft">
                        <p>
                            نام گیرنده :
                            <?= $orderInfo['family'] ?>
                        </p>
                        <p>
                            آدرس :
                            <?= $orderInfo['address'] ?>

                        </p>
                    </td >
                    <td class="bordertop" style="vertical-align: top">
                        <p>
                            کد پستی :
                            <?= $orderInfo['code_posti'] ?>
                        </p>
                        <p>
                            موبایل :
                            <?= $orderInfo['mobile'] ?>
                        </p>
                        <p>
                            تلفن :
                            <?= $orderInfo['tel'] ?>
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
<style>
    #productfactor td{
        border-top: 1px solid black;
    }
    #productfactor td:not(:last-child){
        border-left: 1px solid black;
    }
</style>
    <tr>
        <td>
            <table id="productfactor" class="secondTable" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        عنوان محصول
                    </td>
                    <td>
                        تعداد
                    </td>
                    <td>
                        رنگ
                    </td>
                    <td>
                        گارانتی
                    </td>
                    <td>
                        قیمت
                    </td>
                    <td>
                        تخفیف
                    </td>
                </tr>


                <?php
                foreach ($basket as $row) {
                    ?>

                    <tr>

                        <td>
                            <?= $row['title']; ?>
                        </td>
                        <td>
                            <?= $row['tedad']; ?>
                        </td>
                        <td>
                            <?= $row['colorTitle']; ?>
                        </td>
                        <td>
                            <?= $row['garantyTitle']; ?>
                        </td>
                        <td>
                            <?= $row['price'] * $row['tedad'] ?>
                        </td>
                        <td>
                            <?= (($row['discount'] * $row['price']) / 100) * $row['tedad'] ?>
                        </td>

                    </tr>

                    <?php
                }
                ?>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table class="secondTable" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="padding: 15px" class="bordertop" width="50%">
                        <p>
                            مبلغ کل دریافتی :
                            <?= number_format($orderInfo['amount']); ?>
                            تومان
                        </p>
                    </td>
                    <td style="padding: 15px" class="bordertop">
                        <p>
                            شیوه پرداخت :
                            <?= $orderInfo['payTypeTitle'] ?>
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table class="secondTable" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="padding: 15px" class="bordertop" width="50%">
                        <p>
                            شیوه ارسال :
                            <?= $orderInfo['postTypeTitle'] ?>
                        </p>
                    </td>
                    <td style="padding: 15px" class="bordertop">
                        <p>
                            هزینه ارسال :
                            <?= number_format($orderInfo['post_price'])?>
                            تومان
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table class="secondTable" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="text-align: left;padding: 20px" class="bordertop" width="100%">
                        <p>
                            مهر فروشگاه
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

</table>

</body>
</html>