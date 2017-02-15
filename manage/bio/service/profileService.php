<?php

class profileService {

   

    function dataTable_sel($user) {
        require_once('./common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT * FROM  tb_user u  "
                . " WHERE u.s_user = '" . $user . "' ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }

    

    function update_profile($seq, $name_th, $name_en, $status, $url, $pic) {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $db->conn(); //	s_pathfile --	s_img
        $sql = "UPDATE tb_customers SET "
                . "s_name_th = '" . $name_th . "', "
                . "s_name_en = '" . $name_en . "', "
                . "s_url ='" . $url . "', "
                . "s_img ='" . $pic . "', "
                . "s_status ='" . $status . "' "
                . "WHERE i_seq = " . $seq . " ";
        $arr = array(
            array("query" => "$sql")
        );
        $reslut = $db->insert_for_upadte($arr);
        $db->commit();
        return $reslut;
    }

}
