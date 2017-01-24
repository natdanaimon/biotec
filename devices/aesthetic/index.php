<?php
@session_start();
error_reporting(0);
include '../../manage/bio/common/FunctionCheckActive.php';
ACTIVEPAGE_SHOW(3);
$fixheader = "devices";
include '../header_devices.php';
//include './content/slide.php';
//slidePage("press");
//อันนี้ที่ใช้ controller ของ admin เพราะมันสามารถใช้งานร่วมกันได้
include '../../service/devicesService.php';
include '../../controller/devicesController.php';

if($_GET['id'] == ''){
	$_GET['id'] = 1;
}
$_GET['id'] = 2;
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

<div class="yoo-zoo macchine-uikit macchine-uikit-medicali">

	<div class="sfondo-grigio">
		<div class="uk-container uk-container-center">

	
	
				<div class="contorno-titolo">
		<h1 class="uk-text-left"><?= $_SESSION["aesthetic"] ?></h1></div>
		
		

	
	
	<div class="bordo-items">
	<div class="uk-grid" data-uk-grid-margin data-uk-grid-match="{target:'.uk-panel'}">


<?php
                                $util = new Utility();
                                $controller = new devicesController();
                                $_data = $controller->dataTable($_GET['id']);
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
                                    $abc = "a";
                                    ?>
 
<div class="uk-width-medium-1-3">
<div class="uk-panel uk-panel-box">
	
<h3 class="uk-margin-remove">
	 <div class="logo">
	 <a href="../../devices/aesthetic/item?id=<?= $_data[$key]['id']; ?>" title="<?= $_data[$key]['s_devices_' . $_SESSION["main_lan"]]; ?>">
	 <img src="../../manage/bio/uploads/devices_item/<?= $_data[$key]['s_devices_icon']; ?>" alt="<?= $_data[$key]['s_devices_' . $_SESSION["main_lan"]]; ?> " height="50" title="<?= $_data[$key]['s_devices_' . $_SESSION["main_lan"]]; ?>" />
	 </a>
	 </div> 
	 </h3>

<div class="uk-thumbnail uk-align-center">
	 <div class="immagine-teaser">
	 <a href="../../devices/aesthetic/item?id=<?= $_data[$key]['id']; ?>" title="<?= $_data[$key]['s_devices_' . $_SESSION["main_lan"]]; ?>">
	 <img src="../../manage/bio/uploads/devices_item/<?= $_data[$key]['s_devices_logo']; ?>" alt="<?= $_data[$key]['s_devices_' . $_SESSION["main_lan"]] ?> " width="530" height="336" title="<?= $_data[$key]['s_devices_' . $_SESSION["main_lan"]]; ?>" />
	 </a>
	 </div> 
	 </div>




<ul class="uk-subnav uk-subnav-line">
	
<li class="element element-itemlink">
	 <a href="../../devices/aesthetic/item?id=<?= $_data[$key]['id']; ?>">Show details</a></li></ul>
</div>
</div>
                                    <?php
                                }
                                ?>
                                

 

</div>

 <ul class="uk-pagination">

                                <?php
                                // << FIRST
                                $first = ($page == 1 ? TRUE : FALSE);
                                $last = FALSE;
                                if (!$first) {
                                    $minus = $page - 1;
                                    echo "<li>";
                                    echo " <a href='../../devices/aesthetic?page=1'>First</a>";
                                    echo "</li>";
                                    echo "<li>";
                                    echo "<a href='../../devices/aesthetic?page=$minus'><<</a>";
                                    echo "</li>";
                                }

                                //for start
                                for ($i = 1; $i <= $rel; $i++) {
                                    $active = ($page == $i ? "uk-active" : '');
                                    if ($rel != 1) {
                                        
                                    }

                                    if ($active == '') {
                                        echo "<li>";
                                        echo "<a href='../../devices/aesthetic?page=$i'>$i</a>";
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
                                    echo "<a href='../../devices/aesthetic?page=$plus'>>></a>";
                                    echo "</li>";
                                    echo "<li>";
                                    echo " <a href='../../devices/aesthetic?page=$rel'>Last</a>";
                                    echo "</li>";
                                }
                                ?>

                            </ul>
</div>


	</div>

</div>
	<div class="uk-container uk-container-center">
		<div class="descrizione">
	

				<div class="uk-clearfix">
						<div class="allinea-sinistra">

<p>Biotec Italia offers a complete range of professional equipments to treat face and body imperfections. Our electro-medical equipments are conceived  for  medical doctors and represent the new generation of aesthetic treatments in terms of efficacy and safety.</p>

<p>Scientific research, innovation and Made in Italy mark guarantee the high quality of Biotec Italia products.</p>

</div>

<div class="allinea-destra">

<ul>

<li>Close collaboration with industry professionals, engineers, doctors and cosmetologists;</li>

<li>Scientific research and technology;</li>

<li>Design and Production Made in Italy;</li>

<li>Costant training and courses;  </li>

<li>After sales assistance;</li>

<li>Medical Device Certification.</li>

</ul>

</div>		</div>
		
		</div>
	</div>

</div>
            
            
            </main>




        </div>


    </div>	
</div>
<?php
include '../footer_devices.php';
?>

