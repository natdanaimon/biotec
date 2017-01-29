<?php

class customersService {

    function dataTable() {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();

        $sql = " SELECT c.*,s.s_detail_th , s.s_detail_en  FROM  tb_customers c , tb_status s "
                . " WHERE c.s_status = s.s_status "
                . " AND s.s_type = 'OTH' "
                . " ORDER BY c.i_seq  desc ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }

    function dataTable_sel($seq_i) {
        require_once('./common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT * FROM  tb_customers p  "
                . " WHERE p.i_seq = '" . $seq_i . "' ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }

    function delete($seq, $db) {
        $strSQL = "DELETE FROM tb_customers WHERE i_seq = " . $seq;
        $arr = array(
            array("query" => "$strSQL")
        );
        $reslut = $db->insert_for_upadte($arr);
        return $reslut;
    }

    function add_customers($name_th, $name_en,$url, $img, $status) {
        require_once('../common/ConnectDB.php');
        $edate = strtotime($date_s);
        $edate = date("Y-m-d H:i:s", $edate);
        $db = new ConnectDB();
        $db->conn();
        $sql = "INSERT INTO tb_customers "
                . "(i_seq, s_name_th, s_name_en, s_url, "
                . "s_img, s_status) "
                . "VALUES "
                . "(NULL, '" . $name_th . "', '" . $name_en . "',"
                . " '" . $url . "', '" . $img . "', "
                . " '" . $status . "')";
        $arr = array(
            array("query" => "$sql")
        );
        $reslut = $db->insert_for_upadte($arr);
        $db->commit();
        return $reslut;
    }

    function update_customers($seq, $name_th, $name_en, $status, $url, $pic) {
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
