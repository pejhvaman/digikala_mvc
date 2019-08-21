<script src="public/slider/jquery-ui.min.js"></script>

<script src="public/slider/slider.js"></script>

<link href="public/slider/style.css" rel="stylesheet">

<style>
    #main {
        width: 1200px;
        margin: 20px auto;
        margin-bottom: 0;
        background: white;
        border-radius: 4px;
        font-family: yekan;
        box-shadow: 2px 2px 3px #bcbcbc;
        padding: 15px;
        color: #5d5d62;
    }

    #main::after {
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

    #main > form > .right {
        float: right;
        width: 400px;
        margin-bottom: 70px;
    }

    #main > form > .left {
        float: left;
        width: 750px;
        margin-bottom: 70px;
    }

    h4 {
        font-weight: normal;
        font-size: 14pt;
        margin: 10px;
    }

    .left .right {
        width: 350px;
        float: right;
    }

    .left .left {
        width: 350px;
        float: left;
    }

    .row2 {
        float: right;
        width: 100%;
        margin-bottom: 20px;
    }

    .row2 p {
        margin: 8px 0;
    }

</style>

<div id="main">
    <?php
    $proInfo = $data['proInfo'];
    $commentInfo = $data['commentInfo'];
    $score = unserialize($commentInfo['param']);


    ?>
    <form action="addcomment/savecomment/<?= $proInfo['id'] ?>" method="post">
        <div class="right">
            <img src="public/images/products/<?= $proInfo['id'] ?>/product_300.jpg">
        </div>
        <div class="left">
            <h4>
                امتیاز شما به این محصول
            </h4>
            <?php
            $params = $data['params'];
            $num = sizeof($params);
            $righ = ceil($num / 2);
            $left = $num - $righ;
            $params_r = array_slice($params, 0, $righ);
            $params_l = array_slice($params, $righ, $left);
            ?>
            <div class="right">
                <?php
                foreach ($params_r as $param) {
                    ?>
                    <div class="row2">
                        <p>
                            <?= $param['title'] ?>
                        </p>
                        <input data-val="<?= $score[$param['id']] ?>" value="<?= $score[$param['id']] ?>" name="param<?= $param['id'] ?>"
                               type="hidden" class="flat-slider">
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="left">
                <?php
                foreach ($params_l as $param) {
                    ?>
                    <div class="row2">
                        <p>
                            <?= $param['title'] ?>
                        </p>
                        <input data-val="<?= $score[$param['id']] ?>" value="<?= $score[$param['id']] ?>" name="param<?= $param['id'] ?>"
                               type="hidden" class="flat-slider">
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <style>
            .comment {
                float: right;
                width: 100%;
            }

            .comment input {
                width: 800px;
                border: 1px solid #cccccc;
                border-radius: 4px;
                height: 40px;
                font-family: yekan;
                padding: 0 8px;
            }

            .comment textarea {
                width: 900px;
                border: 1px solid #cccccc;
                border-radius: 4px;
                height: 300px;
                font-family: yekan;
                padding: 0 8px;
            }

        </style>

        <div class="comment">
            <h4>
                دیگران را با نوشتن نقد،بررسی و نظرات خود، برای انتخاب این محصول راهنمایی کنید.
            </h4>
            <div class="row2">
                <input value="<?= $commentInfo['title'] ?>" name="title" placeholder="عنوان نقد و بررسی شما...">
            </div>
            <div class="row2">
                <input value="<?= $commentInfo['positive_point'] ?>" name="positive" placeholder="نقاط قوت">
            </div>
            <div class="row2">
                <input value="<?= $commentInfo['negative_point'] ?>" name="negative" placeholder="نقاط ضعف">
            </div>
            <span style="margin-top: 40px;float: right;font-size: 10pt">
            متن نقد و بررسی شما :
        </span>
            <div class="row2" style="margin-top: 0">
                <textarea name="comment"><?= $commentInfo['comment_text'] ?></textarea>
            </div>
            <div class="row2" style="margin-top: 0">
                <span onclick="submitForm()" class="btn_green">
                    ثبت نظر
                </span>
            </div>


        </div>
    </form>
    <script>
        function submitForm() {
            $('form').submit();
        }

        $('.flat-slider').flatslider({
            min: 1,
            max: 5,
            step: 1,
            value: 3,
            <?php if($score!=''){echo 'disabled:true';}else{echo 'disabled:false';} ?>
        });
    </script>
</div>
