<style>
    #introduction section {
        display: none;
        font-family: yekan;
        font-size: 11pt;
        border-right: 2px solid #cbcbc7;
        margin-right: 35px;
    }
/*
    #introduction section:first-child {
        display: block;
    }*/

    #introduction .items p {
        padding: 0 50px 0 20px;
    }

    #introduction .items h4 {
        font-size: 18pt;
        font-weight: normal;
        color: #5d5d62;
        position: relative;
        padding-right: 40px;
        padding-top: 3px;
    }

    #introduction .items h4 i {
        background: white url(public/images/plus-sign-in-a-black-circle.png) no-repeat;
        display: block;
        position: absolute;
        width: 45px;
        height: 45px;
        right: -24px;
        top: 0;
        cursor: pointer;
    }

    #introduction .items h4 i.activeMore {
        background: white url(public/images/negative-sign-button.png) no-repeat !important;
    }

    /*#introduction .strectch_border {
        float: left;
        width: 1150px;
    }*/

    .items .more_descrip {
        display: none;
        width: 97%;
        margin-right: 15px;
    }
</style>


<section></section>
<section id="section_fanni"></section>
<section></section>
<section id="ask_answer"></section>


<!--<div class="strectch_border">-->
<?php
/*require('tab1.php');
require('tab2.php');
require('tab3.php');
require('tab4.php');
*/?>

<script>

    $('#tab li').click(function () {
        changeTab($(this));
    });
    function changeTab(tag) {
        $('#tab li').removeClass('activeTab');
        $('#introduction section').fadeOut(0);
        tag.addClass('activeTab');
        var index = tag.index();
        var section_selected = $('#introduction section').eq(index) ;
        var url = '<?= URL ?>product/tab/<?= $productInfo['id'] ?>/<?= $productInfo['idcategory']; ?>';
        var data = {'number':index};
        $.post(url, data, function (msg) {
            section_selected.html(msg);
        });
        section_selected.fadeIn(200);
    }
    $('.<?= $data['activeTab'] ?>').trigger('click');

</script>