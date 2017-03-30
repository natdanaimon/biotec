<!DOCTYPE html>
<?php
@session_start();
include './common/FunctionCheckActive.php';
include './common/Permission.php';
ACTIVEPAGES(8);
?>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->

        <title> <?= $_SESSION["title"] ?></title>

        <!-- Bootstrap -->
        <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="../build/css/custom.min.css" rel="stylesheet">
        <link href="images/favicon.ico" rel="icon" type="image/ico" />
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <!-- menu content -->
                <?php require_once './content/menu_content.php' ?>
                <!-- /menu content -->

                <!-- top navigation -->
                <?php require_once './content/top_content.php' ?>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3><?= $_SESSION["webmail"] ?> </h3>
                            </div>
                        </div>
                    </div> 
                    <div class="clearfix"></div>
                    <div class="row">
                        <!-- /form content -->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content">
                                    <div align="center">
                                        <img src="images/zcom_logo.png"/>
                                    </div>
                                    <br>
                                    <form action="https://cpanel01wh.bkk1.cloud.z.com:2096/login/" target="_bank" class="form-horizontal form-label-left" novalidate="">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><?= $_SESSION["txt_email"] ?> <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text"  name="user" value="info@biotecitalia-thailand.com" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"><?= $_SESSION["txt_pass"] ?> <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="password"  name="pass"  value="p@ssw0rd" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>
                                        <div class="form-group" align="center">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="submit" class="btn btn-success"><?= $_SESSION["btn_loginmail"] ?></button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                              
                                <div class="x_content">
                                    <div align="center">
                                          <br/>
                                          <a  Style="background-color: red;font-size: 18px " class="badge" href="http://www.netdesignhost.com/help.php" target="_bank"> <span style="color: yellow">*</span> <span><?= $_SESSION["txt_webmail_support"] ?></span> </a >
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /form content -->
                    </div>

                </div>
                <!-- /page content -->

                <!-- footer content -->
                <?php require_once './content/footer_content.php' ?>
                <!-- /footer content -->
            </div>
        </div>

        <!-- jQuery -->
        <script src="../vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>


        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>

        <script>
            $(document).ready(function () {
                unloading();
            });
        </script>


    </body>
</html>