<style>
    .more_descrip{
        overflow: hidden;
    }
</style>
<?php
$naghd = $data[0];
foreach ($naghd as $row) {
    ?>
    <div class="items">
        <h4>
            <i></i>
<?= $row['title'] ?>
        </h4>
        <div class="more_descrip">

           <p>
               <?= $row['description'] ?>
           </p>

        </div>
    </div>
    <?php
}
?>

<script>
    var more = $('#introduction .items h4 i');
    more.click(function () {
        var items = $(this).parents('.items');
        $('.more_descrip', items).slideToggle(500);
        $(this).toggleClass('activeMore');
    });
</script>