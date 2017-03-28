<?php
@session_start();
include './manage/bio/common/Utility.php';
$actual_link = "$_SERVER[REQUEST_URI]";
//echo $actual_link;
if (!isset($_SESSION['checkSession']) || $_SESSION['checkSession'] == '' || $_SESSION["main_lan"] == '') {
    $util = new Utility();
    $util->setPathXML("./manage/bio/language/language.xml");
    $util->LanguageConfig("en");
    $_SESSION["main_lan"] = "en";
}
?>
<html  dir="ltr"  data-config='{"twitter":0,"plusone":0,"facebook":0,"style":"biotec","bg_color_scroll":0}'>

    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base  />
        <meta name="keywords" content="Biotec Italia-thailand, medical devices, aesthetic equipments, cosmetic laser, medical cosmetic lasers, medical solutions, cosmeceuticals, Renlive" />
        <meta name="description" content="Biotec Italia-thailand produces and distributes medical and aesthetic devices, cosmetic and medical lasers and cosmeceuticals." />
        <meta name="generator" content="MYOB" />
        <title><?= $_SESSION['title'] ?></title>
        <?php
        if ($fixheader == "fix") {
            $bodyClass = "tm-isblog";
            ?>
            <script src="http://getuikit.com/vendor/jquery.js"></script>
            <link href="indexc0d0.html?format=feed&amp;type=rss" rel="alternate" type="application/rss+xml" title="RSS 2.0" />
            <link href="index7b17.html?format=feed&amp;type=atom" rel="alternate" type="application/atom+xml" title="Atom 1.0" />
            <link href="images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
            <!--<link rel="stylesheet" href="http://www.biotecitalia.com/cache/widgetkit/widgetkit-7044da1b.css" type="text/css" />-->
<!--            <link rel="stylesheet" href="http://www.biotecitalia.com/modules/mod_zooitem/tmpl/list/style.css?ver=20150120" type="text/css" />-->
<link rel="stylesheet" href="templates/css/style.css" type="text/css" />
            <link rel="stylesheet" href="media/template.css" type="text/css" />
            <script src="media/jquery.min.js" type="text/javascript"></script>
            <script src="media/jquery-noconflict.js" type="text/javascript"></script>
            <script src="media/jquery-migrate.min.js" type="text/javascript"></script>
            <script src="media/widgetkit-78853296.js" type="text/javascript"></script>


            <link rel="stylesheet" href="templates/warp/vendor/uikit/css/uikit.min.css" />
            <!--        <script src="templates/warp/vendor/uikit/js/uikit.js"></script>-->
            <script src="templates/warp/vendor/uikit/js/components/slideshow.js"></script>
            <script src="templates/warp/vendor/uikit/js/components/slideshow-fx.js"></script>
            <script src="templates/warp/vendor/uikit/js/uikit.min.js"></script>
            <link id="data-uikit-theme" rel="stylesheet" href="templates/warp/vendor/uikit.docs.min.css">
            <script src="templates/warp/vendor/jquery.js"></script>
            <script src="templates/warp/vendor/uikit/js/uikit.min.js"></script>
            <script src="templates/warp/vendor/uikit/js/components/slideshow.js"></script>
            <script src="templates/warp/vendor/uikit/js/components/slideshow-fx.js"></script>



<!--            <link rel="apple-touch-icon-precomposed" href="http://www.biotecitalia.com/templates/yoo_square/apple_touch_icon.png">-->
            <!--<style data-file="bootstrap.css"></style>-->
	    <link  rel="stylesheet" href="templates/template.css">
            <style data-file="theme.css"></style>
	    <script src="scripts.js"></script>
<!--            <script src="http://www.biotecitalia.com/templates/yoo_square/warp/js/social.js"></script>
            <script src="http://www.biotecitalia.com/templates/yoo_square/js/theme.js"></script>
            <script src="http://www.biotecitalia.com/templates/yoo_square/js/bgColorScroll.js"></script>-->
            
            

        <!--            <script src="http://www.biotecitalia.com/templates/yoo_square/warp/vendor/jquery/jquery-less.js"></script>
                        <script src="http://www.biotecitalia.com/templates/yoo_square/warp/vendor/jquery/jquery-rtl.js"></script>
                        <script src="http://www.biotecitalia.com/templates/yoo_square/warp/vendor/less/less.js"></script>
                        <script src="http://www.biotecitalia.com/templates/yoo_square/warp/js/developer.js"></script>-->




            <?php
        } else if ($fixheader == "press") {
            $bodyClass = "tm-isblog";
            ?>
            <link href="http://www.biotecitalia.com/templates/yoo_square/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
            <link rel="stylesheet" href="http://www.biotecitalia.com/cache/widgetkit/widgetkit-7044da1b.css" type="text/css" />
            <!--                        <link rel="stylesheet" href="catch/widgetkit/widgetkit-7044da1b.css" type="text/css" />-->
            <link rel="stylesheet" href="http://www.biotecitalia.com/plugins/system/zlframework/zlframework/elements/pro/tmpl/render/widgetkit/widgetkit.css?ver=20150120" type="text/css" />
            <link rel="stylesheet" href="http://www.biotecitalia.com/media/mod_languages/css/template.css" type="text/css" />
            <script src="media/jui/js/jquery.min.js" type="text/javascript"></script>
            <script src="http://www.biotecitalia.com/media/jui/js/jquery-noconflict.js" type="text/javascript"></script>
            <script src="http://www.biotecitalia.com/media/jui/js/jquery-migrate.min.js" type="text/javascript"></script>
            <script src="http://www.biotecitalia.com/media/zoo/assets/js/responsive.js?ver=20150120" type="text/javascript"></script>
            <script src="http://www.biotecitalia.com/components/com_zoo/assets/js/default.js?ver=20150120" type="text/javascript"></script>
            <!--
            <script src="http://www.biotecitalia.com/cache/widgetkit/widgetkit-78853296.js" type="text/javascript"></script>
            -->
             


            <link rel="apple-touch-icon-precomposed" href="http://www.biotecitalia.com/templates/yoo_square/apple_touch_icon.png">
            
            <!--<style data-file="bootstrap.css"></style>-->
			<link  rel="stylesheet" href="templates/template.css">
            <style data-file="theme.css"></style>
            <script src="scripts.js"></script>
            
            <script src="http://www.biotecitalia.com/templates/yoo_square/warp/vendor/uikit/js/uikit.js"></script>
            <script src="http://www.biotecitalia.com/templates/yoo_square/warp/js/social.js"></script>
            <script src="http://www.biotecitalia.com/templates/yoo_square/js/theme.js"></script>
            <script src="http://www.biotecitalia.com/templates/yoo_square/js/bgColorScroll.js"></script>
            
            
            

            <script src="http://www.biotecitalia.com/templates/yoo_square/warp/vendor/jquery/jquery-less.js"></script>
            <script src="http://www.biotecitalia.com/templates/yoo_square/warp/vendor/jquery/jquery-rtl.js"></script>
            <script src="http://www.biotecitalia.com/templates/yoo_square/warp/vendor/less/less.js"></script>
            <script src="http://www.biotecitalia.com/templates/yoo_square/warp/js/developer.js"></script>












            <?php
        } 
		else if ($fixheader == "contacts") {
            $bodyClass = "tm-noblog contatti";
            ?>
            <script src="http://getuikit.com/vendor/jquery.js"></script>
            <link href="indexc0d0.html?format=feed&amp;type=rss" rel="alternate" type="application/rss+xml" title="RSS 2.0" />
            <link href="index7b17.html?format=feed&amp;type=atom" rel="alternate" type="application/atom+xml" title="Atom 1.0" />
            <link href="images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
<!--            <link rel="stylesheet" href="http://www.biotecitalia.com/cache/widgetkit/widgetkit-7044da1b.css" type="text/css" />
            <link rel="stylesheet" href="http://www.biotecitalia.com/modules/mod_zooitem/tmpl/list/style.css?ver=20150120" type="text/css" />-->
            <link rel="stylesheet" href="media/template.css" type="text/css" />
            <script src="media/jquery.min.js" type="text/javascript"></script>
            <script src="media/jquery-noconflict.js" type="text/javascript"></script>
            <script src="media/jquery-migrate.min.js" type="text/javascript"></script>
            <script src="media/widgetkit-78853296.js" type="text/javascript"></script>


            <link rel="stylesheet" href="templates/warp/vendor/uikit/css/uikit.min.css" />
            <!--        <script src="templates/warp/vendor/uikit/js/uikit.js"></script>-->
            <script src="templates/warp/vendor/uikit/js/components/slideshow.js"></script>
            <script src="templates/warp/vendor/uikit/js/components/slideshow-fx.js"></script>
            <script src="templates/warp/vendor/uikit/js/uikit.min.js"></script>
            <link id="data-uikit-theme" rel="stylesheet" href="templates/warp/vendor/uikit.docs.min.css">
            <script src="templates/warp/vendor/jquery.js"></script>
            <script src="templates/warp/vendor/uikit/js/uikit.min.js"></script>
            <script src="templates/warp/vendor/uikit/js/components/slideshow.js"></script>
            <script src="templates/warp/vendor/uikit/js/components/slideshow-fx.js"></script>



            <!--<link rel="apple-touch-icon-precomposed" href="http://www.biotecitalia.com/templates/yoo_square/apple_touch_icon.png">-->
            <!--<style data-file="bootstrap.css"></style>-->
			<link rel="stylesheet" href="templates/template.css">
            <style data-file="theme.css"></style>
			<script src="scripts.js"></script>
<!--            <script src="http://www.biotecitalia.com/templates/yoo_square/warp/js/social.js"></script>
            <script src="http://www.biotecitalia.com/templates/yoo_square/js/theme.js"></script>
            <script src="http://www.biotecitalia.com/templates/yoo_square/js/bgColorScroll.js"></script>-->
            

<!--            <script src="http://www.biotecitalia.com/templates/yoo_square/warp/vendor/jquery/jquery-less.js"></script>
            <script src="http://www.biotecitalia.com/templates/yoo_square/warp/vendor/jquery/jquery-rtl.js"></script>
            <script src="http://www.biotecitalia.com/templates/yoo_square/warp/vendor/less/less.js"></script>
            <script src="http://www.biotecitalia.com/templates/yoo_square/warp/js/developer.js"></script>-->


        <?php } else if ($fixheader == "news") { 
   
            ?>
                        <script src="http://getuikit.com/vendor/jquery.js"></script>
            <link href="indexc0d0.html?format=feed&amp;type=rss" rel="alternate" type="application/rss+xml" title="RSS 2.0" />
            <link href="index7b17.html?format=feed&amp;type=atom" rel="alternate" type="application/atom+xml" title="Atom 1.0" />
            <link href="images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
            <link rel="stylesheet" href="http://www.biotecitalia.com/cache/widgetkit/widgetkit-7044da1b.css" type="text/css" />
            <link rel="stylesheet" href="http://www.biotecitalia.com/modules/mod_zooitem/tmpl/list/style.css?ver=20150120" type="text/css" />
            <link rel="stylesheet" href="media/template.css" type="text/css" />
            <script src="media/jquery.min.js" type="text/javascript"></script>
            <script src="media/jquery-noconflict.js" type="text/javascript"></script>
            <script src="media/jquery-migrate.min.js" type="text/javascript"></script>
            <script src="media/widgetkit-78853296.js" type="text/javascript"></script>


            <link rel="stylesheet" href="templates/warp/vendor/uikit/css/uikit.min.css" />
            <!--        <script src="templates/warp/vendor/uikit/js/uikit.js"></script>-->
            <script src="templates/warp/vendor/uikit/js/components/slideshow.js"></script>
            <script src="templates/warp/vendor/uikit/js/components/slideshow-fx.js"></script>
            <script src="templates/warp/vendor/uikit/js/uikit.min.js"></script>
            <link id="data-uikit-theme" rel="stylesheet" href="templates/warp/vendor/uikit.docs.min.css">
            <script src="templates/warp/vendor/jquery.js"></script>
            <script src="templates/warp/vendor/uikit/js/uikit.min.js"></script>
            <script src="templates/warp/vendor/uikit/js/components/slideshow.js"></script>
            <script src="templates/warp/vendor/uikit/js/components/slideshow-fx.js"></script>



            <link rel="apple-touch-icon-precomposed" href="http://www.biotecitalia.com/templates/yoo_square/apple_touch_icon.png">
            <!--<style data-file="bootstrap.css"></style>-->
			<link  rel="stylesheet" href="templates/template.css">
            <style data-file="theme.css"></style>
			<script src="scripts.js"></script>
            <script src="http://www.biotecitalia.com/templates/yoo_square/warp/js/social.js"></script>
            <script src="http://www.biotecitalia.com/templates/yoo_square/js/theme.js"></script>
            <script src="http://www.biotecitalia.com/templates/yoo_square/js/bgColorScroll.js"></script>
            

            <script src="http://www.biotecitalia.com/templates/yoo_square/warp/vendor/jquery/jquery-less.js"></script>
            <script src="http://www.biotecitalia.com/templates/yoo_square/warp/vendor/jquery/jquery-rtl.js"></script>
            <script src="http://www.biotecitalia.com/templates/yoo_square/warp/vendor/less/less.js"></script>
            <script src="http://www.biotecitalia.com/templates/yoo_square/warp/js/developer.js"></script>

            
        <?php }?>

    </head>


    <body class="<?= $bodyClass ?>">

        <div class="ombreggiatura">
            <div class="uk-container uk-container-center">


                <div class="tm-toolbar uk-clearfix uk-hidden-small">


                    <div class="uk-float-right"><div class="uk-panel toolbar-sopra-tel">
                            Tel: <a href="tel:+66854825565">+66 085-4825565</a></div>
                        <div class="uk-panel toolbar-sopra-lingue"><div class="mod-languagestoolbar-sopra-lingue">

                                <ul class="lang-inline">
                                    <li class="" dir="ltr">
                                        <a href="./controller/changelanguageController.php?lan=th&url=<?= $actual_link ?>">
                                            TH						
                                        </a>
                                    </li>
                                    <li class="lang-active" dir="ltr">
                                        <a href="./controller/changelanguageController.php?lan=en&url=<?= $actual_link ?>">
                                            EN						
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        <div class="uk-panel toolbar-sopra-social">
                            <a href="https://web.facebook.com/BiotecitaliaThailand" class="uk-icon-button uk-icon-facebook" target="_blank"></a>
                            <a href="https://www.youtube.com" class="uk-icon-button uk-icon-youtube" target="_blank"></a>
                            <a href="https://www.pinterest.com" class="uk-icon-button uk-icon-pinterest" target="_blank"></a>
                            <a href="https://twitter.com" class="uk-icon-button uk-icon-twitter" target="_blank"></a>
                        </div>
                    </div>

                </div>

                <div class="tm-block tm-headerbar uk-clearfix">



                    <div class="uk-navbar-flip uk-hidden-small">
                        <ul class="uk-navbar-nav uk-hidden-small">

                            <li class="<?= $_SESSION["ACTIVE_HOME"] ?>" >
                                <a href="index.php">
                                    <?= $_SESSION["home"] ?> 
                                </a>
                            </li>
                            <li class="<?= $_SESSION["ACTIVE_ABOUT"] ?>">
                                <a href="about.php">
                                    <?= $_SESSION["about"] ?>
                                </a>
                            </li>
                            <li class="uk-parent <?= $_SESSION["ACTIVE_DEVICES"] ?>" data-uk-dropdown="{}">
                                <a>
                                    <?= $_SESSION["devices"] ?>
                                </a>
                                <div class="uk-dropdown uk-dropdown-navbar uk-dropdown-width-1">
                                    <div class="uk-grid">
                                        <div class="uk-width-1-1"><ul class="uk-nav uk-nav-navbar">
                                                <li>
                                                    <a href="#">
                                                        <a href="devices/medical">
                                                            <img src="http://www.biotecitalia.com/images/macchine/menu/menu-medicali.png" alt="<?= $_SESSION["medical"] ?>"/>
                                                            <span class="image-title"><?= $_SESSION["medical"] ?></span> 
                                                        </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <a href="devices/aesthetic">
                                                            <img src="http://www.biotecitalia.com/images/macchine/menu/menu-estetiche.png" alt="<?= $_SESSION["aesthetic"] ?>"/>
                                                            <span class="image-title"><?= $_SESSION["aesthetic"] ?></span> 
                                                        </a>
                                                </li></ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="uk-parent <?= $_SESSION["ACTIVE_COSM"] ?>" data-uk-dropdown="{}">
                                <a>
                                    <?= $_SESSION["cosmeceuticals"] ?>
                                </a>

                                <div class="uk-dropdown uk-dropdown-navbar uk-dropdown-width-1">
                                    <div class="uk-grid">
                                        <div class="uk-width-1-1">
                                            <ul class="uk-nav uk-nav-navbar">
                                                <li class="uk-parent">
                                                    <a href="#">
                                                        <a href="cosmeceuticals/renlive">
                                                            <?= $_SESSION["renlive"] ?>
                                                        </a>
                                                        <ul class="uk-nav-sub">
                                                            <li>
                                                                
                                                                    <a href="cosmeceuticals/renlive/rigenera">
                                                                        <img src="http://biotecitalia-thailand.com/images/cosmeceutici/menu/menu-rigenera.png" alt="Rigenera"/>
                                                                        <span class="image-title"><?= $_SESSION["rigenera"] ?></span> 
                                                                    </a>
                                                            </li>
                                                            <li>
                                                               
                                                                    <a href="cosmeceuticals/renlive/dry-sensitive">
                                                                        <img src="http://biotecitalia-thailand.com/images/cosmeceutici/menu/menu-dry-sensitive.png" alt="Dry Sensitive"/>
                                                                        <span class="image-title"><?= $_SESSION["dry_sensitive"] ?></span> 
                                                                    </a>
                                                            </li>
                                                            <li>
                                                            
                                                                    <a href="cosmeceuticals/renlive/combination-oily">
                                                                        <img src="http://biotecitalia-thailand.com/images/cosmeceutici/menu/menu-combination-oily.png" alt="Combination Oily"/>
                                                                        <span class="image-title"><?= $_SESSION["combination_oily"] ?></span> 
                                                                    </a>
                                                            </li>
                                                            <li>
                                                               
                                                                    <a href="cosmeceuticals/renlive/flexi">
                                                                        <img src="http://biotecitalia-thailand.com/images/cosmeceutici/menu/menu-flexi.png" alt="Flexi"/>
                                                                        <span class="image-title"><?= $_SESSION["flexi"] ?></span> 
                                                                    </a>
                                                            </li>
                                                            <li>
                                                               
                                                                    <a href="cosmeceuticals/renlive/bodyline">
                                                                        <img src="http://biotecitalia-thailand.com/images/cosmeceutici/menu/menu-bodyline.png" alt="Bodyline"/>
                                                                        <span class="image-title"><?= $_SESSION["bodyline"] ?></span> 
                                                                    </a>
                                                            </li>
                                                            <li>
                                                              
                                                                    <a href="cosmeceuticals/renlive/sun-care">
                                                                        <img src="http://biotecitalia-thailand.com/images/cosmeceutici/menu/menu-solari.png" alt="Sun Care"/>
                                                                        <span class="image-title"><?= $_SESSION["sun_care"] ?></span>
                                                                    </a>
                                                            </li>
                                                            <li>
                                                               
                                                                    <a href="cosmeceuticals/renlive/herbs-tea-and-supplements">
                                                                        <img src="http://biotecitalia-thailand.com/images/cosmeceutici/menu/menu-tisane.png" alt="Herbs Tea and Supplements"/>
                                                                        <span class="image-title"><?= $_SESSION["herbs"] ?></span> </a>
                                                            </li>
                                                        </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="<?= $_SESSION["ACTIVE_NEWS"] ?>">
                                <a href="news.php"><?= $_SESSION["news"] ?></a>
                            </li>
                            <li class="<?= $_SESSION["ACTIVE_PRESS"] ?>">
                                <a href="press.php"><?= $_SESSION["press"] ?></a>
                            </li>
                            <li class="<?= $_SESSION["ACTIVE_CUSTOMER"] ?>">
                                <a href="customers.php"><?= $_SESSION["our_customers"] ?></a>
                            </li>
                            <li class="<?= $_SESSION["ACTIVE_CONTACTS"] ?>">
                                <a href="contacts.php"><?= $_SESSION["contacts"] ?></a>
                            </li>
                        </ul>

                    </div>


                    <a class="tm-logo uk-navbar-brand uk-hidden-small" href="index.php">
                        <img alt="logo-biotec" src="images/logo/biotec_th.png" height="104" width="96" />
                    </a>

                    <div class="uk-navbar-content uk-navbar-center uk-visible-small">
                        <a class="tm-logo-small" href="index.php">
                            <img alt="logo-biotec" src="images/logo/biotec_th.png" height="43" width="40" />
                        </a>
                    </div>

                </div>
            </div>
        </div>