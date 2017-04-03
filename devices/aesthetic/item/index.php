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



                                <div class="uk-panel uk-panel-box slideset-cosmeceutici">

                                    <div class="uk-margin" data-uk-slideset="{animation: 'fade', duration: 250,small: 1, medium: 1 , autoplay:false ,autoplayInterval:3000}">
                                        <div class="uk-slidenav-position uk-margin">
                                            <ul class="uk-slideset uk-grid uk-flex-center">
                                                <?php
                                                $i = 0;
                                                //foreach ($_data as $key => $value) {
                                                    ?>
<?php
$logo = "../../../manage/bio/uploads/devices_item/".$_data[$i]['s_devices_logo'];

if (file_exists($logo) and $_data[$i]['s_devices_logo'] != '') {
?>
<li>
                                                        <img  style="width: 530px; height: 390px;" src="<?=$logo;?>" width="450" height="336" alt="<?= $_data[$i]['s_devices_' . $_SESSION["main_lan"]]; ?>" />
                                                    </li>
<?php
} 
?>

<?php
$logo021 = "../../../manage/bio/uploads/devices_item/".$_data[$i]['s_devices_logo02'];

if (file_exists($logo02) and $_data[$i]['s_devices_logo02'] != '') {
?>
<li>
                                                        <img  style="width: 530px; height: 390px;" src="<?=$logo02;?>" width="450" height="336" alt="<?= $_data[$i]['s_devices_' . $_SESSION["main_lan"]]; ?>" />
                                                    </li>
<?php
}
?>

<?php
$logo031 = "../../../manage/bio/uploads/devices_item/".$_data[$i]['s_devices_logo03'];

if (file_exists($logo03) and $_data[$i]['s_devices_logo03'] != '') {
?>
<li>
                                                        <img  style="width: 530px; height: 390px;" src="<?=$logo03;?>" width="450" height="336" alt="<?= $_data[$i]['s_devices_' . $_SESSION["main_lan"]]; ?>" />
                                                    </li>
<?php
} 
?>
                                                    
                                                                                                     
                                                <?php //} ?>
                                            </ul>
                                            <a href="#" class="uk-slidenav uk-slidenav-previous" data-uk-slideset-item="previous"  style="display: none;">
                                                <img src="../../../images/slideshow/previous.png">
                                            </a>
                                            <a href="#" class="uk-slidenav uk-slidenav-next" data-uk-slideset-item="next"  style="display: none;">
                                                <img src="../../../images/slideshow/next.png">
                                            </a>
                                        </div>
                                        <ul class="uk-slideset-nav uk-dotnav uk-flex-center"></ul>
                                    </div>


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
                                    <p><a class="uk-icon-film" href="<?= $_data[0]['s_devices_video']; ?>" target="_blank" rel="vidbox"><?=$_SESSION["device_msg_video"]?></a></p>
                                </div>
                            <?php } ?> 

                            <div class="chiedi-info uk-icon-phone"><a href="../../../contacts.php" target="_blank" ><?=$_SESSION["device_msg_contact"]?></a></div> 
                            <br/> <br/>
                            <div class="yoo-zoo socialbuttons clearfix">
                                <?php
                                include '../../../manage/bio/common/social.php';
                                $social = new social();

                                $url_social = "http://www.biotecitalia-thailand.com" . "$_SERVER[REQUEST_URI]";
                                echo $social->twitter_Share_button($url_social, $_data[0]['s_devices_' . $_SESSION["main_lan"]]);
                                echo $social->googlePlus_Share_button($url_social);
                                echo $social->facebook_like_button($url_social, FALSE);
                                ?>
                            </div> 			
                        </div>

                    </div>

                    <div class="uk-container uk-container-center">

                         <ul class="uk-tab" data-uk-tab="{connect:'#macchine-item-tab'}">
                            <li class="uk-active">
                                <h3 class="tecnologia uk-icon-cogs"><?= $_SESSION["device_tech"] ?></h3>
                            </li>
                            <li>
                                <h3 class="applicazioni uk-icon-user"><?= $_SESSION["device_proc"] ?></h3>
                            </li>
                            <li>
                                <h3 class="dati-tecnici uk-icon-list-ul"><?= $_SESSION["device_technical"] ?></h3>
                            </li>
                            <li>
                                <h3 class="pubblicazioni uk-icon-file"><?= $_SESSION["device_public"] ?></h3>
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
                                <?php
                                if ($_data[0]['s_01_before'] != ''
                                        or $_data[0]['s_01_after'] != ''
                                        or $_data[0]['s_02_before'] != ''
                                        or $_data[0]['s_02_after'] != ''
                                        or $_data[0]['s_03_before'] != ''
                                        or $_data[0]['s_03_after'] != ''
                                ) {
                                    ?>                            
                                    <h2 class="uk-icon-camera">Before / After</h2>
                                <?php } ?>


                                <?php if ($_data[0]['s_01_before'] != '') { ?>
                                    <a href="../../../manage/bio/uploads/devices_item/<?= $_data[0]['s_01_before']; ?>" class="example-image-link"  data-lightbox="example-set" title="Before" data-spotlight="on">
                                        <img class="example-image" src="../../../manage/bio/uploads/devices_item/<?= $_data[0]['s_01_before']; ?>" width="148" height="148" alt="<?= $_data[0]['s_devices_' . $_SESSION["main_lan"]]; ?>" />
                                    </a>
                                <?php } ?>
                                <?php if ($_data[0]['s_01_after'] != '') { ?>
                                    <a href="../../../manage/bio/uploads/devices_item/<?= $_data[0]['s_01_after']; ?>" class="example-image-link"  data-lightbox="example-set" title="After" data-spotlight="on">
                                        <img class="example-image" src="../../../manage/bio/uploads/devices_item/<?= $_data[0]['s_01_after']; ?>" width="148" height="148" alt="<?= $_data[0]['s_devices_' . $_SESSION["main_lan"]]; ?>" />
                                    </a>
                                <?php } ?>
                                <?php if ($_data[0]['s_02_before'] != '') { ?>
                                    <a href="../../../manage/bio/uploads/devices_item/<?= $_data[0]['s_02_before']; ?>" class="example-image-link"  data-lightbox="example-set" title="Before" data-spotlight="on">
                                        <img class="example-image" src="../../../manage/bio/uploads/devices_item/<?= $_data[0]['s_02_before']; ?>" width="148" height="148" alt="<?= $_data[0]['s_devices_' . $_SESSION["main_lan"]]; ?>" />
                                    </a>
                                <?php } ?> 
                                <?php if ($_data[0]['s_02_after'] != '') { ?>
                                    <a href="../../../manage/bio/uploads/devices_item/<?= $_data[0]['s_02_after']; ?>" class="example-image-link"  data-lightbox="example-set" title="After" data-spotlight="on">
                                        <img class="example-image" src="../../../manage/bio/uploads/devices_item/<?= $_data[0]['s_02_after']; ?>" width="148" height="148" alt="<?= $_data[0]['s_devices_' . $_SESSION["main_lan"]]; ?>" />
                                    </a>
                                <?php } ?> 
                                <?php if ($_data[0]['s_03_before'] != '') { ?>
                                    <a href="../../../manage/bio/uploads/devices_item/<?= $_data[0]['s_03_before']; ?>" class="example-image-link"  data-lightbox="example-set" title="Before" data-spotlight="on">
                                        <img class="example-image" src="../../../manage/bio/uploads/devices_item/<?= $_data[0]['s_03_before']; ?>" width="148" height="148" alt="<?= $_data[0]['s_devices_' . $_SESSION["main_lan"]]; ?>" />
                                    </a>
                                <?php } ?> 
                                <?php if ($_data[0]['s_03_after'] != '') { ?>
                                    <a href="../../../manage/bio/uploads/devices_item/<?= $_data[0]['s_03_after']; ?>" class="example-image-link"  data-lightbox="example-set" title="After" data-spotlight="on">
                                        <img class="example-image" src="../../../manage/bio/uploads/devices_item/<?= $_data[0]['s_03_after']; ?>" width="148" height="148" alt="<?= $_data[0]['s_devices_' . $_SESSION["main_lan"]]; ?>" />
                                    </a>
                                <?php } ?> 

                               




                                <link rel="stylesheet" href="../../../bower_components/lightbox2/dist/css/lightbox.min.css">





                                <script src="../../../bower_components/lightbox2/dist/js/lightbox-plus-jquery.min.js"></script>




                            </div>
                        </div>

                           

                    </div>
                    <script type="text/javascript" src="../../../bower_components/videobox/js/mootools.js"></script>
                    <script type="text/javascript" src="../../../bower_components/videobox/js/swfobject.js"></script>

                    <script type="text/javascript" src="../../../bower_components/videobox/js/videobox.js"></script>


                    <link rel="stylesheet" href="../../../bower_components/videobox/css/videobox.css" type="text/css" media="screen" />



                </div>
            </main>



        </div>


    </div>	
</div>

<link rel="stylesheet" href="http://www.biotecitalia.com/cache/widgetkit/widgetkit-7044da1b.css" type="text/css" />
<link rel="stylesheet" href="../../../bower_components/lightbox2/dist/css/lightbox.min.css">
<script src="../../../media/widgetkit/widgets/spotlight/js/spotlight.js"></script>
<script>
    jQuery(function ($) {
        $('[data-spotlight]').spotlight({
            "duration": 300
        });
    });
</script>
<?php
include '../../footer_item.php';
?>

