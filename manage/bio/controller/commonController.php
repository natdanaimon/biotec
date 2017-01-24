<?php

@session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of commonController
 *
 * @author natdanaimon
 */
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
