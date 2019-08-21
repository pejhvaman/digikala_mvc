<style>
    #pager {
        width: 100%;
        float: right;
        font-family: yekan;
        font-size: 9pt;
        margin-bottom: 15px;
    }

    #previous_page, #next_page {
        display: block;
        float: left;
        text-align: center;
        width: 50px;
        height: 20px;
        border: 1px solid #bdbfbd;
        border-radius: 4px;
        background: linear-gradient(top, white, #c6c8c6);
        background: -moz-linear-gradient(top, white, #c6c8c6);
        background: -webkit-linear-gradient(top, white, #c6c8c6);
        background: -o-linear-gradient(top, white, #c6c8c6);
    }

    #next_page {
        margin: 0 3px 0 10px;
    }

    #previous_page {
        margin: 0 0 0 3px;
    }

    #page_index {
        padding: 0;
        float: left;
    }

    #page_index li {
        float: right;
        text-align: center;
        width: 30px;
        height: 20px;
        border: 1px solid #bdbfbd;
        border-radius: 4px;
        margin: 0 3px;
        cursor: pointer;
        background: linear-gradient(top, white, #c6c8c6);
        background: -moz-linear-gradient(top, white, #c6c8c6);
        background: -webkit-linear-gradient(top, white, #c6c8c6);
        background: -o-linear-gradient(top, white, #c6c8c6);
    }

    #page_index li.activePage {
        background: #838485 !important;
        border: 1px solid #838485;
    }

    #next_page, #previous_page {
        cursor: pointer;
    }
</style>
<div id="pager">

    <span onclick="doSearch(current_page+1)" id="next_page">
                صفحه بعد
    </span>

    <ul id="page_index">
        <li>1</li>
    </ul>
    <span onclick="doSearch(current_page-1)" id="previous_page">
                صفحه قبل
    </span>

</div>
<script>

    function pager(tag, page) {
        var liTag = $(tag);
        $('#page_index li').removeClass('activePage');
        liTag.addClass('activePage');
        doSearch(page);
    }

</script>