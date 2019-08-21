<style>
    .favorite_list {
        float: right;
        width: 100%;
    }

    .favorite_list .favorite_folders {
        padding: 15px;
        background: #e4e4e4;
        border-radius: 4px;
        border: 1px solid #d6d6d6;
        float: right;
        width: 1130px;
        margin-bottom: 15px;
    }

    .favorite_list .favorite_folders li {
        float: right;
        margin-left: 10px;
        width: 250px;
        height: 50px;
        position: relative;
        cursor: pointer;
    }
    .favorite_list .favorite_folders li .title input{
        text-align: right;
        font-family: yekan;
        border: 1px solid #cccccc;
        border-radius: 4px;
        width: 160px;
    }

    .favorite_list .favorite_folders li a {
        display: block;
    }

    .favorite_list .favorite_folders li .folder_icon {
        float: right;
        display: block;
        width: 32px;
        height: 32px;
        position: relative;
        right: 5px;
        top: 9px;
        background: url(public/images/folders.png) no-repeat;
    }

    .favorite_list .favorite_folders li span {
        font-size: 10pt;
        color: #5d5d62;
        margin-right: 10px;
        line-height: 50px;
    }

    .favorite_list .favorite_folders li.activeFolder {
        border-radius: 4px;
        background: #f7f7f7;
    }

    .favorite_list .favorite_folders li.activeFolder span {
        color: #f71f00 !important;
    }

    .favorite_list .favorite_folders li.hoverFolder {
        border-radius: 4px;
        background: #f7f7f7;
    }

    .favorite_list .favorite_folders li.hoverFolder span {
        color: #f71f00 !important;
    }

    .favorite_list .favorite_folders li.hoverFolder .folder_edit {
        display: block;
        width: 16px;
        height: 16px;
        position: absolute;
        left: 10px;
        top: 10px;
        background: url(public/images/edit.png) no-repeat;
    }
    .favorite_list .btn_save{
        position: absolute;
        width: 26px;
        height: 16px;
        font-family: "Times New Roman";
        font-size: 9pt;
        color: white;
        background: #00977f;
        border-radius: 6px;
        bottom: 2px;
        left: 2px;
        text-align: center;
        cursor: pointer;
        display: none;
    }
</style>
<section class="favorite_list">
    <ul class="favorite_folders">
        <li onclick="getFavorite(0,this)">
            <a>
                <i class="folder_icon" style="background: url(public/images/folder.png) no-repeat !important;"></i>
                <span>
                            همه پوشه ها
                </span>
            </a>
        </li>
        <?php
        $folders = $data['folder'];
        foreach ($folders as $folder) {
            ?>
            <li onclick="getFavorite(<?= $folder['id'] ?>, this);">
                <a>
                    <i class="folder_icon"></i>
                    <span class="title"><?= $folder['title']; ?></span>
                    <i onclick="startEdit(this)" class="folder_edit"></i>
                    <i onclick="saveEdit(<?= $folder['id'] ?> , this)" class="btn_save">save</i>
                </a>
            </li>
            <?php
        }
        ?>
    </ul>
    <style>
        .favorite_list .favo_items {
            float: right;
            width: 1142px;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #f0f0f0;
            border-radius: 4px;
            overflow: hidden;

        }

        .favorite_list .favo_items .right {
            float: right;
            width: 110px;
        }

        .favorite_list .favo_items .right img {
            width: 100px;
            height: 100px;
            border: 1px solid #d1d1d1;
            border-radius: 5px;
            padding: 4px;
        }

        .favorite_list .favo_items .left {
            float: left;
            width: 1000px;
        }

        .favorite_list .favo_items .left p {
            float: right;
            font-size: 10pt;
            color: #5d5d62;
        }

        .favorite_list .favo_items .left_top {
            float: left;
            width: 1000px;
            border-top: 1px solid #c2c2c2;
            border-bottom: 1px solid #c2c2c2;
        }

        .favorite_list .favo_items .left_top h4 {
            float: right;
            font-weight: normal;
            color: #5d5d62;
            margin: 5px;
        }

        .favorite_list .favo_items .left_top .item_remove {
            float: left;
            position: relative;
            left: 10px;
            top: 10px;
            margin-right: 10px;
            background: url(public/images/cancel1.png) no-repeat;
            display: block;
            width: 16px;
            height: 16px;
            cursor: pointer;
        }

        .favorite_list .favo_items .left_top .item_edit {
            float: left;
            position: relative;
            left: 10px;
            margin-right: 10px;
            background: url(public/images/edit.png) no-repeat;
            width: 16px;
            height: 16px;
            top: 10px;
            cursor: pointer;
        }

    </style>

    <div class="items">

    </div>

</section>
<script>

    function deleteFavorite(favoriteId, tag) {

        var item = $(tag).parents('.favo_items');

        var url = 'panel/deletefavorite';
        var data = {'favoriteId':favoriteId};
        $.post(url , data , function (msg) {
            item.remove();
        });
    }

    function saveEdit(folderId, tag) {

        var saveBtn = $(tag);
        var liTag = saveBtn.parents('li');
        var inputTag = liTag.find('.title input');
        var newName = inputTag.val();

        var url = 'panel/saveedit';
        var data = {'folderId':folderId, 'newName':newName};
        $.post(url, data, function (msg) {
            liTag.find('.title').html(newName);
            liTag.find('.btn_save').fadeOut(100);
        });
    }

    $('.favorite_list .folder_edit').click(function (e) {
        e.stopPropagation();
    });
    $('.favorite_list .btn_save').click(function (e) {
        e.stopPropagation();
    });

    function startEdit(tag) {
        var editIcon = $(tag);
        var liTag = editIcon.parents('li');
        liTag.find('.btn_save').fadeIn(200);
        var spanTitle = liTag.find('.title');
        var exTitle = spanTitle.text();
        var editInput = '<input type="text" value="'+exTitle+'">';
        spanTitle.html(editInput);

        spanTitle.find('input').click(function (e) {
            e.stopPropagation();
        });

    }

    function getFavorite(folderId, tag) {
        var liTag = $(tag);
        $('.favorite_list li').removeClass('activeFolder');
        liTag.addClass('activeFolder');
        var url = 'panel/getfavorite';
        var data = {'folderId': folderId};
        $('.items').html('');
        $.post(url, data, function (msg) {
            $.each(msg, function (index, val) {
                var item = '<div class="favo_items"><div class="right"><img src="public/images/products/'+val['idproduct']+'/product_220.jpg"/></div><div class="left"><div class="left_top"><h4>' + val['productTitle'] + '</h4><i onclick="deleteFavorite('+val['id']+',this)" class="item_remove"></i><i class="item_edit"></i></div></div></div>';
                $('.items').append(item);
            })
        }, 'json');
    }

    $('.favorite_list .favorite_folders li').hover(function () {
        $(this).addClass('hoverFolder');
    }, function () {
        $(this).removeClass('hoverFolder');
    });
</script>