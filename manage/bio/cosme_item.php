<!DOCTYPE html>

<?php

@session_start();

include './common/FunctionCheckActive.php';
include './common/Permission.php';
include './controller/cosmeController.php';
include './service/cosmeService.php';
include './controller/commonController.php';
include './service/commonService.php';

if($_GET[id] == NULL){
	header('Location: cosme.php');
}
ACTIVEPAGES(3);
ACTIVEPAGES_SUB(3, $_GET[id]);

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
                                            <a href="cosme.php">
                                            <?= $_SESSION["cosmeceuticals"] ?></a> <i class=""> /</i><small id="title_cosme"></small></h2>
                                            <ul class="nav navbar-right panel_toolbox" style="display: none">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <a href="cosme_item_form.php?type=<?=$_GET['id'];?>" class="btn btn-primary"><?= $_SESSION["press_add"] ?></a> 
                                            <table id="datatable-checkbox" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 40px;"><?= $_SESSION["cosme_image"] ?></th>
                                                        <th><?= $_SESSION["cosme_subject_th"] ?></th>
                                                        <th><?= $_SESSION["cosme_subject_en"] ?></th>

                                                        
                                                        <th style="width: 40px;"><?= $_SESSION["cosme_edit"] ?></th>
                                                        <th style="width: 40px;"><?= $_SESSION["cosme_delete"] ?></th>
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
                $('#confirm-dialog').modal('hide');
            }


            $(document).ready(function () {
                initialDataTable("TRUE");
            });
            function initialDataTable(first) {
                debugger;
                $.ajax({
                    type: 'GET',
                    url: 'controller/cosmeController.php?func=dataTable_item&id=<?=$_GET[id];?>',
                    //data: Jsdata,
                    beforeSend: function ()
                    {
//                        $('#se-pre-con').fadeIn(100);
                    },
                    success: function (data) {
                        debugger;
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
                            var col_subject_th = "";
                            var col_subject_en = "";
                            var col_logo = "";
                            var col_img_preview = "";
                            var col_file = "";
                            var col_status = "";
                            var col_edit = "";
                            var col_delete = "";

                            col_subject_th = item.title_th;
                            col_subject_en = item.title_en;
                            


                            col_logo += '<a href="javascript:previewImage(\''+ item.img +'\');">';
                            col_logo += '<img src="uploads/cosme_item/'+item.img+'" width="50" />';
                            col_logo += '</a>';

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



                            col_edit = '<a href="./cosme_item_form.php?type='+item.cosme_type+'&id=' + item.id + '" >';
                            col_edit += '<img src="images/edit.png" width="30px" height="30px" />';
                            col_edit += '</a>';
                            debugger;
                            col_delete = '<a href="javascript:Delete(' + item.id + ',\'' + item.s_img + '\',\'' + item.s_pathfile + '\');">';
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




function Delete(seq, img, pdf) {
                $('#tmp_seq').val(seq);
                $('#tmp_img').val(img);
                $('#tmp_pdf').val(pdf);
                $('#confirm-dialog').modal('show');
            }




            function pressDelete() {
                $('#confirm-dialog').modal('hide');
                var seq = $('#tmp_seq').val();
                var img = $('#tmp_img').val();
                var pdf = $('#tmp_pdf').val();
                $.ajax({
                    type: 'GET',
                    //url: 'controller/pressController.php?func=delete&seq=' + seq + '&file=' + img + '&pdf=' + pdf,
                    url: 'controller/cosmeController.php?func=delete&id=' + seq + '&file=' + img + '&pdf=' + pdf,
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


            function Deletess(seq, img, pdf) {
                //////////// popup alert for Delete
                swal({
  title: "Are you sure?",
  text: "You will not be able to recover this imaginary file!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  closeOnConfirm: false
},
function(){
  swal("Deleted!", "Your imaginary file has been deleted.", "success");
  $.ajax({
                    type: 'GET',
                    url: 'controller/cosmeController.php?func=delete&id=' + seq + '&file=' + img + '&pdf=' + pdf,
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
                            //window.location.reload();
                            //initialDataTable();
                            initialDataTable("TRUE");
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
});
                
                /*
                var act = confirm("Delete ?");
                if (act != true) {
                    return false;
                }
                //*/
                



            }

            function previewImage(source) {
                document.getElementById('image-dialog').style.display = 'block'
                $("#src-image").attr("src", "uploads/cosme_item/"+source);

            }




/**
* Start load title
*/
$.ajax({
                    type: 'GET',
                    url: 'controller/cosmeController.php?func=dataTable_title&id=<?=$_GET[id];?>',
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
								$('#title_cosme').html(item.cosme_th);
							}else{
								$('#title_cosme').html(item.cosme_en);
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

<!--  Fix Custom Alert Image-->
        <div id="image-dialog" class="w3-modal"  onclick="this.style.display = 'none'">
            <span class="w3-closebtn w3-hover-red w3-container w3-padding-16 w3-display-topright">&times;</span>
            <div class="w3-modal-content w3-animate-zoom"  align="center">
                <img id="src-image">
            </div>
        </div>
        <!--  Fix Custom Alert Image-->


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
		var url = "module/cosme/form.php?id="+id;
		$('#modal_body').load(url);
	});
	
	$('#btn_save_data').click(function(){
		var data_form = $('#data_form').serialize();
		//swal(id);
	});
</script>

<style>
            #src-image{
                width:100%;
                height:100%;
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
            <p id="success-code" class="f-white"></p> 

        </div>
        <div class="modal fade boxError" id="err-dialog"  Style="width: 370px;height: 64px">
            <span class="close" onclick="closeAlert();">x</span>
            <p id="err-code" class="f-white"></p>   

        </div>
        <div class="modal fade boxConfirmDelete" id="confirm-dialog"  Style="width: 330px;height: 135px">
            <span class="close" onclick="closeAlert();">x</span>
            <input type="hidden" name="tmp_seq" id="tmp_seq"/>
            <input type="hidden" name="tmp_img" id="tmp_img"/>
            <input type="hidden" name="tmp_pdf" id="tmp_pdf"/>
            <p id="confirm-code" class="f-white"><?= $_SESSION["confirmDelete"] ?></p>  
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btnConfirm" onclick="pressDelete()"><?= $_SESSION["btn_confirm"] ?></button>
            </div>
        </div>
<!-- Sweet Alert  plugin -->
<link rel="stylesheet" href="assets/sweetalert/dist/sweetalert.css">
<script src="assets/sweetalert/dist/sweetalert.js"></script>

    </body>
</html>