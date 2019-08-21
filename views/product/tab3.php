<style>
    #comment_result {
        float: right;
        width: 520px;
    }

    #comment_send {
        float: left;
        width: 615px;
        padding-left: 15px;
    }

    #comment_result .user_rate {
        float: right;
        width: 100%;
        height: 35px;
    }

    #comment_result .user_rate ul {
        padding: 0;
        width: 330px;
        height: 9px;
        float: left;
        margin-top: 23px;
        margin-right: 10px;
    }

    #comment_result .user_rate ul li {
        width: 65px;
        height: 100%;
        float: right;
        background: #e8e8e4;
        border-left: 1px solid white;
    }

    #comment_result .user_rate ul li span {
        display: block;
        float: right;
        height: 100%;
        background: #00a6ad;
    }

    #comment_result .user_rate ul li span.full {
        width: 100%;
    }
</style>

<?php

$comment_param = $data[0];
$scoresum = $data[2];


?>


<div id="comment_result">
    <p style="font-size: 14pt;color: #5d5d62;float:right;margin-right: 20px;margin-bottom: 50px ">
        امتیاز کاربران به :
    </p>
    <span style="font-size: 11pt;color: #5d5d62;margin-top: 23px;display: block;float:right">
                گوشی موبایل مدل X
                 </span>
    <?php
    foreach ($comment_param as $row) {
        @$scoreave = $scoresum[$row['id']];
        $realpart = floor($scoreave);
        $decimal = $scoreave - $realpart;
        $numLi = $realpart;
        ?>
        <div class="user_rate">
            <p style="font-size: 11pt;float: right;margin-right: 20px;">
                <?= $row['title']; ?>
            </p>
            <ul>
                <?php
                for ($i = 0; $i < $realpart; $i++) {
                    ?>
                    <li>
                        <span class="full"></span>
                    </li>
                    <?php
                }
                ?>
                <?php
                if ($realpart < 5) {
                    $numLi++;
                    ?>
                    <li>
                        <span style="width:<?= $decimal * 100; ?>%;"></span>
                    </li>
                    <?php
                }
                ?>
                <?php
                $remainLi = 5 - $numLi;
                for ($i = 0; $i < $remainLi; $i++) {
                    ?>
                    <li>

                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <?php
    }
    ?>

</div>
<style>
    #comment_send .send_comment {
        display: block;
        width: 120px;
        height: 41px;
        float: left;
        margin-left: 5px;
        font-family: yekan;
        color: white;
        line-height: 42px;
        background: #00b6bb;
        border-radius: 4px;
        box-shadow: 2px 2px 2px #c7cac6;
        text-align: center;
    }

    #comment_send .send_comment:hover {
        background: #00a1aa;
    }

    #comment_send .send_comment {
        transition: background-color 500ms ease;
    }

</style>

<div id="comment_send">
    <p style="font-size: 14.5pt;font-weight: bold;color: #5d5d62">
        شما هم می توانید در موررد این کالا نظر بدهید.
    </p>
    <span class="send_comment">
نظر خود را بنویسید
                </span>
</div>

<style>
    #users_opinion {
        width: 1090px;
        float: right;
        padding: 20px;
    }

    #users_opinion .user_comm {
        float: right;
        width: 100%;

        border-radius: 4px;
        overflow: hidden;
        box-shadow: 2px 2px 3px #ababab;

        margin: 15px auto;

    }

    #users_opinion .user_comm .header_comm {
        float: right;
        width: 100%;
        height: 55px;
        background: #e5e5e5;
    }

    #users_opinion .user_comm .header_comm .right {
        float: right;
        height: 100%;
        width: 300px;
        margin-right: 10px;
    }

    #users_opinion .user_comm .header_comm .right .user_name {
        font-size: 13pt;
        display: block;
        color: #5d5d62;
    }

    #users_opinion .user_comm .header_comm .right .comment_date {
        font-size: 9pt;
        display: block;
        color: #5d5d62;
    }

    #users_opinion .user_comm .header_comm .left {
        float: left;
        height: 100%;
        width: 400px;
        margin-left: 10px;
    }

    #users_opinion .user_comm .header_comm .left .dislike, #users_opinion .user_comm .header_comm .left .like {
        display: block;

        float: left;

        width: 70px;

        height: 30px;

        background: #ffffff;

        margin-top: 12px;

        margin-right: 10px;

        border: 1px solid #b9b9b9;

        border-radius: 4px;
    }

    #users_opinion .user_comm .header_comm .left .dislike i, #users_opinion .user_comm .header_comm .left .like i {
        display: block;
        float: right;
        width: 26px;
        height: 26px;
        background: url(public/images/slices.png) no-repeat;
    }

    .comment_content {
        width: 1120px;
        float: right;
        padding: 20px;
        background: #f2f2f2;
    }

    .comment_content .comm_con_right {
        float: right;
        width: 470px;
    }

    .comment_content .comm_con_left {
        float: left;
        width: 630px;
    }

    .comment_content .comm_con_right .user_rate {
        float: right;
        width: 100%;
    }

    .comment_content .comm_con_right .user_rate ul {
        padding: 0;
        width: 305px;
        height: 7px;
        float: left;
        margin-top: 23px;
        margin-right: 10px;
    }

    .comment_content .comm_con_right .user_rate ul li {
        width: 60px;
        height: 100%;
        float: right;
        background: #e8e8e4;
        border-left: 1px solid white;
    }

    .comment_content .comm_con_right .user_rate ul li span {
        display: block;
        float: right;
        height: 100%;
        background: #797979;
    }

    .comment_content .comm_con_right .user_rate ul li span.full {
        width: 100%;
    }

    .power_weakness {
        float: left;
        width: 100%;
    }

    .power_weakness p {
        color: #5d5d62;
        margin-right: 60px;

    }

    .power_weakness .power_point {
        float: right;
        width: 315px;
    }

    .power_point_title {
        color: #00cc56;
        margin-right: 60px;
    }

    .weakness_point_title {
        color: #ee3a00;
        margin-right: 60px;
    }

    .power_weakness .weakness_point {
        float: left;
        width: 315px;
    }
</style>

<div id="users_opinion">
    <p style="float: right;font-size: 11pt;color: #5d5d62;">
        نظرات کاربران
    </p>
    <p style="float: right;font-size: 9pt;color: #5d5d62;margin-right: 20px;margin-top:19px;">
        (850 نفر)
    </p>
    <div class="saperatorLine" style="width: 100%;margin:0"></div>
    <?php
    $comments = $data[1];
    //print_r($comments);

    foreach ($comments as $comment) {
        ?>
        <div id="comment<?= $comment['id'] ?>" class="user_comm">
            <div class="header_comm">
                <div class="right">
                            <span class="user_name">
                                پژمان یزدان خواه
                            </span>
                    <span class="comment_date">
                        <?= $comment['date_of_comment'] ?>
                    </span>
                </div>
                <div class="left">
                            <span class="dislike">
                                <span style="float: left;color: #5d5d62;margin-left: 15px;">
                                    <?= $comment['dislikecount'] ?>
                                </span>
                                <i style="background-position: -261px -183px;"></i>
                            </span>
                    <span class="like">
                                <span style="float: left;color: #5d5d62;margin-left: 15px;">
                                    <?= $comment['likecount'] ?>
                                </span>
                                <i style="background-position: -301px -183px;"></i>
                    </span>
                    <span style="color: #5d5d62;font-size: 11pt;float: left;margin-top: 15px">
                                آیا این نظر برایتان مفید بود ؟
                    </span>
                </div>
            </div>

            <div class="comment_content">
                <div class="comm_con_right">

                    <?php
                    $scores = unserialize($comment['param']);
                    //print_r($scores);

                    foreach ($comment_param as $param) {
                        $param_id = $param['id'];
                        $score = $scores[$param_id];
                        @$remain = 5 - $score;
                        //echo $score;

                        ?>

                        <div class="user_rate">
                            <p style="font-size: 9pt;float: right;margin-top: 15px;

margin-bottom: 0;">
                                <?= $param['title'] ?>
                            </p>
                            <ul>
                                <?php


                                for ($i = 0; $i < $score; $i++) {
                                    ?>
                                    <li>
                                        <span class="full"></span>
                                    </li>
                                    <?php
                                }
                                for ($i = 0; $i < $remain; $i++) {
                                    ?>

                                    <li>
                                    </li>

                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <div class="comm_con_left">
                    <div class="comm_title">
                        <p style="font-size: 14pt;color: #5d5d62;margin-top: 0;
margin-right: 60px;">
                            <?= $comment['title'] ?>
                        </p>
                    </div>
                    <div class="power_weakness">
                        <div class="power_point">
                                    <span class="power_point_title">
                                        نقاط قوت
                                    </span>
                            <p><?= $comment['positive_point'] ?></p>
                        </div>
                        <div class="weakness_point">
                                    <span class="weakness_point_title">
نقاط ضعف
                                    </span>
                            <p><?= $comment['negative_point'] ?></p>
                        </div>
                    </div>
                    <div class="comment_passage">
                        <p style="font-size: 10pt;color: #5d5d62;margin-bottom: 0;margin-right: 60px;">
                            <?= $comment['comment_text']; ?>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    <?php } ?>


</div>


