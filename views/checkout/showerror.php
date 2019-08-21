<?php

$Error = $data['Error'];

?>

<style>
    #main {
        width: 1170px;
        float: right;
        margin: 15px 73px;
        border-radius: 4px;
        margin-top: 60px;
        padding: 15px;
    }
    .btn_green {
        display:block;
        width: 126px;
        height: 40px;
        border-radius: 4px;
        box-shadow: 2px 2px 3px #d0d0d0;
        background: rgba(255,77,58,0.67);
        font-family: yekan;
        text-align: center;
        cursor: pointer;
        line-height: 40px;
        color: white;
        float: left;
        margin-left: 10px;
    }
    #showerror{
        margin: auto;
        width: 500px;
        height: 200px;
        border: 5px solid rgba(255,77,58,0.54);
        border-radius: 10px;
        background: rgba(255,77,58,0.14);
        font-family: yekan;
        font-size: 12pt;
        color:#5d5d62;
        text-align: center;
        line-height: 150px;
    }
</style>

<div id="main">
    <div id="showerror">
        <?= $Error ?>
        <div>
        <a href="checkout/index/<?= $data['orderId']; ?>" class="btn_green">
            بازگشت
        </a>
        </div>
    </div>
</div>
