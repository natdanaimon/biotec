<?php

class newsletterService {

    function getAccountEmail($category) {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        if ($category == '0') {
            $sql = " select * from tb_newsletter where s_category = '$category' and s_status = 'A' ";
        } else {
            $sql = " select * from tb_newsletter where s_category = '$category' and s_status = 'A' ";
            $sql .= " union ";
            $sql .= " select * from tb_newsletter where s_category = '0' and s_status = 'A' ";
        }
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }

    function delete($email) {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $db->conn();
        $strSQL = "DELETE FROM tb_newsletter WHERE s_email = '" . $email . "'";
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
        $sql = " SELECT c.*,s.s_detail_th , s.s_detail_en FROM  tb_newsletter c , tb_status s "
                . " WHERE c.s_status = s.s_status "
                . " AND s.s_type = 'OTH' "
                . " ORDER BY c.s_email  asc ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }

    function updateStatus($email, $status) {
        $tmp = ($status == 'C' ? 'A' : 'C');
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $db->conn();
        $strSQL = "Update tb_newsletter set s_status = '$tmp' WHERE s_email = '" . $email . "'";
        $arr = array(
            array("query" => "$strSQL")
        );
        $reslut = $db->insert_for_upadte($arr);
        $db->commit();
        return $reslut;
    }

    function updateCategory($email, $type) {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $db->conn();
        $strSQL = "Update tb_newsletter set s_category = '$type' WHERE s_email = '" . $email . "'";
        $arr = array(
            array("query" => "$strSQL")
        );
        $reslut = $db->insert_for_upadte($arr);
        $db->commit();
        return $reslut;
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
