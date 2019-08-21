<div class="scrollslider" style="margin-top: 5px;float: right">
    <h3>
        پربازدیدترین ها
    </h3>
    <div class="scrollslider_content">
        <div class="scrollslider_prev">
            <span class="prevBtn" onclick="scrollSlider('previous',this)"> </span>
        </div>
        <div class=" scrollslider_main">

            <ul class="scrollslider_main_items">
                <?php
                $result = $data[4];
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
                <?php } ?>

            </ul>

        </div>
        <div class="scrollslider_next">
            <span class="nextBtn" onclick="scrollSlider('next',this)"></span>
        </div>
    </div>
</div>