<style>
    .scrollslider {
        width: 890px;
        height: 320px;
        background: white;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 2px 2px 2px #c7cac6;
        margin-bottom: 15px;
    }

    .scrollslider h3 {
        height: 40px;
        background: rgba(237, 238, 252, 0.45);
        margin: 0;
        font-family: yekan;
        font-size: 12pt;
        font-weight: normal;
        padding-right: 15px;
        line-height: 38px;
    }

    .scrollslider_content {
        height: 280px;
        width: 100%;
    }

    .scrollslider_prev, .scrollslider_next {
        width: 49px;
        height: 100%;
        float: right;
    }

    .scrollslider_prev .prevBtn {
        display: block;
        height: 30px;
        width: 20px;
        background: url(public/images/slices.png);
        background-position: -848px -685px;
        position: relative;
        right: 15px;
        top: 125px;
        cursor: pointer;
    }

    .scrollslider_next .nextBtn {
        display: block;
        height: 30px;
        width: 20px;
        background: url(public/images/slices.png);
        background-position: -811px -685px;
        position: relative;
        right: 15px;
        top: 125px;
        cursor: pointer;
    }

    .scrollslider_main {
        width: 792px;
        height: 100%;
        float: right;
        overflow: hidden;
    }

    .scrollslider_main_items {
        padding: 0;
        height: 100%;
    }

    .scrollslider_main_items li {
        width: 198px;
        height: 100%;
        float: right;
        text-align: center;
    }

    .scrollslider_main_items li .Items_scrollslider {
        display: block;
        width: 100%;
        height: 100%;
        text-align: center;
    }

    .scrollslider_main_items .Items_scrollslider p {
        margin: 0;
        text-align: center;
        font-family: yekan;
        font-size: 10pt;
    }

    .scrollslider_main_items .Items_scrollslider img {
        width: 150px;
        height: 150px;
        padding: 20px 0;
    }

    .scrollslider_main_items .Items_scrollslider .ItemName {
        color: #4a4b51
    }

    .scrollslider_main_items .Items_scrollslider .ItemPrice {
        color: #ea2d29;
    }

    .scrollslider_main_items .Items_scrollslider .ItemOldPrice {
        width: 90%;
        height: 24px;
        position: relative;
        background: #e7e7ee;
        border-radius: 4px;
        text-align: center;
        font-family: yekan;
        font-size: 10pt;
        color: #5d5d62;
        margin-right: 11px;
    }

    .scrollslider_main_items .Items_scrollslider .ItemOldPrice div {
        width: 75%;
        height: 0;
        border-bottom: 1px solid #9a9aa2;
        position: absolute;
        top: 13px;
        right: 25px;
    }
</style>

<div class="scrollslider">
    <h3>
        موبایل
    </h3>
    <div class="scrollslider_content">
        <div class="scrollslider_prev">
            <span class="prevBtn" onclick="scrollSlider('previous',this)"> </span>
        </div>
        <div class=" scrollslider_main">

            <ul class="scrollslider_main_items">

                <?php
                $result = $data[3];
                foreach ($result as $row) {
                    ?>

                    <li>
                        <a href="<?= URL ?>product/index/<?= $row['id']; ?>" class="Items_scrollslider">
                            <img src="public/images/products/<?= $row['id']; ?>/product_220.jpg"/>
                            <p class="ItemName">
                                <?= $row['title']; ?>
                            </p>
                            <p class="ItemPrice">
                                <?= $row['price']; ?>
                            </p>
                            <!--<div class="ItemOldPrice">
                                 <div></div>
                                 قیمت قدیمی
                             </div>-->
                        </a>
                    </li>
                    <?php
                }
                ?>

            </ul>

        </div>
        <div class="scrollslider_next">
            <span class="nextBtn" onclick="scrollSlider('next',this)"></span>
        </div>
    </div>
</div>