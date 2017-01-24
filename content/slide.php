<?php

function slidePage($page) {
    if ($page == 'home') {
        ?>
        <div id="linea-banner">
            <div id="sfondo-banner">
                <div class="biotec-wrapper">
                    <div class="uk-container uk-container-center">


                        <div class="uk-slidenav-position" data-uk-slideshow>
                            <ul class="uk-slideshow" data-uk-slideshow="{autoplay:true}">
                                <li><img src="images/slideshow/homepage/xlaseplus_biotec.jpg" width="1400" height="451" alt="">ssss</li>
                                <li><img src="images/slideshow/homepage/slide02.jpg" width="1400" height="451" alt=""></li>
                                <li><img src="images/slideshow/homepage/slide03.jpg" width="1400" height="451" alt=""></li>
                            </ul>

                            <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous" style="color: rgba(255,255,255,0.4)">
                                <img src="images/slideshow/previous.png">
                            </a>
                            <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next" style="color: rgba(255,255,255,0.4)">
                                <img src="images/slideshow/next.png">
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else if ($page == 'about') {
        ?>
        <div id="linea-banner">
            <div id="sfondo-banner">
                <div class="biotec-wrapper">
                    <div class="uk-container uk-container-center">


                        <div class="uk-slidenav-position" data-uk-slideshow>
                            <ul class="uk-slideshow" data-uk-slideshow="{autoplay:true}">
                                <li><img src="images/slideshow/chisiamo/01-chi-siamo.jpg" width="1400" height="451" alt=""></li>
                                <li><img src="images/slideshow/chisiamo/02-chi-siamo.jpg" width="1400" height="451" alt=""></li>
                                <li><img src="images/slideshow/chisiamo/03-chi-siamo.jpg" width="1400" height="451" alt=""></li>
                            </ul>
                            <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous" style="color: rgba(255,255,255,0.4)">
                                <img src="images/slideshow/previous.png">
                            </a>
                            <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next" style="color: rgba(255,255,255,0.4)">
                                <img src="images/slideshow/next.png">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
    } else if ($page == 'contacts') {
        ?>
        <div id="linea-banner">
            <div id="sfondo-banner">
                <div class="biotec-wrapper">
                    <div class="uk-container uk-container-center">


                        <div class="uk-slidenav-position" data-uk-slideshow>
                            <ul class="uk-slideshow" data-uk-slideshow="{autoplay:true}">
                                <li><img src="images/slideshow/contacts/01.jpg" width="1400" height="451" alt=""></li>
                                <li><img src="images/slideshow/contacts/02.jpg" width="1400" height="451" alt=""></li>
                                <li><img src="images/slideshow/contacts/03.jpg" width="1400" height="451" alt=""></li>
                            </ul>
                            <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous" style="color: rgba(255,255,255,0.4)">
                                <img src="images/slideshow/previous.png">
                            </a>
                            <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next" style="color: rgba(255,255,255,0.4)">
                                <img src="images/slideshow/next.png">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
}
