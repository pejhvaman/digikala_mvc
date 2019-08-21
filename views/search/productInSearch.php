
<style>
    #search_products_div {
        width: 98%;
        float: right;
        margin-top: 20px;
        margin-right: 20px;
    }

    #search_products_ul {
        padding: 0;
        float: right;
        width: 100%;
    }

    .appleProduct {
        float: right;
        width: 250px;
        height: 440px;
        margin-left: 14px;
        margin-bottom: 15px;
    }

    .appleProduct a {
        display: inline-block;
        float: right;
        width: 100%;
        height: 100%;
    }

    .apple_product_pic {
        width: 100%;
        margin-top: 10px;
    }

    .apple_product_pic img {
        width: 220px;
        height: 220px;
    }

    .textAlignCenter {
        text-align: center;
    }

    .appleProColors {
        width: 100%;
        height: 15px;
        margin: 15px 0;
    }

    .appleProColors span {
        display: inline-block;
        width: 15px;
        height: 15px;
        border-radius: 50%;
    }

    .red_color_pro {
        background: #bc2428;
    }

    .black_color_pro {
        background: black;
    }

    .silver_color_pro {
        background: silver;
    }

    .gold_color_pro {
        background: gold;
    }

    .rozgold_color_pro {
        background: #bc617f;
    }

    .appleProTitle {
        width: 96%;
        float: right;
        font-family: yekan;
        font-size: 11pt;
        padding-right: 10px;
        margin: 5px 0;
    }

    .star_rating_div {
        width: 100%;
        float: right;
        text-align: center;
    }

    .star_rating_span {
        display: inline-block;
        margin: auto;
        height: 16px;
        width: 80px;
        overflow: hidden;
        position: relative;

    }

    .gray_stars {
        display: inline-block;
        margin: auto;
        float: left;
        width: 80px;
        height: 16px;
        background: url(public/images/stargray.png) repeat;
    }

    .red_stars {
        display: block;
        float: left;
        width: 66%;
        height: 16px;
        background: url(public/images/starred.png) repeat;
        position: absolute;
        left: 0;
    }

    .description{
        width: 100%;
        height: 310px;
        float: right;
        display: none;
        font-family: yekan;
        font-size: 10pt;
        margin-right: 10px;
    }

    .applePrice_div {
        width: 100%;
        float: right;
        position: relative;
    }

    .applePrice_div .old_price {
        text-decoration: line-through;
        font-family: yekan;
        font-size: 10pt;
        color: #bc3133;
        margin: 0 10px;
    }

    .applePrice_div .new_price {
        font-family: yekan;
        font-size: 13pt;
        color: #1b9b84;
        margin: 0 10px;
    }

    .addToShopBasket {
        display: block;
        position: absolute;
        float: left;
        width: 32px;
        height: 32px;
        left: 15px;
        top: 10px;
        background: url(public/images/buy.png);
    }

    .rowDispaly li {
        width: 98% !important;
    }

    .rowDispaly .rowRight {
        float: right;
        width: 250px;
    }
    .rowDispaly .star_rating_div{
        margin-top: 40px;
    }

    .rowDispaly .rowLeft {
        float: left;
        width: 720px;
    }
    .rowDispaly .rowLeft .appleProTitle{
        font-size:15pt !important;
    }
    .rowDispaly .description{
        display: block !important;
    }
</style>

<div id="search_products_div">
    <ul id="search_products_ul">


    </ul>
</div>