<?php
@session_start();
include './common/FunctionCheckActive.php';
include './common/Permission.php';
include './controller/pressController.php';
include './service/pressService.php';
include './controller/commonController.php';
include './service/commonService.php';
ACTIVEPAGES(4);
ACTIVEPAGES_SUB(4, 1);
?>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
        <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
        <title> <?= $_SESSION["title"] ?></title>

        <!-- Bootstrap -->
        <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="../build/css/custom.min.css" rel="stylesheet">
    </head>
    <style>
        .required{
            color:red;
        }
    </style>
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
                                <h3><?= $_SESSION["btn_create_email"] ?> </h3>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <!-- /form content -->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2><?= $_SESSION["txt_email"] ?> </h2>           
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>

                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">



                                            <form data-parsley-validate class="form-horizontal form-label-left" 
                                                  name="form_email" id="form_email" method="post" action="">
                                                <input type="hidden" name="func" id="func" value="sendMail" />
                                                <div class="form-group">
                                                    <label class="control-label col-md-2 col-sm-3 col-xs-12"><?= $_SESSION["lb_newsletter_category"] ?></label>
                                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                                        <select id="category" name="category" class="form-control">
                                                            <option value="0">-<?= $_SESSION["lb_newsletter_category_all"] ?>-</option>
                                                            <option value="1"><?= $_SESSION["lb_newsletter_category_1"] ?></option>
                                                            <option value="2"><?= $_SESSION["lb_newsletter_category_2"] ?></option>
                                                            <option value="3"><?= $_SESSION["lb_newsletter_category_3"] ?></option>
                                                            <option value="4"><?= $_SESSION["lb_newsletter_category_4"] ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">
                                                        <?= $_SESSION["lb_subject_email"] ?>
                                                        <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="subject" name="subject"  class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-2 col-sm-3 col-xs-12" >
                                                        <?= $_SESSION["lb_detail_email"] ?>
                                                        <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-10 col-sm-12 col-xs-12">
                                                        <textarea class="form-control" name="txt_email" id="txt_email" ></textarea>
                                                    </div>
                                                </div>

                                                <div class="ln_solid"></div>

                                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                    <a href="press.php">
                                                        <button type="button" class="btn btn-primary"><?= $_SESSION["btn_cancel"] ?>
                                                        </button>
                                                    </a>
                                                    <button type="button" id="btn-send" class="btn btn-success"><?= $_SESSION["btn_ok"] ?></button>

                                                </div>
                                            </form>        
                                        </div>



                                    </div>
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

    <!-- CKEDITOR -->
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
//        CKEDITOR.replace('txt_email');
        CKEDITOR.replace('txt_email', {
            "filebrowserImageUploadUrl": "iaupload.php"
        });
    </script>

    <script  type="text/javascript">

        function closeAlert() {
            $('#err-dialog').modal('hide');
            $('#success-dialog').modal('hide');
        }

        function closeAlertReload() {
            $('#err-dialog').modal('hide');
            $('#success-dialog').modal('hide');
            location.reload();
        }


        $(document).ready(function () {
            $('#se-pre-con').delay(1000).fadeOut();

            $("#btn-send").click(function () {
                for (instance in CKEDITOR.instances)
                {
                    CKEDITOR.instances[instance].updateElement();
                }
                var Jsdata = $("#form_email").serialize();
                $.ajax({
                    type: 'POST',
                    url: 'controller/newsletterController.php',
                    data: Jsdata,
                    beforeSend: function ()
                    {
                        $('#se-pre-con').fadeIn(100);
                    },
                    success: function (data) {
                        var res = data.split(",");
                        //debugger;
                        if (res[0] == "0000") {
                            var errCode = res[1] + " (" + res[0] + ")  ";
                            //alert(errCode);
                            $('#success-code').text(errCode);
                            $('#success-dialog').modal('show');
                            $('#category').val("0");
                            $('#subject').val("");
                            $('#txt_email').val("");



                        } else {
                            var errCode = res[1] + " (" + res[0] + ")  ";
                            $('#err-code').text(errCode);
                            $('#err-dialog').modal('show');
                        }
                        $('#se-pre-con').delay(100).fadeOut();
                    },
                    error: function (data) {
                        debugger;
                        //debug mode ========================================================================================================================
//                        console.log(data);
//
//                        var res = data.split(",");
//                        //debugger;
//                        if (res[0] == "0000") {
//                            var errCode = res[1] + " (" + res[0] + ")  ";
//                            //alert(errCode);
//                            $('#success-code').text(errCode);
//                            $('#success-dialog').modal('show');
//                            $('#category').val("0");
//                            $('#subject').val("");
//                            $('#txt_email').val("");
//
//
//
//                        } else {
//                            var errCode = res[1] + " (" + res[0] + ")  ";
//                            $('#err-code').text(errCode);
//                            $('#err-dialog').modal('show');
//                        }
//                        $('#se-pre-con').delay(100).fadeOut();
                        //debug mode ========================================================================================================================


                    }

                });

            });











        });

    </script>

    <!--  Fix Custom Alert POPUP-->

    <style>
        #imagePreview {
            width: 180px;
            height: 180px;
            background-position: center center;
            background-size: cover;
            -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
            display: inline-block;
        }
        .modal {
            position: fixed;
            top: 30px;
            bottom: 0;
            z-index: 1050;
            display: none;
            overflow: hidden;
            -webkit-overflow-scrolling: touch;
            outline: 0;
        }
        .boxSuccess {
            /*                width: 40%;*/
            margin: 5% auto;
            overflow:hidden;
            background: rgba(75, 209, 248, 0.8);
            padding: 15px;
            border-radius: 1px/60px;
            text-align: left;
            align-content: center;
        }
        .boxError {
            /*                width: 40%;*/
            margin: 5% auto;
            overflow:hidden;
            background: rgba(246, 26, 87, 0.8);
            padding: 15px;
            border-radius: 1px/60px;
            text-align: left;
            align-content: center;
        }
        .f-white{
            /*                color: rgb(255, 0, 0);*/
            color: white;
            font-size: 16px;
        }

    </style>

    <div class="modal fade boxSuccess" id="success-dialog"  Style="width: 370px;height: 64px">
        <span class="close" onclick="closeAlertReload();">x</span>
        <p id="success-code" class="f-white">   

    </div>
    <div class="modal fade boxError" id="err-dialog"  Style="width: 370px;height: 64px">
        <span class="close" onclick="closeAlert();">x</span>
        <p id="err-code" class="f-white"></p>   

    </div>
    <!--  Fix Custom Alert POPUP-->
    <!--  Fix Custom Alert Image-->
    <div id="image-dialog" class="w3-modal" onclick="this.style.display = 'none'">
        <span class="w3-closebtn w3-hover-red w3-container w3-padding-16 w3-display-topright">&times;</span>
        <div class="w3-modal-content w3-animate-zoom">
            <img id="src-image"  style="width:100%">
        </div>
    </div>
    <!--  Fix Custom Alert Image-->




</body>
</html>