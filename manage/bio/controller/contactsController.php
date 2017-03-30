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
            $result .= $_SESSION["contacts_fullname"] . " : <span class='badge' style='background-color: #009fe8' >" . $_data[$key]['s_name'] . " " . $_data[$key]['s_lastname'] . "</span>,";

            $result .= $_SESSION["tb_col_phone"] . " : <span class='badge' style='background-color: #009fe8'  >" . $_data[$key]['s_number'] . "</span>,";
            $result .= $_SESSION["tb_col_email"] . " : <span class='badge' style='background-color: #009fe8' >" . $_data[$key]['s_email'] . "</span>,";
            $result .= $_SESSION["contacts_city"] . " : <span class='badge' style='background-color: #009fe8' >" . $_data[$key]['s_city'] . "</span>,";
            $result .= $_SESSION["contacts_country"] . " : <span class='badge' style='background-color: #009fe8' >" . $_data[$key]['s_country'] . "</span>,";
            $result .= $_SESSION["tb_col_subject"] . " : <span class='badge' style='background-color: #009fe8' >" . $_data[$key]['s_subject'] . "</span>,";
            $result .= "".$_data[$key]['s_message'] . ",";
            $result .= $_SESSION["contacts_time"] . " : <span class='badge' style='background-color: #009fe8' >" . $_data[$key]['d_date'] . "</span>";
        }
        echo $result;
    }

}
