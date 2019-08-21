<style>
    #introduction .my_sefaresh {
        font-size: 11pt;
        float: right;
        width: 100%;
    }

    .detail_icon {
        cursor: pointer;
    }
</style>
<section class="my_sefaresh">
    <table class="order_table" cellspacing="0">
        <tr>
            <td>
                ردیف
            </td>
            <td>
                تاریخ
            </td>
            <td>
                کالا
            </td>
            <td>
                می پسندم
            </td>
            <td>
                مشاهده
            </td>
            <td>
                ویرایش
            </td>
            <td>
                حذف
            </td>
        </tr>
        <?php
        $comments = $data['comments'];
        $i = 1;
        foreach ($comments as $comment) {
            ?>
            <tr>
                <td>
                    <?= $i; ?>
                </td>
                <td>
                    <?= $comment['date_of_comment']; ?>
                </td>
                <td>
                    <?= $comment['proTitle']; ?>
                </td>
                <td>
                    <?= $comment['likecount']; ?>
                </td>
                <td>
                    <a href="product/index/<?= $comment['idproduct']; ?>/nazar#comment<?= $comment['id'] ?>">
                        <i class="detail_icon" style="background: url(public/images/eye.png) no-repeat center"></i>
                    </a>
                </td>
                <td>
                    <a href="addcomment/index/<?= $comment['idproduct']; ?>">
                        <i class="detail_icon" style="background: url(public/images/edit.png) no-repeat center"></i>
                    </a>
                </td>
                <td>
                    <i onclick="deleteComment(<?= $comment['id'] ?>, this)" class="detail_icon" style="background: url(public/images/cancel1.png) no-repeat center"></i>
                </td>
            </tr>

            <?php
            $i++;
        }
        ?>
    </table>
</section>
<script>
    function deleteComment(commentId,tag) {
        var deleteIcon = $(tag);
        var trTag = deleteIcon.parents('tr');
        var url = 'panel/deletecomment/'+commentId;
        var data = {};
        $.post(url, data, function (msg) {
            trTag.remove();
        });
    }
</script>