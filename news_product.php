<?php

@session_start();

include './manage/bio/common/FunctionCheckActive.php';

ACTIVEPAGE_SHOW(5);

$fixheader = "press";

include './content/header.php';

include './manage/bio/common/social.php';

//include './content/slide.php';

//slidePage("press");

//อันนี้ที่ใช้ controller ของ admin เพราะมันสามารถใช้งานร่วมกันได้

include './controller/newsController.php';

include './service/newsService.php';

?>







<div class="uk-container uk-container-center posizione-fissa">





</div>



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

        padding: 11; 

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

    .li-linkitem{


        margin-top: 15px;

        background-color: #ccb26f;

        padding: 0 34px;    ;    

    }    

    .li-linkitem > a{

        color: #fff;

    }

    .uk-article-lead{

        margin-top: 10px;

        margin-bottom: 10px;

        font-size: 14px;

    }

    .uk-grid{

    }

    .border-top{

        border-top: 1px solid #ccb26f;

    }

    .main {

        width: 150px;

        margin: 0 auto;

        overflow: hidden;

        position: relative;

        height: 120px;

    }

    .uk-article{

        padding-top: 50px;

    }

    img.absolute {



        margin-top: -10%;

        position: absolute;

    }

    .border_{

        border-top: 1px solid #ccb26f;

        margin-top: 20px;

        padding-top: 20px;

    }

    .uk-nav uk-nav-navbar{

        top:50px;

    }

    .uk-article {

        padding-top: 5px;

    }

    /* img{

         box-sizing: border-box;

         max-width: 100%;

         height: 120px;

         overflow: hidden;

         position: relative;

         vertical-align: middle;       

     }*/

    @media (max-width: 767px)

</style>







<div class="tm-block ">

    <div class="tm-middle uk-grid" data-uk-grid-match data-uk-grid-margin>



        <div class="tm-main uk-width-medium-1-1">





            <main class="tm-content">







                <div class="yoo-zoo news-uikit news-uikit-news">

                    <div class="sfondo-grigio">

                        <div class="uk-container uk-container-center">







                            <div class="contorno-titolo">

                                <h1 class="bar_news"><?= $_SESSION["products"] ?></h1>







                            </div>





                            <div class="uk-grid data-uk-grid-margin" 

                                 style="margin: -60px 0px 50px 2px;

                                 padding: 100px 0px 10px 0;

                                 padding-left: 5px;

                                 list-style: none;">

                                 <?php

                                 $util = new Utility();



                                 $social = new social();

                                 $controller = new newsController();









                                 $_data = $controller->dataTable_type("P");



                                 $util->setLimitPaging(14);

                                 $limitPaging = $util->getLimitPaging();



                                 $resultCount = $util->countObject($_data);

                                 // for test 

                                 // $resultCount = 50;

                                 $couter_border = 0;

                                 $rel = $resultCount / $limitPaging;

                                 if (($rel - floor($rel)) != 0) {

                                     $rel = floor($rel) + 1;

                                 } else {

                                     $rel = floor($rel);

                                 }

                                 if ($_GET["page"] == NULL || $_GET["page"] == 'null' || $_GET["page"] == '') {



                                     $page = 1;

                                 } else {

                                     $page = $_GET["page"];

                                 }



                                 //$couter_border = 0;

                                 foreach ($_data as $key => $value) {

                                     $couter_border++;

                                     if ($util->ContinueObject($page, $key + 1)) {

                                         $couter_border = 0;

                                         continue;

                                     }

                                     ?>



                                    <div class="uk-width-medium-1-2">



                                        <?php if ($couter_border != 1 & $couter_border != 2) { ?>

                                            <div class="border_"></div>

                                        <?php } ?>

                                        <article class="uk-article">





                                            <h1 class="uk-article-title">

                                                <a title="<?= $_data[$key]['s_subject_' . $_SESSION["main_lan"]] ?>" href="news_detail.php?s_id=<?= $_data[$key]['s_seq'] ?>">

                                                    <?= $_data[$key]['s_subject_' . $_SESSION["main_lan"]] ?></a> </h1>



                                            <p class="uk-article-lead">

                                                <?= $_data[$key]['d_date'] ?></p>





                                            <div class="uk-align-medium-left">

                                                <a href="news_detail.php?s_id=<?= $_data[$key]['s_seq'] ?>" title="<?= $_data[$key]['s_subject_' . $_SESSION["main_lan"]] ?>">

                                                    <div class="main">



                                                        <img Style="margin-top: 0% !important; height: inherit !important;" class="absolute" src="./manage/bio/controller/file/news/<?= $_data[$key]['s_path_img'] ?>" alt="" width="150" height="120" title="<?= $_data[$key]['s_subject_' . $_SESSION["main_lan"]] ?>" />



                                                    </div>

                                                <ul class="ul-readmore">



                                                    <li class="li-linkitem">

                                                        <a href="news_detail.php?s_id=<?= $_data[$key]['s_seq'] ?>"><?= $_SESSION["_readmore"] ?> >></a>

                                                    </li>

                                                </ul>

                                                </a> </div>



                                            <?= $_data[$key]['s_subject_' . $_SESSION["main_lan"]] ?>

                                            <div class="yoo-zoo socialbuttons clearfix">



                                                <?php

                                                $link = "http://www.biotecitalia-thailand.com/news_detail.php?s_id=" . $_data[$key]['s_seq'] . "";

                                                echo $social->twitter_Share_button($link, $_data[$key]['s_subject_' . $_SESSION["main_lan"]]);

                                                echo $social->googlePlus_Share_button($link);

                                                echo $social->facebook_like_button($link, FALSE);

                                                ?>

                                            </div> 



   



                                        </article>



                                    </div>

                                <?php } ?>





                            </div>





                            <ul class="uk-pagination">



                                <?php

                                if ($_data != NULL) {

                                    // << FIRST

                                    $first = ($page == 1 ? TRUE : FALSE);

                                    $last = FALSE;

                                    if (!$first) {

                                        $minus = $page - 1;

                                        echo "<li>";

                                        echo " <a href='news.php?page=1'>First</a>";

                                        echo "</li>";

                                        echo "<li>";

                                        echo "<a href='news.php?page=$minus'><<</a>";

                                        echo "</li>";

                                    }



                                    //for start

                                    for ($i = 1; $i <= $rel; $i++) {

                                        $active = ($page == $i ? "uk-active" : '');

                                        if ($rel != 1) {

                                            

                                        }



                                        if ($active == '') {

                                            echo "<li>";

                                            echo "<a href='news.php?page=$i'>$i</a>";

                                            echo "</li>";

                                        } else {

                                            echo "<li class='$active '>";

                                            echo " <span>$i</span>";

                                            echo "</li>";

                                        }

                                        if ($rel == $page) {

                                            $last = TRUE;

                                        }

                                    }

                                    //for end

                                    //

                                 //

                                //  >>  LAST

                                    if (!$last) {

                                        $plus = $page + 1;

                                        echo "<li>";

                                        echo "<a href='news.php?page=$plus'>>></a>";

                                        echo "</li>";

                                        echo "<li>";

                                        echo " <a href='news.php?page=$rel'>Last</a>";

                                        echo "</li>";

                                    }

                                }

                                ?>



                            </ul>



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



