<style>
    .pro_gallery2 {
        width: 1200px;
        height: 650px;
        position: fixed;
        top: 20px;
        right: 0;
        left: 0;
        margin: auto;
        background: white;
        z-index: 6;
        border-radius: 4px;
        overflow: hidden;
        display: none;

    }

    .pro_gallery2 h4 {
        font-size: 13pt;
        font-family: yekan;
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

    .pro_gallery2 h4 .close {
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

    .darkpage {
        position: fixed;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .35);
        top: 0;
        z-index: 5;
        display: none;
    }

    .pro_gallery2 .pro_gallery2_pic {
        width: 100%;
        height: 600px;
    }

    .pro_gallery2 .pro_gallery2_pic #right {
        width: 1000px;
        height: 600px;
        float: right;
    }

    .pro_gallery2 .pro_gallery2_pic .left {
        width: 199px;
        height: 600px;
        float: left;
        border-right: 1px solid #dfdfdf;
        overflow-y: auto;
    }

    .pro_gallery2 .pro_gallery2_pic #right img {
        max-width: 100%;
        max-height: 100%;
        margin-top: 30px;
    }

    .pro_gallery2 .pro_gallery2_pic .left ul {
        padding: 0;
        width: 100%;

    }

    .pro_gallery2 .pro_gallery2_pic .left ul li {
        width: 100%;
        height: 100px;
        text-align: center;
        border-bottom: 1px solid #dfdfdf;
        cursor: pointer;
        opacity: .5;
    }

    .pro_gallery2 .pro_gallery2_pic .left ul li.active {
        opacity: 1 !important;
        border-right: 4px solid #008cff;
    }

    .pro_gallery2 .pro_gallery2_pic .left ul li img {
        max-height: 100%;
        max-width: 100%;
        margin-top: 10px;
    }

    .pro_gallery2 .pro_gallery2_pic #right .pro_items_pic {
        height: 100%;
    }

    #body.activeBody {
        overflow-y: hidden;
    }

    .icon3d {
        display: block;
        width: 45px;
        height: 40px;
        position: absolute;
        left: 0;
        bottom: 0;
        background: url(public/images/slices.png) no-repeat -363px -117px;
    }

    #cv {
        position: relative;
        right: 15px;
        top: 15px;
        display: none;
    }
</style>


<div class="pro_gallery2">
    <h4>
        <?= $productInfo['title']; ?>
        <span class="close"></span>
    </h4>
    <div class="pro_gallery2_pic">
        <div id="right">
            <canvas id="cv" width="970px" height="575px"></canvas>
            <img class="main_image" src="">

        </div>
        <div class="left">
            <ul>

                <?php
                $gallery = $data['gallery'];
                foreach ($gallery as $row) {

                    if ($row['threed'] == 1) {
                        ?>

                        <li data-main-image="" style="position: relative">
                            <img src="public/images/products/<?= $row['idproduct']; ?>/gallery/small/ax3d.jpg">
                            <span class="icon3d"></span>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li data-main-image="public/images/products/<?= $row['idproduct']; ?>/gallery/large/<?= $row['img']; ?>.jpg">
                            <img src="public/images/products/<?= $row['idproduct']; ?>/gallery/small/<?= $row['img']; ?>.jpg"/>
                        </li>
                        <?php
                    }
                    ?>
                <?php } ?>

            </ul>
        </div>
    </div>
</div>

<div class="darkpage"></div>

<script>

    var galleryBig = $('.pro_gallery2_pic');
    var gallerySml = $('.left ul li ');
    gallerySml.click(function () {
        gallerySml.removeClass('active');
        $(this).addClass('active');
        var bigPicUrl = $(this).attr('data-main-image');
        if (bigPicUrl.length > 0) {
            galleryBig.find('#cv').hide();
            galleryBig.find('.main_image').attr('src', bigPicUrl);
        } else {
            galleryBig.find('#cv').show();
        }
    });

   var canvasTag = document.getElementById('cv');
        var viewer = new JSC3D.Viewer(canvasTag, {
            SceneUrl: 'public/images/products/<?= $productInfo['id']; ?>/3d/-.obj',
            RenderMode: 'texturesmooth',
            InitRotationX: -80,
            InitRotationY: -50,
            Definition: 'Standard',
            ProgressBar: 'off'
        });
        viewer.init();
        viewer.update();

    var productGalleryWindow = $('.pro_gallery2');
    var closeBtn = productGalleryWindow.find('.close');
    closeBtn.click(function () {
        productGalleryWindow.fadeOut();
        $('.darkpage').fadeOut();
    });


    function showRelatedGallery(imgUrl, index) {
        gallerySml.removeClass('active');
        galleryBig.find('.main_image').attr('src', imgUrl);
        gallerySml.eq(index).addClass('active');             //agar axe 3d dashte bashim index plus 1 mishavad...
    }

    var small_pic_pro_div = $('.small_pic_pro_div');
    var imageSmlLI = small_pic_pro_div.find('ul li');
    imageSmlLI.click(function () {
        productGalleryWindow.fadeIn();
        $('.darkpage').fadeIn();
        smlPicUrl = $(this).attr('data-main-image');
        var smlIndex = $(this).index();
        showRelatedGallery(smlPicUrl, smlIndex);


    });


    /*   var gallery = $('.pro_gallery2');
    //var galleryItems = gallery.find('.pro_items_pic');


    var galleryThumnails = gallery.find('.pro_gallery2 .pro_gallery2_pic .left ul li');


    //problem is here:in this function...
    function showGallery(imageUrl, index) {

        galleryThumnails.removeClass('active');
        galleryThumnails.eq(index).addClass('active');
        if (imageUrl.length > 0) {
            $('.pro_gallery2').find('.pro_gallery2_pic .right .main_image').attr('src', imageUrl);
            $('.pro_gallery2_pic .right .main_image').fadeIn(200);
            $('#cv').fadeOut(0);
        } else {
            $('.pro_gallery2_pic .right .main_image').fadeOut(0);
            $('#cv').fadeIn(100);
        }
    }


    galleryThumnails.click(function () {
        var index = $(this).index();
        var mainImageUrl = $(this).attr('data-main-image');
        //Here is a problem: alert(mainImageUrl);
        showGallery(mainImageUrl, index);
    });


    var closeBtn = gallery.find('.close');
    closeBtn.click(function () {
        gallery.fadeOut(200);
        $('.darkpage').fadeOut(200);
        $('#body').removeClass('activeBody');
    });*/


    //-------------------------------------


    $('.left').mCustomScrollbar({
        setWidth: false,
        setHeight: false,
        setTop: 0,
        setLeft: 0,
        axis: "y",
        scrollbarPosition: "inside",
        scrollInertia: 950,
        autoHideScrollbar: false,
        autoExpandScrollbar: false,
        alwaysShowScrollbar: 0,
        snapAmount: null,
        snapOffset: 0,
        mouseWheel: {
            enable: true,
            scrollAmount: "auto",
            axis: "y",
            preventDefault: false,
            deltaFactor: "auto",
            normalizeDelta: false,
            invert: false,
            disableOver: ["select", "option", "keygen", "datalist", "textarea"]
        },
        scrollButtons: {
            enable: true,
            scrollType: "stepless",
            scrollAmount: "auto"
        },
        keyboard: {
            enable: true,
            scrollType: "stepless",
            scrollAmount: "auto"
        },
        contentTouchScroll: 25,
        advanced: {
            autoExpandHorizontalScroll: false,
            autoScrollOnFocus: ".small_pic_pro_div,.pro_gallery2,input,textarea,select,button,datalist,keygen,a[tabindex],area,object,[contenteditable='true']",
            updateOnContentResize: true,
            updateOnImageLoad: true,
            updateOnSelectorChange: false,
            releaseDraggableSelectors: false
        },
        theme: "dark-thick",
        callbacks: {
            onInit: false,
            onScrollStart: false,
            onScroll: false,
            onTotalScroll: false,
            onTotalScrollBack: false,
            whileScrolling: false,
            onTotalScrollOffset: 0,
            onTotalScrollBackOffset: 0,
            alwaysTriggerOffsets: true,
            onOverflowY: false,
            onOverflowX: false,
            onOverflowYNone: false,
            onOverflowYXNone: false
        },
        Live: false,
        LiveSelector: null
    });
</script>