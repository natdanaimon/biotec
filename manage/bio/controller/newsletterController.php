<?php

@session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_func = $_POST["func"];
} else {
    $_func = $_GET["func"];
}



$controller = new newsletterController();
switch ($_func) {
    case "delete":
        echo $controller->delete($_GET["email"]);
        break;
    case "dataTable":
        echo $controller->dataTable();
        break;
    case "updateStatus":
        echo $controller->updateStatus($_GET["email"], $_GET["status"]);
        break;
    case "updateCategory":
        echo $controller->updateCategory($_GET["email"], $_GET["category"]);
        break;
    case "sendMail":
        echo $controller->sendMail($_POST["category"],$_POST["subject"], $_POST["txt_email"]);
        break;
}

class newsletterController {

    public function __construct() {
        
    }

    public function sendMail($category, $subject , $txt) {
        include '../common/phpmailer.php';
        $mail = new PHPMailer();
        $body = $mail->getFile('../templatedEmail/Email.php');
        $body = eregi_replace("&detail;", $txt, $body);
        $mail->Host = "cpanel01wh.bkk1.cloud.z.com";
        $mail->Hostname = "biotecitalia-thailand.com";
        $mail->Port = 25;
        $mail->CharSet = 'utf-8';
        $mail->From = "noreply@biotecitalia-thailand.com";
        $mail->FromName = "BiotecItalia Thailand";
        $mail->Subject = $subject;
        $mail->MsgHTML($body);
        $mail->AddAddress("natdanaimon@gmail.com");
        $mailcommit = $mail->Send();
    }

    public function dataTable() {
        include '../service/newsletterService.php';
        $service = new newsletterService();
        $_dataTable = $service->dataTable();
        if ($_dataTable != NULL) {
            return json_encode($_dataTable);
        } else {
            return NULL;
        }
    }

    public function updateStatus($email, $status) {
        include '../service/newsletterService.php';
        $service = new newsletterService();
        if ($service->updateStatus($email, $status)) {
            echo $_SESSION['cd_0000'];
        } else {
            echo $_SESSION['cd_2001'];
        }
    }

    public function updateCategory($email, $type) {
        include '../service/newsletterService.php';
        $service = new newsletterService();
        if ($service->updateCategory($email, $type)) {
            echo $_SESSION['cd_0000'];
        } else {
            echo $_SESSION['cd_2001'];
        }
    }

    public function delete($email) {
        include '../service/newsletterService.php';
        $service = new newsletterService();
        if ($service->delete($email)) {
            echo $_SESSION['cd_0000'];
        } else {
            echo $_SESSION['cd_2001'];
        }
    }

}
