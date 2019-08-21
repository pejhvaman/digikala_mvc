
<style>
    #main {
        width: 1200px;
        float: right;
        margin: 15px 0;
        border-radius: 4px;
        box-shadow: 2px 2px 3px #d0d0d0;
        background: white;
        padding: 30px;
        margin-right: 45px;
    }
/* For user_information & function_report */
    .data_box {
        width: 100%;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 2px 2px 3px #eaeaea;
        margin: auto;
        font-family: yekan;
        margin-bottom: 15px;
    }

    .data_box .data_header {
        background: #888888;
        font-size: 11pt;
        color: white;
        padding-right: 10px;
        height: 40px;
        line-height: 40px;
    }

    .data_box table {
        width: 100%;
    }

    .data_box table tr {
        text-align: center;
    }

    .data_box table .data_title {
        font-size: 10pt;
        color: #005de8;
    }

    .data_box table .data_value {
        font-size: 10pt;
        color: #5d5d62;
    }

    .data_content {
        background: radial-gradient(ellipse at center, rgba(255, 255, 255, 1) 0%, rgba(204, 204, 204, 1) 100%); /* w3c */
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFFFFF', endColorstr='#CCCCCC', GradientType=1); /* ie6-9 */
        padding: 10px;
    }

    .data_content .Buttons {
        text-align: left;
    }

    .data_content .Buttons td a {
        display: block;
        float: left;
        width: 100px;
        height: 30px;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 2px 2px 3px #d6d6d6;
        margin-left: 15px;
        cursor: pointer;
    }

    .data_content .Buttons td a span {
        display: block;
        width: 100%;
        height: 100%;
        color: #5d5d62;
        background: #5d5d5d;
    }

    .data_content .Buttons .changePassword {
        display: block;
        width: 100%;
        height: 100%;
        color: #d7d7d7;
        background: #5d5d5d;
        font-size: 9.5pt;
        text-align: center;
        padding-top: 3px;
    }

    .data_content .Buttons .editData {
        display: block;
        width: 100%;
        height: 100%;
        color: #d7d7d7;
        background: #00b1bb;
        font-size: 9.5pt;
        text-align: center;
        padding-top: 3px;
    }
</style>

<div id="main">

    <?php

    require ('user_information.php');
    require ('function_report.php');
    require ('tabs.php');

    ?>

</div>
