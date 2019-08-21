<style>
    #main {
        width: 1170px;
        background: linear-gradient(to bottom right, #1eadf0, #0afb60);
        background: -moz-linear-gradient(to bottom right, #1eadf0, #0afb60);
        background: -webkit-linear-gradient(to bottom right, #1eadf0, #0afb60);
        border-radius: 12px;
        box-shadow: 2px 2px 3px #bcbcbc;
        padding: 15px;
        margin: 15px auto;
        border: 4px solid #147587;
        color: #4a4b51;
        font-family: yekan;
    }

    #main::after {
        content: '';
        clear: both;
        display: block;
    }

    .btn_green {
        display: block;
        width: 140px;
        height: 40px;
        border-radius: 4px;
        background: #147587;
        text-align: center;
        line-height: 40px;
        color: #ebe6d1;
        float: left;
        cursor: pointer;

    }

    .row3 {
        float: right;
        width: 100%;
        margin: 10px 0;
    }

    .row3 .title {
        display: inline-block;
        width: 200px;
        font-size: 11pt;
        float: right;
    }

    .row3 input[type=text] {
        width: 250px;
        border: 1px solid #cccccc;
        border-radius: 4px;
        font-family: yekan;
        font-size: 10pt;
        float: right;
        background: #f3ece5;
    }

    .row3 select {
        width: 80px;
        margin-left: 16px;
        background: wheat;
        border: 1px solid aliceblue;
    }

    .row3 input[type=checkbox] {
        float: right;
        margin-top: 8px;
    }

    .row3 input[type=radio] {
        float: right;
        margin-top: 8px;
    }
</style>

<div id="main">

    <form method="post" action="panel/editprofile">

        <?php
        $profile = $data['profile'];

        ?>

        <div class="row3">
        <span class="title">
            ایمیل :
        </span>
            <input type="text" name="email" value="<?= $profile['email']; ?>">
        </div>
        <div class="row3">
        <span class="title">
نام و نام خانوادگی :
        </span>
            <input type="text" name="family" value="<?= $profile['family']; ?>">
        </div>
        <div class="row3">
        <span class="title">
کد ملی :
        </span>
            <input type="text" name="code_meli" value="<?= $profile['code_meli']; ?>">
        </div>
        <div class="row3">
        <span class="title">
شماره تلفن ثابت :
        </span>
            <input type="text" name="tel" value="<?= $profile['tel']; ?>">
        </div>
        <div class="row3">
        <span class="title">
شماره تلفن همراه :
        </span>
            <input type="text" name="mobile" value="<?= $profile['mobile']; ?>">
        </div>
        <div class="row3">
        <span class="title">
آدرس :
        </span>
            <input type="text" name="address" value="<?= $profile['address']; ?>" style="width: 350px">
        </div>
        <div class="row3">
        <span class="title">
تاریخ تولد :
        </span>

            <?php
            $date = $profile['tavalod'];
            $arr_birth = explode('/', $date);
            $year = $arr_birth[0];
            $month = $arr_birth[1];
            $day = $arr_birth[2];
            ?>

            <span>
          روز :
      </span>
            <select name="day">
                <?php
                for ($i = 1; $i < 32; $i++) {
                    ?>
                    <option value="<?= $i; ?>" <?php if ($i == $day) {
                        echo 'selected="selected"';
                    } ?>>
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
                    <option value="<?= $i; ?>" <?php if ($i == $month) {
                        echo 'selected="selected"';
                    } ?>>
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
                <?php
                for ($i = 1320; $i <= Model::jalaliDate('Y'); $i++) {
                    ?>
                    <option value="<?= $i; ?>" <?php if ($i == $year) {
                        echo 'selected="selected"';
                    } ?>>
                        <?= $i; ?>
                    </option>
                    <?php
                }
                ?>
            </select>

        </div>

        <div class="row3">
        <span class="title">
جنسیت :
        </span>
            <span class="title" style="width: auto">
مرد
        </span>
            <input type="radio" name="sex" value="1" <?php if ($profile['sex'] == 1) {
                echo 'checked="true"';
            } ?>>
            <span class="title" style="width: auto;margin-right: 15px">
زن
        </span>
            <input type="radio" name="sex" value="2" <?php if ($profile['sex'] == 2) {
                echo 'checked="true"';
            } ?>>
        </div>

        <div class="row3">
        <span class="title">
دریافت خبرنامه :
        </span>
            <input type="checkbox" name="khabarname" value="1" <?php if ($profile['khabarname'] == 1) {
                echo 'checked="true"';
            } ?>>
        </div>
        <div class="row3">
        <span onclick="submitForm();" class="btn_green">
            ثبت اطلاعات
        </span>
        </div>
    </form>
</div>
<script>
    function submitForm() {
        $('form').submit();
    }
</script>