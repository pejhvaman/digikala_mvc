<?php

$message = $data['message'];
?>
<section class="my_messages" style="<?php if($activeTab=='message'){echo 'display: block';} ?>">
    <table class="order_table" cellspacing="0">
        <tr>
            <td style="width: 10%">
                ردیف
            </td>
            <td>
                عنوان
            </td>
            <td>
                تاریخ
            </td>
            <td style="width: 30%">
                متن
            </td>
            <td style="width: 20%">
                وضعیت
            </td>
        </tr>

        <?php
        $i=1;
        foreach ($message as $row) {
            ?>
            <tr>
                <td>
                    <?= $i; ?>
                </td>
                <td>
<?= $row['title'] ?>
                </td>
                <td>
                    <?= $row['date'] ?>
                </td>
                <td>
                    <?= $row['matn'] ?>
                </td>
                <td>
                    <?php

                    if($row['status']==0){
                        echo 'خوانده نشده';
                    }else{
                            echo 'خوانده شده';
                    }

                    ?>
                </td>
            </tr>
            <?php
            $i++;
        }
        ?>
    </table>
</section>