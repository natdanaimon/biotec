<!DOCTYPE html>

<?php
@session_start();

include './common/FunctionCheckActive.php';
include './common/Permission.php';
include './controller/devicesController.php';
include './service/devicesService.php';
include './controller/commonController.php';
include './service/commonService.php';


if ($_GET[type] == NULL) {
    header('Location: devices.php');
}
ACTIVEPAGES(2);
ACTIVEPAGES_SUB(2, $_GET[type]);
if ($_GET[seq_i]) {
    $txt_title_form = $_SESSION["edit_info"];
} else {
    $txt_title_form = $_SESSION["add"];
}
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
                                <h2 >
                                    <a href="devices.php">
                                        <?= $_SESSION["devices"] ?></a> <i class="fa fa-caret-right"></i> <a href="devices_item.php?id=<?= $_GET['type']; ?>"><i id="title_devices"></i></a> <i class="fa fa-caret-right"></i> <small><?= $txt_title_form; ?></small> </h2>
                                <ul class="nav navbar-right panel_toolbox" style="display: none">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <form enctype="multipart/form-data" name="form_add" id="form_add" method="post" action="">                                           









                                    <!-- Smart Wizard -->

                                    <div id="wizard" class="form_wizard wizard_horizontal">
                                        <ul class="wizard_steps">
                                            <li>
                                                <a href="#step-1">
                                                    <span class="step_no">1</span>
                                                    <span class="step_descr">
                                                        <?= $_SESSION["device_main"] ?>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-2">
                                                    <span class="step_no">2</span>
                                                    <span class="step_descr">
                                                        <?= $_SESSION["device_image"] ?>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-3">
                                                    <span class="step_no">3</span>
                                                    <span class="step_descr">

                                                        <?= $_SESSION["device_tech"] ?>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-4">
                                                    <span class="step_no">4</span>
                                                    <span class="step_descr">

                                                        <?= $_SESSION["device_proc"] ?>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-5">
                                                    <span class="step_no">5</span>
                                                    <span class="step_descr">
                                                        <?= $_SESSION["device_technical"] ?>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-6">
                                                    <span class="step_no">6</span>
                                                    <span class="step_descr">
                                                        <?= $_SESSION["device_public"] ?>

                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div id="step-1">
                                            <h2 class="StepTitle"> <?= $_SESSION["device_step"] ?> 1 <?= $_SESSION["device_main"] ?></h2>
                                            <div class="row">

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject_th">
                                                        <?= $_SESSION["press_tb_tr_subject_th"] ?>
                                                        <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <input type="text" id="subject_th" name="subject_th" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject_en">
                                                        <?= $_SESSION["press_tb_tr_subject_en"] ?>
                                                        <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <input type="text" id="subject_en" name="subject_en" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject_en">
                                                        <?= $_SESSION["device_video"] ?>

                                                    </label>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <input type="text" id="s_devices_video" name="s_devices_video"  class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>                                                    





                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="s_device_detail_th">
                                                        <?= $_SESSION["device_detail_th"] ?>
                                                        <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <textarea class="form-control" name="s_device_detail_th" id="s_device_detail_th" ></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="s_device_detail_en">
                                                        <?= $_SESSION["device_detail_en"] ?>
                                                        <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <textarea class="form-control" name="s_device_detail_en" id="s_device_detail_en" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="step-2">
                                            <h2 class="StepTitle"><?= $_SESSION["device_step"] ?> 2 <?= $_SESSION["device_image"] ?></h2>
                                            <!-- ==================== Images ================== -->                        
                                            <div class="row"  >
                                                <div class="col-md-12">


                                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                                        <?= $_SESSION["device_image_header"] ?> <br />                                                        
                                                        <img src="images/user.png" id="show_icon" width="200" />
                                                        <br />                                                        
                                                        <br /> 
                                                        <div class="fileContainers"  >
                                                            <input type="file" id="icon" name="icon"   onchange="readURL(this, 'show_icon');"  />

                                                            <label for="icon" class="btn btn-info" style="display: none;">

                                                                <span> <?= $_SESSION["device_browse"] ?></span>
                                                            </label>
                                                        </div>                                                       

                                                    </div>



                                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                                        <?= $_SESSION["device_image_detail"] ?> 01<br />                                                        
                                                        <img src="images/user.png" id="show_logo" width="200" />
                                                        <br />                                                        
                                                        <br />                                                        
                                                        <div class="fileContainer"  >
                                                            <input type="file" id="logo" name="logo"  onchange="readURL(this, 'show_logo');"  />

                                                            <label for="logo" class="btn btn-info" style="display: none;">

                                                                <span> <?= $_SESSION["device_browse"] ?></span>
                                                            </label>
                                                        </div>                                                        

                                                    </div>


                                                </div>
                                                <!-- ********* Slide 02-03 ********* -->
                                                <div class="col-md-12" style="display: none;">
                                                
                                                
                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                        <?= $_SESSION["device_image_detail"] ?> 02<br />                                                        
                                                        <img src="images/user.png" id="show_logo02" width="200" />
                                                        <br />                                                        
                                                        <br />                                                        
                                                        <div class="fileContainer"  >
                                                            <input type="file" id="logo02" name="logo02"  onchange="readURL(this, 'show_logo02');"  />

                                                            <label for="logo02" class="btn btn-info" style="display: none;">

                                                                <span> <?= $_SESSION["device_browse"] ?></span>
                                                            </label>
                                                        </div>                                                        

                                                    </div>


                                                     



                                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                                        <?= $_SESSION["device_image_detail"] ?> 03<br />                                                        
                                                        <img src="images/user.png" id="show_logo03" width="200" />
                                                        <br />                                                        
                                                        <br />                                                        
                                                        <div class="fileContainer"  >
                                                            <input type="file" id="logo03" name="logo03"  onchange="readURL(this, 'show_logo03');"  />

                                                            <label for="logo03" class="btn btn-info" style="display: none;">

                                                                <span> <?= $_SESSION["device_browse"] ?></span>
                                                            </label>
                                                        </div>                                                        

                                                    </div>


                                                </div>



                                                
                                                <hr />
                                                <div class="col-md-12">

                                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                                        01  <?= $_SESSION["device_before"] ?>   <br />                                                    
                                                        <img src="images/user.png" id="show_01_before" width="200" />
                                                        <br />                                                        
                                                        <br />                                                        
                                                        <div class="fileContainer"  >
                                                            <input type="file" id="01_before" name="01_before"  onchange="readURL(this, 'show_01_before');"  />

                                                            <label for="logo" class="btn btn-info" style="display: none;">

                                                                <span> <?= $_SESSION["device_browse"] ?></span>
                                                            </label>
                                                        </div>                                                         

                                                    </div>


                                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                                        01  <?= $_SESSION["device_after"] ?> <br />
                                                        <img src="images/user.png" id="show_01_after" width="200" />
                                                        <br />                                                        
                                                        <br />                                                        
                                                        <div class="fileContainer"  >
                                                            <input type="file" id="01_after" name="01_after"  onchange="readURL(this, 'show_01_after');"  />

                                                            <label for="01_after" class="btn btn-info" style="display: none;">

                                                                <span> <?= $_SESSION["device_browse"] ?></span>
                                                            </label>
                                                        </div>                                                         

                                                    </div>
                                                </div>

                                                <hr />
                                                <div class="col-md-12">

                                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                                        02  <?= $_SESSION["device_before"] ?> <br />
                                                        <img src="images/user.png" id="show_02_before" width="200" />
                                                        <br />                                                        
                                                        <br />                                                        
                                                        <div class="fileContainer"  >
                                                            <input type="file" id="02_before" name="02_before"  onchange="readURL(this, 'show_02_before');"  />

                                                            <label for="02_before" class="btn btn-info" style="display: none;">

                                                                <span> <?= $_SESSION["device_browse"] ?></span>
                                                            </label>
                                                        </div>                                                         

                                                    </div>



                                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                                        02  <?= $_SESSION["device_after"] ?> <br />
                                                        <img src="images/user.png" id="show_02_after" width="200" />
                                                        <br />                                                        
                                                        <br />                                                        
                                                        <div class="fileContainer"  >
                                                            <input type="file" id="02_after" name="02_after"  onchange="readURL(this, 'show_02_after');"  />

                                                            <label for="02_after" class="btn btn-info" style="display: none;">

                                                                <span> <?= $_SESSION["device_browse"] ?></span>
                                                            </label>
                                                        </div>                                                         

                                                    </div>
                                                </div>

                                                <hr />
                                                <div class="col-md-12">

                                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                                        03  <?= $_SESSION["device_before"] ?> <br />
                                                        <img src="images/user.png" id="show_03_before" width="200" />
                                                        <br />                                                        
                                                        <br />                                                        
                                                        <div class="fileContainer"  >
                                                            <input type="file" id="03_before" name="03_before"  onchange="readURL(this, 'show_03_before');"  />

                                                            <label for="03_before" class="btn btn-info" style="display: none;">

                                                                <span> <?= $_SESSION["device_browse"] ?></span>
                                                            </label>
                                                        </div>                                                         

                                                    </div>


                                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                                        03  <?= $_SESSION["device_after"] ?> <br />
                                                        <img src="images/user.png" id="show_03_after" width="200" />
                                                        <br />                                                        
                                                        <br />                                                        
                                                        <div class="fileContainer"  >
                                                            <input type="file" id="03_after" name="03_after"  onchange="readURL(this, 'show_03_after');"  />

                                                            <label for="03_after" class="btn btn-info" style="display: none;">

                                                                <span> <?= $_SESSION["device_browse"] ?></span>
                                                            </label>
                                                        </div>                                                         

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="step-3">
                                            <h2 class="StepTitle">  <?= $_SESSION["device_step"] ?> 3   <?= $_SESSION["device_tech"] ?></h2>
                                            <!-- ==================== Technology ================== -->                        
                                            <div class="row"  >

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="s_technology_th">
                                                        <?= $_SESSION["device_detail_th"] ?>
                                                        <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <textarea class="form-control" name="s_technology_th" id="s_technology_th" ></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="s_technology_en">
                                                        <?= $_SESSION["device_detail_en"] ?>
                                                        <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <textarea class="form-control" name="s_technology_en" id="s_technology_en" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="step-4">
                                            <h2 class="StepTitle"><?= $_SESSION["device_step"] ?> 4 <?= $_SESSION["device_proc"] ?></h2>
                                            <!-- ==================== Procedures ================== -->                         
                                            <div class="row" >

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="s_procedures_th">
                                                        <?= $_SESSION["device_detail_th"] ?>
                                                        <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <textarea class="form-control" name="s_procedures_th" id="s_procedures_th" ></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="s_procedures_en">
                                                        <?= $_SESSION["device_detail_en"] ?>
                                                        <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <textarea class="form-control" name="s_procedures_en" id="s_procedures_en" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="step-5">
                                            <h2 class="StepTitle"><?= $_SESSION["device_step"] ?> 5 <?= $_SESSION["device_technical"] ?></h2>
                                            <!-- ==================== Techmocal ================== -->                          
                                            <div class="row"  >

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="s_techmocal_th">
                                                        <?= $_SESSION["device_detail_th"] ?>
                                                        <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <textarea class="form-control" name="s_techmocal_th" id="s_techmocal_th" ></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="s_techmocal_en">
                                                        <?= $_SESSION["device_detail_en"] ?>
                                                        <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <textarea class="form-control" name="s_techmocal_en" id="s_techmocal_en" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="step-6">
                                            <h2 class="StepTitle"><?= $_SESSION["device_step"] ?> 6 <?= $_SESSION["device_public"] ?></h2>
                                            <!-- ==================== Pubblications ================== -->                    
                                            <div class="row" >

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="s_pubblications_th">
                                                        <?= $_SESSION["device_detail_th"] ?>
                                                        <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <textarea class="form-control" name="s_pubblications_th" id="s_pubblications_th" ></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="s_pubblications_en">
                                                        <?= $_SESSION["device_detail_en"] ?>
                                                        <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <textarea class="form-control" name="s_pubblications_en" id="s_pubblications_en" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- End SmartWizard Content --> 
                                    <div class="col-lg-12 col-md-12 col-sm-12" style="display: none">
                                        <button type="submit" class="btn btn-primary" data-dismiss="modal" id="btn_save_data"><i class="fa fa-save"></i>   <?= $_SESSION["btn_ok"] ?></button>
                                    </div>



                                    <input type="hidden" name="seq_i" id="seq_i" value="<?= $_GET[seq_i]; ?>"/>
                                    <input type="hidden" name="type" id="type" value="<?= $_GET[type]; ?>"/>
                                    <input type="hidden" name="func" id="func" value="add_devices_item"/>
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



                                                                $("#form_add").submit(function (e) {
                                                                    var s_device_detail_th = CKEDITOR.instances['s_device_detail_th'].getData();
                                                                    $('#s_device_detail_th').val(s_device_detail_th);
                                                                    var s_device_detail_en = CKEDITOR.instances['s_device_detail_en'].getData();
                                                                    $('#s_device_detail_en').val(s_device_detail_en);

                                                                    var s_technology_th = CKEDITOR.instances['s_technology_th'].getData();
                                                                    $('#s_technology_th').val(s_technology_th);
                                                                    var s_technology_en = CKEDITOR.instances['s_technology_en'].getData();
                                                                    $('#s_technology_en').val(s_technology_en);
                                                                    var s_procedures_th = CKEDITOR.instances['s_procedures_th'].getData();
                                                                    $('#s_procedures_th').val(s_procedures_th);
                                                                    var s_procedures_en = CKEDITOR.instances['s_procedures_en'].getData();
                                                                    $('#s_procedures_en').val(s_procedures_en);
                                                                    var s_techmocal_th = CKEDITOR.instances['s_techmocal_th'].getData();
                                                                    $('#s_techmocal_th').val(s_techmocal_th);
                                                                    var s_techmocal_en = CKEDITOR.instances['s_techmocal_en'].getData();
                                                                    $('#s_techmocal_en').val(s_techmocal_en);
                                                                    var s_pubblications_th = CKEDITOR.instances['s_pubblications_th'].getData();
                                                                    $('#s_pubblications_th').val(s_pubblications_th);
                                                                    var s_pubblications_en = CKEDITOR.instances['s_pubblications_en'].getData();
                                                                    $('#s_pubblications_en').val(s_pubblications_en);



                                                                    //pressAdd();
                                                                    e.preventDefault();
                                                                    var formData = new FormData($(this)[0]);





                                                                    var data_form = $(this).serialize();

                                                                    $.ajax({
                                                                        type: 'POST',
                                                                        url: 'controller/devicesController.php',
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
                                                                        error: {
                                                                        }

                                                                    });

                                                                });

                                                                /**
                                                                 * Start load title
                                                                 */
                                                                $.ajax({
                                                                    type: 'GET',
                                                                    url: 'controller/devicesController.php?func=dataTable_title&i_seq=<?= $_GET[type]; ?>',
                                                                    //data: Jsdata,
                                                                    beforeSend: function ()
                                                                    {
                                                                        //                        $('#se-pre-con').fadeIn(100);
                                                                    },
                                                                    success: function (data) {
                                                                        debugger;
                                                                        var language = '<?= $_SESSION["lan"] ?>';
                                                                        var res = JSON.parse(data);
                                                                        var JsonData = [];
                                                                        $.each(res, function (i, item) {
                                                                            var col_subject_th = "";
                                                                            if (language == 'th') {
                                                                                $('#title_devices').html(item.s_detail_th);
                                                                            } else {
                                                                                $('#title_devices').html(item.s_detail_en);
                                                                            }
                                                                            //alert(language);

                                                                        });


                                                                    },
                                                                    error: {
                                                                    }

                                                                });
                                                                /**
                                                                 * End load title
                                                                 */
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


            <?php
            if ($_GET['seq_i']) {
                ?>
                <script>
                    /**
                     * Start load title
                     */
                    $.ajax({
                        type: 'GET',
                        url: 'controller/devicesController.php?func=dataTable_item_row&i_seq=<?= $_GET[seq_i]; ?>',
                        //data: Jsdata,
                        beforeSend: function ()
                        {
                            //                        $('#se-pre-con').fadeIn(100);
                        },
                        success: function (data) {
                            debugger;
                            var res = JSON.parse(data);
                            var JsonData = [];
                            var show_image = "";
                            $.each(res, function (i, item) {
                                $('#subject_th').val(item.s_devices_th);
                                $('#subject_en').val(item.s_devices_en);
                                $('#s_devices_video').val(item.s_devices_video);
                                $('#s_devices_th').val(item.s_devices_th);
                                $('#s_devices_en').val(item.s_devices_en);
                                //alert(item.s_devices_th);
                                $('#s_device_detail_th').val(item.s_device_detail_th);
                                $('#s_device_detail_en').val(item.s_device_detail_en);
                                $('#s_technology_th').val(item.s_technology_th);
                                $('#s_technology_en').val(item.s_technology_en);
                                $('#s_procedures_th').val(item.s_procedures_th);
                                $('#s_procedures_en').val(item.s_procedures_en);
                                $('#s_techmocal_th').val(item.s_techmocal_th);
                                $('#s_techmocal_en').val(item.s_techmocal_en);
                                $('#s_pubblications_th').val(item.s_pubblications_th);
                                $('#s_pubblications_en').val(item.s_pubblications_en);


                                show_logo = item.s_devices_logo;
                                if (show_logo) {
                                    $('#show_logo').attr("src", "uploads/devices_item/" + show_logo);
                                }
                                
                                show_logo02 = item.s_devices_logo02;
                                if (show_logo02) {
                                    $('#show_logo02').attr("src", "uploads/devices_item/" + show_logo02);
                                }
                                
                                show_logo03 = item.s_devices_logo03;
                                if (show_logo03) {
                                    $('#show_logo03').attr("src", "uploads/devices_item/" + show_logo03);
                                }
                                
                                
                                
                                show_icon = item.s_devices_icon;
                                if (show_icon) {
                                    $('#show_icon').attr("src", "uploads/devices_item/" + show_icon);
                                }

                                show_01_before = item.s_01_before;
                                if (show_01_before) {
                                    $('#show_01_before').attr("src", "uploads/devices_item/" + show_01_before);
                                }
                                show_01_after = item.s_01_after;
                                if (show_01_after) {
                                    $('#show_01_after').attr("src", "uploads/devices_item/" + show_01_after);
                                }

                                show_02_before = item.s_02_before;
                                if (show_02_before) {
                                    $('#show_02_before').attr("src", "uploads/devices_item/" + show_02_before);
                                }
                                show_02_after = item.s_02_after;
                                if (show_02_after) {
                                    $('#show_02_after').attr("src", "uploads/devices_item/" + show_02_after);
                                }

                                show_03_before = item.s_03_before;
                                if (show_03_before) {
                                    $('#show_03_before').attr("src", "uploads/devices_item/" + show_03_before);
                                }
                                show_03_after = item.s_03_after;
                                if (show_03_after) {
                                    $('#show_03_after').attr("src", "uploads/devices_item/" + show_03_after);
                                }

                            });


                        },
                        error: {
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
            <p id="success-code" class="f-white" >  </p> 

        </div>
        <div class="modal fade boxError" id="err-dialog"  Style="width: 370px;height: 64px">
            <span class="close" onclick="closeAlert();">x</span>
            <p id="err-code" class="f-white"></p>   

        </div>
        <!--  Fix Custom Alert POPUP-->

        <!-- CK Editor -->
        <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
        <script>
                $(function () {



                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace('s_device_detail_th');
                    CKEDITOR.replace('s_device_detail_en');
                    CKEDITOR.replace('s_technology_th');
                    CKEDITOR.replace('s_technology_en');
                    CKEDITOR.replace('s_procedures_th');
                    CKEDITOR.replace('s_procedures_en');
                    CKEDITOR.replace('s_techmocal_th');
                    CKEDITOR.replace('s_techmocal_en');
                    CKEDITOR.replace('s_pubblications_th');
                    CKEDITOR.replace('s_pubblications_en');
                });
        </script>
        <!-- Input -->
        <script src="assets/inputfile/js/custom-file-input.js"></script>
        <style>
            .fileContainerddd {
                overflow: hidden;
                position: relative;
                cursor: pointer;
            }

            .fileContainersss [type=file] {
                cursor: inherit;
                display: block;
                font-size: 999px;
                filter: alpha(opacity=0);
                min-height: 100%;
                min-width: 100%;
                opacity: 0;
                position: absolute;
                right: 0;
                text-align: right;
                top: 0;
            }
        </style>








        <script>
                function readURL(input, id) {

                    document.getElementById(id).src = window.URL.createObjectURL(input.files[0]);
                }
        </script>
        <!-- Sweet Alert  plugin -->
        <link rel="stylesheet" href="assets/sweetalert/dist/sweetalert.css">
        <script src="assets/sweetalert/dist/sweetalert.js"></script>


        <!-- jQuery Smart Wizard -->
        <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
        <!-- jQuery Smart Wizard -->
        <script>
                $(document).ready(function () {
                    $('#wizard').smartWizard();

                    $('#wizard_verticle').smartWizard({
                        transitionEffect: 'slide'
                    });
                    $('.buttonPrevious').addClass('btn btn-warning');
                    $('.buttonNext').addClass('btn btn-primary');
                    $('.buttonFinish').addClass('btn btn-success');
                    $(".buttonPrevious").text("<?= $_SESSION["btn_previous"] ?>");
                    $(".buttonNext").text("<?= $_SESSION["btn_next"] ?>");
                    $('.buttonFinish').html('<i class="fa fa-save"></i> <?= $_SESSION["btn_ok"] ?>');
                });
        </script>
        <!-- /jQuery Smart Wizard -->

    </body>
</html>