
<style>
    #ask_answer {
        border-right: unset !important;
        padding: 20px;
        float: right;
        width: 1090px;
    }

    #ask_ur_ques_title {
        font-size: 13pt;
        color: #666666;
        margin-right: 20px;
        font-weight: normal;

    }

    #ask_answer textarea {
        width: 100%;
        height: 180px;
        border: 1px solid #dbdbdb;
        border-radius: 4px;
        display: block;
        float: right;
    }

    #send_ques {
        float: right;
        width: 1090px;
        height: 120px;
        padding: 20px;
    }

    #send_ques .send_ques_btn {
        display: block;
        width: 114px;
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
        cursor: pointer;
    }

    #send_ques .send_ques_btn:hover {
        background: #00a1aa;
    }

    #send_ques .send_ques_btn {
        transition: background-color 500ms ease;
    }

    #ask_ques_container {

    }

    #ask_ques_title {
        float: right;
        font-size: 13pt;
        color: #666666;
        font-weight: normal;
        margin-right: 20px;
    }

    #ask_ques_container .user_ques {
        float: right;
        width: 100%;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 2px 2px 3px #cbcbcb;
        margin-top: 20px;
    }

    #ask_ques_container .user_ques .header_q {
        float: right;
        width: 100%;
        height: 35px;
        background: #e4e4e4;
    }

    #ask_ques_container .user_ques .header_q .header_q_right {
        float: right;
        width: 200px;
        height: 100%;
    }

    #ask_ques_container .user_ques .header_q .header_q_right i {
        display: block;
        width: 30px;
        height: 30px;
        float: right;
        margin-top: 4px;
        margin-right: 4px;
        background: url(public/images/slices.png) no-repeat -277px -121px;
    }

    #ask_ques_container .user_ques .header_q .header_q_right span {
        float: right;
        color: #5d5d62;
        margin-top: 6px;
    }

    #ask_ques_container .user_ques .header_q .header_q_left {
        float: left;
        height: 100%;
        width: 500px;
        padding-left: 10px;
    }

    #ask_ques_container .user_ques .header_q .header_q_left .ques_date, .asker_name, .By {
        float: left;
        margin-top: 6px;
        color: #5d5d62;
        margin-right: 5px;
    }

    .user_ques .content_q {
        float: right;
        width: 100%;
        padding: 20px;
        background: #f2f2f2;
    }

    .user_ques .content_q p {
        color: #5d5d62;
    }
    .answer{
        float: left;
        width: 1070px;
        height: 50px;
        padding: 10px;
        background: rgba(242,242,242,0.61);
        color: #5d5d62;
    }
    .answer p{
        font-weight: normal;
        font-size: 11pt;
        margin: 2px;
        color: #5d5d62;
    }
</style>



    <h4 id="ask_ur_ques_title">
        پرسش خود را مطرح نمایید
    </h4>
    <textarea></textarea>
    <div id="send_ques">
                <span class="send_ques_btn">
ثبت پرسش
                   </span>
    </div>
    <div id="ask_ques_container">
        <h4 id="ask_ques_title">
            پرسش ها و پاسخ ها
        </h4>
        <div class="saperatorLine" style="width:97%;"></div>
        <?php
        $questions = $data[0];
        $answers = $data[1];
        foreach ($questions as $question) {
            ?>
            <div class="user_ques">
                <div class="header_q">
                    <div class="header_q_right">
                        <i></i>
                        <span>
                                پرسش
                    </span>
                    </div>
                    <div class="header_q_left">
                            <span class="ques_date">
                                <?= $question['tarikh']; ?>
                            </span>
                        <span class="asker_name">
                            پژمان یزدان خواه -
                        </span>
                        <span class="By">توسط</span>
                    </div>
                </div>
                <div class="content_q">
                    <p>
                        <?= $question['matn']; ?>
                    </p>
                </div>
                <div class="answer">
                    <p>
                        پاسخ:
                    </p>
                    <?= $answers[$question['id']]['matn']; ?>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

