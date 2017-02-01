<?php
@session_start();
include './manage/bio/common/FunctionCheckActive.php';
ACTIVEPAGE_SHOW(5);
$fixheader = "press";
include './content/header.php';
//include './content/slide.php';
//slidePage("press");
//อันนี้ที่ใช้ controller ของ admin เพราะมันสามารถใช้งานร่วมกันได้
include './controller/pressController.php';
include './service/pressService.php';
?>



<div class="uk-container uk-container-center posizione-fissa">


</div>
<script>
    function ck(source) {
        //alert(1);
        //alert(img);

        var img = new Image();
        var height;
        var width;
        //var height_warp = $("body").width();lightbox-img
        img.src = source;
        img.onload = function () {


            height = this.height;
            width = this.width;
            //alert(width + 'x' + height);
            //alert(height+" - - "+width);
            if (height > 900) {

            }
            var warp = document.getElementById("lightbox-wrap");
            var att = document.createAttribute("id");
            att.value = 'lightbox-wrap2';
            warp.setAttributeNode(att); //        background-color: red;
            $("#lightbox-img").css({"width": "100px", "height": "100px"});
        }

</script>
<style>
    #lightbox-wrap2 {
        display: none;
        position: fixed;
        top: 5% !important; 
        left: 0;
        padding: 20px;

        z-index: 1101;
        outline: none;
        max-height: 50% !important; 
    }
.text-left {
    margin-top: 0px;
    margin-bottom: 0px;
    display: inline;
    padding: 14px 60px 14px 20px;
    color: #fff;
    font-size: 18px;
}
.text-left {
    text-align: left !important;
}
@media (max-width: 767px)

</style>



<div class="tm-block ">
    <div class="tm-middle uk-grid" data-uk-grid-match data-uk-grid-margin>

        <div class="tm-main uk-width-medium-1-1">


            <main class="tm-content">



                <div class="yoo-zoo news-uikit news-uikit-news">
                    <div class="sfondo-grigio">
                        <div class="uk-container uk-container-center">

                            <div class="contorno-titolo"><h2>News</h2></div>



                            <div class="uk-grid" data-uk-grid-margin><div class="uk-width-medium-1-2">


                                    <article class="uk-article">


                                        <h1 class="uk-article-title">
                                            <a title="Biotec Italia awarded at World of Beauty in Prague" href="/en/news/item/biotec-italia-awarded-at-world-of-beauty-in-prague">Biotec Italia awarded at World of Beauty in Prague</a> </h1>

                                        <p class="uk-article-lead">
                                            Thursday, 10 September 2015 </p>


                                        <div class="uk-align-medium-left">
                                            <a href="/en/news/item/biotec-italia-awarded-at-world-of-beauty-in-prague" title="Biotec Italia awarded at World of Beauty in Prague"><img src="./manage/bio/controller/file/press/201701281600581.jpg" alt="Biotec Italia awarded at World of Beauty in Prague" width="150" height="120" title="Biotec Italia awarded at World of Beauty in Prague" /></a> </div>

                                        Mesotherm got the BEPPA at the 20th World of Beauty in Prague 
                                        <div class="yoo-zoo socialbuttons clearfix">
                                            <div><a href="//twitter.com/share" class="twitter-share-button" data-url="http://www.biotecitalia.com/en/news/item/biotec-italia-awarded-at-world-of-beauty-in-prague" data-count="none" data-lang="en_GB">Tweet</a></div>
                                            <div><div class="g-plusone" data-href="http://www.biotecitalia.com/en/news/item/biotec-italia-awarded-at-world-of-beauty-in-prague" data-size="medium" data-annotation="none" data-lang="en_GB"></div></div>
                                            <div><div class="fb-like" data-href="http://www.biotecitalia.com/en/news/item/biotec-italia-awarded-at-world-of-beauty-in-prague" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false" data-action="like" data-colorscheme="light"></div></div>
                                        </div> 


                                        <ul class="uk-subnav uk-subnav-line">

                                            <li class="element element-itemlink">
                                                <a href="/en/news/item/biotec-italia-awarded-at-world-of-beauty-in-prague">Read More >></a></li></ul>
                                    </article>
                                    <article class="uk-article">


                                        <h1 class="uk-article-title">
                                            <a title="Hyaluronic Acid" href="/en/news/item/hyaluronic-acid?category_id=29">Hyaluronic Acid</a> </h1>

                                        <p class="uk-article-lead">
                                            Monday, 28 July 2014 </p>


                                        <div class="uk-align-medium-left">
                                            <a href="/en/news/item/hyaluronic-acid?category_id=29" title="Hyaluronic Acid"><img src="./manage/bio/controller/file/press/201701281600581.jpg" alt="Hyaluronic Acid" width="150" height="120" title="Hyaluronic Acid" /></a> </div>

                                        An help for skin health. 
                                        <div class="yoo-zoo socialbuttons clearfix">
                                            <div><a href="//twitter.com/share" class="twitter-share-button" data-url="http://www.biotecitalia.com/en/news/item/hyaluronic-acid?category_id=29" data-count="none" data-lang="en_GB">Tweet</a></div>
                                            <div><div class="g-plusone" data-href="http://www.biotecitalia.com/en/news/item/hyaluronic-acid?category_id=29" data-size="medium" data-annotation="none" data-lang="en_GB"></div></div>
                                            <div><div class="fb-like" data-href="http://www.biotecitalia.com/en/news/item/hyaluronic-acid?category_id=29" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false" data-action="like" data-colorscheme="light"></div></div>
                                        </div> 


                                        <ul class="uk-subnav uk-subnav-line">

                                            <li class="element element-itemlink">
                                                <a href="/en/news/item/hyaluronic-acid?category_id=29">Read More >></a></li></ul>
                                    </article>

                                </div><div class="uk-width-medium-1-2">
                                    <article class="uk-article">


                                        <h1 class="uk-article-title">
                                            <a title="Renlive Presents Liposnell" href="/en/news/item/liposnell-renlive-treatment-slimming">Renlive Presents Liposnell</a> </h1>

                                        <p class="uk-article-lead">
                                            Monday, 14 December 2015 </p>


                                        <div class="uk-align-medium-left">
                                            <a href="/en/news/item/liposnell-renlive-treatment-slimming" title="Renlive Presents Liposnell"><img src="./manage/bio/controller/file/press/201701281550041.jpg" alt="Renlive Presents Liposnell" width="150" height="120" title="Renlive Presents Liposnell" /></a> </div>

                                        Remove 1 size in less than a month with LipoSnell 
                                        <div class="yoo-zoo socialbuttons clearfix">
                                            <div><a href="//twitter.com/share" class="twitter-share-button" data-url="http://www.biotecitalia.com/en/news/item/liposnell-renlive-treatment-slimming" data-count="none" data-lang="en_GB">Tweet</a></div>
                                            <div><div class="g-plusone" data-href="http://www.biotecitalia.com/en/news/item/liposnell-renlive-treatment-slimming" data-size="medium" data-annotation="none" data-lang="en_GB"></div></div>
                                            <div><div class="fb-like" data-href="http://www.biotecitalia.com/en/news/item/liposnell-renlive-treatment-slimming" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false" data-action="like" data-colorscheme="light"></div></div>
                                        </div> 


                                        <ul class="uk-subnav uk-subnav-line">

                                            <li class="element element-itemlink">
                                                <a href="/en/news/item/liposnell-renlive-treatment-slimming">Read More >></a></li></ul>
                                    </article>
                                    <article class="uk-article">


                                        <h1 class="uk-article-title">
                                            <a title="Biotec Italia at Medica 2015 in  Düsseldorf" href="/en/news/item/biotec-italia-at-medica-2015-in-duesseldorf">Biotec Italia at Medica 2015 in  Düsseldorf</a> </h1>

                                        <p class="uk-article-lead">
                                            Monday, 19 October 2015 </p>


                                        <div class="uk-align-medium-left">
                                            <a href="/en/news/item/biotec-italia-at-medica-2015-in-duesseldorf" title="Biotec Italia at Medica 2015 in  Düsseldorf"><img src="./manage/bio/controller/file/press/201701281600581.jpg" alt="Biotec Italia at Medica 2015 in  Düsseldorf" width="150" height="120" title="Biotec Italia at Medica 2015 in  Düsseldorf" /></a> </div>

                                        Biotec Italia will be present at Medica in Duesseldorf from 16  to 19 November 2015, hall 11, stand G69 
                                        <div class="yoo-zoo socialbuttons clearfix">
                                            <div><a href="//twitter.com/share" class="twitter-share-button" data-url="http://www.biotecitalia.com/en/news/item/biotec-italia-at-medica-2015-in-duesseldorf" data-count="none" data-lang="en_GB">Tweet</a></div>
                                            <div><div class="g-plusone" data-href="http://www.biotecitalia.com/en/news/item/biotec-italia-at-medica-2015-in-duesseldorf" data-size="medium" data-annotation="none" data-lang="en_GB"></div></div>
                                            <div><div class="fb-like" data-href="http://www.biotecitalia.com/en/news/item/biotec-italia-at-medica-2015-in-duesseldorf" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false" data-action="like" data-colorscheme="light"></div></div>
                                        </div> 


                                        <ul class="uk-subnav uk-subnav-line">

                                            <li class="element element-itemlink">
                                                <a href="/en/news/item/biotec-italia-at-medica-2015-in-duesseldorf">Read More >></a></li></ul>
                                    </article>
                                </div></div>
                            <ul class="uk-pagination">

                                <li class="uk-active"><span>1</span><li><a href="/en/news/2">2</a></li><li><a href="/en/news/3">3</a></li><li><a href="/en/news/4">4</a></li><li><a href="/en/news/5">5</a></li><li><a href="/en/news/2">»</a></li><li><a href="/en/news/5">Last</a></li></ul>

                        </div>

                    </div>	

                </div>
            </main>

        </div>
    </div>
</div>
<?php
include './content/footer.php';
?>

