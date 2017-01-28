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

class pressController {

    public function __construct() {
        
    }

    public function dataTable() {
        $service = new pressService();
        $_dataTable = $service->dataTable();
        if ($_dataTable != NULL) {
            foreach ($_dataTable as $key => $value) {
                $_dataTable[$key]['s_date'] = $this->ConvertDate($_dataTable[$key]['s_date']);
            }

            return $_dataTable;
        } else {
            return NULL;
        }
    }

    private function ConvertDate($date) {
        $dd = substr($date, 3, 2);
        $mm = substr($date, 0, 2);
        $yyyy = substr($date, 6, 4);
        return $dd . " " . $_SESSION["m_$mm"] . " " . $yyyy;
    }

}
