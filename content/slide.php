<?php

function slidePage($page) {
    include './controller/slideController.php';
    include './service/slideService.php';

    $utilSlide = new Utility();
    $slide = new slideController();
    if ($page == 'home') {
        $tmpPage = "index";
        $_data = $slide->dataTable($tmpPage);

        if ($_data != NULL) {
            $_SlideItem = $utilSlide->countObject($_data);
            ?>
            <div id="linea-banner">
                <div id="sfondo-banner">
                    <div class="biotec-wrapper">
                        <div class="uk-container uk-container-center">


                            <div class="uk-slidenav-position" data-uk-slideshow>
                                <ul class="uk-slideshow" data-uk-slideshow="{autoplay:true}">
                                    <?php foreach ($_data as $key => $value) { ?>
                                        <li><img src="images/slideshow/homepage/<?= $_data[$key]['s_img'] ?>" width="1400" height="451" alt=""></li>
                                    <?php } ?>
                                </ul>

                                <?php if ($_SlideItem > 1) { ?>
                                    <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous" style="color: rgba(255,255,255,0.4)">
                                        <img src="images/slideshow/previous.png">
                                    </a>
                                    <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next" style="color: rgba(255,255,255,0.4)">
                                        <img src="images/slideshow/next.png">
                                    </a>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    } else if ($page == 'about') {
        $tmpPage = "about";
        $_data = $slide->dataTable($tmpPage);
        if ($_data != NULL) {
            $_SlideItem = $utilSlide->countObject($_data);
            ?>
            <div id="linea-banner">
                <div id="sfondo-banner">
                    <div class="biotec-wrapper">
                        <div class="uk-container uk-container-center">


                            <div class="uk-slidenav-position" data-uk-slideshow>
                                <ul class="uk-slideshow" data-uk-slideshow="{autoplay:true}">
                                    <?php foreach ($_data as $key => $value) { ?>
                                        <li><img src="images/slideshow/chisiamo/<?= $_data[$key]['s_img'] ?>" width="1400" height="451" alt=""></li>
                                    <?php } ?>

                                </ul>
                                <?php if ($_SlideItem > 1) { ?>
                                    <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous" style="color: rgba(255,255,255,0.4)">
                                        <img src="images/slideshow/previous.png">
                                    </a>
                                    <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next" style="color: rgba(255,255,255,0.4)">
                                        <img src="images/slideshow/next.png">
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        }
    } else if ($page == 'contacts') {
        $tmpPage = "contacts";
        $_data = $slide->dataTable($tmpPage);
        if ($_data != NULL) {
            $_SlideItem = $utilSlide->countObject($_data);
            ?>
            <div id="linea-banner">
                <div id="sfondo-banner">
                    <div class="biotec-wrapper">
                        <div class="uk-container uk-container-center">


                            <div class="uk-slidenav-position" data-uk-slideshow>
                                <ul class="uk-slideshow" data-uk-slideshow="{autoplay:true}">
                                    <?php foreach ($_data as $key => $value) { ?>
                                        <li><img src="images/slideshow/contacts/<?= $_data[$key]['s_img'] ?>" width="1400" height="451" alt=""></li>
                                    <?php } ?>

                                </ul>
                                <?php if ($_SlideItem > 1) { ?>
                                    <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous" style="color: rgba(255,255,255,0.4)">
                                        <img src="images/slideshow/previous.png">
                                    </a>
                                    <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next" style="color: rgba(255,255,255,0.4)">
                                        <img src="images/slideshow/next.png">
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        }
    }
}
?>