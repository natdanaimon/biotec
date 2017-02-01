<?php
@session_start();
error_reporting(0);
include '../../../manage/bio/common/FunctionCheckActive.php';
ACTIVEPAGE_SHOW(3);
$fixheader = "devices";
include '../../header_item.php';
//include './content/slide.php';
//slidePage("press");
//อันนี้ที่ใช้ controller ของ admin เพราะมันสามารถใช้งานร่วมกันได้
include '../../../service/devicesService.php';
include '../../../controller/devicesController.php';

if ($_GET['id'] == '') {
    $_GET['id'] = 1;
}
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


</script>
 



<div class="tm-block ">
    <div class="tm-middle uk-grid" data-uk-grid-match data-uk-grid-margin>

        <div class="tm-main uk-width-medium-1-1">



            <main class="tm-content">

                <?php
                $controller = new devicesController();
                $_data = $controller->dataTable_get($_GET['id']);
                ?>						

                <div class="yoo-zoo macchine-uikit macchine-uikit-coaxmed">




                    <div class="sfondo-grigio">
                        <div class="uk-container uk-container-center">
                            <div class="uk-align-medium-left">

                                <div id="gallery-392df250-8b31-4ef9-a844-bfc6fe765117-580af504bffdb" class="yoo-wk wk-slideshow wk-slideshow-default" data-widgetkit="slideshow" data-options='{"autoplay":1,"order":"default","interval":5000,"animated":"fade","duration":1000,"index":0,"navigation":0,"buttons":1,"slices":20,"zl_captions":0,"_custom_caption":"","caption_animation_duration":500,"width":"530","height":"336","avoid_cropping":0,"lightbox_caption":1,"_lightbox_custom_title":""}'>
                                    <div>
                                        <ul class="slides">



                                            <li>
                                            <div class="gallery-item">
                                            <img src="../../../manage/bio/uploads/devices_item/<?= $_data[0]['s_devices_logo']; ?>" width="530" height="336" alt="<?= $_data[0]['s_devices_' . $_SESSION["main_lan"]]; ?>" /></div>
                                            </li>


 


                                        </ul>
                                        <div class="next"></div><div class="prev"></div>			</div>
                                </div>

                            </div>

                            <h1 class="title"> <img src="../../../manage/bio/uploads/devices_item/<?= $_data[0]['s_devices_icon']; ?>" alt="Coaxmed" width="227" height="50" /> 
                                <p class="subtitle"><?= $_data[0]['s_devices_' . $_SESSION["main_lan"]]; ?> </h1>

                            <!-- Main Detail -->
                            <div class="breve-descrizione">
                                <?= $_data[0]['s_device_detail_' . $_SESSION["main_lan"]]; ?>

                            </div> 
                            <?php
                            if ($_data[0]['s_devices_video'] != '') {
                                ?>					 
                                <div class="video">
                                    <p><a class="uk-icon-film" href="<?=$_data[0]['s_devices_video'];?>" target="_blank" data-lightbox="width:1000;height:750;transitionIn:fade;transitionOut:fade;titlePosition:float">Watch the Video</a></p>
                                </div>
                            <?php } ?> 

                            <div class="chiedi-info uk-icon-phone"><a href="contacts.php" target="_blank" >For further information, please contact us</a></div> 
                            <div class="yoo-zoo socialbuttons clearfix">
                                <div>
                                    <a href="http://twitter.com/share" target="_blank" class="twitter-share-button" data-url="<?= $_SERVER['REQUEST_URI']; ?>" data-count="none" data-lang="en_GB">Tweet</a>
                                </div>
                                <div>
                                <div class="g-plusone" data-href="<?= $_SERVER['REQUEST_URI']; ?>" data-size="medium" data-annotation="nones" data-lang="en_GB">
                                	
                                </div>
                                </div>
                                <div>
                                <div class="fb-like" data-href="<?= $_SERVER['REQUEST_URI']; ?>" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false" data-action="like" data-colorscheme="light">
                                	
                                </div>
                                </div>
                            </div> 			
                            </div>

                    </div>

                    <div class="uk-container uk-container-center">

                        <ul class="uk-tab" data-uk-tab="{connect:'#macchine-item-tab'}">
                            <li class="uk-active">
                                <h3 class="tecnologia uk-icon-cogs">Technology</h3>
                            </li>
                            <li>
                                <h3 class="applicazioni uk-icon-user">Procedures</h3>
                            </li>
                            <li>
                                <h3 class="dati-tecnici uk-icon-list-ul">Technical Data</h3>
                            </li>
                            <li>
                                <h3 class="pubblicazioni uk-icon-file">Pubblications</h3>
                            </li>
                        </ul>
                        <ul id="macchine-item-tab" class="uk-switcher uk-margin">
                            <li class="uk-active">
                                <?= $_data[0]['s_technology_' . $_SESSION["main_lan"]]; ?>
                            </li>
                            <li>
                                <?= $_data[0]['s_procedures_' . $_SESSION["main_lan"]]; ?>
                            </li>
                            <li>
                                <?= $_data[0]['s_techmocal_' . $_SESSION["main_lan"]]; ?>
                            </li>
                            <li>
                                <?= $_data[0]['s_pubblications_' . $_SESSION["main_lan"]]; ?>
                            </li>

                        </ul>
                    </div>

                    <div>

 

                </div>
                    <div class="sfondo-grigio">
                     
                    
                        <div class="uk-container uk-container-center">

                            <div class="prima-dopo">
                                <h2 class="uk-icon-camera">Before / After</h2>



                               <?php if($_data[0]['01_before'] != ''){  ?>
                                <a href="../../../manage/bio/uploads/devices_item/<?= $_data[0]['01_before']; ?>" class="example-image-link"  data-lightbox="example-set" title="Before" data-spotlight="on">
                                    <img class="example-image" src="../../../manage/bio/uploads/devices_item/<?= $_data[0]['01_before']; ?>" width="148" height="148" alt="<?= $_data[0]['s_devices_' . $_SESSION["main_lan"]]; ?>" />
                                </a>
                                <?php } ?>
                                <?php if($_data[0]['01_after'] != ''){  ?>
                                <a href="../../../manage/bio/uploads/devices_item/<?= $_data[0]['01_after']; ?>" class="example-image-link"  data-lightbox="example-set" title="After" data-spotlight="on">
                                    <img class="example-image" src="../../../manage/bio/uploads/devices_item/<?= $_data[0]['01_after']; ?>" width="148" height="148" alt="<?= $_data[0]['s_devices_' . $_SESSION["main_lan"]]; ?>" />
                                </a>
                                <?php } ?>
                                <?php if($_data[0]['02_before'] != ''){  ?>
                                <a href="../../../manage/bio/uploads/devices_item/<?= $_data[0]['02_before']; ?>" class="example-image-link"  data-lightbox="example-set" title="Before" data-spotlight="on">
                                    <img class="example-image" src="../../../manage/bio/uploads/devices_item/<?= $_data[0]['02_before']; ?>" width="148" height="148" alt="<?= $_data[0]['s_devices_' . $_SESSION["main_lan"]]; ?>" />
                                </a>
                                <?php } ?> 
                                <?php if($_data[0]['02_after'] != ''){  ?>
                                <a href="../../../manage/bio/uploads/devices_item/<?= $_data[0]['02_after']; ?>" class="example-image-link"  data-lightbox="example-set" title="After" data-spotlight="on">
                                    <img class="example-image" src="../../../manage/bio/uploads/devices_item/<?= $_data[0]['02_after']; ?>" width="148" height="148" alt="<?= $_data[0]['s_devices_' . $_SESSION["main_lan"]]; ?>" />
                                </a>
                                <?php } ?> 
                                <?php if($_data[0]['03_before'] != ''){  ?>
                                <a href="../../../manage/bio/uploads/devices_item/<?= $_data[0]['03_before']; ?>" class="example-image-link"  data-lightbox="example-set" title="Before" data-spotlight="on">
                                    <img class="example-image" src="../../../manage/bio/uploads/devices_item/<?= $_data[0]['03_before']; ?>" width="148" height="148" alt="<?= $_data[0]['s_devices_' . $_SESSION["main_lan"]]; ?>" />
                                </a>
                                <?php } ?> 
                                <?php if($_data[0]['03_after'] != ''){  ?>
                                <a href="../../../manage/bio/uploads/devices_item/<?= $_data[0]['03_after']; ?>" class="example-image-link"  data-lightbox="example-set" title="After" data-spotlight="on">
                                    <img class="example-image" src="../../../manage/bio/uploads/devices_item/<?= $_data[0]['03_after']; ?>" width="148" height="148" alt="<?= $_data[0]['s_devices_' . $_SESSION["main_lan"]]; ?>" />
                                </a>
                                <?php } ?> 
                                
 
  <link rel="stylesheet" href="../../../bower_components/lightbox2/dist/css/lightbox.min.css">
 

 
 

  <script src="../../../bower_components/lightbox2/dist/js/lightbox-plus-jquery.min.js"></script>

 
   
                                 
                            </div>
                        </div>

                           

                    </div>


                </div>
            </main>



        </div>


    </div>	
</div>
<?php
include '../../footer_item.php';
?>

