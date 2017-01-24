<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of commonService
 *
 * @author natdanaimon
 */
class commonService {

    //put your code here
    function getSessionStatus() {
        // not include class COnnectDB include from loginService()
        $db = new ConnectDB();
        $sql = " SELECT * FROM tb_status ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }

}
