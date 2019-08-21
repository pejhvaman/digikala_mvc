<div id="main" style=" width: 1330px;margin: 15px auto;">
    <form id="form_search" action="search/doSearch" method="post">
        <?php
        require('sidebar.php');
        ?>


        <div id="content"
             style="width: 1080px;float: left;background: white;box-shadow: 2px 2px 3px #e1e3dd;border-radius: 4px;">

            <?php
            require('page_navigator.php');
            require('filter_top.php');
            require('searchAndShowMode.php');
            require('sortBy.php');
            require('pager.php');
            require('productInSearch.php');
            ?>


        </div>
    </form>
    <script>

        var current_page = 1;

        function doSearch(page) {

            if (typeof (page) != 'undefined') {
                current_page = page;
            } else {
                current_page = 1;
            }
            if(current_page<1){
                current_page=1;
            }
             var last_page='';
            last_page=$('#page_index li:last').text();
            if(current_page>last_page){
                current_page=last_page;
            }


            var url = 'search/doSearch';
            var data = $('#form_search').serializeArray();
            var exist = 0;
            if ($('#ExistNoBtn').hasClass('ExistYesBtn') == true) {
                exist = 1;
            }
            data.push({'name': 'exist', 'value': exist});

            var keyword = $('#search_input').val();
            data.push({'name': 'keyword', 'value': keyword});

            /*var current_page = $('#page_index li.activePage').text();
            if (current_page == '') {
                current_page = 1;
            }*/
            data.push({'name': 'current_page', 'value': current_page});

            var limit = $('#limit option:selected').val();
            data.push({'name': 'limit', 'value': limit});

            $.post(url, data, function (msg) {

                var parent = $('#search_products_ul');
                parent.html('');
                $.each(msg[0], function (index, val) {
                    var item = '<li class="appleProduct"><a><div class="rowRight"><div class="apple_product_pic textAlignCenter"><img src="public/images/products/' + val['id'] + '/product_220.jpg"/></div><div class="appleProColors textAlignCenter"><span title="قرمز" class="red_color_pro"></span><span class="silver_color_pro"></span><span class="rozgold_color_pro"></span></div><div class="star_rating_div"><span class="star_rating_span"><span class="gray_stars"></span><span class="red_stars"></span></span></div></div><div class="rowLeft"><div class="appleProTitle">' + val['title'] + '</div><div class="description"></div><div class="applePrice_div"><p class="old_price">' + val['price'] + ' تومان</p><p class="new_price">3,500,000 تومان</p><span class="addToShopBasket"></span></div></div></a></li>';

                    parent.append(item);
                });

                var page_num = msg[1];
                var activePage = '';
                $('#page_index').html('');
                var i='';
                var start = current_page-1;
                if(start<1){
                    start=1;
                }
                var end=current_page+1;
                if(end>page_num){
                    end=page_num;
                }

                for (i = start; i <= end; i++) {
                    if (i == current_page) {
                        activePage = 'activePage';
                    } else {
                        activePage = '';
                    }
                    $('#page_index').append('<li onclick="pager(this, ' + i + ' )" class="' + activePage + '">' + i + '</li>');
                }

            }, 'json');
        }


        doSearch();


    </script>

</div>


