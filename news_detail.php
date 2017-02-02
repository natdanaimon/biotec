<?php
@session_start();
include './manage/bio/common/FunctionCheckActive.php';
ACTIVEPAGE_SHOW(5);
$fixheader = "press";
include './content/header.php';
//include './content/slide.php';
//slidePage("press");
//อันนี้ที่ใช้ controller ของ admin เพราะมันสามารถใช้งานร่วมกันได้
include './controller/pressController.php';
include './service/pressService.php';
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
    .text-left {
        margin-top: 0px;
        margin-bottom: 0px;
        display: inline;
        padding: 14px 60px 14px 20px;
        color: #fff;
        font-size: 18px;
    }
    .text-left {
        text-align: left !important;
    }
    @media (max-width: 767px)

</style>



<div class="tm-block ">
    <div class="tm-middle uk-grid" data-uk-grid-match data-uk-grid-margin>

        <div class="tm-main uk-width-medium-1-1">


            <main class="tm-content">



                <div class="yoo-zoo news-uikit news-uikit-news">
                    <div class="sfondo-grigio">
                        <div class="uk-container uk-container-center">



                            <div class="contorno-titolo"><h2>News</h2>
                            </div>



                            <div class="uk-grid" data-uk-grid-margin>
                              <?php  echo"test"; ?>
                        </div>

                    </div>	

                </div>
            </main>

        </div>
    </div>
</div>
<?php
include '../content/footer.php';
?>

