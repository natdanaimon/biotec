<?php
@session_start();
error_reporting(0);
include './manage/bio/common/FunctionCheckActive.php';
ACTIVEPAGE_SHOW(3);
$fixheader = "devices";
include './content/header_devices.php';
//include './content/slide.php';
//slidePage("press");
//อันนี้ที่ใช้ controller ของ admin เพราะมันสามารถใช้งานร่วมกันได้
include './service/devicesService.php';
include './controller/devicesController.php';

if($_GET['id'] == ''){
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

			            
				
				<li><div class="gallery-item"><img src="http://www.biotecitalia.com/cache/com_zoo/images/anteprima-coaxmed_new_44b1b00c1d624a617900eed4bb62c4dc.png" width="530" height="336" alt="anteprima-coaxmed_new" /></div></li>
				
							            
				
				<li><div class="gallery-item"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAhIAAAFQCAYAAADqRZdFAAACyUlEQVR4nO3BMQEAAADCoPVPbQdvoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAOA34GYAARoPMT4AAAAASUVORK5CYII=" data-src="/cache/com_zoo/images/doublecryo-coaxmed_new_284e8e79637fa713440caa0094f96d80.png" width="530" height="336" alt="doublecryo-coaxmed_new" /></div></li>
				
										
		</ul>
        <div class="next"></div><div class="prev"></div>			</div>
	</div>
	
 		</div>
		
				<h1 class="title"> <img src="manage/bio/uploads/devices_item/<?= $_data[0]['s_devices_icon']; ?>" alt="Coaxmed" width="227" height="50" /> 
 <p class="subtitle"><?= $_data[0]['s_devices_' . $_SESSION["main_lan"]]; ?> </h1>
		
					 <!-- Main Detail -->
					 <div class="breve-descrizione">
					 <?= $_data[0]['s_device_detail_' . $_SESSION["main_lan"]]; ?>
					 					 
					 </div> 
<?php
if($_data[0]['s_device_video'] != ''){
?>					 
 <div class="video">
 <p><a class="uk-icon-film" href="http://www.youtube.com/watch?v=Xvr6QGhCdIU&amp;autoplay=1" target="_blank" data-lightbox="width:1000;height:750;transitionIn:fade;transitionOut:fade;titlePosition:float">Watch the Video</a></p>
 </div>
<?php } ?> 
  
 <div class="chiedi-info uk-icon-phone"><a href="contacts.php" target="_blank" >For further information, please contact us</a></div> 
 <div class="yoo-zoo socialbuttons clearfix">
<div>
<a href="http://twitter.com/share" target="_blank" class="twitter-share-button" data-url="<?=$_SERVER['REQUEST_URI'];?>" data-count="none" data-lang="en_GB">Tweet</a>
</div>
<div><div class="g-plusone" data-href="<?=$_SERVER['REQUEST_URI'];?>" data-size="medium" data-annotation="none" data-lang="en_GB"></div></div>
<div><div class="fb-like" data-href="<?=$_SERVER['REQUEST_URI'];?>" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false" data-action="like" data-colorscheme="light"></div></div>
</div> 			</div>

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

<div class="sfondo-grigio">
	<div class="uk-container uk-container-center">

	<div class="prima-dopo">
		<h2 class="uk-icon-camera">Before / After</h2>
	 
		
		
	<a href="http://www.biotecitalia.com/cache/com_zoo/images/01coaxmedprima_b25fe02d76f66392f78a1191104d1f8b.jpg" data-lightbox="group:1d9b8cff-7d25-40d1-8c89-0e8ce0638bfc-580af5056a2ca;" title="Before" data-spotlight="on">
	<img src="http://www.biotecitalia.com/cache/com_zoo/images/01coaxmedprima_6d18d92def45881084808a6c13f60de8.jpg" width="148" height="148" alt="01coaxmedprima" />
	</a> 
	
	
	<a href="http://www.biotecitalia.com/cache/com_zoo/images/01coaxmeddopo_914759176662da16dd64fab34677c2d8.jpg" data-lightbox="group:1d9b8cff-7d25-40d1-8c89-0e8ce0638bfc-580af5056a2ca;" title="After" data-spotlight="on">
	<img src="http://www.biotecitalia.com/cache/com_zoo/images/01coaxmeddopo_f9e310006f38f8c9ee1614752b1faf3c.jpg" width="148" height="148" alt="01coaxmeddopo" /></a> 
	
	<a href="http://www.biotecitalia.com/cache/com_zoo/images/02coaxmedprima_45ec57aa4212cf3db206e2d6f1fd0342.jpg" data-lightbox="group:1d9b8cff-7d25-40d1-8c89-0e8ce0638bfc-580af5056a2ca;" title="Before" data-spotlight="on"><img src="http://www.biotecitalia.com/cache/com_zoo/images/02coaxmedprima_6240e5b2c878abfa6bc9e8cff06c19d8.jpg" width="148" height="148" alt="02coaxmedprima" /></a> <a href="http://www.biotecitalia.com/cache/com_zoo/images/02coaxmeddopo_f5991d2fa0e2c7dc463ade67a46ddb9f.jpg" data-lightbox="group:1d9b8cff-7d25-40d1-8c89-0e8ce0638bfc-580af5056a2ca;" title="After" data-spotlight="on"><img src="http://www.biotecitalia.com/cache/com_zoo/images/02coaxmeddopo_d22ce9f90cd50e4ab35d6d3c8200cb22.jpg" width="148" height="148" alt="02coaxmeddopo" /></a> <a href="http://www.biotecitalia.com/cache/com_zoo/images/03coaxmedprima_7f1c5e34ca201b75c74206da29f8d9d6.jpg" data-lightbox="group:1d9b8cff-7d25-40d1-8c89-0e8ce0638bfc-580af5056a2ca;" title="Before" data-spotlight="on"><img src="http://www.biotecitalia.com/cache/com_zoo/images/03coaxmedprima_bd9fadb68f489b85005951f0ce78c6fe.jpg" width="148" height="148" alt="03coaxmedprima" /></a> <a href="http://www.biotecitalia.com/cache/com_zoo/images/03coaxmeddopo_855d0b9b0e2075c9201d72ec37025241.jpg" data-lightbox="group:1d9b8cff-7d25-40d1-8c89-0e8ce0638bfc-580af5056a2ca;" title="After" data-spotlight="on"><img src="http://www.biotecitalia.com/cache/com_zoo/images/03coaxmeddopo_1adde302cbd34ecfe6c5a862cb1ea367.jpg" width="148" height="148" alt="03coaxmeddopo" /></a>	
 	</div>
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

