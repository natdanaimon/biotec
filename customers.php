<?php
@session_start();
include './manage/bio/common/FunctionCheckActive.php';
ACTIVEPAGE_SHOW(8);
$fixheader = "fix"; 
include './content/header.php';
//include './content/slide.php';
//slidePage("press");
//อันนี้ที่ใช้ controller ของ admin เพราะมันสามารถใช้งานร่วมกันได้
include './controller/customersController.php';
include './service/customersService.php';
?>



<div class="uk-container uk-container-center posizione-fissa">


</div>
<script>
    function ck(source) {
        //alert(1);
        //alert(img);

        var img = new Image();
        var height;
        var width;
        //var height_warp = $("body").width();lightbox-img
        img.src = source;
        img.onload = function () {


            height = this.height;
            width = this.width;
            //alert(width + 'x' + height);
            //alert(height+" - - "+width);
            if (height > 900) {

            }
            var warp = document.getElementById("lightbox-wrap");
            var att = document.createAttribute("id");
            att.value = 'lightbox-wrap2';
            warp.setAttributeNode(att); //        background-color: red;
            $("#lightbox-img").css({"width": "100px", "height": "100px"});
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
        max-height: 50% !important; 
    }

</style>



<div class="tm-block ">
    <div class="tm-middle uk-grid" data-uk-grid-match data-uk-grid-margin>

        <div class="tm-main uk-width-medium-1-1">


            <main class="tm-content">



                <div class="yoo-zoo press-uikit press-uikit-frontpage">

                    <div class="sfondo-grigio">
                        <div class="uk-container uk-container-center">

                            <div class="contorno-titolo">
                                <h1 class="uk-text-left"><?= $_SESSION['customers_h1_msg'] ?></h1>
                            </div>


                            <div class="uk-grid" data-uk-grid-margin>
                                <?php
                                $util = new Utility();
                                $controller = new customersController();
                                $_data = $controller->dataTable();
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
                                    <div class="uk-width-medium-1-4">
                                        <article class="uk-article">


                                          <h1 class="uk-article-title"> 

                                                <?= $_data[$key]['s_name_' . $_SESSION["main_lan"]] ?> 
                                            </h1>

                                         


                                            <div class="uk-align-medium-left" style="background-color: white;">

                                                <a href="<?= $_data[$key]['s_url'] ?>"  
                                                 
                                                   title="<?= $_data[$key]['s_name_' . $_SESSION["main_lan"]] ?>"  target="_bank" >
                                                    <img src="./manage/bio/controller/file/customers/<?= $_data[$key]['s_img'] ?>" 
                                                         Style="width: 220px;height: 280px;" 
                                                         alt="<?= $_data[$key]['s_name_' . $_SESSION["main_lan"]] ?>" />
                                                </a>	
                                            </div>
                                            <div style="height: 13px">

                                            </div>
                                            <div class="download-pdf">

                                                <a href="<?= $_data[$key]['s_url'] ?>" target="_bank" 
                                                   title="<?= $_SESSION['go_website'] ?>  <?= $_data[$key]['s_name_' . $_SESSION["main_lan"]] ?> ">
                                                       <?= $_SESSION['go_website'] ?>
                                                </a>
                                            </div> 


                                        </article>

                                    </div>
                                    <?php
                                }
                                ?>



                            </div>


                            <ul class="uk-pagination">

                                <?php
                                if($_data!=NULL){
                                // << FIRST
                                $first = ($page == 1 ? TRUE : FALSE);
                                $last = FALSE;
                                if (!$first) {
                                    $minus = $page - 1;
                                    echo "<li>";
                                    echo " <a href='customers.php?page=1'>First</a>";
                                    echo "</li>";
                                    echo "<li>";
                                    echo "<a href='customers.php?page=$minus'><<</a>";
                                    echo "</li>";
                                }

                                //for start
                                for ($i = 1; $i <= $rel; $i++) {
                                    $active = ($page == $i ? "uk-active" : '');
                                    if ($rel != 1) {
                                        
                                    }

                                    if ($active == '') {
                                        echo "<li>";
                                        echo "<a href='customers.php?page=$i'>$i</a>";
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
                                    echo "<a href='customers.php?page=$plus'>>></a>";
                                    echo "</li>";
                                    echo "<li>";
                                    echo " <a href='customers.php?page=$rel'>Last</a>";
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
<?php
include './content/footer.php';
?>

