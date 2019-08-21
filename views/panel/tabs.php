<?php
$activeTab = $data['activeTab'];
?>
<style>
    #tab {
        padding: 0;
        width: 100%;
        height: 50px;
        float: right;
        margin-top: 15px;
        background: #f9f9f5;
        border: 1px solid #d3d3cf;
    }

    #tab li {
        float: right;
        width: 130px;
        height: 100%;
        font-family: yekan;
        font-size: 11pt;
        text-align: center;
        color: #4f4f4f;
        line-height: 50px;
        border-left: 1px solid #e2e2de;
        position: relative;
        cursor: pointer;
    }

    #tab li.activeTab {
        background: #b7b7b7 !important;
        border-top: 4px solid #313131;
        margin-top: -3px;
        color: #eeeeee;
    }

</style>

<ul id="tab">
    <li class="<?php if($activeTab=='message'){echo 'activeTab';} ?>">
        پیغام های من
    </li>
    <li>
        سفارشات من
    </li>
    <li>

        لیست مورد علاقه
    </li>
    <li >
        نظرات من
    </li>
  <li class="<?php if($activeTab=='digibon'){echo 'activeTab';} ?>">
        دیجی بن های من
    </li>
    <!--  <li>

        کارت های هدیه من
    </li>
    <li>

        اطلاع رسانی ها
    </li>-->
</ul>
<style>
    #introduction {
        width: 100%;
        float: right;
        background: white;
        border-right: 1px solid #d3d3cf;
        border-left: 1px solid #d3d3cf;
        border-bottom: 1px solid #d3d3cf;
        font-family: yekan;
    }

    #introduction section {
        display: none;
    }


    #introduction .strectch_border {
        width: 1160px;
        padding: 20px;
        float: right;
    }

    #introduction .strectch_border .order_table {
        width: 100%;
        border-radius: 4px;
        overflow: hidden;
        border: 1px solid #b0b0b0;
    }

    #introduction .strectch_border .order_table > tbody > tr {
        text-align: center;
        background: #f4f4f4;
        height: 40px;
        font-size: 10pt;
        color: #393939;
    }

    #introduction .strectch_border .order_table > tbody > tr:first-child {
        text-align: center;
        background: #b0b0b0;
        height: 40px;
        font-size: 10pt;
        color: white;
    }

    #introduction .strectch_border .order_table > tbody > tr:last-child td {
        border-bottom: unset;
    }

    #introduction .strectch_border .order_table > tbody > tr > td {
        border: 1px solid #b0b0b0;
        border-left: none;
    }

    #introduction .strectch_border .order_table > tbody > tr > td:last-child {
        border-left: unset;
    }

    #introduction .strectch_border .order_table .detail_icon {
        display: block;
        width: 16px;
        height: 16px;
        position: relative;
        margin: auto;
        background: url(public/images/chevron-sign-down.png) no-repeat;
    }

    .detail_icon.activeDetail {
        background: url(public/images/up-chevron-button.png) no-repeat !important;
    }

    #introduction .strectch_border .order_table .more_detail_sefaresh {
        background: white !important;
        display: none;
    }

    #introduction .strectch_border .order_table > tbody > tr > td {
        border-bottom: none;
    }

    #introduction .strectch_border .order_table .more_detail_sefaresh .detail_content {
        padding: 10px;
        margin: auto;
    }

    #introduction .strectch_border .order_table .more_detail_sefaresh .detail_content > table {
        width: 100%;
        border-radius: 4px;
        overflow: hidden;
        border: 1px solid #b0b0b0;
    }

    #introduction .strectch_border .order_table .more_detail_sefaresh .detail_content > table > tbody > tr {
        text-align: center;
        background: #f5f5f5;
        height: 30px;
        font-size: 10pt;
        color: #393939;
    }

    #introduction .strectch_border .order_table .more_detail_sefaresh .detail_content > table > tbody > tr:first-child {
        text-align: center;
        background: #d4d4d4;
        height: 30px;
        font-size: 10pt;
        color: #323232;
    }

    #introduction .strectch_border .order_table .more_detail_sefaresh .detail_content > table > tbody > tr:last-child td {
        border-bottom: unset;
    }

    #introduction .strectch_border .order_table .more_detail_sefaresh .detail_content > table > tbody > tr > td {
        border-left: 1px solid #b0b0b0;
        border-bottom: 1px solid #b0b0b0;
    }

    #introduction .strectch_border .order_table .more_detail_sefaresh .detail_content > table > tbody > tr > td:last-child {
        border-left: unset;
    }

    #introduction .strectch_border .order_table .more_detail_sefaresh .detail_content > table > tbody > tr > td:first-child {
        width: 400px;
    }

    .detail_content h4 {
        margin: 10px 0 0 0;
        background: #d4d4d4;
        font-size: 12pt;
        font-weight: normal;
        border-radius: 4px 4px 0 0;
        padding-right: 10px;
    }

    /* section 1 styles: */

</style>
<div id="introduction">
    <div class="strectch_border">
       <?php
       require('myMessage_tab.php');
       require ('myOrder_tab.php');
       require ('myFavoriteList_tab.php');
       require ('myOpinion_tab.php');
       require ('myDigibon_tab.php');
       ?>
    </div>
</div>
<script>
    $('#tab li').click(function () {
        $('#tab li').removeClass('activeTab');
        $('#introduction section').fadeOut(0);
        $(this).addClass('activeTab');
        var index = $(this).index();
        $('#introduction section').eq(index).fadeIn(200);
    });
</script>