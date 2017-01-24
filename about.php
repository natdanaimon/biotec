<?php
@session_start();
include './manage/bio/common/FunctionCheckActive.php';
ACTIVEPAGE_SHOW(2);
$fixheader = "fix";
include './content/header.php';
include './content/slide.php';
slidePage("about");
?>


<div class="uk-container uk-container-center posizione-fissa">


</div>

<div class="tm-block ">
    <div class="tm-middle uk-grid" data-uk-grid-match data-uk-grid-margin>

        <div class="tm-main uk-width-medium-1-1">


            <main class="tm-content">



                <div class="yoo-zoo pagine-uikit pagine-uikit-chi-siamo">

                    <article class="uk-article">

                        <div class="sfondo-grigio">

                            <div class="uk-container uk-container-center">







                                <h2><?= $_SESSION["page_about_H1"] ?></h2>
                                <p><?= $_SESSION["page_about_D1_01"] ?></p>
                                <p><?= $_SESSION["page_about_D1_02"] ?></p>
                                <p><?= $_SESSION["page_about_D1_03"] ?></p>

                                <h2><?= $_SESSION["page_about_H2"] ?></h2>
                                <p><?= $_SESSION["page_about_D2_01"] ?></p>
                                <p><?= $_SESSION["page_about_D2_02"] ?></p>
                                <p><?= $_SESSION["page_about_D2_03"] ?></p>




                                </article>

                            </div>
                            </main>



                        </div>


                </div>	
        </div>
        <?php
        include './content/footer.php';
        ?>

