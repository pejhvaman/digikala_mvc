<style>
    #main {
        width: 1300px;
        margin: 15px auto;
        padding: 10px;
        background: white;
        border-radius: 5px;
        font-family: yekan;
        font-size: 12pt;
        padding-bottom: 50px;
    }

    #main::after {
        content: "";
        clear: both;
        display: block;
    }

    .left {
        width: 90%;
        margin: auto;
        padding: 10px;
        color: #5d5d62;
        border: 1px solid #bdbdbd;
        border-radius: 4px;
        box-shadow: 2px 2px 3px #e2e2e2;
    }

    .row2 h4 {
        font-size: 14pt;
    }

    .row2 .title {
        width: 150px;
    }

    .row2 .title, .row2 span {
        margin: 0 20px 0 5px;
        float: right;
        display: inline-block;

    }

    .left {
        border: none;
        box-shadow: unset;
    }

    .row2 input {
        width: 200px;
        padding: 4px;
        border: 1px solid #cccccc;
        border-radius: 4px;
    }
</style>

<div id="main">

    <div class="left">
        <p>
            ورود به پنل مدیریت :
        </p>
        <form action="adminlogin/checkuser" method="post">
            <div class="row2">
            <span class="title">
                ایمیل :
            </span>
                <input type="text" name="email">
            </div>

            <div class="row2">
            <span class="title">
                پسورد :
            </span>
                <input type="password" name="password">
            </div>
            <div class="row2">
            <span onclick="submitForm()" class="btn_green" style="float: left">
               ورود
            </span>
            </div>
        </form>


    </div>
    <script>
        function submitForm() {
            $('form').submit();
        }
    </script>

</div>