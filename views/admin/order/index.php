<?php
$active = 'order';
require('views/admin/layout.php');
$orders = $data['orders'];
?>
<div class="left">
    <p>
مدیریت سفارشات :
    </p>

    <a class="btntop" onclick="submitForm();" style="background: #ff5661">
        حذف
    </a>
    <form action="adminorder/deleteorder" method="post">
        <table class="list" cellspacing="0">
            <tr>
                <td>
                    کد
                </td>
                <td>
                    تاریخ
                </td>
                <td>
                    تحویل گیرنده
                </td>
                <td>
                    مبلغ کل
                </td>
                <td>
                    استان
                </td>
                <td>
                    شهر
                </td>
                <td>
                    جزئیات
                </td>
                <td>
                    انتخاب
                </td>
            </tr>
            <?php
            foreach ($orders as $row) {
                ?>
                <tr>
                    <td>
                        <?= $row['id']; ?>
                    </td>
                    <td>
                        <?= $row['date']; ?>
                    </td>
                    <td>
                        <?= $row['family']; ?>
                    </td>

                    <td>
                        <?= $row['amount']; ?>
                    </td>
                    <td>
                        <?= $row['ostan']; ?>
                    </td>
                    <td>
                        <?= $row['city']; ?>
                    </td>
                    <td>
                        <a href="adminorder/detail/<?= $row['id'] ?>">
                            <i class="view" style="background: url('public/images/edit.png') no-repeat center">
                            </i>
                        </a>
                    </td>
                    <td>
                        <input type="checkbox" name="id[]" value="<?= $row['id']; ?>">
                    </td>
                </tr>
                <?php
            }
            ?>

        </table>
    </form>
</div>

</div>