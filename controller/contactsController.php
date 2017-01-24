<?php

@session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_func = $_POST["func"];
} else {
    $_func = $_GET["func"];
}



$controller = new contactsController();
switch ($_func) {
    case "sendMsg":
        echo $controller->sendMsg($_POST["dogousername"], $_POST["dogolastname"], $_POST["dogoemail"], $_POST["dogophone"], $_POST["dogocity"], $_POST["dogocountry"], $_POST["dogosubject"], $_POST["dogomessage"]);
        break;
}

class contactsController {

    public function __construct() {
        
    }

    public function sendMsg($dogousername, $dogolastname, $dogoemail, $dogophone, $dogocity, $dogocountry, $dogosubject, $dogomessage) {

        $resultValidate = $this->validateForm($dogousername, $dogolastname, $dogoemail, $dogophone, $dogocity, $dogocountry, $dogosubject, $dogomessage);
        if ($resultValidate != "" || $resultValidate != NULL) {
            echo $resultValidate;
        } else {

            include_once '../service/contactsService.php';
            $service = new contactsService();
            $result = $service->sendMsg($dogousername, $dogolastname, $dogoemail, $dogophone, $dogocity, $dogocountry, $dogosubject, $dogomessage);
            if ($result) {
                echo $_SESSION["con_0000"];
                $this->sendMailToCustomer($dogousername, $dogolastname, $dogoemail);
                $this->sendMailToAdmin($dogousername, $dogolastname, $dogoemail, $dogophone, $dogocity, $dogocountry, $dogosubject, $dogomessage);
            } else {
                echo $_SESSION["con_3001"];
            }
        }
    }

    private function sendMailToCustomer($dogousername, $dogolastname, $dogoemail) {
        include '../manage/bio/common/phpmailer.php';
        $mail = new PHPMailer();
        $body = $mail->getFile('../mail/TemplatedReceiveMailAuto.php');
        $body = eregi_replace("&name;", $dogousername . " " . $dogolastname, $body);
        $body = eregi_replace("&mseeage;", $_SESSION["sendmail_recieve_auto_customer"], $body);
        $body = eregi_replace("&dear;", $_SESSION["sendmail_dear"], $body);
        $body = eregi_replace("&footer;", $_SESSION["sendmail_end"], $body);
        $mail->Host = "cpanel01wh.bkk1.cloud.z.com";
        $mail->Hostname = "biotecitalia-thailand.com";
        $mail->Port = 25;
        $mail->CharSet = 'utf-8';
        $mail->From = "noreply@biotecitalia-thailand.com";
        $mail->FromName = "BiotecItalia Thailand";
        $mail->Subject = $_SESSION["sendmail_recieve_auto_customer_subject"];
        $mail->MsgHTML($body);
        $mail->AddAddress("$dogoemail");
        $mailcommit = $mail->Send();
    }

    private function sendMailToAdmin($dogousername, $dogolastname, $dogoemail, $dogophone, $dogocity, $dogocountry, $dogosubject, $dogomessage) {
        $mail = new PHPMailer();
        $body = $mail->getFile('../mail/TemplatedContactsMailToAdmin.php');
        $body = eregi_replace("&label1;", $dogousername . " " . $dogolastname, $body);
        $body = eregi_replace("&label2;", $dogoemail, $body);
        $body = eregi_replace("&label3;", $dogophone, $body);
        $body = eregi_replace("&label4;", (trim($dogocity) != "" ? $dogocity : "-"), $body);
        $body = eregi_replace("&label5;", (trim($dogocountry) != "" ? $dogocountry : "-"), $body);
        $body = eregi_replace("&label6;", $dogosubject, $body);
        $body = eregi_replace("&label7;", $dogomessage, $body);

        $mail->Host = "cpanel01wh.bkk1.cloud.z.com";
        $mail->Hostname = "biotecitalia-thailand.com";
        $mail->Port = 25;
        $mail->CharSet = 'utf-8';
        $mail->From = "noreply@biotecitalia-thailand.com";
        $mail->FromName = "(Contacts) BiotecItalia Thailand";
        $mail->Subject = "E-Mail From Biotecitalia-thailand.com (Customer Contacts)";
        $mail->MsgHTML($body);
        $mail->AddAddress("info@biotecitalia-thailand.com");
        $mailcommit = $mail->Send();
    }

    private function validateForm($dogousername, $dogolastname, $dogoemail, $dogophone, $dogocity, $dogocountry, $dogosubject, $dogomessage) {
        $strReturn3002 = $_SESSION["con_3002"];
        $strReturn3004 = $_SESSION["con_3004"];
        $reqSingleQoute = "/'/";

        if (trim($dogousername) == "") {
            return $strReturn3002 = eregi_replace("field", $_SESSION["cont_name"], $strReturn3002);
        }
        if (preg_match($reqSingleQoute, $dogousername)) {
            return $strReturn3004 = eregi_replace("field", $_SESSION["cont_name"], $strReturn3004);
        }


        if (preg_match($reqSingleQoute, $dogolastname)) {
            return $strReturn3004 = eregi_replace("field", $_SESSION["cont_lastname"], $strReturn3004);
        }


        if (trim($dogoemail) == "") {
            return $strReturn3002 = eregi_replace("field", $_SESSION["cont_email"], $strReturn3002);
        }
        if (!filter_var(trim($dogoemail), FILTER_VALIDATE_EMAIL)) {
            return $_SESSION["con_3003"];
        }


        if (trim($dogophone) == "") {
            return $strReturn3002 = eregi_replace("field", $_SESSION["cont_phone"], $strReturn3002);
        }
        if (preg_match($reqSingleQoute, $dogophone)) {
            return $strReturn3004 = eregi_replace("field", $_SESSION["cont_phone"], $strReturn3004);
        }



        if (preg_match($reqSingleQoute, $dogocity)) {
            return $strReturn3004 = eregi_replace("field", $_SESSION["cont_city"], $strReturn3004);
        }



        if (preg_match($reqSingleQoute, $dogocountry)) {
            return $strReturn3004 = eregi_replace("field", $_SESSION["cont_country"], $strReturn3004);
        }



        if (trim($dogosubject) == "") {
            return $strReturn3002 = eregi_replace("field", $_SESSION["cont_subject"], $strReturn3002);
        }
        if (preg_match($reqSingleQoute, $dogosubject)) {
            return $strReturn3004 = eregi_replace("field", $_SESSION["cont_subject"], $strReturn3004);
        }




        if (trim($dogomessage) == "") {
            return $strReturn3002 = eregi_replace("field", $_SESSION["cont_message"], $strReturn3002);
        }
        if (preg_match($reqSingleQoute, $dogomessage)) {
            return $strReturn3004 = eregi_replace("field", $_SESSION["cont_message"], $strReturn3004);
        }
    }

}
