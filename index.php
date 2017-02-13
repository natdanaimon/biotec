<?php
@session_start();
include './manage/bio/common/FunctionCheckActive.php';
include './controller/contentController.php';
include './service/contentService.php';
ACTIVEPAGE_SHOW(1);
$fixheader = "fix";
include './content/header.php';
include './content/slide.php';
slidePage("home");
?>


<style>
    .home-top-a{
        position:relative;
    }
    .home-top-a a{
        text-align:right;
        padding-right:10px;
        display:block;
        background:#ccb26f;
        color:#fff;
        position:relative;
        top:0px ;
    }
    .home-top-a a:hover{color:#fff;text-decoration:none;background:#ac955a;}

    .content-img{
        height: 180px;
        width: 180px
    }

    @media

</style>

<!-- top centent-->
<?php
$content = new contentController();
$_data = $content->dataTable_top();
$util = new Utility();
$col_box = $util->countObject($_data);
if ($_data != NULL) {
    ?>
    <div class="sfondo-grigio">
        <div class="uk-container uk-container-center">
            <div class="tm-block ">
                <section class="tm-top-a uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                    <?php
                    foreach ($_data as $key => $value) {
                        ?>


                        <div class="uk-width-1-1 uk-width-medium-1-<?= $col_box ?>">
                            <div class="uk-panel uk-panel-box home-top-a">
                                <div style="height: 150px">
                                    <h3 class="uk-panel-title"><i class=""></i> <?= $_data[$key]['s_topic_' . $_SESSION["main_lan"]] ?> </h3>
                                    <?= $_data[$key]['s_detail_' . $_SESSION["main_lan"]] ?> <br/>
                                </div>

                                <div align="center" Style="background-color: #ffffff">
                                    <img class="content-img" src="images/top_content/<?= $_data[$key]['s_img'] ?>"  align="center"  />
                                </div>
                                <a href="<?= $_data[$key]['s_url'] ?>">
                                    <?= $_SESSION["_enter"] ?> &raquo;
                                </a>

                            </div>
                        </div>
                    <?php } ?>



                </section>
            </div>
        </div>
    </div>
<?php } ?>
<!-- top centent-->





<!-- bottom centent-->
<?php
$__data = $content->dataTable_bottom();
$col__box = $util->countObject($__data);
if ($__data != NULL) {
    ?>
    <div class="sfondo-bianco">
        <div class="uk-container uk-container-center">
            <div class="tm-block ">
                <section class="tm-top-b uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                    <?php
                    foreach ($__data as $key => $value) {
                        ?>
                        <div class="uk-width-1-1 uk-width-medium-1-<?= $col__box ?>">
                            <div class="uk-panel uk-panel-box home-top-b">
                                <h3 class="uk-panel-title">
                                    <i class=""></i><?= $__data[$key]['s_topic_' . $_SESSION["main_lan"]] ?>
                                </h3>

                                <ul class="zoo-item-list zoo-list news-uikit">
                                    <li>

                                        <div style="height: 150px" >
                                            <div align="center">
                                                <a href="<?= $__data[$key]['s_url'] ?>" title="<?= $__data[$key]['s_topic_' . $_SESSION["main_lan"]] ?>">
                                                    <div class="media media-left"> 
                                                        <img src="images/bottom_content/<?= $__data[$key]['s_img'] ?>"  style="width: 300;height:175; "
                                                             alt="<?= $__data[$key]['s_topic_' . $_SESSION["main_lan"]] ?>" width="300" height="300" 
                                                             title="<?= $__data[$key]['s_topic_' . $_SESSION["main_lan"]] ?>" />
                                                    </div>
                                                </a> 
                                            </div>
                                        </div>
                                        <br/>
                                        <div style="height: 140px">
                                            <?= $__data[$key]['s_detail_' . $_SESSION["main_lan"]] ?>
                                        </div>
                                        <p class="links">
                                            <span class="element element-itemlink first last" style="width: 95%">
                                                <a href="<?= $__data[$key]['s_url'] ?>"> <?= ($__data[$key]['s_topic_en']=="Newsletter"?$_SESSION["_subscript"]:$_SESSION["_readmore"]) ?></a>
                                            </span>

                                        </p>


                                    </li>
                                </ul>

                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </section>
            </div>
        </div>
    </div>
<?php } ?>
<!-- bottom centent-->

<?php
include './content/footer.php';
?>