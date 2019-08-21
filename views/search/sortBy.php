
<style>
    #sort_div {
        width: 100%;
        float: right;
    }

    #sort_div span {
        display: inline-block;
        margin: 0 10px 15px 10px;
        font-size: 9.5pt;
        position: relative;
        top: 2px;
    }

    #sort_div select {
        font-family: yekan;
        font-size: 9pt;
    }
</style>
<div id="sort_div">
            <span class="yekan">
                مرتب سازی بر اساس
            </span>
    <select name="orderType1" onchange="doSearch();">
        <option value="1">قیمت</option>
        <option value="2">پر بازدیدترین</option>
        <option value="3">جدیدترین</option>
    </select>
    <select name="orderType2" onchange="doSearch();">
        <option value="1">صعودی</option>
        <option value="2">نزولی</option>
    </select>
    <span class="yekan">
                تعداد نمایش
            </span>
    <select onchange="doSearch();" id="limit">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select>
</div>