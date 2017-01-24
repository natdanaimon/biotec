<?php

@session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_func = $_POST["func"];
} else {
    $_func = $_GET["func"];
}

//$controller = new pressController();
//switch ($_func) {
//    case "delete":
//        echo $controller->delete($_GET["seq"]);
//        break;
//    case "preview":
//        echo $controller->preview($_GET["filename"]);
//        break;
//}

class devicesController {

    public function __construct() {
        
    }

    public function dataTable($id) {
        $service = new devicesService();
        $_dataTable = $service->dataTable($id);
        if ($_dataTable != NULL) {
            return $_dataTable;
        } else {
            return NULL;
        }
    }
    
    public function dataTable_get($id) {
        $service = new devicesService();
        $_dataTable = $service->dataTable_get($id);
        if ($_dataTable != NULL) {
            return $_dataTable;
        } else {
            return NULL;
        }
    }

}
