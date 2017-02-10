<?php

class slideService {

    function delete($seq, $db) {
        $strSQL = "DELETE FROM tb_slide WHERE i_seq = " . $seq;
        $arr = array(
            array("query" => "$strSQL")
        );
        $reslut = $db->insert_for_upadte($arr);
        return $reslut;
    }

    function dataTable($page) {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT c.*,s.s_detail_th , s.s_detail_en FROM  tb_slide c , tb_status s "
                . " WHERE c.s_status = s.s_status "
                . " AND s.s_type = 'OTH' "
                . " AND c.s_page = '$page' "
                . " ORDER BY c.i_index  asc ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }

    function dataTable_seq($pageTxt, $seq) {
        require_once('./common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT c.*,s.s_detail_th , s.s_detail_en FROM  tb_slide c , tb_status s "
                . " WHERE c.s_status = s.s_status "
                . " AND s.s_type = 'OTH' "
                . " AND c.s_page = '$pageTxt' "
                . " AND c.i_seq = $seq ";

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

    function add_slide($img, $index, $page, $status) {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $db->conn();
        $sql = "INSERT INTO tb_slide "
                . "(s_page , s_img , i_index , s_status) "
                . "VALUES "
                . "( '" . $page . "', '" . $img . "', " . $index . ", '" . $status . "')";
        $arr = array(
            array("query" => "$sql")
        );
        $reslut = $db->insert_for_upadte($arr);
        $db->commit();
        return $reslut;
    }

    function update_slide($index, $status, $seq, $file) {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $db->conn();
        $sql = "UPDATE tb_slide ";
        $sql .= " set   i_index = $index";
        if ($file != NULL) {
            $sql .= " ,   s_img  = '$file' ";
        }
        $sql .= " ,   s_status  = '$status' ";
        $sql .= " where i_seq = $seq";
        $arr = array(
            array("query" => "$sql")
        );
        $reslut = $db->insert_for_upadte($arr);
        $db->commit();
        return $reslut;
    }

}
