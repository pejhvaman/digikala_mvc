<style>
    #searchShowMode {
        width: 100%;
        float: right;
        position: relative;
    }

    #search_input {
        width: 200px;
        height: 20px;
        border: 1px solid #b3b5b3;
        border-radius: 4px;
        font-family: yekan;
        font-size: 9pt;
        color: #6f706f;
        margin-right: 20px;
        margin-bottom: 20px;
    }

    #searchIcon {
        display: inline-block;
        position: absolute;
        width: 20px;
        height: 20px;
        background: url(public/images/magnifying-glass.png) no-repeat;
        right: 200px;
        top: 13px;
        cursor: pointer;
    }

    #ExistBtn {
        display: inline-block;
        width: 40px;
        height: 25px;
        position: relative;
        top: 11px;
        right: 11px;
        cursor: pointer;
    }

    #ExistNoBtn {
        display: inline-block;
        width: 40px;
        height: 25px;
        position: absolute;
        right: 0;
        background: url(public/images/switchNo.png) no-repeat 0 -8px;
    }

    .ExistYesBtn {

        background: url(public/images/switchYes.png) no-repeat 0 -8px !important;
    }

    #menuDisplayMode {
        display: block;
        float: left;
        position: relative;
        top: 14px;
        left: 10px;
        width: 110px;
        height: 24px;

    }

    #titleMenuDisplay {
        font-size: 9pt;
        display: block;
        float: right;
        line-height: 23px;
    }

    #menuDisplayTableMode1, #menuDispalyRowMude1 {
        display: block;
        float: left;
        width: 24px;
        height: 24px;
        cursor: pointer;
    }

    #menuDisplayTableMode1 {
        position: relative;
        left: 2px;
        background: url(public/images/menutableacti.png) no-repeat;
    }

    #menuDispalyRowMude1 {
        position: relative;
        left: 8px;
        background: url(public/images/menurowreac.png) no-repeat;
    }
    #menuDispalyRowMude1.activeRow {
        background: url(public/images/menurowacti.png) no-repeat !important;
    }
    #menuDisplayTableMode1.reactiveTable{
        background: url(public/images/menutablereac.png) no-repeat !important;
    }


    #ExistanceQuestion {
        display: inline-block;
        position: relative;
        right: 20px;
        font-size: 9pt;

    }
</style>
<div id="searchShowMode">
    <input id="search_input" placeholder="جست وجو..."/>
    <span onclick="doSearch();" id="searchIcon"></span>
    <span id="ExistBtn">
        <span id="ExistNoBtn"></span>
    </span>
    <span id="ExistanceQuestion" class="yekan">
                فقط نمایش کالاهای موجود
            </span>
    <span id="menuDisplayMode">
                <span id="titleMenuDisplay" class="yekan">نوع نمایش</span>
                 <span id="menuDisplayTableMode1"></span>
                <span id="menuDispalyRowMude1"></span>
            </span>
</div>
<script>
    $('#menuDispalyRowMude1').click(function () {
        $('#search_products_div').addClass('rowDispaly');
        $(this).addClass('activeRow');
        $('#menuDisplayTableMode1').addClass('reactiveTable');

    });
    $('#menuDisplayTableMode1').click(function () {
        $('#search_products_div').removeClass('rowDispaly');
        $('#menuDispalyRowMude1').removeClass('activeRow');
        $(this).removeClass('reactiveTable');
    });


    $('#ExistBtn').click(function () {
        $('#ExistNoBtn', this).toggleClass('ExistYesBtn');
        doSearch();
    });
</script>