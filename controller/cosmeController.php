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

class cosmeController {

    public function __construct() {
        
    }

    public function dataTable_type($id) {
        $service = new cosmeService();
        $_dataTable = $service->dataTable_type($id);
        if ($_dataTable != NULL) {
            return $_dataTable;
        } else {
            return NULL;
        }
    }
    public function dataTable_type_d($id) {
        $service = new cosmeService();
        $_dataTable = $service->dataTable_type_d($id);
        if ($_dataTable != NULL) {
            return $_dataTable;
        } else {
            return NULL;
        }
    }
    
    public function dataTable_item($id) {
        $service = new cosmeService();
        $_dataTable = $service->dataTable_item($id);
        if ($_dataTable != NULL) {
            return $_dataTable;
        } else {
            return NULL;
        }
    }
    
    public function dataTable_item_type($id) {
        $service = new cosmeService();
        $_dataTable = $service->dataTable_item_type($id);
        if ($_dataTable != NULL) {
            return $_dataTable;
        } else {
            return NULL;
        }
    }
    
    public function dataTable_item_get($id) {
        $service = new cosmeService();
        $_dataTable = $service->dataTable_item_get($id);
        if ($_dataTable != NULL) {
            return $_dataTable;
        } else {
            return NULL;
        }
    }
    
    
    
    public function dataTable($id) {
        $service = new cosmeService();
        $_dataTable = $service->dataTable($id);
        if ($_dataTable != NULL) {
            return $_dataTable;
        } else {
            return NULL;
        }
    }
    
    public function dataTable_get($id) {
        $service = new cosmeService();
        $_dataTable = $service->dataTable_get($id);
        if ($_dataTable != NULL) {
            return $_dataTable;
        } else {
            return NULL;
        }
    }

}
