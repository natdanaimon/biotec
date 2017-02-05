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
        echo $controller->sendMail($_POST["category"], $_POST["subject"], $_POST["txt_email"]);
        break;
}

class newsletterController {

    public function __construct() {
        
    }

    public function sendMail($category, $subject, $detail) {
        include '../common/phpmailer.php';
        include '../service/newsletterService.php';
        include '../common/Utility.php';

        $service = new newsletterService();
        $_dataTable = $service->getAccountEmail($category);

        if ($_dataTable != NULL) {
 
            $util = new Utility();
            $util->CopyTemplatedMail("../templatedEmail/Email.html", "../templatedEmail/Email_Temp.html", $detail);
 
            foreach ($_dataTable as $key => $value) {
   
                $mail = new PHPMailer(TRUE);
                $body = $mail->getFile('../templatedEmail/Email_Temp.html');
                $mail->Host = "cpanel01wh.bkk1.cloud.z.com";
                $mail->Hostname = "biotecitalia-thailand.com";
                $mail->Port = 25;
                $mail->CharSet = 'utf-8';
                $mail->From = "noreply@biotecitalia-thailand.com";
                $mail->FromName = "BiotecItalia Thailand";
                $mail->Subject = $subject;
                $mail->MsgHTML($body);
                $mail->AddAddress($_dataTable[$key]['s_email']);
                $mailcommit = $mail->Send();
            }
            array_map('unlink', glob("../templatedEmail/tmp_img/*.jpg"));
            array_map('unlink', glob("../templatedEmail/tmp_img/*.JPG"));
            array_map('unlink', glob("../templatedEmail/tmp_img/*.png"));
            array_map('unlink', glob("../templatedEmail/tmp_img/*.PNG"));
            echo $_SESSION['cd_0000'];
        } else {
            echo $_SESSION['cd_2001'];
        }
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
