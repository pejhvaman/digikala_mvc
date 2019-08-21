
<div id="main" style="  width: 1200px;margin: 15px auto">

    <style>
        #banner_top {
            width: 100%;
            margin: 10px auto
        }

        #banner_top img {
            width: 100%;
        }
    </style>

    <div id="banner_top">
        <img src="public/images/bannertop1.jpeg"/>
    </div>
    <?php
    require('sidebar_right.php');
    ?>
    <style>
        #content {
            width: 890px;
            float: left;
            margin-top: 5px;
        }
    </style>

    <div id="content">
        <?php
        require('slider1.php');
        require('services_feature.php');
        require('slider2.php');
        require('scroll_slider1.php');
        require('direct_access.php');
        require('scroll_slider2.php');
        require('scroll_slider3.php');
        ?>
    </div>
</div>


<script>


    function scrollSlider(direction, tag) {

        var span_tag = $(tag);

        var scrollSliderTag = span_tag.parents('.scrollslider');
        var scrollSliderUL = scrollSliderTag.find('.scrollslider_main ul');
        var scrollSliderLI = scrollSliderUL.find('li');
        var scrollSliderItemNum = scrollSliderLI.length;

        var maxNegMargin = -(scrollSliderItemNum - 4) * 594;

        scrollSliderUL.css('width', scrollSliderItemNum * 594);


        var marginRightNew;
        var marginRightOld = scrollSliderUL.css('margin-right');

        marginRightOld = parseFloat(marginRightOld);

        if (direction == 'next') {
            marginRightNew = marginRightOld - 594;
        }
        if (direction == 'previous') {
            marginRightNew = marginRightOld + 594;
        }

        if (marginRightNew < maxNegMargin) {
            marginRightNew = 0;
        }
        if (marginRightNew > 0) {
            marginRightNew = maxNegMargin;
        }

        scrollSliderUL.animate({'marginRight': marginRightNew}, 700);


    }

    $('.nextBtn').click(function () {
        scrollSlider('next');
    });
    $('.prevBtn').click(function () {
        scrollSlider('previous');
    });
</script>