<?php
@session_start();
include './manage/bio/common/FunctionCheckActive.php';
ACTIVEPAGE_SHOW(5);
$fixheader = "press";
include './content/header.php';
//include './content/slide.php';
//slidePage("press");
//อันนี้ที่ใช้ controller ของ admin เพราะมันสามารถใช้งานร่วมกันได้
include './controller/newsController.php';
include './service/newsService.php';
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



                            <div class="contorno-titolo"><h2>News</h2>
                            </div>



                            <div class="uk-grid" data-uk-grid-margin>

                                <!--content-->
                                <?php
                                $util = new Utility();
                                $controller = new newsController();
                                $_data = $controller->dataTable();
                                $limitPaging = $util->getLimitPaging();

                                $resultCount = $util->countObject($_data);
                                // for test 
                                // $resultCount = 50;
                                $rel = $resultCount / $limitPaging;
                                if (($rel - floor($rel)) != 0) {
                                    $rel = floor($rel) + 1;
                                } else {
                                    $rel = floor($rel);
                                }
                                foreach ($_data as $key => $value) {

                                    /* if ($util->ContinueObject($page, $key + 1)) {
                                      continue;
                                      } */
                                    ?>
                                    <div class="uk-width-medium-1-2">


                                        <article class="uk-article">


                                            <h1 class="uk-article-title">
                                                <a title="Biotec Italia awarded at World of Beauty in Prague" href="news_detail.php">Biotec Italia awarded at World of Beauty in Prague</a> </h1>

                                            <p class="uk-article-lead">
                                                <?= $_data[$key]['d_date'] ?></p>


                                            <div class="uk-align-medium-left">
                                                <a href="news_detail.php?s_id=<?= $_data[$key]['s_seq'] ?>" title="Biotec Italia awarded at World of Beauty in Prague"><img src="./manage/bio/controller/file/press/201701281600581.jpg" alt="Biotec Italia awarded at World of Beauty in Prague" width="150" height="120" title="Biotec Italia awarded at World of Beauty in Prague" /></a> </div>

                                            <?= $_data[$key]['s_subject_en'] ?>
                                            <div class="yoo-zoo socialbuttons clearfix">
                                                <div><a href="//twitter.com/share" class="twitter-share-button" data-url="http://www.biotecitalia.com/en/news/item/biotec-italia-awarded-at-world-of-beauty-in-prague" data-count="none" data-lang="en_GB">Tweet</a></div>
                                                <div><div class="g-plusone" data-href="http://www.biotecitalia.com/en/news/item/biotec-italia-awarded-at-world-of-beauty-in-prague" data-size="medium" data-annotation="none" data-lang="en_GB"></div></div>
                                                <div><div class="fb-like" data-href="http://www.biotecitalia.com/en/news/item/biotec-italia-awarded-at-world-of-beauty-in-prague" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false" data-action="like" data-colorscheme="light"></div></div>
                                            </div> 


                                            <ul class="uk-subnav uk-subnav-line">

                                                <li class="element element-itemlink">
                                                    <a href="news_detail.php?s_id=<?= $_data[$key]['s_seq'] ?>">Read More >></a></li></ul>
                                        </article>

                                    </div>
                                <?php } ?>
                                <!--END content-->
                            </div>
                            <ul class="uk-pagination">

                                <!--<li class="uk-active"><span>1</span><li><a href="/en/news/2">2</a></li><li><a href="/en/news/3">3</a></li><li><a href="/en/news/4">4</a></li><li><a href="/en/news/5">5</a></li><li><a href="/en/news/2">»</a></li><li><a href="/en/news/5">Last</a></li></ul>
                                            -->
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

