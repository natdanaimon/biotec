<!DOCTYPE html>

<?php
@session_start();

include './common/FunctionCheckActive.php';
include './common/Permission.php';
include './controller/cosmeController.php';
include './service/cosmeService.php';
include './controller/commonController.php';
include './service/commonService.php';

ACTIVEPAGES(3);
?>

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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

        <!-- Custom Theme Style -->
        <link href="../build/css/custom.min.css" rel="stylesheet">
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

                    <div class="clearfix"></div>
                    <div class="row">
                        <!-- /form content -->

                        <div class="x_panel">
                            <div class="x_title">
                                <h2><?= $_SESSION["cosmeceuticals"] ?> </h2>
                                <ul class="nav navbar-right panel_toolbox" style="display: none">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <a href="cosme.php">Back</a>

                                <form enctype="multipart/form-data" name="form_add" id="form_add" method="post" action="">                                            
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                            <?= $_SESSION["press_tb_tr_subject_th"] ?>
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="text" id="subject_th" name="subject_th"  class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                            <?= $_SESSION["press_tb_tr_subject_en"] ?>
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="text" id="subject_en" name="subject_en"  class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_img">
                                            Main Image
                                            <span class="required">*</span>
                                        </label>
                                        <table align="left" id="tb_img" style="display: none">
                                            <tr>
                                                <td align="left">
                                                    <br />
                                                    <span id="show_image"></span>
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="file" id="main_img" name="main_img"  class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_logo">
                                            Main Logo
                                            <span class="required">*</span>
                                        </label>
                                        <table align="left" id="tb_logo" style="display: none">
                                            <tr>
                                                <td align="left">
                                                    <br />
                                                    <span id="show_logo"></span>
                                                </td>
                                            </tr>
                                        </table>                                                        
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="file" id="main_logo" name="main_logo"  class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>






                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary" data-dismiss="modal" id="btn_save_data"><i class="fa fa-save"></i> Save Data</button>
                                    </div>



                                    <input type="hidden" name="cosme_id" id="cosme_id" value="<?= $_GET[id]; ?>"/>
                                    <input type="hidden" name="current_main_img" id="current_main_img" />
                                    <input type="hidden" name="current_main_logo" id="current_main_logo" />
                                    <input type="hidden" name="func" id="func" value="add_cosme"/>

                                </form>


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
        <!-- Jquery Script -->
        <i>
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

            <!-- Custom Theme Scripts -->
            <script src="../build/js/custom.min.js"></script>

            <script>
                $(document).ready(function () {
                    unloading();
                });
            </script>


            <?php
            if ($_GET['id']) {
                ?>
                <script>
                    /**
                     * Start load title
                     */
                    $.ajax({
                        type: 'GET',
                        url: 'controller/cosmeController.php?func=dataTable_title&id=<?= $_GET[id]; ?>',
                        //data: Jsdata,
                        beforeSend: function ()
                        {
                            //                        $('#se-pre-con').fadeIn(100);
                        },
                        success: function (data) {
                            debugger;
                            var res = JSON.parse(data);
                            var JsonData = [];
                            $.each(res, function (i, item) {
                                $('#subject_th').val(item.cosme_th);
                                $('#subject_en').val(item.cosme_en);
                                $('#current_main_img').val(item.main_img);
                                $('#current_main_logo').val(item.main_logo);
                                var show_image = item.main_img;
                                var show_logo = item.main_logo;
                                if (show_image) {
                                    $('#show_image').html('<img src="uploads/cosme_type/' + show_image + '" width="200" />');
                                    $('#tb_img').show();
                                }
                                if (show_logo) {
                                    $('#show_logo').html('<img src="uploads/cosme_type/' + show_logo + '" width="200" />');
                                    $('#tb_logo').show();
                                }

                            });
                        },
                        error: function (data) {
                            debugger;
                            var res = JSON.parse(data.responseText);
                            var JsonData = [];
                            $.each(res, function (i, item) {
                                $('#subject_th').val(item.cosme_th);
                                $('#subject_en').val(item.cosme_en);
                                $('#current_main_img').val(item.main_img);
                                $('#current_main_logo').val(item.main_logo);
                                var show_image = item.main_img;
                                var show_logo = item.main_logo;
                                if (show_image) {
                                    $('#show_image').html('<img src="uploads/cosme_type/' + show_image + '" width="200" />');
                                    $('#tb_img').show();
                                }
                                if (show_logo) {
                                    $('#show_logo').html('<img src="uploads/cosme_type/' + show_logo + '" width="200" />');
                                    $('#tb_logo').show();
                                }

                            });
                        }

                    });
                    /**
                     * End load title
                     */
                </script>
                <?php
            }
            ?> 

        </i>
        <!-- Modal -->
        <div class="modal fade" id="modal_form" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="modal_title">Modal Header</h4>
                    </div>
                    <form method="post" id="data_form">
                        <div class="modal-body" id="modal_body">
                            <p>Some text in the modal.</p>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btn_save_data"><i class="fa fa-save"></i> Save Data</button>
                    </div>
                </div>

            </div>
        </div>
        <script>

            $("#form_add").submit(function (e) {




                //pressAdd();
                e.preventDefault();
                var formData = new FormData($(this)[0]);
                var data_form = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: 'controller/cosmeController.php',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
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
                        } else {
                            var errCode = res[1] + " (" + res[0] + ")  ";
                            $('#err-code').text(errCode);
                            $('#err-dialog').modal('show');
                        }
                        $('#se-pre-con').delay(100).fadeOut();
                    },
                    error: function (data) {
                        var res = data.responseText.split(",");
                        //debugger;

                        if (res[0] == "0000") {
                            var errCode = res[1] + " (" + res[0] + ")  ";
                            //alert(errCode);
                            $('#success-code').text(errCode);
                            $('#success-dialog').modal('show');
                        } else {
                            var errCode = res[1] + " (" + res[0] + ")  ";
                            $('#err-code').text(errCode);
                            $('#err-dialog').modal('show');
                        }
                        $('#se-pre-con').delay(100).fadeOut();
                    }

                });
            });
        </script>

        <!--  Fix Custom Alert POPUP-->
        <script>
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
        </script>
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
            <p id="success-code" class="f-white" > </p>  

        </div>
        <div class="modal fade boxError" id="err-dialog"  Style="width: 370px;height: 64px">
            <span class="close" onclick="closeAlert();">x</span>
            <p id="err-code" class="f-white" style="color: #fff"></p>   

        </div>
        <!--  Fix Custom Alert POPUP-->
        <!-- Sweet Alert  plugin -->
        <link rel="stylesheet" href="assets/sweetalert/dist/sweetalert.css">
        <script src="assets/sweetalert/dist/sweetalert.js"></script>

    </body>
</html>