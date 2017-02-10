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

class newsController {

    public function __construct() {
        
    }

    public function dataTable() {
        $service = new newsService();
        $_dataTable = $service->dataTable();
        if ($_dataTable != NULL) {
            foreach ($_dataTable as $key => $value) {
                $_dataTable[$key]['d_date'] = $this->ConvertDate($_dataTable[$key]['d_date']);
            }

            return $_dataTable;
        } else {
            return NULL;
        }
    }

    public function dataTable_sel($seq_i) {
        $service = new newsService();
        $_dataTable = $service->query_dataTable($seq_i);
        if ($_dataTable != NULL) {
            foreach ($_dataTable as $key => $value) {
                $_dataTable[$key]['d_date'] = $this->ConvertDate($_dataTable[$key]['d_date']);
            }
            return $_dataTable;
        } else {
            return NULL;
        }
    }
    
        public function dataTable_type($type_i) {
        $service = new newsService();
        $_dataTable = $service->dataTable_type($type_i);
        if ($_dataTable != NULL) {
            foreach ($_dataTable as $key => $value) {
                $_dataTable[$key]['d_date'] = $this->ConvertDate($_dataTable[$key]['d_date']);
            }
            return $_dataTable;
        } else {
            return NULL;
        }
    }

    private function ConvertDate($date) {
        //2017-02-06
        //01234
        //2017-02-06
        //0123456789
        //7- 2-06
        $month_th = array(1 => 'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม');
        $month_en = array(1 => 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $yyyy = substr($date, 0, 4); //yyyy
        $mm = substr($date, 5, 2);
        $dd = substr($date, 8, 2);
        return $dd . " " . $month_en[(int) $mm] . " " . $yyyy;
    }

}
