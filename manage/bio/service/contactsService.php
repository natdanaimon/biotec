<?php

class contactsService {

    function delete($seq) {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $db->conn();
        $strSQL = "DELETE FROM tb_contacts WHERE i_seq = " . $seq;
        $arr = array(
            array("query" => "$strSQL")
        );
        $reslut = $db->insert_for_upadte($arr);
        $db->commit();
        return $reslut;
    }

    function dataTable() {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT c.*,s.s_detail_th , s.s_detail_en FROM  tb_contacts c , tb_status s "
                . " WHERE c.s_status = s.s_status "
                . " AND s.s_type = 'CON' "
                . " ORDER BY c.i_seq  desc ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }
    
    function dataTableGet($i_seq) {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT c.*,s.s_detail_th , s.s_detail_en FROM  tb_contacts c , tb_status s "
                . " WHERE c.i_seq = '".$i_seq."' and c.s_status = s.s_status "
                . " AND s.s_type = 'CON' "
                . " ORDER BY c.i_seq  desc ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }
    
    

    function view($seq) {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT *FROM  tb_contacts "
                . " WHERE i_seq = $seq ";
        $_data = $db->Search_Data_FormatJson($sql);
        foreach ($_data as $key => $value) {
            if ($_data[$key]['s_status'] == 'W') {
                $this->updateStatusOpenMail($seq);
            }
        }
        $db->close_conn();
        return $_data;
    }

    function updateStatusOpenMail($seq) {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $db->conn();
        $strSQL = "Update tb_contacts set s_status = 'R' WHERE i_seq = " . $seq;
        $arr = array(
            array("query" => "$strSQL")
        );
        $reslut = $db->insert_for_upadte($arr);
        $db->commit();
        return $reslut;
    }

}
