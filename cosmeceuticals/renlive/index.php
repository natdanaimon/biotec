<?php
@session_start();
error_reporting(0);
include '../../manage/bio/common/FunctionCheckActive.php';
ACTIVEPAGE_SHOW(4);
$fixheader = "renlive";
include '../header_renlive.php';
include '../../service/cosmeService.php';
include '../../controller/cosmeController.php';

if ($_GET['id'] == '') {
    $_GET['id'] = 1;
}
$_GET['id'] = 1;
?>





<script src="../../templates/warp/vendor/uikit/js/uikit.min.js"></script>
<link id="data-uikit-theme" rel="stylesheet" href="../../templates/warp/vendor/uikit/css/uikit.docs.min.css">
<script src="../../templates/warp/vendor/uikit/js/uikit.min.js"></script>
<script src="../../templates/warp/vendor/uikit/js/components/slideshow.js"></script>
<script src="../../templates/warp/vendor/uikit/js/components/slideshow-fx.js"></script>

<?php
include '../../controller/slideController.php';
include '../../service/slideService.php';

$utilSlide = new Utility();
$slide = new slideController();
$_data = $slide->dataTable("renlive");
$fxhight_div = ($_data != NULL ? 40 : 150);
?>



<div style="height:<?=$fxhight_div?>px">

</div>
<?php
if ($_data != NULL) {
    $_SlideItem = $utilSlide->countObject($_data);
    ?>
    <div id="linea-banner">

        <div class="biotec-wrapper" style="height:540px">
            <div class="uk-container uk-container-center">


                <div class="uk-slidenav-position" data-uk-slideshow>
                    <ul class="uk-slideshow" data-uk-slideshow="{autoplay:true}">
                        <?php foreach ($_data as $key => $value) { ?>
                            <li><img src="../../images/slideshow/cosme/<?= $_data[$key]['s_img'] ?>" width="1400" height="451" alt="renlive slide"></li>
                        <?php } ?>
                       
                    </ul>

                    <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous" style="color: rgba(255,255,255,0.4)">
                        <img src="../../images/slideshow/previous.png">
                    </a>
                    <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next" style="color: rgba(255,255,255,0.4)">
                        <img src="../../images/slideshow/next.png">
                    </a>

                </div>
            </div>
        </div>

    </div>

<?php } ?>


<div class="tm-block ">
    <div class="tm-middle uk-grid" data-uk-grid-match data-uk-grid-margin>

        <div class="tm-main uk-width-medium-1-1">





            <main class="tm-content">



                <div class="yoo-zoo cosmeceutici-uikit cosmeceutici-uikit-renlive">


                    <div class="uk-container uk-container-center">




                    </div>
                </div>

                <div class="yoo-zoo cosmeceutici-uikit cosmeceutici-uikit-renlive seconda-categoria">
                    <div class="sfondo-grigio titolo-basso">
                        <div class="uk-container uk-container-center">
                            <div class="contorno-titolo">
                                <h1 class="uk-text-left">
                                    <?= $_SESSION["renlive"] ?>
                                </h1>
                            </div>
                            <div class="uk-grid uk-grid-divider" data-uk-grid-margin data-uk-grid-match>
                                <?php
                                $util = new Utility();
                                $controller = new cosmeController();
                                $_data = $controller->dataTable_type($_GET['id']);
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
                                if ($_GET["page"] == NULL || $_GET["page"] == 'null' || $_GET["page"] == '') {
                                    $page = 1;
                                } else {
                                    $page = $_GET["page"];
                                }


                                foreach ($_data as $key => $value) {
                                    if ($util->ContinueObject($page, $key + 1)) {
                                        continue;
                                    }
                                    ?>
                                    <div class="uk-width-medium-1-3">


                                        <div class="uk-panel-box">



                                            <div class="uk-margin">
                                                <a href="<?= $_data[$key]['cosme_folder']; ?>" title="<?= $_data[$key]['cosme_' . $_SESSION["main_lan"]]; ?>">
                                                    <img src="../../manage/bio/uploads/cosme_type/<?= $_data[$key]['main_logo']; ?>" title="<?= $_data[$key]['cosme_' . $_SESSION["main_lan"]]; ?>" alt="<?= $_data[$key]['cosme_' . $_SESSION["main_lan"]]; ?>" width="480" height="113"/>
                                                </a>
                                            </div>

                                            <div class="uk-margin">
                                                <a href="<?= $_data[$key]['cosme_folder']; ?>" title="<?= $_data[$key]['cosme_' . $_SESSION["main_lan"]]; ?>">
                                                    <img src="../../manage/bio/uploads/cosme_type/<?= $_data[$key]['main_img']; ?>" title="<?= $_data[$key]['cosme_' . $_SESSION["main_lan"]]; ?>" alt="<?= $_data[$key]['cosme_' . $_SESSION["main_lan"]]; ?>" width="1152" height="768"/>
                                                </a>
                                            </div>

                                            <div class="element-itemlink"><a href="<?= $_data[$key]['cosme_folder']; ?>"><?= $_SESSION["btn_show_prd"] ?></a></div>

                                        </div>

                                    </div>

                                    <?php
                                }
                                ?>


                            </div>

                        </div>
                    </div>

                </div>
            </main>

        </div>


    </div>	
</div>


<?php
include '../footer_renlive.php';
?>

