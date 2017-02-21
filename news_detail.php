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
include './manage/bio/common/social.php';
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
    .bar_news {
        margin-top: 0px;
        margin-bottom: 0px;
        display: inline;
        padding: 14px 60px 14px 20px;
        background: url(./templates/bg/sfondo-titoli.png) center right;
        color: #fff;
        font-size: 18px;
    }
    .type-ul{ 
        list-style: none outside none; 
        margin:0; 
        padding: 0; 
        display:block;
        float:right;
    }
    .type-li{ 
        float: left; 
        margin: 0 10px; 

    }
    .text-left {
        text-align: left !important;
    }
    .bottom-uk-article{
        border-bottom: 1px solid #ccb26f;
    }
    .ul-readmore{
        list-style: none outside none;
        margin: 0;
        padding: 0;
        display: block;
        float: left;
    }
    .sfondo-grigio{
        padding: 0px 0;
    }
    .li-linkitem{
        margin-top: 0px;
        background-color: #ccb26f;
        padding: 0 34px;    
    }    
    .li-linkitem > a{
        color: #fff;
    }
    .uk-article-title{
        font-size: 20px;
        line-height: 24px;
        color: #ccb26f;
        padding-top: 25px;
    }
    @media (max-width: 767px)
</style>



<div class="tm-block ">
    <div class="tm-middle uk-grid" data-uk-grid-match data-uk-grid-margin>

        <div class="tm-main uk-width-medium-1-1">


            <main class="tm-content">
                <div class="yoo-zoo news-uikit news-uikit-perdere-una-taglia-in-due-sedute-cryoliposculpt">
                    <div class="sfondo-grigio">
                        <div class="uk-container uk-container-center">
                            <article class="uk-article">

                                <div class="sfondo-grigio">

                                    <div class="uk-container uk-container-center">

                                        <?php
                                        $id = $_GET["s_id"];
                                        $util = new Utility();
                                        $social = new social();
                                        $controller = new newsController();
                                        $_data = $controller->dataTable_sel($id);

                                        foreach ($_data as $key => $value) {
                                        ?>
                                        <h1 class="uk-article-title">
                                            <?= $_data[$key]['s_subject_en'] ?>
                                            <div><?= $_data[$key]['d_date'] ?></div> </h1>



                                        <div class="uk-align-medium-left">





                                            <a href="./manage/bio/controller/file/news/<?= $_data[$key]['s_path_img'] ?>"   
                                               data-lightbox="group:4aad8bb8-18ae-4807-9fa4-7f67e6710c87-589c9c39e739f;" 
                                               title="<?= $_data[$key]['s_subject_' . $_SESSION["main_lan"]] ?>" data-spotlight="on">
                                                <img src="./manage/bio/controller/file/news/<?= $_data[$key]['s_path_img'] ?>" 
                                                     width="400" height="400" alt="" /></a>	

                                        </div>






                                        <div class="uk-margin">

                                            <div class="yoo-zoo socialbuttons clearfix">
                                                <?php 
                                                $flg = $_GET["flg"];
                                                if($flg != NULL){ ?>
                                                
                                                <?php } else {echo $_data[$key]['s_detail_'. $_SESSION["main_lan"]]; }?>
                                                <?php
                                                $link = "http://www.biotecitalia-thailand.com/news_detail.php?s_id=" . $_data[$key]['s_seq'] . "";
                                                echo $social->twitter_Share_button($link, $_data[$key]['s_subject_' . $_SESSION["main_lan"]]);
                                                echo $social->googlePlus_Share_button($link);
                                                echo $social->facebook_like_button($link, FALSE);
                                                ?>

                                            </div>

                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </article>

                        </div>
                    </div>
                </div>
            </main>




        </div>


    </div>	
</div>
<link rel="stylesheet" href="bower_components/lightbox2/dist/css/lightbox.min.css">
<script src="bower_components/lightbox2/dist/js/lightbox-plus-jquery.min.js"></script>
<script src="media/widgetkit/widgets/spotlight/js/spotlight.js"></script>
<script>
            jQuery(function ($) {
            $('[data-spotlight]').spotlight({
            "duration": 300
            });
            }
            );
</script>

<?php
include './content/footer.php';
?>

