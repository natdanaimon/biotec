<?php @session_start(); ?>
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="dashboard.php" class="site_title"><i class="fa fa-bank"></i> <span><?= $_SESSION["biothailand"] ?></span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="images/profile/<?= $_SESSION["img_profile"] ?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span><?= $_SESSION["welcom"] ?></span>
                <h2><?= $_SESSION["full_name"] ?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />
        <script>
            function page(page) {
                window.location = page + ".php";
            }
        </script>
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
                <h3>&nbsp;
                    <!--                    General-->
                </h3>
                <ul class="nav side-menu">
                    <li class="<?= $_SESSION["m1"] ?>">
                        <a href="javascript:void(0)" onclick="page('dashboard');" >
                            <i class="fa fa-home"></i> <?= $_SESSION["home"] ?> 
                        </a>
                    </li>
                    <li class="<?= $_SESSION["m9"] ?>">
                        <a>
                            <i class="fa fa-desktop"></i> <?= $_SESSION["ui_element"] ?>  <span class="fa fa-chevron-down" ></span>
                        </a>

                        <ul class="nav child_menu" style="<?= $_SESSION["style5"] ?>">
                            <li  class="<?= $_SESSION["sm4"] ?>"><a href="ui_slide.php"><?= $_SESSION["ui_slide"] ?></a></li>
                            <li  class="<?= $_SESSION["s10"] ?>"><a href="ui_index.php"><?= $_SESSION["ui_index"] ?></a></li>
                        </ul>
                    </li>
                    <li class="<?= $_SESSION["m2"] ?>">
                        <a>
                            <i class="fa fa-suitcase"></i> <?= $_SESSION["devices"] ?>  <span class="fa fa-chevron-down" ></span>
                        </a>

                        <ul class="nav child_menu" style="<?= $_SESSION["style2"] ?>">
<!--                            <li  class="<?= $_SESSION["sm1"] ?>"><a href="devices.php"><?= $_SESSION["main_devices"] ?></a></li>-->
                            <li  class="<?= $_SESSION["s1"] ?>"><a href="devices_item.php?id=1"><?= $_SESSION["medical"] ?></a></li>
                            <li  class="<?= $_SESSION["s2"] ?>"><a href="devices_item.php?id=2"><?= $_SESSION["aesthetic"] ?></a></li>
                        </ul>
                    </li> 
                    <li class="<?= $_SESSION["m3"] ?>">
                        <a>
                            <i class="fa fa-flask"></i> <?= $_SESSION["cosmeceuticals"] ?> <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu" style="<?= $_SESSION["style3"] ?>">
<!--                            <li class="<?= $_SESSION["sm2"] ?>"><a href="cosme.php"><?= $_SESSION["main_cosmeceuticals"] ?></a></li>-->
                            <li class="<?= $_SESSION["s3"] ?>"><a href="cosme_item.php?id=1"><?= $_SESSION["rigenera"] ?></a></li>
                            <li class="<?= $_SESSION["s4"] ?>"><a href="cosme_item.php?id=2"><?= $_SESSION["dry_sensitive"] ?></a></li>
                            <li class="<?= $_SESSION["s5"] ?>"><a href="cosme_item.php?id=3"><?= $_SESSION["combination_oily"] ?></a></li>
                            <li class="<?= $_SESSION["s6"] ?>"><a href="cosme_item.php?id=4"><?= $_SESSION["flexi"] ?></a></li>
                            <li class="<?= $_SESSION["s7"] ?>"><a href="cosme_item.php?id=5"><?= $_SESSION["bodyline"] ?></a></li>
                            <li class="<?= $_SESSION["s8"] ?>"><a href="cosme_item.php?id=6"><?= $_SESSION["sun_care"] ?></a></li>
                            <li class="<?= $_SESSION["s9"] ?>" ><a href="cosme_item.php?id=7"><?= $_SESSION["herbs"] ?></a></li>


                        </ul>
                    </li> 
                    <li class="<?= $_SESSION["m4"] ?>">
                        <a>
                            <i class="fa fa-newspaper-o"></i> <?= $_SESSION["news"] ?> <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu " style="<?= $_SESSION["style4"] ?>">
                            <li class="<?= $_SESSION["sm3"] ?>"><a href="newsletter.php"><?= $_SESSION["newsletter"] ?></a></li>
                            <li class="<?= $_SESSION["s11"] ?>"><a href="news_magazine.php"><?= $_SESSION["magazine"] ?></a></li>
                            <li class="<?= $_SESSION["s12"] ?>"><a href="news_event.php"><?= $_SESSION["events"] ?></a></li>
                            <li class="<?= $_SESSION["s13"] ?>"><a href="news_product.php"><?= $_SESSION["products"] ?></a></li>
                        </ul>
                    </li>
                    <li class="<?= $_SESSION["m5"] ?>">
                        <a  href="javascript:void(0)" onclick="page('press');" >
                            <i class="fa fa-eyedropper"></i> <?= $_SESSION["press"] ?> 
                        </a>
                    </li>

                    <li class="<?= $_SESSION["m7"] ?>">
                        <a href="javascript:void(0)" onclick="page('customers');" >
                            <i class="fa fa-user"></i> <?= $_SESSION["our_customers"] ?> 
                        </a>
                    </li>

                    <li class="<?= $_SESSION["m6"] ?>">
                        <a href="javascript:void(0)" onclick="page('contacts');" >
                            <i class="fa fa-comments"></i> <?= $_SESSION["contacts"] ?> 
                            <span class="badge bg-red" id="lb_mail_qty" style="display: none;">6</span>
                        </a>
                    </li>
                    <li class="<?= $_SESSION["m8"] ?>">
                        <a href="javascript:void(0)" onclick="page('webmail');" >
                            <i class="fa fa-envelope"></i> <?= $_SESSION["webmail"] ?> 
                        </a>
                    </li>



                </ul>
            </div>























<!--            <div class="menu_section">
                <h3>&nbsp;
                    Source Example
                </h3>
                <ul class="nav side-menu">

                    <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="form.html">General Form</a></li>
                            <li><a href="form_advanced.html">Advanced Components</a></li>
                            <li><a href="form_validation.html">Form Validation</a></li>
                            <li><a href="form_wizards.html">Form Wizard</a></li>
                            <li><a href="form_upload.html">Form Upload</a></li>
                            <li><a href="form_buttons.html">Form Buttons</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="general_elements.html">General Elements</a></li>
                            <li><a href="media_gallery.html">Media Gallery</a></li>
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="icons.html">Icons</a></li>
                            <li><a href="glyphicons.html">Glyphicons</a></li>
                            <li><a href="widgets.html">Widgets</a></li>
                            <li><a href="invoice.html">Invoice</a></li>
                            <li><a href="inbox.html">Inbox</a></li>
                            <li><a href="calendar.html">Calendar</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="tables.html">Tables</a></li>
                            <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="chartjs.html">Chart JS</a></li>
                            <li><a href="chartjs2.html">Chart JS2</a></li>
                            <li><a href="morisjs.html">Moris JS</a></li>
                            <li><a href="echarts.html">ECharts</a></li>
                            <li><a href="other_charts.html">Other Charts</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                            <li><a href="fixed_footer.html">Fixed Footer</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="index.html">Dashboard</a></li>
                            <li><a href="index2.html">Dashboard2</a></li>
                            <li><a href="index3.html">Dashboard3</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="form.html">General Form</a></li>
                            <li><a href="form_advanced.html">Advanced Components</a></li>
                            <li><a href="form_validation.html">Form Validation</a></li>
                            <li><a href="form_wizards.html">Form Wizard</a></li>
                            <li><a href="form_upload.html">Form Upload</a></li>
                            <li><a href="form_buttons.html">Form Buttons</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="general_elements.html">General Elements</a></li>
                            <li><a href="media_gallery.html">Media Gallery</a></li>
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="icons.html">Icons</a></li>
                            <li><a href="glyphicons.html">Glyphicons</a></li>
                            <li><a href="widgets.html">Widgets</a></li>
                            <li><a href="invoice.html">Invoice</a></li>
                            <li><a href="inbox.html">Inbox</a></li>
                            <li><a href="calendar.html">Calendar</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="tables.html">Tables</a></li>
                            <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="chartjs.html">Chart JS</a></li>
                            <li><a href="chartjs2.html">Chart JS2</a></li>
                            <li><a href="morisjs.html">Moris JS</a></li>
                            <li><a href="echarts.html">ECharts</a></li>
                            <li><a href="other_charts.html">Other Charts</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                            <li><a href="fixed_footer.html">Fixed Footer</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="e_commerce.html">E-commerce</a></li>
                            <li><a href="projects.html">Projects</a></li>
                            <li><a href="project_detail.html">Project Detail</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="profile.html">Profile</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="page_403.html">403 Error</a></li>
                            <li><a href="page_404.html">404 Error</a></li>
                            <li><a href="page_500.html">500 Error</a></li>
                            <li><a href="plain_page.html">Plain Page</a></li>
                            <li><a href="login.html">Login Page</a></li>
                            <li><a href="pricing_tables.html">Pricing Tables</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#level1_1">Level One</a>
                            <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li class="sub_menu"><a href="level2.html">Level Two</a>
                                    </li>
                                    <li><a href="#level2_1">Level Two</a>
                                    </li>
                                    <li><a href="#level2_2">Level Two</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#level1_2">Level One</a>
                            </li>
                        </ul>
                    </li>                  
                    <li>
                        <a href="javascript:void(0)">
                            <i class="fa fa-laptop"></i> 
                            Landing Page 
                            <span class="label label-success pull-right">Coming Soon</span>
                        </a>
                    </li>
                </ul>
            </div>-->

        </div>

    </div>
</div>

<script>



    function getContacts() {

        $.ajax({
            type: 'GET',
            url: 'controller/commonController.php?func=getMail',
            beforeSend: function ()
            {
//                        $('#se-pre-con').fadeIn(100);
            },
            success: function (data) {
                if (data == "" || data == null) {
                    $("#lb_mail_qty").text("0");
                    $("#lb_mail_qty").hide();

                }
                var res = JSON.parse(data);
                $.each(res, function (i, item) {
                    $("#lb_mail_qty").text(item.mailQTY);
                    if (item.mailQTY == "0") {
                        $("#lb_mail_qty").hide();
                    } else {
                        $("#lb_mail_qty").show();
                    }


                });
            },
            error: function (data) {
            }
        });
    }
</script>
