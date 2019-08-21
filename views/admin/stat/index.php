<?php
$active = 'amar';
require('views/admin/layout.php');


?>
<div class="left">
    <p>
        آمار و گزارشات :

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
    </style>

    <form id="order" action="adminstat/order" method="post">
        <div class="row2">
            <h4>
                گزارش سفارشات فروشگاه :
            </h4>
        </div>
        <div class="row2">
      <span class="title">
          تاریخ شروع :
      </span>
            <span>
          روز :
      </span>
            <select name="day1">
                <?php
                for ($i = 1; $i < 32; $i++) {
                    ?>
                    <option value="<?= $i; ?>">
                        <?= $i; ?>
                    </option>
                    <?php
                }
                ?>
            </select>
            <span>
          ماه :
      </span>
            <select name="month1">
                <?php
                for ($i = 1; $i < 13; $i++) {
                    ?>
                    <option value="<?= $i; ?>">
                        <?= $i; ?>
                    </option>
                    <?php
                }
                ?>
            </select>
            <span>
          سال :
      </span>
            <select name="year1">
                <?php
                $emsal = Model::jalaliDate('Y');
                for($i=1390;$i<=$emsal;$i++) {
                    ?>
                    <option value="<?= $i; ?>">
                        <?= $i; ?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="row2">
      <span class="title">
          تاریخ پایان :
      </span>
            <span>
          روز :
      </span>
            <select name="day2">
                <?php
                for ($i = 1; $i < 32; $i++) {
                    ?>
                    <option value="<?= $i; ?>">
                        <?= $i; ?>
                    </option>
                    <?php
                }
                ?>
            </select>
            <span>
          ماه :
      </span>
            <select name="month2">
                <?php
                for ($i = 1; $i < 13; $i++) {
                    ?>
                    <option value="<?= $i; ?>">
                        <?= $i; ?>
                    </option>
                    <?php
                }
                ?>
            </select>
            <span>
          سال :
      </span>
            <select name="year2">
                <?php
                $emsal = Model::jalaliDate('Y');
                for($i=1390;$i<=$emsal;$i++) {
                    ?>
                    <option value="<?= $i; ?>">
                        <?= $i; ?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>

        <span onclick="submitForm('order')" class="btn_green" style="float: left">
            گرفتن گزارش
        </span>
    </form>
</div>

<script>
    function submitForm(formId) {
        $('#'+formId).submit();
    }
</script>

</div>