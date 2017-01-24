<?php

@session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_func = $_POST["func"];
} else {
    $_func = $_GET["func"];
}



$controller = new contactsController();
switch ($_func) {
    case "delete":
        echo $controller->delete($_GET["seq"]);
        break;
    case "view":
        echo $controller->view($_GET["i_seq"]);
        break;
    case "dataTable":
        echo $controller->dataTable();
        break;
    case "dataTableGet":
        echo $controller->dataTableGet($_GET["i_seq"]);
        break;
}

class contactsController {

    public function __construct() {
        
    }

    public function dataTable() {
        include '../service/contactsService.php';
        $service = new contactsService();
        $_dataTable = $service->dataTable();
        if ($_dataTable != NULL) {
            return json_encode($_dataTable);
        } else {
            return NULL;
        }
    }
    
    public function dataTableGet($i_seq) {
        include '../service/contactsService.php';
        $service = new contactsService();
        $_dataTable = $service->dataTableGet($i_seq);
        if ($_dataTable != NULL) {
            return json_encode($_dataTable);
        } else {
            return NULL;
        }
    }
    

    public function delete($seq) {
        include '../service/contactsService.php';
        $service = new contactsService();
        if ($service->delete($seq)) {
            echo $_SESSION['cd_0000'];
        } else {
            echo $_SESSION['cd_2001'];
        }
    }

    public function view($seq) {
        include '../service/contactsService.php';
        $service = new contactsService();
        $result = "";
        $_data = $service->view($seq);
        foreach ($_data as $key => $value) {

            $result = $_data[$key]['i_seq'] . ",";
            $result .= $_SESSION["contacts_fullname"] . " : " . $_data[$key]['s_name'] . " " . $_data[$key]['s_lastname'] . ",";

            $result .= $_SESSION["tb_col_phone"] . " : " . $_data[$key]['s_number'] . ",";
            $result .= $_SESSION["tb_col_email"] . " : " . $_data[$key]['s_email'] . ",";
            $result .= $_SESSION["contacts_city"] . " : " . $_data[$key]['s_city'] . ",";
            $result .= $_SESSION["contacts_country"] . " : " . $_data[$key]['s_country'] . ",";
            $result .= $_SESSION["tb_col_subject"] . " : " . $_data[$key]['s_subject'] . ",";
            $result .= $_data[$key]['s_message'] . ",";
            $result .= $_SESSION["contacts_time"] . " : " . $_data[$key]['d_date'] . "";
        }
        echo $result;
    }

}
