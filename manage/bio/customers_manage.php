<!DOCTYPE html>
<?php
@session_start();
include './common/FunctionCheckActive.php';
include './common/Permission.php';
include './controller/customersController.php';
include './service/customersService.php';
include './controller/commonController.php';
include './service/commonService.php';
ACTIVEPAGES(7);
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
        <!-- bootstrap-daterangepicker -->
        <script src="js/moment/moment.min.js"></script>
        <script src="js/datepicker/daterangepicker.js"></script>
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
                                <h3><?= $_SESSION["our_customers"] ?> </h3>
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
                                            <?php if ($_GET["func"] == "edit") { ?>
                                                <h2><?= $_SESSION["edit_info"] ?> <?= $_SESSION["our_customers"] ?></small></h2>
                                            <?php } else { ?>
                                                <h2><?= $_SESSION["add"] ?> <?= $_SESSION["our_customers"] ?></small></h2>
                                            <?php } ?>
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
                                            if ($_GET["func"] == "edit") {
                                                //$_GET["seq_i"];
                                                $comm = new commonController();
                                                $controller = new customersController();
                                                $_data = $controller->dataTable_sel($_GET["seq_i"]);
                                                foreach ($_data as $key => $value) {
                                                    ?>
                                                    <form id="form_edit" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                                        <div style="visibility:hidden;">
                                                            <input type="text"name="seq_i" id="seq_i" value="<?= $_GET["seq_i"] ?>">
                                                            <input type="text"name="curent_pic" id="curent_pic" value="<?= $_data[$key]["s_img"] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >
                                                                <?= $_SESSION["tb_customer_col_name_th"] ?>
                                                                <span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" id="name_th" name="name_th"
                                                                       class="form-control col-md-7 col-xs-12" value="<?= $_data[$key]['s_name_th'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >
                                                                <?= $_SESSION["tb_customer_col_name_en"] ?>
                                                                <span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" id="name_en" name="name_en"
                                                                       class="form-control col-md-7 col-xs-12" value="<?= $_data[$key]['s_name_en'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >
                                                                <?= $_SESSION["tb_customer_col_url"] ?>
                                                                <span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" id="link" name="link"  
                                                                       class="form-control col-md-7 col-xs-12" value="<?= $_data[$key]['s_url'] ?>">
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><?= $_SESSION["label_status"] ?></label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <div id="status" class="btn-group" data-toggle="buttons">
                                                                    <?php if ($_data[$key]['s_status'] == "A") { ?>
                                                                        <label id="active_status" class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                            <input type="radio" name="status" value="A" checked="checked" onchange="radioActive('A');"> &nbsp; <?= $_SESSION["active"] ?>   &nbsp;
                                                                        </label>
                                                                        <label id="cancel_status" class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                            <input type="radio" name="status" value="C" onchange="radioActive('C');"> <?= $_SESSION["inactive"] ?> 
                                                                        </label>
                                                                    <?php } else { ?>
                                                                        <label id="active_status" class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                            <input type="radio" name="status" value="A" onchange="radioActive('A');"> &nbsp; <?= $_SESSION["active"] ?>   &nbsp;
                                                                        </label>
                                                                        <label id="cancel_status" class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                            <input type="radio" name="status" value="C" checked="checked" onchange="radioActive('C');"> <?= $_SESSION["inactive"] ?> 
                                                                        </label>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><?= $_SESSION["tb_customer_col_img"] ?> 
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <div id="imagePreview" style="background-image: url(controller/file/customers/<?= $_data[$key]['s_img'] ?>) !important;"></div>
                                                                <input type="file" id="uploadPic" name="uploadPic"  class="img" />

                                                            </div>
                                                        </div>
                                                        
                                                        <div class="ln_solid"></div>
                                                        <div class="form-group">
                                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                                <a href="customers.php">
                                                                    <button type="button" class="btn btn-primary"><?= $_SESSION["btn_cancel"] ?>
                                                                    </button>
                                                                </a>

                                                                <button type="submit" class="btn btn-success"><?= $_SESSION["btn_ok"] ?></button>
                                                            </div>
                                                        </div>

                                                    </form>
                                                    <?php
                                                }
                                            } else {
                                                ?>

                                                <!--------------------------------Add customer--------------------------------->
                                                <form data-parsley-validate class="form-horizontal form-label-left" 
                                                      enctype="multipart/form-data" name="form_add" id="form_add" method="post" action="">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >
                                                            <?= $_SESSION["tb_customer_col_name_th"] ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" id="name_th" name="name_th"  class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >
                                                            <?= $_SESSION["tb_customer_col_name_en"] ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" id="name_en" name="name_en"  class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >
                                                            <?= $_SESSION["tb_customer_col_url"] ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" id="link" name="link"  class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?= $_SESSION["label_status"] ?></label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <div id="status" class="btn-group" data-toggle="buttons" >
                                                                <label id="active_status" class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                    <input type="radio" name="status"  value="A" onchange="radioActive('A');" checked="checked" > &nbsp; <?= $_SESSION["active"] ?>   &nbsp;
                                                                </label>
                                                                <label id="cancel_status" class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                    <input type="radio" name="status"  value="C" onchange="radioActive('C');"> <?= $_SESSION["inactive"] ?> 
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?= $_SESSION["tb_customer_col_img"] ?><span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <div id="imagePreview" ></div>
                                                            <input type="file" id="uploadPic" name="uploadPic"  class="img"/>
                                                        </div>
                                                    </div>

                                                    <div class="ln_solid"></div>

                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                        <a href="customers.php">
                                                            <button type="button" class="btn btn-primary"><?= $_SESSION["btn_cancel"] ?>
                                                            </button>
                                                        </a>
                                                        <button type="submit" class="btn btn-success"><?= $_SESSION["btn_ok"] ?></button>
                                                    </div>
                                            </div>

                                            </form>        
                                        <?php } ?>
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

    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <!----------------- DATE TIME -------------->
    <!-- jQuery -->
    <!-- bootstrap-daterangepicker -->
    <script src="js/moment/moment.min.js"></script>
    <script src="js/datepicker/daterangepicker.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script>

                                                                        //alert($('input[name=status]:checked', '#form_add').val());

                                                                        function radioActive(val) {
                                                                            $(this).attr("class", "btn btn-primary");
                                                                            if (val == 'A') {
                                                                                $("#active_status").attr("class", "btn btn-primary");
                                                                                $("#cancel_status").attr("class", "btn btn-default");
                                                                            } else {
                                                                                $("#cancel_status").attr("class", "btn btn-primary");
                                                                                $("#active_status").attr("class", "btn btn-default");
                                                                            }
                                                                        }


                                                                        $(document).ready(function () {
                                                                            $.ajaxSetup({
                                                                                cache: false,
                                                                                contentType: false,
                                                                                processData: false
                                                                            });
                                                                            $("#form_edit").submit(function (e) {
                                                                                e.preventDefault();
                                                                                var formData = new FormData($(this)[0]);
                                                                                formData.append("func", "update_customers");//seq
                                                                                console.log($(this).serialize());
                                                                                $.ajax({
                                                                                    type: 'POST',
                                                                                    url: 'controller/customersController.php',
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
                                                                            $("#form_add").submit(function (e) {
                                                                                e.preventDefault();
                                                                                var formData = new FormData($(this)[0]);
                                                                                formData.append("func", "add_customers");//seq 
                                                                                console.log($(this).serialize());
                                                                                $.ajax({
                                                                                    type: 'POST',
                                                                                    url: 'controller/customersController.php',
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
                                                                                            $('#form_add').trigger("reset");
                                                                                            $('#imagePreview').removeAttr('style');
                                                                                        } else {
                                                                                            var errCode = res[1] + " (" + res[0] + ")  ";
                                                                                            $('#err-code').text(errCode);
                                                                                            $('#err-dialog').modal('show');
                                                                                        }
                                                                                        $('#se-pre-con').delay(100).fadeOut();
                                                                                    },
                                                                                    error: function (data) {

                                                                                        //debug mode ========================================================================================================================
                                                                                        var res = data.responseText.split(",");
                                                                                        //debugger;
                                                                                        if (res[0] == "0000") {
                                                                                            var errCode = res[1] + " (" + res[0] + ")  ";
                                                                                            //alert(errCode);
                                                                                            $('#success-code').text(errCode);
                                                                                            $('#success-dialog').modal('show');
                                                                                            $('#form_add').trigger("reset");
                                                                                            $('#imagePreview').removeAttr('style');
                                                                                         } else {
                                                                                            var errCode = res[1] + " (" + res[0] + ")  ";
                                                                                            $('#err-code').text(errCode);
                                                                                            $('#err-dialog').modal('show');
                                                                                        }
                                                                                        $('#se-pre-con').delay(100).fadeOut();
                                                                                        //debug mode ========================================================================================================================


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
                                                                        $(document).ready(function () {
                                                                            var cb = function (start, end, label) {
                                                                                console.log(start.toISOString(), end.toISOString(), label);
                                                                                $('#reportrange_right span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                                                                            };

                                                                            var optionSet1 = {
                                                                                startDate: moment().subtract(29, 'days'),
                                                                                endDate: moment(),
                                                                                minDate: '01/01/2012',
                                                                                maxDate: '12/31/2015',
                                                                                dateLimit: {
                                                                                    days: 60
                                                                                },
                                                                                showDropdowns: true,
                                                                                showWeekNumbers: true,
                                                                                timePicker: false,
                                                                                timePickerIncrement: 1,
                                                                                timePicker12Hour: true,
                                                                                ranges: {
                                                                                    'Today': [moment(), moment()],
                                                                                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                                                                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                                                                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                                                                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                                                                                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                                                                                },
                                                                                opens: 'right',
                                                                                buttonClasses: ['btn btn-default'],
                                                                                applyClass: 'btn-small btn-primary',
                                                                                cancelClass: 'btn-small',
                                                                                format: 'MM/DD/YYYY',
                                                                                separator: ' to ',
                                                                                locale: {
                                                                                    applyLabel: 'Submit',
                                                                                    cancelLabel: 'Clear',
                                                                                    fromLabel: 'From',
                                                                                    toLabel: 'To',
                                                                                    customRangeLabel: 'Custom',
                                                                                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                                                                                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                                                                                    firstDay: 1
                                                                                }
                                                                            };

                                                                            $('#reportrange_right span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

                                                                            $('#reportrange_right').daterangepicker(optionSet1, cb);

                                                                            $('#reportrange_right').on('show.daterangepicker', function () {
                                                                                console.log("show event fired");
                                                                            });
                                                                            $('#reportrange_right').on('hide.daterangepicker', function () {
                                                                                console.log("hide event fired");
                                                                            });
                                                                            $('#reportrange_right').on('apply.daterangepicker', function (ev, picker) {
                                                                                console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
                                                                            });
                                                                            $('#reportrange_right').on('cancel.daterangepicker', function (ev, picker) {
                                                                                console.log("cancel event fired");
                                                                            });

                                                                            $('#options1').click(function () {
                                                                                $('#reportrange_right').data('daterangepicker').setOptions(optionSet1, cb);
                                                                            });

                                                                            $('#options2').click(function () {
                                                                                $('#reportrange_right').data('daterangepicker').setOptions(optionSet2, cb);
                                                                            });

                                                                            $('#destroy').click(function () {
                                                                                $('#reportrange_right').data('daterangepicker').remove();
                                                                            });

                                                                        });
    </script>


    <script>
        $(document).ready(function () {
            $('#single_cal1').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_1"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
            $('#single_cal2').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_2"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
            $('#single_cal3').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_3"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
            $('#single_cal4').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_4"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#reservation').daterangepicker(null, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
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