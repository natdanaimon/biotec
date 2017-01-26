<?php
@session_start();
error_reporting(0);
include '../../manage/bio/common/FunctionCheckActive.php';
ACTIVEPAGE_SHOW(4);
$fixheader = "renlive";
include '../header_renlive.php';
//include './content/slide.php';
//slidePage("press");
//อันนี้ที่ใช้ controller ของ admin เพราะมันสามารถใช้งานร่วมกันได้
include '../../service/cosmeService.php';
include '../../controller/cosmeController.php';

if($_GET['id'] == ''){
	$_GET['id'] = 1;
}
$_GET['id'] = 1;
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

						

<div class="yoo-zoo cosmeceutici-uikit cosmeceutici-uikit-renlive">


		<div class="uk-container uk-container-center">

		
<div class="contorno-titolo"><h1 class="uk-text-left">
<?= $_SESSION["Renlive"] ?>Renlive</h1></div>
			


		


		

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
                                    $abc = "a";
                                    ?>
 <div class="uk-width-medium-1-3">


<div class="uk-panel-box">
	
	
	
		<div class="uk-margin">
		<a href="rigenera" title="Rigenera">
			<img src="../../manage/bio/uploads/cosme_type/<?= $_data[$key]['main_logo']; ?>" title="Rigenera" alt="Rigenera" width="480" height="113"/>
		</a>
	</div>
	
		<div class="uk-margin">
		<a href="rigenera" title="Rigenera">
			<img src="../../manage/bio/uploads/cosme_type/<?= $_data[$key]['main_img']; ?>" title="Rigenera" alt="Rigenera" width="1152" height="768"/>
		</a>
	</div>
	
	<div class="element-itemlink"><a href="rigenera">Show Products</a></div>

	</div>

</div>
 
                                    <?php
                                }
                                ?>


</div>
<hr class="uk-grid-divider">
<div class="uk-grid uk-grid-divider" data-uk-grid-margin data-uk-grid-match>
	
</div>
</div>
		</div>

		<div class="yoo-zoo cosmeceutici-uikit cosmeceutici-uikit-renlive seconda-categoria">
		<div class="sfondo-grigio titolo-basso">
		<div class="uk-container uk-container-center spazio-alto">

		
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

