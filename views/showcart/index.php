<style>
    #main {
        width: 1170px;
        float: right;
        margin: 15px 73px;
        background: white;
        border-radius: 4px;

        box-shadow: 2px 2px 3px #bcbcbc;
        padding: 15px;
    }

    #top_header {
        width: 1170px;

        font-family: yekan;
    }

    #top_header h4 {
        font-weight: normal;
        font-size: 13pt;
        display: inline-block;
        margin-bottom: 10px;
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
    }

    #top_header .btn_green {
        float: left;
        position: relative;
        top: 12px;
        left: 15px;
    }

    #top_header span {
        font-size: 12pt;
        color: white;
        text-align: center;
        line-height: 40px;
    }

    .item_uBuy {
        width: 100%;
        font-family: yekan;
        margin: 15px 0;
    }

    .item_uBuy table {
        width: 100%;
        border-radius: 4px;
        border: 1px solid #eeeeee;
    }

    .item_uBuy thead tr:first-child {
        background: #eeeeee;
        height: 50px;
        color: #949494;
        font-size: 12pt;
    }

    .item_uBuy tr td {
        text-align: center;
        border-top: 1px solid #eeeeee;
        border-left: 1px solid #eeeeee;
    }

    .item_uBuy tr td:not(:first-child) {
        width: 17%;
        text-align: center;
    }

    .item_uBuy tr td:first-child {
        width: 46%;
    }

    .item_uBuy tr td:last-child {
        border-left: none;
    }

    .item_uBuy tr td .right {
        float: right;
        padding: 15px;
    }

    .item_uBuy tr td .right img {
        width: 120px;
        height: 120px;
        vertical-align: middle;
    }

    .item_uBuy tr td .left {
        float: right;
        padding: 15px;
        font-size: 11pt;
        color: #919191;
    }

    .item_uBuy tr td .left span {
        display: block;
        margin: 3px 0;
    }

    .item_uBuy tr td .left span:first-child {
        font-size: 13pt;
        color: #575757;
    }

    .garanty_listSelector {
        width: 80px;
        height: 40px;
        background: #edf1f4;
        border: 1px solid #d1d4d7;
        border-radius: 4px;
        position: relative;
        text-align: center;
        cursor: pointer;
        margin: auto;
    }

    .garanty_listSelector::before {
        content: "";
        width: 28px;
        height: 17px;
        background: url(public/images/slices.png) no-repeat -30px -458px;
        position: absolute;
        left: 5px;
        top: 11px;
    }

    .garanty_listSelector .garanty_title {
        font-size: 10pt;
        line-height: 40px;
        color: #4f4f4f;
        position: relative;
    }

    .garanty_listSelector ul {
        display: none;
        padding: 0;
        width: 79px;
        float: right;
        border: 1px solid #d1d4d7;
        box-shadow: 2px 2px 2px #cdcdcd;
        margin-top: 3px;
        position: absolute;
        z-index: 3;
        background: white;
    }

    .garanty_listSelector ul li {
        font-family: yekan;
        font-size: 10.5pt;
        padding: 2px 5px;
        color: #4f4f4f;
        height: 20px;
    }

    .item_uBuy tr td .price {
        color: #4a4b51;
        font-size: 15pt;
    }

    .tuman {
        color: #7a7a7a;
        font-size: 10pt;
    }

    .item_uBuy tr td .remove_item {
        display: block;
        position: relative;
        width: 16px;
        height: 16px;
        background: url(public/images/cancel1.png) no-repeat;
        right: 8px;
    }
</style>

<div id="main">

    <div id="top_header">
        <h4>
            سبد خرید شما در دیجی کالا
        </h4>
        <a href="showcart1" class="btn_green" style="cursor: pointer;color: white;line-height: 40px;">
            خرید خود را نهایی کنید
        </a>
    </div>
    <div class="item_uBuy">
        <table cellspacing="0">
            <thead>
            <tr>
                <td>
                    شرح محصول
                </td>
                <td>
                    تعداد
                </td>
                <td>
                    قیمت واحد
                </td>
                <td>
                    قیمت کل
                </td>
                <td>

                </td>
            </tr>
            </thead>
            <tbody>
            <?php
            $basket = $data['basket'];
            foreach ($basket as $row) {
                ?>
                <tr>
                    <td>
                        <div class="right">
                            <img src="public/images/products/<?= $row['id']; ?>/product_220.jpg"/>
                        </div>
                        <div class="left">
                        <span>
<?= $row['title'] ?>
                        </span>
                            <span>
                                رنگ :
                                <?= $row['colorTitle'] ?>
                            </span>
                            <span>
                            گارانتی :
                                <?= $row['garantyTitle'] ?>
                            </span>
                        </div>
                    </td>
                    <td>
                        <div class="garanty_listSelector">    <!--<this is for choose order number...>-->
                            <span class="garanty_title yekan">
                        <?= $row['tedad']; ?>
                    </span>

                            <ul style="max-height: 150px;overflow-y: scroll;">
                              <?php for ($i=1 ; $i<31 ; $i++){ ?>
                                  <li onclick="updateBasket(<?= $i; ?>,<?= $row['basketRow']; ?>);"><?= $i; ?></li>
                              <?php } ?>
                            </ul>

                        </div>
                    </td>
                    <td>
                        <span class="price">
                            <?= $row['price']; ?>
                        </span>
                        <span class="tuman">تومان</span>
                    </td>
                    <td>
                        <span class="price">
                            <?= $row['tedad'] * $row['price'] ?>
                        </span>
                        <span class="tuman">تومان</span>
                    </td>
                    <td style="background: #ffb396">
                        <span class="remove_item" onclick="removeBasket(<?= $row['basketRow']; ?>);"></span>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>

    </div>

    <style>
        #total_price {
            float: left;
            width: 550px;
            height: 121px;
            border: 1px solid rgba(0, 138, 77, 0.30);
            border-radius: 4px;
            margin: 15px 0;
            font-family: yekan;
        }

        #total_shop {
            width: 100%;
            height: 60px;
        }

        .title {
            font-size: 12.5pt;
            color: #5d5d62;
            margin-right: 20px;
            line-height: 60px;
        }

        .tot_price {
            font-size: 13.5pt;
            color: #424242;
            margin-right: 250px;
            line-height: 60px;

        }

        #total_payment {
            width: 100%;
            height: 60px;
            border-top: 1px solid rgba(0, 138, 77, 0.30);
            background: rgba(0, 151, 84, 0.16);
        }
    </style>
    <div style="width: 100%;float: right">
        <div id="total_price">
            <div id="total_shop">
            <span class="title">
                جمع کل خرید شما:
            </span>
                <span class="tot_price">
                    <?= $data['priceTotalAll'] ?>
                </span>
                <span class="tuman">
                تومان
                </span>
            </div>
            <div id="total_payment">
            <span class="title" style="color: rgba(0,151,84,0.82);font-size:15pt; ">
مبلغ قابل پرداخت:
            </span>
                <span class="tot_price" style="margin-right: 230px;">
<?= $data['priceTotalAll'] ?>
                </span>
                <span class="tuman">
                تومان
            </span>
            </div>
        </div>
    </div>
</div>
<script>

    //in tabee alave bar inke tedad entekhab shode ra gerefte va be controller mifrestad, list ra update ham mikonad
    function updateBasket(tedad,basketRow) {
        var url='showcart/updatebasket/';
        var data={'tedad':tedad , 'basketRow':basketRow};
        $.post(url ,data , function (msg) {
            var basket = msg[0];
            var priceTotalAll = msg[1];
            createBasketList(basket , priceTotalAll);
        },'json');
    }

    function createBasketList(basket , priceTotalAll) {
        $('table tbody tr').remove();
        $.each(basket, function (index, value) {
            var id = value['id'];
            var title =value['title'];
            var tedad =value['tedad'];
            var price = value['price'];
            var basketRow = value['basketRow'];
            var color = value['colorTitle'];
            var garanty = value['garantyTitle'];
            var trTag = '<tr><td><div class="right"><img src="public/images/products/' +id+ '/product_220.jpg"/></div><div class="left"><span>' + title+ '</span><span>رنگ :'+color+'</span><span>گارانتی :'+garanty+'</span></div></td><td><div class="garanty_listSelector"><span class="garanty_title yekan">' + tedad+ '</span><ul><?php for ($i=1 ; $i<31 ; $i++){ ?><li onclick="updateBasket(<?= $i; ?>,'+basketRow+');"><?= $i; ?></li><?php } ?></ul></div></td><td><span class="price">' +price+ '</span><span class="tuman">تومان</span></td><td><span class="price">' + value['price'] * value['tedad'] + '</span><span class="tuman">تومان</span></td><td style="background:#ffb396"><span class="remove_item" onclick="removeBasket(' +basketRow+ ');"></span></td></tr>';
            $('table tbody').append(trTag);
        });
        $('.tot_price').text(priceTotalAll);

        //kheyli mohem:
        //tabee zir ra braye in gozashtim chon baad az ezafe shodan tag ha aksare mavaghee dasturate jquery anha kar nemikonad...
        openList();
    }

    //In tabee alave bar inke id radife sefaresh dar tbl_basket ra migirad ta baraye hazf shodan be controller befrestad, list ra update ham mikonad
    function removeBasket(basketId) {
        var url = 'showcart/deletebasket/' + basketId+'';
        var data = {};
        $.post(url, data, function (msg) {
            var basket = msg[0];
            var priceTotalAll = msg[1];
            createBasketList(basket , priceTotalAll);

        }, 'json');
    }


    function openList() {
        $('.garanty_listSelector').click(function () {
            $('ul', this).slideToggle(200);
        });
    }
    openList();


    $('.garanty_listSelector ul li').click(function () {
        var txt = $(this).text();
        $('.garanty_listSelector .garanty_title').text(txt);
    });
</script>
