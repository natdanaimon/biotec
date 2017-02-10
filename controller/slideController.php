<?php

@session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_func = $_POST["func"];
} else {
    $_func = $_GET["func"];
}


class slideController {

    public function __construct() {
        
    }

    public function dataTable($_page) {
        $service = new slideService();
        $_dataTable = $service->dataTable($_page);
        if ($_dataTable != NULL) {
            return $_dataTable;
        } else {
            return NULL;
        }
    }


}
