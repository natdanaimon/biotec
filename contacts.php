<?php
@session_start();
include './manage/bio/common/FunctionCheckActive.php';
ACTIVEPAGE_SHOW(7);
$fixheader = "contacts";
include './content/header.php';
include './content/slide.php';
slidePage("contacts");
?>

<div class="uk-container uk-container-center posizione-fissa">

    <div class="elemento-absolute">
        <section class="elemento-absolute-content" data-uk="grid-match {target:'> div > .uk-panel'}"><div class="">
                <span class="uk-icon-envelope"><?= $_SESSION["cont_email"] ?>: <a href="mailto:info@biotecitalia-thailand.com">info@biotecitalia-thailand.com </a> 
                    <a href="mailto:info@biotecitalia.com"></a></span> <br />
                <span class="uk-icon-phone"><?= $_SESSION["cont_tel"] ?>: <a href="tel:+66854825565">+66 085-4825565</a></span> <br />
<!--                <span class="uk-icon-print"><?= $_SESSION["cont_fax"] ?>: +66 0999 99999</span> <br /><br /> -->
                <span class="uk-icon-map-marker"><?= $_SESSION["cont_add_l1"] ?></span> 
                <br /><span class="spazio"><?= $_SESSION["cont_add_l2"] ?> </span>
                <br /><span class="spazio"><?= $_SESSION["cont_add_l3"] ?> </span>
                <br /><span class="spazio"><?= $_SESSION["cont_add_l4"] ?></span>
                <br /><span class="spazio"><?= $_SESSION["cont_add_l5"] ?></span>

                <script type="text/javascript" src="http://www.skypeassets.com/i/scom/js/skype-uri.js"></script>
<!--                <div id="SkypeButton_Call_biotecitalia_1">
                    <script type="text/javascript">
                        Skype.ui({
                            "name": "dropdown",
                            "element": "SkypeButton_Call_biotecitalia_1",
                            "participants": ["biotecitalia"],
                            "imageColor": "white",
                            "imageSize": 32
                        });
                    </script>
                </div>-->
            </div>
        </section>
    </div>

</div>

<div class="tm-block ">
    <div class="tm-middle uk-grid" data-uk-grid-match data-uk-grid-margin>

        <div class="tm-main uk-width-medium-1-1">


            <main class="tm-content">



                <div class="yoo-zoo formcontatti-uikit formcontatti-uikit-form-contacts">

                    <article class="uk-article">






                        <div class="sfondo-grigio">
                            <div class="uk-container uk-container-center">
                                <h2><?= $_SESSION["contacts"] ?></h2>

                                <div>
                                    <script>

                                        var dogoErrorMsg = new Array();
                                        dogoErrorMsg["dogousername"] = "Please write your Name";
                                        dogoErrorMsg["dogolastname"] = "Please write your Last Name";
                                        dogoErrorMsg["dogocity"] = "Please write your City";
                                        dogoErrorMsg["dogocountry"] = "Please write your Country";
                                        dogoErrorMsg["dogoemail"] = "Please write your E-mail";
                                        dogoErrorMsg["emailInvalid"] = "Please write a valid E-mail Address";
                                        dogoErrorMsg["dogosubject"] = "Please write the subject";
                                        dogoErrorMsg["dogophone"] = "Please write your telephone number";
                                        dogoErrorMsg["dogomessage"] = "Please write your message";
                                        dogoErrorMsg["messageError"] = "COM_ZOO_CONTACT_MESSAGE_ERROR";
                                        dogoErrorMsg["ajaxError"] = "COM_ZOO_CONTACT_AJAX_ERROR";
                                    </script>


                                    <div id="dogoErrorMsg" style="display: none;" class="uk-alert uk-alert-danger">
                                        <a href="javascript:closeAlert();" class="uk-alert-close uk-close"></a>
                                        <p id="errorMsg" />
                                    </div>

                                    <div id="dogoSuccMsg" style="display: none;" class="uk-alert uk-alert-success">
                                        <a href="javascript:closeAlert();" class="uk-alert-close uk-close"></a>
                                        <p id="successMsg" />
                                    </div>


                                    <form class="uk-form" id="dogoform">

                                        <fieldset>
                                            <legend></legend>
                                            <input type="hidden" name="func" id="func"  value="sendMsg"/>
                                            <div class="uk-form-row"> <label> <h4><?= $_SESSION["cont_name"] ?> </h4><input type="text" name="dogousername" id="dogousername"  /> </label></div>
                                            <div class="uk-form-row"> <label> <h4><?= $_SESSION["cont_lastname"] ?> </h4><input type="text" name="dogolastname" id="dogolastname"  /> </label></div>
                                            <div class="uk-form-row"> <label> <h4><?= $_SESSION["cont_email"] ?> </h4><input type="text" name="dogoemail" id="dogoemail" /> </label></div> 
                                            <div class="uk-form-row"> <label> <h4><?= $_SESSION["cont_phone"] ?> </h4><input type="text" name="dogophone" id="dogophone" /> </label></div>
                                            <div class="uk-form-row"> <label> <h4><?= $_SESSION["cont_city"] ?> </h4><input type="text" name="dogocity" id="dogocity" /> </label></div>
                                            <div class="uk-form-row"> <label> <h4><?= $_SESSION["cont_country"] ?> </h4><input type="text" name="dogocountry" id="dogocountry" /> </label></div>
                                            <div class="uk-form-row"> <label> <h4><?= $_SESSION["cont_subject"] ?> </h4><input type="text" name="dogosubject" id="dogosubject" /> </label></div>
                                            <div class="uk-form-row"> <label> <h4><?= $_SESSION["cont_message"] ?> </h4><textarea name="dogomessage" id="dogomessage" ></textarea> </label></div>
                                            <div class="uk-form-row submit"> </div>
                                            <div class="uk-form-row submit" Style='color: #ffffff'>
                                                <input type="button" class="uk-button uk-button-primary" id="dogoContact"  value="<?= $_SESSION["cont_send"] ?>" />
                                            </div>
                                        </fieldset>
                                    </form>
                                </div> 			
                            </div>
                        </div>







                    </article>

                </div>
            </main>



        </div>


    </div>	
</div>
<div class="uk-container uk-container-center">

    <div class="tm-block ">
        <section class="tm-bottom-a uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
            <div class="uk-width-1-1">
                <div class="uk-panel uk-panel-box mappa">
                    <div id="map" class="wk-map wk-map-default" style="height: 406px; width:100%;" >

                    </div>

                </div>
            </div>
        </section>
    </div>


</div>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEZxdcYRz5zRiKr8b80TbIIj3lzxLfVGA&callback=initMap">
</script>






<script>
    function initMap() {
        var uluru = {lat: 13.7466075, lng: 100.5318353};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 19,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }

    $(document).ready(function () {
        sendMsg();
    });



    function closeAlert() {
        document.getElementById("dogoSuccMsg").style.display = "none";
        document.getElementById("dogoErrorMsg").style.display = "none";
    }

    function sendMsg() {
        // alert("onclick");
        $("#dogoContact").click(function () {
            closeAlert();
            var Jsdata = $("#dogoform").serialize();
            $.ajax({
                type: 'POST',
                url: 'controller/contactsController.php',
                data: Jsdata,
                beforeSend: function ()
                {

                },
                success: function (data) {
                    var res = data.split(",");
                    if (res[0] == "CON0000") {
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
            $("#dogousername").val("");
            $("#dogolastname").val("");
            $("#dogoemail").val("");
            $("#dogophone").val("");
            $("#dogocity").val("");
            $("#dogocountry").val("");
            $("#dogosubject").val("");
            $("#dogomessage").val("");
        }
    }
</script>
<?php
include './content/footer.php';
?>