<script src="public/js/bootstrap.js"></script>
<script src="public/js/bootstrap-select.js"></script>
<script src="public/js/frotel/ostan.js"></script>
<script src="public/js/frotel/city.js"></script>
<link href="public/css/bootstrap.min.css" rel="stylesheet">
<link href="public/css/bootstrap-select.css" rel="stylesheet">
<style>
    .footer_main_midle_left input {

        height: 44px !important; /*baraye eshkali ke bootstrap ijad kard...*/

    }

    #add_address {
        width: 550px;
        height: 600px;
        position: fixed;
        top: 40px;
        right: 0;
        left: 0;
        margin: auto;
        background: white;
        z-index: 6;
        border-radius: 4px;
        overflow: hidden;
        display: none;
        font-family: yekan;
    }

    #add_address h4 {
        font-size: 13pt;
        font-weight: normal;
        color: #5d5d62;
        padding-right: 10px;
        padding-left: 10px;
        margin: 0;
        background: #e4e4e4;
        height: 50px;
        line-height: 50px;
        position: relative;
    }

    #add_address h4 .close {
        display: block;
        width: 30px;
        height: 30px;
        position: absolute;
        top: 10px;
        left: 10px;
        background: url(public/images/slices.png) no-repeat -133px -121px;
        border: 1px solid #cbcbc7;
        border-radius: 50%;
        cursor: pointer;
    }

    #darkpage {
        position: fixed;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .35);
        top: 0;
        z-index: 5;
        display: none;
    }

    #add_address .row {
        float: right;
        width: 100%;
        padding: 8px 25px;
        margin-right: 0 !important;
        margin-left: 0 !important;
    }

    #add_address .row .rowRight {
        float: right;
        width: 200px;
    }

    #add_address .row .rowRight .title {
        font-size: 10.5pt;
        color: #5d5d62;
        position: relative;

        top: 5px;
    }

    #add_address .row .rowLeft {
        float: right;
        width: 300px;
    }

    #add_address .row .rowLeft input {
        width: 200px;
        height: 30px !important;
        border-radius: 3px;
        border: 1px solid rgba(184, 184, 184, 0.79);
        font-family: yekan;
        padding: 10px;
    }

    #add_address .row .rowLeft .blue_btn {
        text-align: center;
        line-height: 40px;
        color: white;
        background: #00a1aa;
        float: left;
    }


</style>
<form id="addaddress" action="showcart2/addaddress" method="post">
    <div id="add_address">
        <h4>
            افزودن آدرس جدید
            <span class="close"></span>
        </h4>
        <div class="row">
            <div class="rowRight">
            <span class="title">
                نام و نام خانوادگی تحویل گیرنده
            </span>
            </div>
            <div class="rowLeft">
                <input name="family">
            </div>
        </div>
        <div class="row">
            <div class="rowRight">
            <span class="title">
شماره تماش ضروری تلفن
            </span>
            </div>
            <div class="rowLeft">
                <input name="mobile" placeholder="09..." style="text-align: left">
            </div>
        </div>
        <div class="row">
            <div class="rowRight">
            <span class="title">
شماره تلفن ثابت تحویل گیرنده
            </span>
            </div>
            <div class="rowLeft">
                <input name="phone">
            </div>
        </div>
        <div class="row">
            <div class="rowRight">
            <span class="title">
استان/شهر تحویل گیرنده             </span>
            </div>
            <div class="rowLeft">
                <select id="state" name="state" class="selectpicker state" title="انتخاب استان">

                </select>

                <span class="shahr">
                   <select id="city" name="city" onchange="mahaleh(this);" class="selectpicker city" title="انتخاب شهر">
                       <option value="">
                           انتخاب شهر
                       </option>
                   </select>
            </span>
            </div>
        </div>
        <script>
            loadOstan('state');
            $('#state').change(function () {
                var i = $(this).find('option:selected').val();
                ldMenu(i, 'city');
                $('.selectpicker').selectpicker('refresh');
            });
        </script>
        <div class="row">
            <div class="rowRight">
            <span class="title">
محله
            </span>
            </div>
            <div class="rowLeft">
            <span class="mahaleh">
               <select name="mahale" class="selectpicker mahale" title="انتخاب محله">
                     <option value="">
انتخاب محله
                     </option>
               </select>
            </span>
            </div>
        </div>
        <div class="row">
            <div class="rowRight">
            <span class="title">
آدرس پستی
            </span>
            </div>
            <div class="rowLeft">
                <textarea name="address"
                          style="width: 300px;height: 100px;border-radius: 3px; border: 1px solid rgba(184, 184, 184, 0.79);"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="rowRight">
            <span class="title">
کد پستی
            </span>
            </div>
            <div class="rowLeft">
                <input name="postcode">
            </div>
        </div>
        <div class="row">
            <div class="rowLeft" style="float: left">
            <span onclick="submitFormAddress();" class="blue_btn">
                ثبت اطلاعات و بازگشت
            </span>
            </div>
        </div>
    </div>
</form>
<div id="darkpage"></div>
<script>

    function submitFormAddress() {
        var url = 'showcart2/addaddress/' + editAddressId + '';
        var data = $('#addaddress').serializeArray();
        var state_name = $('#state option:selected').text();
        var city_name = $('#city option:selected').text();
        data.push({'name': 'state_name', 'value': state_name});
        data.push({'name': 'city_name', 'value': city_name});
        console.log(data);
        $.post(url, data, function (msg) {
            window.location='showcart2';
        });
    }

    $('.selectpicker').selectpicker();

    $('.close').click(function () {
        $('#add_address').fadeOut(200);
        $('#darkpage').fadeOut(200);
    });


    function ostan(tag) {
        var id = $(tag).find('option:selected').attr('data-val');
        var arr = new Array();
        if (id == 0) {
            arr = ['تبریز', 'مراغه', 'اهر'];
        }//if
        if (id == 1) {
            arr = ['ارومیه', 'بوکان', 'خوی'];
        }//if
        if (id == 2) {
            arr = ['تهران', 'اسلام شهر', 'ری'];
        }//if

        $('.shahr').find('select option').remove();
        var k = 0;
        if (arr.length > 0) {
            for (k = 0; k < arr.length; k++) {
                $('.shahr').find('select').append($('<option>', {text: arr[k], value: arr[k]}));
            }//for
        }//if
        $('.selectpicker').selectpicker('refresh');


    }//function


    function mahaleh(tag) {
        var text = $(tag).find('option:selected').text();
        var arr = new Array();

        if (text == 'تبریز') {
            arr = ['ولیعصر', 'شهناز', 'منظریه'];
        }//if
        if (text == 'ارومیه') {
            arr = ['بند', 'خیام', 'شیخ تپه'];
        }//if
        if (text == 'تهران') {
            arr = ['نازی آباد', 'سعادت آباد', 'ولیعصر'];
        }//if

        $('.mahaleh').find('select option').remove();
        var k = 0;
        if (arr.length > 0) {
            for (k = 0; k < arr.length; k++) {
                $('.mahaleh').find('select').append($('<option>', {text: arr[k], value: arr[k]}));
            }//for
        }//if
        $('.selectpicker').selectpicker('refresh');
    }//function
</script>