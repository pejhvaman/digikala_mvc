<style>
    #main {
        width: 1000px;
        margin:20px auto;
        margin-bottom: 0;
        background: white;
        border-radius: 10px;
        font-family: yekan;
        box-shadow: 2px 2px 3px #bcbcbc;
        padding: 15px;
        color: #5d5d62;
        border: 5px solid #929292;
    }
    #main::after{
        content: '';
        clear: both;
        display: block;
    }

    .btn_green {
        display: block;
        width: 126px;
        height: 40px;
        border-radius: 4px;
        box-shadow: 2px 2px 3px #d0d0d0;
        background: #00977f;

        text-align: center;
        cursor: pointer;
        line-height: 40px;
        color: white;
        float: left;
        margin-left: 10px;
    }

    .row2 {
        width: 100%;
        float: right;
        margin: 10px 0;
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

    .row2 input {
        border: 1px solid #cccccc;
        border-radius: 4px;
        width: 300px;
        height: 24px;
        margin-right: 20px;
    }
</style>
<?php
$orderInfo = $data['orderInfo'];
?>

<div id="main">
    <form action="checkout/creditcard/<?= $orderInfo['id']; ?>" method="post">
        <div class="row2">
      <span class="title">
          تاریخ واریز :
      </span>
            <span>
          روز :
      </span>
            <select name="day">
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
            <select name="month">
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
            <select name="year">
                <option value="1400">
                    1400
                </option>
                <option value="1399">
                    1399
                </option>
            </select>
        </div>
        <div class="row2">
        <span class="title">
            شماره کارت :
        </span>
            <input name="creditcard" type="text">
        </div>
        <div class="row2">
        <span class="title">
نام بانک صادر کننده :
        </span>
            <input name="bank" type="text">
        </div>
        <div class="row2">
        <span class="title">
            زمان واریز :
        </span>
            <span>
ساعت :
        </span>
            <select name="hour">
                <?php
                for ($i = 0; $i < 24; $i++) {
                    ?>
                    <option value="<?= $i; ?>">
                        <?php
                        if ($i == 0) {
                            echo '00';
                        } else {
                            echo $i;
                        }
                        ?>
                    </option>
                    <?php
                }
                ?>
            </select>
            <span>
دقیقه :
        </span>
            <select name="minute">
                <?php
                for ($i = 0; $i < 60; $i++) {
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
            <a onclick="submitForm();" class="btn_green">
                ارسال اطلاعات
            </a>
        </div>
    </form>
    <script>
        function submitForm() {
            $('form').submit();
        }
    </script>
</div>
