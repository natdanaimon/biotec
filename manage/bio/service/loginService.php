<?php

require_once('../common/ConnectDB.php');

class loginService {

    function login($user, $pass) {
        $db = new ConnectDB();
        $db->conn();
        $strSQL = "select * from tb_user where s_user = '$user' and s_pass='$pass' ";
        $db->Search_Data_FormatJson($strSQL);
        $_data = $db->Search_Data_FormatJson($strSQL);
        if ($_data != NULL) {
            return $_data;
        } else {
            return $response;
        }
//        foreach ($_data as $key => $value) {
//            $response =  $_data[$key]['s_user'] . "," . $_data[$key]['s_pass'];
//        }
    }

}
