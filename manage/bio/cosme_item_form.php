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
ACTIVEPAGES_SUB(3, $_GET[type]);
if ($_GET[type] == NULL) {
    header('Location: cosme.php');
}

if ($_GET[id]) {
    $txt_title_form = $_SESSION["txt_title_cosme_edit"];
} else {
    $txt_title_form = $_SESSION["txt_title_cosme_add"];
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
                                    <a href="cosme.php">
                                        <?= $_SESSION["cosmeceuticals"] ?></a> <i class=""> /</i> 
                                    <a href="cosme_item.php?id=<?= $_GET['type']; ?>"><i id="title_cosme"></i></a> 
                                    <i class=""> /</i> <small><?= $txt_title_form; ?></small> </h2>
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







                                    <div class="col-xs-12">
                                        <div class="tab-pane active" id="main">
                                            <p class="lead"></p>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="img">
                                                    <?= $_SESSION["cosme_image"] ?>

                                                </label>

                                                <!--                                                
                                                                                                <table align="left" id="tb_img" style="display: none">
                                                                                                    <tr>
                                                                                                        <td align="left">
                                                                                                            <br />
                                                                                                            <span id="show_image"></span>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </table>                                                        
                                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                                    <input type="file" id="img" name="img"   class="form-control col-md-7 col-xs-12">
                                                                                                </div>
                                                -->                                               
                                                <div class="col-md-12 col-sm-12 col-xs-12">

                                                    <img src="images/user.png" id="show_img" width="200" />
                                                    <br />                                                        
                                                    <br />                                                        
                                                    <div class="fileContainerss"  >
                                                        <input type="file" id="img" name="img"  onchange="readURL(this, 'show_img');"  />

                                                        <label for="show_img" class="btn btn-info" style="display: none;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                                            <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                                                            </svg> 
                                                            <span>Choose a file&hellip;</span>
                                                        </label>
                                                    </div>                                                         

                                                </div>                                                
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title_th">
                                                    <?= $_SESSION["cosme_subject_th"] ?>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <input type="text" id="title_th" name="title_th"  class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title_en">
                                                    <?= $_SESSION["cosme_subject_en"] ?>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <input type="text" id="title_en" name="title_en"  class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="topic_th">
                                                    <?= $_SESSION["cosme_subject_light_th"] ?>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <input type="text" id="topic_th" name="topic_th"  class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="topic_en">
                                                    <?= $_SESSION["cosme_subject_light_en"] ?>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <input type="text" id="topic_en" name="topic_en"  class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="detail_th">
                                                    <?= $_SESSION["cosme_detail_th"] ?>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <textarea class="form-control" name="detail_th" id="detail_th" ></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="detail_en">
                                                    <?= $_SESSION["cosme_detail_en"] ?>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <textarea class="form-control" name="detail_en" id="detail_en" ></textarea>
                                                </div>
                                            </div>

                                        </div>

                                    </div> 


                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <a href="cosme_item.php?id=<?= $_GET[type] ?>">
                                            <button type="button" class="btn btn-primary"><?= $_SESSION["btn_cancel"] ?>
                                            </button>
                                        </a>
                                        <button type="submit" class="btn btn-success" data-dismiss="modal" id="btn_save_data"><i class="fa fa-save"></i> <?= $_SESSION["btn_ok"] ?></button>
                                    </div>


                                    <input type="hidden" name="img_current" id="img_current" value="<?= $_GET[id]; ?>"/>
                                    <input type="hidden" name="id" id="id" value="<?= $_GET[id]; ?>"/>
                                    <input type="hidden" name="type" id="type" value="<?= $_GET[type]; ?>"/>
                                    <input type="hidden" name="func" id="func" value="add_cosme_item"/>

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
                                                                var detail_th = CKEDITOR.instances['detail_th'].getData();
                                                                $('#detail_th').val(detail_th);
                                                                var detail_en = CKEDITOR.instances['detail_en'].getData();
                                                                $('#detail_en').val(detail_en);





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

                                                                    }

                                                                });

                                                            });

                                                            /**
                                                             * Start load title
                                                             */
                                                            $.ajax({
                                                                type: 'GET',
                                                                url: 'controller/cosmeController.php?func=dataTable_title&id=<?= $_GET[type]; ?>',
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
                                                                            $('#title_cosme').html(item.cosme_th);
                                                                        } else {
                                                                            $('#title_cosme').html(item.cosme_en);
                                                                        }
                                                                        //alert(language);

                                                                    });


                                                                },
                                                                error: function (data) {


                                                                }

                                                            });
                                                            /**
                                                             * End load title
                                                             */

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
                        url: 'controller/cosmeController.php?func=dataTable_item_row&id=<?= $_GET[id]; ?>',
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
                                $('#title_th').val(item.title_th);
                                $('#title_en').val(item.title_en);
                                $('#topic_th').val(item.topic_th);
                                $('#topic_en').val(item.topic_en);
                                $('#detail_th').val(item.detail_th);
                                $('#detail_en').val(item.detail_en);
                                $('#img_current').val(item.img);


                                var show_image = item.img;
                                if (show_image) {

                                    $('#show_img').attr("src", "uploads/cosme_item/" + show_image + "?v=<?= time(); ?>");
                                }


                            });


                        },
                        error: function (data) {
                            debugger;
                            var res = JSON.parse(data.responseText);
                            var JsonData = [];
                            $.each(res, function (i, item) {
                                $('#title_th').val(item.title_th);
                                $('#title_en').val(item.title_en);
                                $('#topic_th').val(item.topic_th);
                                $('#topic_en').val(item.topic_en);
                                $('#detail_th').val(item.detail_th);
                                $('#detail_en').val(item.detail_en);
                                $('#img_current').val(item.img);


                                var show_image = item.img;
                                if (show_image) {

                                    $('#show_img').attr("src", "uploads/cosme_item/" + show_image + "?v=<?= time(); ?>");
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
                $('#detail_th').val("");
                $('#detail_en').val("");
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

        <div class="modal fade boxSuccess" id="success-dialog"   Style="width: 460px;height: 64px;    overflow: hidden;">
            <span class="close" onclick="closeAlertReload();">x</span>
            <p id="success-code" class="f-white" > </p>  

        </div>
        <div class="modal fade boxError" id="err-dialog"   Style="width: 460px;height: 64px;    overflow: hidden;">
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

        <!-- CK Editor -->
        <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
        <script>
            $(function () {



                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('detail_th');
                CKEDITOR.replace('detail_en');

            });
        </script>
        <!-- Sweet Alert  plugin -->
        <link rel="stylesheet" href="assets/sweetalert/dist/sweetalert.css">
        <script src="assets/sweetalert/dist/sweetalert.js"></script>

        <!-- Input -->
        <script src="assets/inputfile/js/custom-file-input.js"></script>
        <style>
            .fileContainer {
                overflow: hidden;
                position: relative;
                cursor: pointer;
            }

            .fileContainer [type=file] {
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
    </body>
</html>