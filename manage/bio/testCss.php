<!DOCTYPE html>
<html class='no-js' lang='en'>
    <head>
        <meta charset='utf-8'>
        <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
        <title>Sign in</title>
        <meta content='lab2023' name='author'>
        <meta content='' name='description'>
        <meta content='' name='keywords'>
        <link href="assets/stylesheets/application-a07755f5.css" rel="stylesheet" type="text/css" />
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/images/favicon.ico" rel="icon" type="image/ico" />

    </head>
    <body class='login'>
        <div class='wrapper'>
            <div class='row'>
                <div class='col-lg-12'>
                    <div class='brand text-center'>
                        <h1>
                            <div class='logo-icon'>
                                <i class='icon-building'></i>
                            </div>
                            iBank
                        </h1>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-lg-12'>
                    <form id="form-login" method="post" >
                        <fieldset class='text-center'>
                            <legend>Login to your account</legend>
                            <div class='form-group'>
                                <input class='form-control' placeholder='Username' type='text' id="user" name="user">
                            </div>
                            <div class='form-group'>
                                <input class='form-control' placeholder='Password' type='password' id="pass" name="pass">
                            </div>
                            <div class='text-center'>
                                <div class='checkbox'>
                                    <label>
                                        <input type='checkbox'>
                                        Remember me on this computer
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-default" id="btn-login" >Sign in</button>
                                <p id="error"/>
                                <div class="se-pre-con" id="se-pre-con"></div>
                                <!--                                 <a class="btn btn-default" href="dashboard.php">Sign in</a>-->
                                <!--                                <br>
                                                                <a href="forgot_password.html">Forgot password?</a>-->
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <!-- Javascripts -->
        <script src="js/login/jquery.min.js" type="text/javascript"></script>
        <script src="js/login/jquery-ui.min.js" type="text/javascript"></script>
        <script src="js/login/modernizr.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/application-985b892b.js" type="text/javascript"></script>

        <!-- Google Analytics -->
        <?php
        include './common/Utility.php';
        $util = new Utility();
        $util->setCSSPageLoading();
        ?>
        <div class="modal fade  box" id="err-dialog"  Style="width: 350px;height: 60px">
            <span class="close" onclick="closeAlert();">x</span>
            <p id="err-code" class="f-red"></p>   

        </div>







        <style>
            .box {
                /*                width: 40%;*/
                margin: 5% auto;
                overflow:hidden;
                background: rgba(117, 7, 7, 0.5);
                padding: 15px;
                border-radius: 10px/40px;
                text-align: left;
                align-content: center;
            }
            .f-red{
                /*                color: rgb(255, 0, 0);*/
                color: rgba(240, 1, 1, 1.65);
                font-size: 16px;
            }






        </style>
        <script  type="text/javascript">

            function closeAlert() {
                $('#err-dialog').modal('hide');
            }


            $(document).ready(function () {
                login();
                $('#se-pre-con').delay(1000).fadeOut();
            });

            function login() {
                $("#btn-login").click(function () {
                    var Jsdata = $("#form-login").serialize();
                    $.ajax({
                        type: 'POST',
                        url: 'controller/loginController.php',
                        data: Jsdata,
                        beforeSend: function ()
                        {
                            $('#se-pre-con').fadeIn(100);
                        },
                        success: function (data) {
                            //alert(data);
                            if (data == "0000") {

                                window.location = "dashboard.php";
                            } else if (data == "4003") {
                                var errCode = "(" + data + ") : username and password invalid !";

                                $('#err-code').text(errCode);
                                $('#err-dialog').modal('show');
                            } else {

                            }
                            $('#se-pre-con').delay(100).fadeOut();
                        },
                        error: {
                        }

                    });
                    return false;
                });

            }



        </script>


    </body>
</html>
