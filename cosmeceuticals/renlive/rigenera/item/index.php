<?php
@session_start();
error_reporting(0);
include '../../../../manage/bio/common/FunctionCheckActive.php';
ACTIVEPAGE_SHOW(4);
$fixheader = "renlive";
include '../../../header_item.php';
//include './content/slide.php';
//slidePage("press");
//อันนี้ที่ใช้ controller ของ admin เพราะมันสามารถใช้งานร่วมกันได้
include '../../../../service/cosmeService.php';
include '../../../../controller/cosmeController.php';

if ($_GET['id'] == '') {
    $_GET['id'] = 1;
}




$util = new Utility();
$controller = new cosmeController();
$_data = $controller->dataTable_item_get($_GET['id']);
$limitPaging = $util->getLimitPaging();
$resultCount = $util->countObject($_data);
?>



<div class="uk-container uk-container-center posizione-fissa">


</div>
<script>
    function ck() {
        //alert(1);

        var warp = document.getElementById("lightbox-wrap");
        var att = document.createAttribute("id");
        att.value = 'lightbox-wrap2';
        warp.setAttributeNode(att);
    }

//    function setAttr() {
//        var warp = document.getElementById("lightbox-wrap");
//        var att = document.createAttribute("onclick");
//        att.value = "abc();";
//        warp.setAttributeNode(att);
//    }
//    document.getElementsByTagName("lightbox-wrap")[0].removeAttribute("style"); 

//    document.getElementById("lightbox-right").style.display.none;
//            .{
//        display: none;
//    }
//    .lightbox-right{
//        display: none;
//    }
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
    }
</style>


<div class="tm-block ">
    <div class="tm-middle uk-grid" data-uk-grid-match data-uk-grid-margin>

        <div class="tm-main uk-width-medium-1-1">


            <main class="tm-content">
                <?php
                foreach ($_data as $key => $value) {
                    ?>


                    <div class="yoo-zoo cosmeceutici-uikit cosmeceutici-uikit-body-hydroskin">


                        <div class="sfondo-grigio">

                            <div class="uk-container uk-container-center">




                                <div class="uk-align-medium-left">
                                    <img src="../../../../manage/bio/uploads/cosme_item/<?= $_data[$key]['img']; ?>" alt="<?= $_data[$key]['title_' . $_SESSION["main_lan"]]; ?>" width="400" height="400" /> </div>

                                <h1> <?= $_data[$key]['title_' . $_SESSION["main_lan"]]; ?> </h1>


                                <div class="sottotitolo"><?= $_data[$key]['topic_' . $_SESSION["main_lan"]]; ?></div> 
                                <div class="descrizione">
                                    <?= $_data[$key]['detail_' . $_SESSION["main_lan"]]; ?>
                                </div> 
                                <div class="yoo-zoo socialbuttons clearfix">
                                    <?php
                                    include '../../../../manage/bio/common/social.php';
                                    $social = new social();
                                    $url_social = "http://www.biotecitalia-thailand.com" . "$_SERVER[REQUEST_URI]";
                                    echo $social->twitter_Share_button($url_social, $_data[$key]['title_' . $_SESSION["main_lan"]]);
                                    echo $social->googlePlus_Share_button($url_social);
                                    echo $social->facebook_like_button($url_social, FALSE);
                                    ?>

                                </div> 


                            </div>
                        </div>




                    </div>
                    <?php
                    $id_type = $_data[$key]['cosme_type'];
                }
                ?>					
            </main>



        </div>


    </div>	
</div>



<div class="uk-container uk-container-center">


    <div class="tm-block ">
        <section class="tm-bottom-b uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
            <div class="uk-width-1-1">
                <div class="uk-panel uk-panel-box slideset-cosmeceutici">

                    <div class="uk-margin" data-uk-slideset="{animation: 'slide-horizontal', duration: 100,small: 1, medium: 5 , autoplay:true ,autoplayInterval:3000}">
                        <div class="uk-slidenav-position uk-margin">
                            <ul class="uk-slideset uk-grid uk-flex-center">
                                <?php
                                $_data_type = $controller->dataTable_item_type($id_type);
                                foreach ($_data_type as $key => $value) {
                                    ?>	
                                    <li Style="width: 190px;height: 200px;">
                                        <div >
                                            <a  href="?id=<?= $_data_type[$key]['id']; ?>" title="<?= $_data_type[$key]['title_' . $_SESSION["main_lan"]]; ?>">
                                                <img Style="width: 190px;height: 190px;" src="../../../../manage/bio/uploads/cosme_item/<?= $_data_type[$key]['img']; ?>" 
                                                     alt="<?= $_data_type[$key]['title_' . $_SESSION["main_lan"]]; ?>" 
                                                     title="<?= $_data_type[$key]['title_' . $_SESSION["main_lan"]]; ?>" />
                                            </a>
                                        </div>
                                        <div align="center">
                                            <a title="<?= $_data_type[$key]['title_' . $_SESSION["main_lan"]]; ?>" 
                                               href="?id=<?= $_data_type[$key]['id']; ?>"><?= $_data_type[$key]['title_' . $_SESSION["main_lan"]]; ?>
                                            </a>
                                        </div>
                                    </li>
                                <?php } ?>	
                            </ul>
                            <a href="#" class="uk-slidenav uk-slidenav-previous" data-uk-slideset-item="previous">
                                <img src="../../../../images/slideshow/previous.png">
                            </a>
                            <a href="#" class="uk-slidenav uk-slidenav-next" data-uk-slideset-item="next">
                                <img src="../../../../images/slideshow/next.png">
                            </a>
                        </div>
                        <ul class="uk-slideset-nav uk-dotnav uk-flex-center"></ul>
                    </div>


                </div>
            </div>
        </section>
    </div>

</div>






<?php
include '../../../footer_item.php';
?>

