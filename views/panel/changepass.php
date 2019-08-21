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
        padding-top: 80px;
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

    .row3 input[type=password] {
        width: 250px;
        border: 1px solid #cccccc;
        border-radius: 4px;
        font-family: yekan;
        font-size: 10pt;
        float: right;
        background: #f3ece5;
    }

    .errorpart {
        width: 100%;
        height: 50px;
        border: 1px solid #ff4d3a;
        border-radius: 4px;
        font-family: yekan;
        color: #ff4d3a;
        float: right;
        text-align: center;
        line-height: 50px;
        margin-top: 15px;
    }

    .doneprocess {
        width: 100%;
        height: 50px;
        border: 1px solid #00b79a;
        border-radius: 4px;
        font-family: yekan;
        color: #505050;
        float: right;
        text-align: center;
        line-height: 50px;
        margin-top: 15px;
    }
</style>

<div id="main">

    <form method="post" action="panel/changepass">

        <?php
        if(isset($_GET['error'])) {
            if ($_GET['error'] != '') {
                ?>
                <div class="errorpart">
                    <?= $_GET['error']; ?>
                </div>

                <?php
            } else {
                ?>
                <div class="doneprocess">
                    رمز عبور با موفقیت تغییر داده شد.
                </div>

                <?php
            }
        }
        ?>

        <div class="row3">
        <span class="title">
رمز عبور فعلی :
        </span>
            <input type="password" name="password" onfocus="this.value=''"> <!--onfocus="this.value=''"-->
        </div>
        <div class="row3">
        <span class="title">
رمز عبور جدید :
        </span>
            <input type="password" name="pass_new">
        </div>
        <div class="row3">
        <span class="title">
تکرار رمز عبور :
        </span>
            <input type="password" name="pass_confirm">
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