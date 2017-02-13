<?php

@session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_func = $_POST["func"];
} else {
    $_func = $_GET["func"];
}


class contentController {

    public function __construct() {
        
    }

    public function dataTable_top() {
        $service = new contentService();
        $_dataTable = $service->dataTable_top();
        if ($_dataTable != NULL) {
            return $_dataTable;
        } else {
            return NULL;
        }
    }
    
    public function dataTable_bottom() {
        $service = new contentService();
        $_dataTable = $service->dataTable_bottom();
        if ($_dataTable != NULL) {
            return $_dataTable;
        } else {
            return NULL;
        }
    }


}
