<!DOCTYPE html>
<?php
@session_start();
include './common/FunctionCheckActive.php';
include './common/Permission.php';
include './controller/newsletterController.php';
include './service/newsletterService.php';
include './controller/commonController.php';
include './service/commonService.php';
include './common/Utility.php';
$util = new Utility();
ACTIVEPAGES(4);
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
                                <h3><?= $_SESSION["newsletter"] ?> </h3>
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
                                            <h2><?= $_SESSION["info"] ?><?= $_SESSION["newsletter"] ?></small></h2>

                                            <div class="clearfix"></div>
                                            <a href="newsletter_manage.php">
                                                <button type="submit" class="btn btn-primary"><?= $_SESSION["btn_create_email"] ?>
                                                </button>
                                            </a>

                                        </div>
                                        <div class="x_content">

                                            <table id="datatable-checkbox" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>

                                                        <th style=""><?= $_SESSION["lb_newsletter_email"] ?></th>
                                                        <th style=""><?= $_SESSION["lb_newsletter_name"] ?></th>
                                                        <th style=""><?= $_SESSION["lb_newsletter_tel"] ?></th>
                                                        <th><?= $_SESSION["lb_newsletter_category"] ?></th>
                                                        <th style="width: 170px;"> <?= $_SESSION["tb_col_status"] ?> </th>
                                                        <th style="width: 40px;"><?= $_SESSION["tb_col_delete"] ?></th>
                                                    </tr>

                                                </thead>


                                                <tbody id="tbody_contacts">
                                                </tbody>
                                            </table>


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
            $(document).ready(function () {
                unloading();
            });
        </script>



        <script  type="text/javascript">

            var $datatable = $('#datatable-checkbox');
            function closeAlert() {
                $('#err-dialog').modal('hide');
                $('#success-dialog').modal('hide');
                $('#image-dialog').modal('hide');
                $('#confirm-dialog').modal('hide');
            }


            $(document).ready(function () {
                initialDataTable("TRUE");
            });

            function updateCategory(temp, email) {
                var category = $('#' + temp).val();
                $.ajax({
                    type: 'GET',
                    url: 'controller/newsletterController.php?func=updateCategory&email=' + email + '&category=' + category,
                    beforeSend: function ()
                    {
                        $('#se-pre-con').fadeIn(100);
                    },
                    success: function (data) {
                        var res = data.split(",");
                        if (res[0] == "0000") {
                            var errCode = res[1] + " (" + res[0] + ")  ";
                            $('#success-code').text(errCode);
                            $('#success-dialog').modal('show');
                        } else {
                            var errCode = res[1] + " (" + res[0] + ")  ";
                            $('#err-code').text(errCode);
                            $('#err-dialog').modal('show');
                        }
                        $('#se-pre-con').delay(100).fadeOut();
                        initialDataTable("FALSE");
                    },
                    error: function (data) {

                    }
                });
            }

            function changeStatus(temp_status, email, status) {
//                var status = $('#' + temp_status).is(":checked");
//                var status = $('#s_' + temp_status).val();
//                alert(status);
//                return;
                $.ajax({
                    type: 'GET',
                    url: 'controller/newsletterController.php?func=updateStatus&email=' + email + '&status=' + status,
                    beforeSend: function ()
                    {
                        $('#se-pre-con').fadeIn(100);
                    },
                    success: function (data) {
                        var res = data.split(",");
                        if (res[0] == "0000") {
                            var errCode = res[1] + " (" + res[0] + ")  ";
                            $('#success-code').text(errCode);
                            $('#success-dialog').modal('show');
                        } else {
                            var errCode = res[1] + " (" + res[0] + ")  ";
                            $('#err-code').text(errCode);
                            $('#err-dialog').modal('show');
                        }
                        $('#se-pre-con').delay(100).fadeOut();
                        initialDataTable("FALSE");
                    },
                    error: function (data) {

                    }
                });
            }

            function initialDataTable(first) {
                debugger;
                $.ajax({
                    type: 'GET',
                    url: 'controller/newsletterController.php?func=dataTable',
                    //data: Jsdata,
                    beforeSend: function ()
                    {
//                        $('#se-pre-con').fadeIn(100);
                    },
                    success: function (data) {
                        var language = '<?= $_SESSION["lan"] ?>';
                        if (data == '') {
                            var datatable = $datatable.dataTable().api();
                            $('.dataTables_empty').remove();
                            datatable.clear();
                            datatable.draw();
                            $('#se-pre-con').delay(100).fadeOut();
                            return;
                        }
                        var res = JSON.parse(data);
                        var JsonData = [];
                        $.each(res, function (i, item) {

                            var col_email = "";
                            var col_name = "";
                            var col_phone = "";
                            var col_category = "";
                            var col_status = "";
                            var col_delete = "";

                            col_email = item.s_email;
                            col_name = item.s_name;
                            col_phone = item.s_phone;
                            var checked_0 = (item.s_category == '0' ? 'selected="selected"' : '');
                            var checked_1 = (item.s_category == '1' ? 'selected="selected"' : '');
                            var checked_2 = (item.s_category == '2' ? 'selected="selected"' : '');
                            var checked_3 = (item.s_category == '3' ? 'selected="selected"' : '');
                            var checked_4 = (item.s_category == '4' ? 'selected="selected"' : '');

                            col_category = '<select id="' + item.s_running + '" onchange="updateCategory(\'' + item.s_running + '\',\'' + item.s_email + '\');" >';
                            col_category += '   <option value="0" ' + checked_0 + '  >-<?= $_SESSION["lb_newsletter_category_all"] ?>-</option>';
                            col_category += '   <option value="1" ' + checked_1 + '><?= $_SESSION["lb_newsletter_category_1"] ?></option>';
                            col_category += '   <option value="2" ' + checked_2 + '><?= $_SESSION["lb_newsletter_category_2"] ?></option>';
                            col_category += '   <option value="3" ' + checked_3 + '><?= $_SESSION["lb_newsletter_category_3"] ?></option>';
                            col_category += '   <option value="4" ' + checked_4 + '><?= $_SESSION["lb_newsletter_category_4"] ?></option>';
                            col_category += '</select>';

                            if (item.s_status == 'A') {
//                                col_status += '<input type="checkbox" class="js-switch" id="s_' + item.s_running + '"  checked onchange="changeStatus(\'' + item.s_running + '\',\'' + item.s_email + '\',\'' + item.s_status + '\');"  />';
                                col_status += '<span id="s_' + item.s_running + '"  checked onclick="changeStatus(\'' + item.s_running + '\',\'' + item.s_email + '\',\'' + item.s_status + '\');" class="switchery switchery-default" style="box-shadow: rgb(38, 185, 154) 0px 0px 0px 11px inset; border-color: rgb(38, 185, 154); background-color: rgb(38, 185, 154); transition: border 0.4s, box-shadow 0.4s, background-color 1.2s;"><small style="left: 12px; transition: background-color 0.4s, left 0.2s; background-color: rgb(255, 255, 255);"></small></span>';
                                col_status += ' <span class="label label-success">';
                                col_status += (language == 'th' ? item.s_detail_th : item.s_detail_en);
                                col_status += '</span>';
                            } else {

//                                col_status += '<input type="checkbox" class="js-switch" id="s_' + item.s_running + '"   onchange="changeStatus(\'' + item.s_running + '\',\'' + item.s_email + '\',\'' + item.s_status + '\');"  />';
                                col_status += '<span id="s_' + item.s_running + '"  checked onclick="changeStatus(\'' + item.s_running + '\',\'' + item.s_email + '\',\'' + item.s_status + '\');" class="switchery switchery-default" style="box-shadow: rgb(223, 223, 223) 0px 0px 0px 0px inset; border-color: rgb(223, 223, 223); background-color: rgb(255, 255, 255); transition: border 0.4s, box-shadow 0.4s;"><small style="left: 0px; transition: background-color 0.4s, left 0.2s;"></small></span>';
                                col_status += ' <span class="label label-warning">';
                                col_status += (language == 'th' ? item.s_detail_th : item.s_detail_en);
                                col_status += '</span>';
                            }


                            col_delete = '<a href="javascript:newsletterConfirm(\'' + item.s_email + '\');">';
                            col_delete += '<img  src="images/delete.png"  width="30px" height="30px" />';
                            col_delete += '</a>';



                            var addRow = [
                                col_email,
                                col_name,
                                col_phone,
                                col_category,
                                col_status,
                                col_delete
                            ]

                            JsonData.push(addRow);
                        });
                        if (first == "TRUE") {
                            $datatable.dataTable({
                                data: JsonData,
                                order: [[1, 'desc']],
                                columnDefs: [
                                    {orderable: false, targets: [0]}

                                ]
                            });
                        } else {
                            var datatable = $datatable.dataTable().api();
                            $('.dataTables_empty').remove();
                            datatable.clear();
                            datatable.rows.add(JsonData);
                            datatable.draw();
                        }
                        $('#se-pre-con').delay(100).fadeOut();
                    },
                    error: function (data) {

                    }

                });
            }


            function newsletterConfirm(email) {
                $('#tmp_seq').val(email);
                $('#confirm-dialog').modal('show');
            }


            function newsletterDelete() {
                $('#confirm-dialog').modal('hide');
                var email = $('#tmp_seq').val();
                $.ajax({
                    type: 'GET',
                    url: 'controller/newsletterController.php?func=delete&email=' + email,
                    beforeSend: function ()
                    {
                        $('#se-pre-con').fadeIn(100);
                    },
                    success: function (data) {
                        var res = data.split(",");
                        if (res[0] == "0000") {
                            var errCode = res[1] + " (" + res[0] + ")  ";
                            $('#success-code').text(errCode);
                            $('#success-dialog').modal('show');
                        } else {
                            var errCode = res[1] + " (" + res[0] + ")  ";
                            $('#err-code').text(errCode);
                            $('#err-dialog').modal('show');
                        }
                        $('#se-pre-con').delay(100).fadeOut();
                        initialDataTable("FALSE");
                    },
                    error: function (data) {
                        //debug mode ========================================================================================================================
                        var res = data.responseText.split(",");
                        if (res[0] == "0000") {
                            var errCode = res[1] + " (" + res[0] + ")  ";
                            $('#success-code').text(errCode);
                            $('#success-dialog').modal('show');
                        } else {
                            var errCode = res[1] + " (" + res[0] + ")  ";
                            $('#err-code').text(errCode);
                            $('#err-dialog').modal('show');
                        }
                        $('#se-pre-con').delay(100).fadeOut();
                        initialDataTable("FALSE");
                        //debug mode ========================================================================================================================
                    }
                });
            }

        </script>

        <!--  Fix Custom Alert POPUP-->
        <style>

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
            .boxConfirmDelete {
                /*                width: 40%;*/
                margin: 5% auto;
                overflow:hidden;
                background: rgba(75, 209, 248, 0.8);
                padding: 15px;
                border-radius: 1px/60px;
                text-align: left;
                align-content: center;

            }
            /*            .btnClose{
                            background-color: red;
                            color: white;
                        }*/
            .btnConfirm{
                background-color: #ff8000;
                border-color: #ff8000;
                color: white;

            }

            .f-white{
                color: rgb(255, 0, 0);
                color: white;
                font-size: 16px;
            }

        </style>

        <div class="modal fade boxSuccess" id="success-dialog"  Style="width: 370px;height: 64px">
            <span class="close" onclick="closeAlert();">x</span>
            <p id="success-code" class="f-white" >  </p>  

        </div>
        <div class="modal fade boxError" id="err-dialog"  Style="width: 370px;height: 64px">
            <span class="close" onclick="closeAlert();">x</span>
            <p id="err-code" class="f-white"></p>   

        </div>
        <div class="modal fade boxConfirmDelete" id="confirm-dialog"  Style="width: 330px;height: 135px">
            <span class="close" onclick="closeAlert();">x</span>
            <input type="hidden" name="tmp_seq" id="tmp_seq"/>
            <p id="confirm-code" class="f-white"><?= $_SESSION["confirmDelete"] ?></p>  
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btnConfirm" onclick="newsletterDelete()"><?= $_SESSION["btn_confirm"] ?></button>
            </div>
        </div>
        <!--  Fix Custom Alert POPUP-->









    </body>
</html>