<?php
@session_start();
error_reporting(0);
include '../../../manage/bio/common/FunctionCheckActive.php';
ACTIVEPAGE_SHOW(4);
$fixheader = "renlive";
include '../../header_cosme.php';
//include './content/slide.php';
//slidePage("press");
//อันนี้ที่ใช้ controller ของ admin เพราะมันสามารถใช้งานร่วมกันได้
include '../../../service/cosmeService.php';
include '../../../controller/cosmeController.php';

if ($_GET['id'] == '') {
    $_GET['id'] = 1;
}
$_GET['id'] = 4;



$util = new Utility();
$controller = new cosmeController();
$_data_type = $controller->dataTable_type_d($_GET['id']);
$_data = $controller->dataTable_item($_GET['id']);
$util->setLimitPaging(8);
$limitPaging = $util->getLimitPaging();
$resultCount_type = $util->countObject($_data_type);
$resultCount = $util->countObject($_data);
?>



<div class="uk-container uk-container-center posizione-fissa">


</div>


<div class="tm-block ">
    <div class="tm-middle uk-grid" data-uk-grid-match data-uk-grid-margin>

        <div class="tm-main uk-width-medium-1-1">


            <main class="tm-content">



                <div class="yoo-zoo cosmeceutici-uikit cosmeceutici-uikit-flexi">


                    <div class="uk-container uk-container-center">


                        <div class="uk-clearfix">
                            <?php
                            foreach ($_data_type as $key => $value) {
                                ?>                                    								

                                <div class="immagine-categoria">
                                    <img class="uk-align-medium-left" src="../../../manage/bio/uploads/cosme_type/<?= $_data_type[$key]['main_img']; ?>" title="<?= $_SESSION["flexi"] ?>" alt="<?= $_SESSION["flexi"] ?>" width="600" height="400"/>
                                </div>
                                <div class="immagine-logo-categoria"><img class="uk-align-medium-left" src="../../../manage/bio/uploads/cosme_type/<?= $_data_type[$key]['main_logo']; ?>" title="<?= $_SESSION["flexi"] ?>" alt="<?= $_SESSION["flexi"] ?>" width="600" height="400"/></div>
                            <?php } ?>				
                        </div>


                        <div class="contorno-titolo"><h1 class="uk-text-left"><?= $_SESSION["flexi"] ?></h1></div>






                    </div>
                </div>

                <div class="yoo-zoo cosmeceutici-uikit cosmeceutici-uikit-flexi seconda-categoria">
                    <div class="sfondo-grigio titolo-basso">
                        <div class="uk-container uk-container-center spazio-alto">



                            <div class="uk-grid" data-uk-grid-margin data-uk-grid-match="{target:'.uk-panel'}">
                                <?php

                                function truncate($string, $length = 100, $append = "&hellip;") {
                                    $string = trim($string);

                                    if (strlen($string) > $length) {
                                        $string = wordwrap($string, $length);
                                        $string = explode("\n", $string, 2);
                                        $string = $string[0] . $append;
                                    }

                                    return $string;
                                }

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
                                    $abc = "a";
                                    ?>
                                    <div class="uk-width-medium-1-2">
                                        <div class="uk-panel uk-panel-box">

                                            <div class="uk-thumbnail uk-align-medium-left">





                                                <p class="logo">
                                                    <a href="../../../manage/bio/uploads/cosme_item/<?= $_data[$key]['img']; ?>" data-lightbox="group:a2330663-5d5e-4b36-a8cd-ad55f2ac27bb-580af831f0edd<?= $_data[$key]['id']; ?>;" title="<?= $_data[$key]['title_' . $_SESSION["main_lan"]]; ?>" >
                                                        <img src="../../../manage/bio/uploads/cosme_item/<?= $_data[$key]['img']; ?>" width="170" height="170" alt="<?= $_data[$key]['img']; ?>" />
                                                    </a>
                                                </p>	
                                            </div>

                                            <h3 class="uk-margin-remove">
                                                <a title="<?= $_data[$key]['title_' . $_SESSION["main_lan"]]; ?>" href="item/?id=<?= $_data[$key]['id']; ?>"><?= $_data[$key]['title_' . $_SESSION["main_lan"]]; ?></a> </h3>

                                            <p>
                                                <?= truncate($_data[$key]['detail_' . $_SESSION["main_lan"]], 100); ?> <a href="item/?id=<?= $_data[$key]['id']; ?>"><?= $_SESSION["btn_show_detail"] ?></a> 
                                            </p>


                                        </div>
                                    </div>                                    


                                    <?php
                                }
                                ?>


                            </div>


                            <ul class="uk-pagination">

                                <?php
// << FIRST
                                if ($_data != NULL) {
                                    $first = ($page == 1 ? TRUE : FALSE);
                                    $last = FALSE;
                                    if (!$first) {
                                        $minus = $page - 1;
                                        echo "<li>";
                                        echo " <a href='?page=1'>First</a>";
                                        echo "</li>";
                                        echo "<li>";
                                        echo "<a href='?page=$minus'><<</a>";
                                        echo "</li>";
                                    }

                                    //for start
                                    for ($i = 1; $i <= $rel; $i++) {
                                        $active = ($page == $i ? "uk-active" : '');
                                        if ($rel != 1) {
                                            
                                        }

                                        if ($active == '') {
                                            echo "<li>";
                                            echo "<a href='?page=$i'>$i</a>";
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
                                        echo "<a href='?page=$plus'>>></a>";
                                        echo "</li>";
                                        echo "<li>";
                                        echo " <a href='?page=$rel'>Last</a>";
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



<link rel="stylesheet" href="../../../bower_components/lightbox2/dist/css/lightbox.min.css">
<script src="../../../bower_components/lightbox2/dist/js/lightbox-plus-jquery.min.js"></script>
<script src="../../../media/widgetkit/widgets/spotlight/js/spotlight.js"></script>
<script>
    jQuery(function ($) {
        $('[data-spotlight]').spotlight({
            "duration": 300
        });
    });
</script>
<?php
include '../../footer_cosme.php';
?>

