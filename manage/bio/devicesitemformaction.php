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
//header('Location: devices_item.php?id='.$_POST['type']);



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
                                            <?= $_SESSION["devices"] ?></a> <i class="fa fa-backward"></i> <a href="devices_item.php?id=<?=$_GET['type'];?>"><i id="title_devices"></i></a> <i class="fa fa-backward"></i> <small><?=$txt_title_form;?></small> </h2>
                                            <ul class="nav navbar-right panel_toolbox" style="display: none">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            
<form method="post" id="data_form" action="devices_item_form_action.php">                                           
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
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logo">
    logo
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <input type="file" id="logo" name="logo" required="required" class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="icon">
    Icon
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <input type="file" id="icon" name="icon" required="required" class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="s_device_detail_th">
    <?= $_SESSION["press_tb_tr_subject_th"] ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
 <textarea class="form-control" name="s_device_detail_th" id="s_device_detail_th" ></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="s_device_detail_th">
    <?= $_SESSION["press_tb_tr_subject_en"] ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
 <textarea class="form-control" name="s_device_detail_en" id="s_device_detail_en" ></textarea>
                                                        </div>
                                                    </div>

 
<div class="col-lg-12 col-md-12 col-sm-12">
<button type="button" class="btn btn-primary" data-dismiss="modal" id="btn_save_data"><i class="fa fa-save"></i> Save Data</button>
</div>

<input type="hidden" name="seq_i" id="seq_i" value="<?=$_GET[seq_i];?>"/>
<input type="hidden" name="type" id="type" value="<?=$_GET[type];?>"/>
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
            
            /**
* Start load title
*/
$.ajax({
                    type: 'GET',
                    url: 'controller/devicesController.php?func=dataTable_title&i_seq=<?=$_GET[type];?>',
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


<?php
if($_GET['seq_i']){
?>
<script>
/**
* Start load title
*/
$.ajax({
                    type: 'GET',
                    url: 'controller/devicesController.php?func=dataTable_item_row&i_seq=<?=$_GET[seq_i];?>',
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
							$('#subject_th').val(item.s_devices_th);
							$('#subject_en').val(item.s_devices_en);
							$('#s_device_detail_th').val(item.s_device_detail_th);
							$('#s_device_detail_en').val(item.s_device_detail_en);
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
		$.ajax({
                    data : data_form,
                    type: 'POST',
                    url: 'controller/devicesController.php?func=add_devices',
                    beforeSend: function ()
                    {

                    },
                    success: function (data) {
swal(data);
window.location.replace('devices.php');
                    },
                    error: {
                    }

                }); 
	});
</script>

 
 <!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('s_device_detail_th');
    CKEDITOR.replace('s_device_detail_en');
  });
</script>
<!-- Sweet Alert  plugin -->
<link rel="stylesheet" href="assets/sweetalert/dist/sweetalert.css">
<script src="assets/sweetalert/dist/sweetalert.js"></script>

    </body>
</html>