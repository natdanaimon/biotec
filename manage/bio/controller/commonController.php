<?php

@session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $info = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', json_encode($_POST)), true);
} else {
    $info = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', json_encode($_GET)), true);
}


$controller = new commonController();
switch ($info[func]) {
    case "getMail":
        echo $controller->getMail();
        break;
}

class commonController {

    public function getSessionStatus($local) {
        if ($local == 1) {
            include '../service/commonService.php';
        }
        $_SERVER[REQUEST_URI];
        $service = new commonService();
        if ($_SESSION["sessionStatus"] == NULL || $_SESSION["sessionStatus"] == 'null') {
            $_data = $service->getSessionStatus();
            $_SESSION["sessionStatus"] = $_data;
        } else {
            $_data = $_SESSION["sessionStatus"];
        }
        return $_data;
    }

    public function getMail() {
        include '../service/commonService.php';
        $service = new commonService();
        $_dataTable = $service->getMail();
        if ($_dataTable != NULL) {
            return json_encode($_dataTable);
        } else {
            return NULL;
        }
    }

    function status($s, $type) {
        $com = new commonController();

        if ($_SESSION["sessionStatus"] == NULL || $_SESSION["sessionStatus"] == '') {
            $_data = $com->getSessionStatus(2);
        } else {
            $_data = $_SESSION["sessionStatus"];
        }
        foreach ($_data as $key => $value) {
            if ($_SESSION["lan"] == 'en') {
                if ($_data[$key]['s_type'] == $type && $_data[$key]['s_status'] == $s) {
                    return $_data[$key]['s_detail_en'];
                }
            } else {
                if ($_data[$key]['s_type'] == $type && $_data[$key]['s_status'] == $s) {
                    return $_data[$key]['s_detail_th'];
                }
            }
        }
    }

    function red($value) {
        return "<span class='label label-danger'>" . $value . "</span>";
    }

    function green($value) {
        return "<span class='label label-success'>" . $value . "</span>";
    }

}
