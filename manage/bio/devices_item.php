<!DOCTYPE html>

<?php

@session_start();

include './common/FunctionCheckActive.php';
include './common/Permission.php';
include './controller/devicesController.php';
include './service/devicesService.php';
include './controller/commonController.php';
include './service/commonService.php';

ACTIVEPAGES(2);
if($_GET[id] == NULL){
	header('Location: devices.php');
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
                                            <?= $_SESSION["devices"] ?></a> <i class="fa fa-backward"></i> <small id="title_devices"></small></h2>
                                            <ul class="nav navbar-right panel_toolbox" style="display: none">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <a href="devices_item_form.php?type=<?=$_GET['id'];?>" class="btn btn-primary"><?= $_SESSION["press_add"] ?></a> 
                                            <table id="datatable-checkbox" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 40px;">Logo</th>
                                                        <th><?= $_SESSION["press_tb_tr_subject_th"] ?></th>
                                                        <th><?= $_SESSION["press_tb_tr_subject_en"] ?></th>

                                                        
                                                        <th style="width: 40px;"><?= $_SESSION["press_tb_tr_edit"] ?></th>
                                                        <th style="width: 40px;"><?= $_SESSION["press_tb_tr_delete"] ?></th>
                                                    </tr>

                                                </thead>

                                                <tbody id="tbody_press">
                                                </tbody>

                                            </table>
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



        <script  type="text/javascript">
            var $datatable = $('#datatable-checkbox');
            function closeAlert() {
                $('#err-dialog').modal('hide');
                $('#success-dialog').modal('hide');
                $('#image-dialog').modal('hide');
            }


            $(document).ready(function () {
                initialDataTable("TRUE");
            });
            function initialDataTable(first) {
                debugger;
                $.ajax({
                    type: 'GET',
                    url: 'controller/devicesController.php?func=dataTable_item&i_seq=<?=$_GET[id];?>',
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
                            var col_subject_en = "";
                            var col_logo = "";
                            var col_img_preview = "";
                            var col_file = "";
                            var col_status = "";
                            var col_edit = "";
                            var col_delete = "";

                            col_subject_th = item.s_devices_th;
                            col_subject_en = item.s_devices_en;
                            col_logo = '<a href="devices_item.php?id='+item.s_devices_type+'" class="btn btn-primary">'+item.s_devices_logo+'</a>';


                            col_img_preview += '<a href="javascript:previewImage(\'./controller/file/press/' + item.s_img + '\');">';
                            col_img_preview += '<img  src="images/icon_img.png"  width="30px" height="30px" />';
                            col_img_preview += '</a>';

                            col_file += '<a href="controller/pressController.php?func=preview&filename=' + item.s_pathfile + '" target="_bank">';
                            col_file += '<img  src="images/doc.png"  width="30px" height="30px" />';
                            col_file += '</a>';


                            if (item.s_status == 'A') {
                                col_status += '<span class="label label-success">';
                                col_status += (language == 'th' ? item.s_detail_th : item.s_detail_en);
                                col_status += '</span>';

                            } else {

                                col_status += '<span class="label label-warning">';
                                col_status += (language == 'th' ? item.s_detail_th : item.s_detail_en);
                                col_status += '</span>';

                            }



                            col_edit = '<a href="./devices_item_form.php?type=1&seq_i=' + item.id + '" >';
                            col_edit += '<img src="images/edit.png" width="30px" height="30px" />';
                            col_edit += '</a>';
                            debugger;
                            col_delete = '<a href="javascript:pressDelete(' + item.i_seq + ',\'' + item.s_img + '\',\'' + item.s_pathfile + '\');">';
                            col_delete += '<img  src="images/delete.png"  width="30px" height="30px" />';
                            col_delete += '</a>';

                            var addRow = [
                                col_logo,
                                col_subject_th,
                                col_subject_en,
                                
                                //col_img_preview,
                               // col_file,
                               // col_status,
                                col_edit,
                                col_delete
                            ]

                            JsonData.push(addRow);
                        });
                        if (first == "TRUE") {
                            $datatable.dataTable({
                                data: JsonData,
                                order: [[2, 'desc']],
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
                    error: {
                    }

                });
            }







            function pressDelete(seq, img, pdf) {
                var act = confirm("Delete ?");
                if (act != true) {
                    return false;
                }
                $.ajax({
                    type: 'GET',
                    url: 'controller/pressController.php?func=delete&seq=' + seq + '&file=' + img + '&pdf=' + pdf,
                    //data: Jsdata,
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
                    error: {
                    }

                });



            }

            function previewImage(source) {
                document.getElementById('image-dialog').style.display = 'block'
                $("#src-image").attr("src", source);

            }




/**
* Start load title
*/
$.ajax({
                    type: 'GET',
                    url: 'controller/devicesController.php?func=dataTable_title&i_seq=<?=$_GET[id];?>',
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
                            if(language == 'th'){
								$('#title_devices').html(item.s_detail_th);
							}else{
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
        </script>

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
	$('.open_form').click(function(){
		var id = $(this).attr('data_id');
		var data_title = $(this).attr('data_title');
		$('#modal_title').html(data_title);
		var url = "module/devices/form.php?id="+id;
		$('#modal_body').load(url);
	});
	
	$('#btn_save_data').click(function(){
		var data_form = $('#data_form').serialize();
		//swal(id);
	});
</script>


<!-- Sweet Alert  plugin -->
<link rel="stylesheet" href="assets/sweetalert/dist/sweetalert.css">
<script src="assets/sweetalert/dist/sweetalert.js"></script>

    </body>
</html>