<?php

class dashboardService {

    function initial_topContent() {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $strSql = "";
        $strSql .= "select  ";
        $strSql .= "(select count(*) from tb_newsletter) newsletter,  ";
        $strSql .= "(select count(*) from tb_contacts) contacts ,  ";
        $strSql .= "(select count(*) from tb_devices ) devices,  ";
        $strSql .= "(select count(*) from tb_cosme ) cosme ; ";
        $_data = $db->Search_Data_FormatJson($strSql);
        $db->close_conn();
        return $_data;
    }

    function countContact($condition) {
        require_once('./common/ConnectDB.php');
        $db = new ConnectDB();
        $strSql = "";
        $strSql .= "SELECT count(*) FROM  tb_contacts  WHERE DATE_FORMAT(d_date,'%Y-%m-%d') = '$condition' ";

        $_data = $db->Search_Data_FormatJson($strSql);
        $db->close_conn();
        return $_data;
    }

}
