<style>
    #section_fanni {
        border-right: unset !important;
    }

    #section_fanni h4 {
        font-weight: normal;
        font-size: 14pt;
        padding: 0 20px;
        margin-top: 50px;

    }

    #section_fanni .rows {
        width: 100%;
        float: right;
        height: 40px;
        margin-bottom: 10px;
        border-radius: 4px;
        overflow: hidden;

    }

    #section_fanni .rows .row_right {
        width: 240px;
        float: right;
        background: #f8f8f4;
        font-size: 11pt;
        height: 100%;
        margin-left: 10px;
        margin-right: 10px;
        line-height: 40px;
        padding-right: 10px;
    }

    #section_fanni .rows .row_left {
        width: 875px;
        float: left;
        background: #f8f8f4;
        font-size: 11pt;
        height: 100%;
        line-height: 40px;
        padding-right: 10px;
        margin-left: 10px;
    }

</style>
<?php
$fanni = $data[0];
foreach ($fanni as $parent) {
    $children = $parent['children'];
    ?>

    <h4>
        <?= $parent['title']; ?>
    </h4>
    <?php
    foreach ($children as $child) {
        ?>
        <div class="rows">
            <div class="row_right">
                <?= $child['title']; ?>
            </div>
            <div class="row_left">
                <?php
                if($child['value']==''){
                    echo '-';
                }
                else{
                    echo $child['value'];
                }
                ?>

            </div>

        </div>
    <?php } ?>
<?php } ?>

