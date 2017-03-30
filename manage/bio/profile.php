<!DOCTYPE html>
<?php
@session_start();
include './common/FunctionCheckActive.php';
include './common/Permission.php';
include './controller/profileController.php';
include './service/profileService.php';
include './controller/commonController.php';
include './service/commonService.php';
ACTIVEPAGES(1);
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
        <!-- NProgress -->
        <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        <!-- Datatables -->
        <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
        <!-- Switchery -->
        <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
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
                                <h3><?= $_SESSION["profile"] ?> </h3>
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

                                            <h2><?= $_SESSION["edit_profile"] ?> </small></h2>

                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>

                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <?php
                                            //if ($_GET["func"] == "edit") {
                                            //$_GET["seq_i"];

                                            $controller = new profileController();
                                            $_data = $controller->dataTable_sel($_SESSION["username"]);
                                            foreach ($_data as $key => $value) {
                                                ?>
                                                <form id="form_edit" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                                    <div style="visibility:hidden;">
                                                        <input type="text"name="s_username" id="s_username" value="<?= $_data[$key]["s_user"] ?>">
                                                        <input type="text"name="curent_pic" id="curent_pic" value="<?= $_data[$key]["s_image"] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >
                                                            <?= $_SESSION["lb_pf_name"] ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" id="s_firstname" name="s_firstname"
                                                                   class="form-control col-md-7 col-xs-12" value="<?= $_data[$key]['s_firstname'] ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >
                                                            <?= $_SESSION["lb_pf_pass_old"] ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="password" id="s_pass_old" name="s_pass_old"  
                                                                   class="form-control col-md-7 col-xs-12" value="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >
                                                            <?= $_SESSION["lb_pf_pass"] ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="password" id="s_pass" name="s_pass"  
                                                                   class="form-control col-md-7 col-xs-12" value="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >
                                                            <?= $_SESSION["lb_pf_pass_confirm"] ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="password" id="s_pass_confirm" name="s_pass_confirm"  
                                                                   class="form-control col-md-7 col-xs-12" value="">
                                                        </div>
                                                    </div>



                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?= $_SESSION["lb_pf_img"] ?> 
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <div id="imagePreview" style="background-image: url(images/profile/<?= ($_data[$key]['s_image'] != NULL ? $_data[$key]['s_image'] : "no-image.png") ?>) !important;"></div>
                                                            <input type="file" id="uploadPic" name="uploadPic"  class="img" />

                                                        </div>
                                                    </div>

                                                    <div class="ln_solid"></div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                            <a href="dashboard.php">
                                                                <button type="button" class="btn btn-primary"><?= $_SESSION["btn_cancel"] ?>
                                                                </button>
                                                            </a>

                                                            <button type="submit" class="btn btn-success"><?= $_SESSION["btn_ok"] ?></button>
                                                        </div>
                                                    </div>

                                                </form>
                                                <?php
                                            }
                                            ?>
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
        <!-- FastClick -->
        <script src="../vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="../vendors/nprogress/nprogress.js"></script>
        <!-- iCheck -->
        <script src="../vendors/iCheck/icheck.min.js"></script>
        <!-- Datatables -->
        <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
        <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
        <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
        <script src="../vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
        <script src="../vendors/jszip/dist/jszip.min.js"></script>
        <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
        <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
        <!-- Switchery -->
        <script src="../vendors/switchery/dist/switchery.min.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>





        <script>

            //alert($('input[name=status]:checked', '#form_add').val());




            $(document).ready(function () {
                $.ajaxSetup({
                    cache: false,
                    contentType: false,
                    processData: false
                });
                $("#form_edit").submit(function (e) {
                    e.preventDefault();
                    var formData = new FormData($(this)[0]);
                    formData.append("func", "update_profile");//seq
                    console.log($(this).serialize());
                    $.ajax({
                        type: 'POST',
                        url: 'controller/profileController.php',
                        data: formData,
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
                                // location.reload();

                                //           location.reload();

                            } else {
                                var errCode = res[1] + " (" + res[0] + ")  ";
                                $('#err-code').text(errCode);
                                $('#err-dialog').modal('show');

                            }
                            $('#se-pre-con').delay(100).fadeOut();
                        },
                        error: function (data) {

                        }

                    });

                });



            });
            $(function () {

                $("#uploadPic").on("change", function ()
                {
                    var files = !!this.files ? this.files : [];
                    if (!files.length || !window.FileReader)
                        return; // no file selected, or no FileReader support

                    if (/^image/.test(files[0].type)) { // only image file
                        var reader = new FileReader(); // instance of the FileReader
                        reader.readAsDataURL(files[0]); // read the local file

                        reader.onloadend = function () { // set image data as background of div
                            $("#imagePreview").css("background-image", "url(" + this.result + ")");
                        }
                    }
                });
            });

        </script>




        <!-- /bootstrap-daterangepicker -->
        <script>
            $(document).ready(function () {
                unloading();
            });
        </script>

        <script  type="text/javascript">

            function closeAlert() {
                $('#err-dialog').modal('hide');
                $('#success-dialog').modal('hide');
                $('#image-dialog').modal('hide');

            }

            function closeAlertReload() {
                $('#err-dialog').modal('hide');
                $('#success-dialog').modal('hide');
                $('#image-dialog').modal('hide');
                location.reload();
            }


            $(document).ready(function () {
                $('#se-pre-con').delay(1000).fadeOut();
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
        <div class="modal fade boxError" id="err-dialog"  Style="width: 370px;height: 64px;overflow: hidden;">
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