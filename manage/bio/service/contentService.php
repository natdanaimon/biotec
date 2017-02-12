<?php

class contentService {

    function delete($seq, $type, $db) {
        $strSQL = "DELETE FROM tb_" . $type . "_content WHERE i_seq = " . $seq;
        $arr = array(
            array("query" => "$strSQL")
        );
        $reslut = $db->insert_for_upadte($arr);
        return $reslut;
    }

    function dataTable($type) {
        $tmp = "";
        if ($type == "top") {
            $tmp = "top";
        } else {
            $tmp = "bottom";
        }
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT c.*,s.s_detail_th , s.s_detail_en FROM  tb_" . $tmp . "_content c , tb_status s "
                . " WHERE c.s_status = s.s_status "
                . " AND s.s_type = 'OTH' "
                . " ORDER BY c.i_index ,c.s_img asc ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }

    function dataTable_seq($pageTxt, $seq) {
        require_once('./common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT c.* FROM  tb_" . $pageTxt . "_content c , tb_status s "
                . " WHERE c.s_status = s.s_status "
                . " AND s.s_type = 'OTH' "
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

    function add_index($img, $type, $index, $status, $topic_th, $topic_en, $url, $detail_th, $detail_en) {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $db->conn();
        $sql = "INSERT INTO tb_" . $type . "_content "
                . "(i_index, s_topic_th, s_topic_en, s_detail_th, s_detail_en, s_img, s_status, s_url) "
                . "VALUES "
                . "( $index ,'" . $topic_th . "', '" . $topic_en . "',' " . $detail_th . "', '" . $detail_en . "', '" . $img . "', '" . $status . "', '" . $url . "')";
        $arr = array(
            array("query" => "$sql")
        );
        $reslut = $db->insert_for_upadte($arr);
        $db->commit();
        return $reslut;
    }

    function update_index($type, $index, $status, $topic_th, $topic_en, $url, $detail_th, $detail_en, $seq, $file) {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $db->conn();
        $sql = "UPDATE tb_" . $type . "_content ";
        $sql .= " set   i_index = $index";
        if ($file != NULL) {
            $sql .= " ,   s_img  = '$file' ";
        }
        $sql .= " ,   s_status  = '$status' ";
        $sql .= " ,   s_topic_th  = '$topic_th' ";
        $sql .= " ,   s_topic_en  = '$topic_en' ";
        $sql .= " ,   s_detail_th  = '$detail_th' ";
        $sql .= " ,   s_detail_en  = '$detail_en' ";
        $sql .= " ,   s_url  = '$url' ";

        $sql .= " where i_seq = $seq";
        $arr = array(
            array("query" => "$sql")
        );
        $reslut = $db->insert_for_upadte($arr);
        $db->commit();
        return $reslut;
    }

}
