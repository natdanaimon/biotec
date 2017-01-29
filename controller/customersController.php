<?php

@session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_func = $_POST["func"];
} else {
    $_func = $_GET["func"];
}


class customersController {

    public function __construct() {
        
    }

    public function dataTable() {
        $service = new customersService();
        $_dataTable = $service->dataTable();
        if ($_dataTable != NULL) {
            return $_dataTable;
        } else {
            return NULL;
        }
    }


}
