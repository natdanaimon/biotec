<?php
@session_start();
include './manage/bio/common/FunctionCheckActive.php';
ACTIVEPAGE_SHOW(0);
$fixheader = "fix";
include './content/header.php';
?>
<style>
    .required{
        color:red;
    }
</style>
<div class="tm-main uk-width-medium-1-1">


    <main class="tm-content">



        <div class="yoo-zoo newsletter-uikit newsletter-uikit-newsletter">





            <form id="item-submission" class="uk-form"  method="post" name="submissionForm" accept-charset="utf-8" enctype="multipart/form-data">
                <input type="hidden" name="func" id="func"  value="sendNewsletter"/>
                <div class="sfondo-grigio">

                    <div class="uk-container uk-container-center">
                        <fieldset>
                            <div id="dogoErrorMsg" style="display: none;" class="uk-alert uk-alert-danger">
                                <a href="javascript:closeAlert();" class="uk-alert-close uk-close"></a>
                                <p id="errorMsg" />
                            </div>

                            <div id="dogoSuccMsg" style="display: none;" class="uk-alert uk-alert-success">
                                <a href="javascript:closeAlert();" class="uk-alert-close uk-close"></a>
                                <p id="successMsg" />
                            </div>
                            <legend><?= $_SESSION["lb_newsletter"] ?></legend>

                            <div class="uk-form-row  uk-form-horizontal element element-textpro ">
                                <label class="uk-form-label"><?= $_SESSION["lb_newsletter_name"] ?>  <span class="required">*</span></label>	<div class="uk-form-controls">


                                    <div id="" class="repeatable-element zl">

                                        <div class="row">

                                            <input type="text" id="name" name="name" value="" size="60" maxlength="255" />
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="uk-form-row  uk-form-horizontal element element-textpro ">
                                <label class="uk-form-label"><?= $_SESSION["lb_newsletter_email"] ?>  <span class="required">*</span></label>	<div class="uk-form-controls">


                                    <div id="" class="repeatable-element zl">

                                        <div class="row">

                                            <input type="text" id="email" name="email" value="" size="60" maxlength="255" />
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="uk-form-row  uk-form-horizontal element element-textpro ">
                                <label class="uk-form-label"><?= $_SESSION["lb_newsletter_email_confirm"] ?>  <span class="required">*</span></label>	<div class="uk-form-controls">


                                    <div id="c9e3ee89-97ee-46a5-a6c6-00048f43f5bf" class="repeatable-element zl">

                                        <div class="row">

                                            <input type="text" id="email_confirm" name="email_confirm" value="" size="60" maxlength="255" />
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="uk-form-row  uk-form-horizontal element element-select">
                                <label class="uk-form-label"><?= $_SESSION["lb_newsletter_category"] ?></label>	
                                <div class="uk-form-controls">
                                    <select id="category" name="category">
                                        <option value="0">-<?= $_SESSION["lb_newsletter_category_all"] ?>-</option>
                                        <option value="1"><?= $_SESSION["lb_newsletter_category_1"] ?></option>
                                        <option value="2"><?= $_SESSION["lb_newsletter_category_2"] ?></option>
                                        <option value="3"><?= $_SESSION["lb_newsletter_category_3"] ?></option>
                                        <option value="4"><?= $_SESSION["lb_newsletter_category_4"] ?></option>
                                    </select>

                                </div>
                            </div>
                            <div class="uk-form-row  uk-form-horizontal element element-textpro">
                                <label class="uk-form-label"><?= $_SESSION["lb_newsletter_city"] ?></label>	
                                <div class="uk-form-controls">


                                    <div id="" class="repeatable-element zl">

                                        <div class="row">

                                            <input type="text" id="city" name="city" value="" size="60" maxlength="255" />
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="uk-form-row  uk-form-horizontal element element-textpro">
                                <label class="uk-form-label"><?= $_SESSION["lb_newsletter_town"] ?></label>
                                <div class="uk-form-controls">


                                    <div id="" class="repeatable-element zl">

                                        <div class="row">

                                            <input type="text" id="town" name="town" value="" size="60" maxlength="255" />
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="uk-form-row  uk-form-horizontal element element-textpro ">
                                <label class="uk-form-label"><?= $_SESSION["lb_newsletter_country"] ?>  <span class="required">*</span></label>	<div class="uk-form-controls">


                                    <div id="c" class="repeatable-element zl">

                                        <div class="row">

                                            <input type="text" id="country" name="country" value="" size="60" maxlength="255" />
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="uk-form-row  uk-form-horizontal element element-textpro">
                                <label class="uk-form-label"><?= $_SESSION["lb_newsletter_tel"] ?></label>	<div class="uk-form-controls">


                                    <div id="" class="repeatable-element zl">

                                        <div class="row">

                                            <input type="text" id="tel" name="tel" value="" size="60" maxlength="255" />
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="uk-form-row  uk-form-horizontal element element-textpro">
                                <label class="uk-form-label"><?= $_SESSION["lb_newsletter_website"] ?></label>	<div class="uk-form-controls">


                                    <div id="" class="repeatable-element zl">

                                        <div class="row">

                                            <input type="text" id="website" name="website" value="" size="60" maxlength="255" />
                                        </div>

                                    </div>


                                </div>
                            </div>	
                        </fieldset>




                        <!--                        <div class="uk-alert">Fields marked with an asterisk (*) are required.</div>-->

                        <div class="uk-margin">
                            <button type="submit" id="submit-button" class="uk-button"><?= $_SESSION["btn_newsletter"] ?></button>
                        </div>



                    </div>




                </div>
            </form>

        </div>	
</div>
<script>
    $(document).ready(function () {
        sendMsg();
    });

    function closeAlert() {
        document.getElementById("dogoSuccMsg").style.display = "none";
        document.getElementById("dogoErrorMsg").style.display = "none";
    }

    function sendMsg() {
        // alert("onclick");
        $("#submit-button").click(function () {
            closeAlert();
            var Jsdata = $("#item-submission").serialize();
            $.ajax({
                type: 'POST',
                url: 'controller/newsletterController.php',
                data: Jsdata,
                beforeSend: function ()
                {

                },
                success: function (data) {
                    var res = data.split(",");
                    if (res[0] == "NEWS0000") {
                        var errCode = res[1] + " (" + res[0] + ")  ";
                        $("#successMsg").text(errCode);
                        document.getElementById("dogoSuccMsg").style.display = "block";
                        clearData();
                    } else {
                        var errCode = res[1] + " (" + res[0] + ")  ";
                        $("#errorMsg").text(errCode);
                        document.getElementById("dogoErrorMsg").style.display = "block";
                    }
                },
                error: {
                }

            });
            return false;
        });
        function clearData() {
            $("#name").val("");
            $("#email").val("");
            $("#email_confirm").val("");
            $("#category").val("0");
            $("#city").val("");
            $("#town").val("");
            $("#country").val("");
            $("#tel").val("");
            $("#website").val("");
        }
    }
</script>



<?php
include './content/footer.php';
?>