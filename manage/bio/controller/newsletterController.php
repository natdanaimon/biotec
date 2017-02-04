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
    
}

class newsletterController {

    public function __construct() {
        
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

    public function updateStatus($email , $status) {
        include '../service/newsletterService.php';
        $service = new newsletterService();
        if ($service->updateStatus($email , $status)) {
            echo $_SESSION['cd_0000'];
        } else {
            echo $_SESSION['cd_2001'];
        }
    }
    
     public function updateCategory($email , $type) {
        include '../service/newsletterService.php';
        $service = new newsletterService();
        if ($service->updateCategory($email , $type)) {
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
