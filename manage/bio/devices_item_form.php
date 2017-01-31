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
if($_GET[type] == NULL){
	header('Location: devices.php');
}

if($_GET[seq_i]){
	$txt_title_form = "Edit";
}else{
	$txt_title_form = "Add New";
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
                                            <?= $_SESSION["devices"] ?></a> <i class="fa fa-caret-right"></i> <a href="devices_item.php?id=<?=$_GET['type'];?>"><i id="title_devices"></i></a> <i class="fa fa-caret-right"></i> <small><?=$txt_title_form;?></small> </h2>
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
                                            

 
 

<div class="col-xs-3">
                      <!-- required for floating -->
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs tabs-left">
                        <li class="active"><a href="#main" data-toggle="tab">Main</a>
                        </li>
                        <li><a href="#images" data-toggle="tab">Images</a>
                        </li>
                        <li><a href="#technology" data-toggle="tab">Technology</a>
                        </li>
                        
                        <li><a href="#procedures" data-toggle="tab">Procedures</a>
                        </li>
                        <li><a href="#techmocal" data-toggle="tab">Techmocal</a>
                        </li>
                        <li><a href="#pubblications" data-toggle="tab">Pubblications</a>
                        </li>
                         
                      </ul>
                    </div>

                    <div class="col-xs-9">
                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div class="tab-pane active" id="main">
                          <p class="lead">Main</p>
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
    Video
                                                             
                                                        </label>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <input type="text" id="s_devices_video" name="s_devices_video"  class="form-control col-md-7 col-xs-12">
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
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="s_device_detail_en">
    <?= $_SESSION["press_tb_tr_subject_en"] ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
 <textarea class="form-control" name="s_device_detail_en" id="s_device_detail_en" ></textarea>
                                                        </div>
                                                    </div>
                        </div>
<!-- ==================== Images ================== -->                        
                        <div class="tab-pane" id="images">
                        	<p class="lead">Images</p>
<div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logo">
    logo
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
                                                            <input type="file" id="logo" name="logo"   class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="icon">
    Icon
                                                            <span class="required">*</span>
                                                        </label>
<table align="left" id="tb_icon" style="display: none">
	<tr>
		<td align="left">
		<br />
			<span id="show_icon"></span>
		</td>
	</tr>
</table>                                                         
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <input type="file" id="icon" name="icon"   class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>
                        
                        <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="01_before">
    01  Before
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <input type="file" id="01_before" name="01_before"   class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>
                        <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="01_after">
    01  After
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <input type="file" id="01_after" name="01_after"   class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>
                        <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="02_before">
    02  Before
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <input type="file" id="02_before" name="02_before"   class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>
                        <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="02_after">
    02  After
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <input type="file" id="02_after" name="02_after"   class="form-control col-md-7 col-xs-12">
                                                        </div>
                        </div>
                        <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="03_before">
    03  Before
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <input type="file" id="03_before" name="03_before"   class="form-control col-md-7 col-xs-12">
                                                        </div>
                        </div>
                        <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="03_after">
    03  After
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <input type="file" id="03_after" name="03_after"   class="form-control col-md-7 col-xs-12">
                                                        </div>
                        </div>
                        </div>
<!-- ==================== Technology ================== -->                        
                        <div class="tab-pane" id="technology">
                        	<p class="lead">Technology</p>
                        	<div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="s_technology_th">
    <?= $_SESSION["press_tb_tr_subject_th"] ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
 <textarea class="form-control" name="s_technology_th" id="s_technology_th" ></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="s_technology_en">
    <?= $_SESSION["press_tb_tr_subject_en"] ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
 <textarea class="form-control" name="s_technology_en" id="s_technology_en" ></textarea>
                                                        </div>
                                                    </div>
                        </div>
<!-- ==================== Procedures ================== -->                         
                        <div class="tab-pane" id="procedures">
                        	<p class="lead">Procedures</p>
                        	<div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="s_procedures_th">
    <?= $_SESSION["press_tb_tr_subject_th"] ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
 <textarea class="form-control" name="s_procedures_th" id="s_procedures_th" ></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="s_procedures_en">
    <?= $_SESSION["press_tb_tr_subject_en"] ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
 <textarea class="form-control" name="s_procedures_en" id="s_procedures_en" ></textarea>
                                                        </div>
                                                    </div>
                        </div>
<!-- ==================== Techmocal ================== -->                          
                        <div class="tab-pane" id="techmocal">
                        	<p class="lead">Techmocal</p>
                        	<div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="s_techmocal_th">
    <?= $_SESSION["press_tb_tr_subject_th"] ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
 <textarea class="form-control" name="s_techmocal_th" id="s_techmocal_th" ></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="s_techmocal_en">
    <?= $_SESSION["press_tb_tr_subject_en"] ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
 <textarea class="form-control" name="s_techmocal_en" id="s_techmocal_en" ></textarea>
                                                        </div>
                                                    </div>
                        </div>
<!-- ==================== Pubblications ================== -->                    
                        <div class="tab-pane" id="pubblications">
                        	<p class="lead">Pubblications</p>
                        	<div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="s_pubblications_th">
    <?= $_SESSION["press_tb_tr_subject_th"] ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
 <textarea class="form-control" name="s_pubblications_th" id="s_pubblications_th" ></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="s_pubblications_en">
    <?= $_SESSION["press_tb_tr_subject_en"] ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
 <textarea class="form-control" name="s_pubblications_en" id="s_pubblications_en" ></textarea>
                                                        </div>
                                                    </div>
                        </div>
                      </div>
                    </div> 
 
 
<div class="col-lg-12 col-md-12 col-sm-12">
<button type="submit" class="btn btn-primary" data-dismiss="modal" id="btn_save_data"><i class="fa fa-save"></i> Save Data</button>
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

				
                  
				$("#form_add").submit(function(e){
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
      function closeAlert() {
                $('#err-dialog').modal('hide');
                $('#success-dialog').modal('hide');
                $('#image-dialog').modal('hide');
            }      
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
                        var show_image = "";
                        $.each(res, function (i, item) {
							$('#subject_th').val(item.s_devices_th);
							$('#subject_en').val(item.s_devices_en);
							$('#s_devices_video').val(item.s_devices_video);
							$('#s_device_detail_th').val(item.s_device_detail_th);
							$('#s_device_detail_en').val(item.s_device_detail_en);
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
                       
                       
                       		show_logo =  item.s_devices_logo;
							if(show_logo){
								$('#show_logo').html('<img src="uploads/devices_item/'+show_logo+'" width="200" />');
								$('#tb_logo').show();
							}
							
							show_icon =  item.s_devices_icon;
							if(show_icon){
								$('#show_icon').html('<img src="uploads/devices_item/'+show_icon+'" width="200" />');
								$('#tb_icon').show();
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
            <span class="close" onclick="closeAlert();">x</span>
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
<!-- Sweet Alert  plugin -->
<link rel="stylesheet" href="assets/sweetalert/dist/sweetalert.css">
<script src="assets/sweetalert/dist/sweetalert.js"></script>

    </body>
</html>