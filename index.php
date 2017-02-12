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
                                    <?=$_SESSION["_enter"]?> &raquo;
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






<div class="sfondo-bianco">
    <div class="uk-container uk-container-center">
        <div class="tm-block ">
            <section class="tm-top-b uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                <div class="uk-width-1-1 uk-width-medium-1-3"><div class="uk-panel uk-panel-box home-top-b newsletter"><h3 class="uk-panel-title"><i class=""></i> Newsletter</h3>
                        <img alt="newsletter" src="images/banner/newsletter.jpg" height="175" width="262" /><a href="newsletter.php">Subscribe to our newsletter!</a> <div class="description">Keep in touch with Biotec Italia and receive news and updates.<br><br> </div><span class="element-itemlink"><a href="newsletter.php">Subscribe &raquo;</a></span></div></div>

                <div class="uk-width-1-1 uk-width-medium-1-3"><div class="uk-panel uk-panel-box home-top-b"><h3 class="uk-panel-title"><i class=""></i> Focus On</h3>

                        <ul class="zoo-item-list zoo-list focus-uikit">
                            <li>
                                <div class="layout-default ">

                                    <div class="media media-left"> 
                                        <a href=#" target="_blank">
                                            <!--<a href="http://www.cryoliposculpt.com/" target="_blank">-->
                                            <img src="images/banner/focus-on.jpg" alt="Xlase Plus" width="300" height="200" />
                                        </a> </div>

                                    <p class="title"> <a href="http://www.cryoliposculpt.com/" title="Fusiomed Cryoliposculpt"   >Fusiomed Cryoliposculpt</a> </p>



                                    <div class="description"><div class="element element-textarea element-textareapro first last">
                                            <p><strong>Cryoliposculpt</strong> is a non-invasive <strong>fat removal procedure</strong> that works on a process called “selective cryolysis”.</p></div></div>


                                    <p class="links"><span class="element element-link element-linkpro first last">
                                            <a href="#" title="Read more" target="_blank"  >Read more</a>
                                            <!--                                                     <a href="http://www.cryoliposculpt.com/" title="Read more" target="_blank"  >Read more</a>-->
                                        </span>

                                    </p>

                                </div></li>
                        </ul>

                    </div></div>

                <div class="uk-width-1-1 uk-width-medium-1-3"><div class="uk-panel uk-panel-box home-top-b"><h3 class="uk-panel-title"><i class=""></i> News</h3>

                        <ul class="zoo-item-list zoo-list news-uikit">
                            <li>
                                <div class="layout-default ">

                                    <div class="media media-left"> 
                                        <a href="#" title="Renlive Presents Liposnell">
                                            <!--                                                <a href="news/item/liposnell-treatment.html" title="Renlive Presents Liposnell">-->
                                            <img src="news/item/liposnell-covercover.jpg" 
                                                 alt="Renlive Presents Liposnell" width="300" height="200" title="Renlive Presents Liposnell" />
                                        </a> 
                                    </div>

                                    <p class="title"> <a title="Renlive Presents Liposnell" href="news/item/liposnell-treatment.html">Renlive Presents Liposnell</a> 
                                    <article class="item">Monday, 02 May 2016</article> </p>



                                    <div class="description"><div class="element element-text element-textpro first last">
                                            Remove 1 size in less than a month with LipoSnell</div></div>


                                    <p class="links">
                                        <span class="element element-itemlink first last">
                                            <a href="#">Read more</a>
                                            <!--                                                     <a href="news/item/liposnell-treatment.html">Read more</a>-->
                                        </span>

                                    </p>

                                </div></li>
                        </ul>

                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<?php
include './content/footer.php';
?>