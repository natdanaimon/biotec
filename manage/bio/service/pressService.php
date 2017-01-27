<?php

class pressService {

    function dataTable() {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT p.*,s.s_detail_th , s.s_detail_en FROM  tb_press p , tb_status s "
                . " WHERE p.s_status = s.s_status "
                . " AND s.s_type = 'OTH' "
                . " ORDER BY p.i_seq  desc ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }

    function dataTable_sel($seq_i) {
        require_once('./common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT * FROM  tb_press p  "
                . " WHERE p.i_seq = '" . $seq_i . "' ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }
        function delete($seq,$db) {
        $strSQL = "DELETE FROM tb_press WHERE i_seq = " . $seq;
        $arr = array(
            array("query" => "$strSQL")
        );
        $reslut = $db->insert_for_upadte($arr);
        return $reslut;
    }


        function add_press($subject_th,$subject_en,$date,$img,$file,$date_s,$status) {
        require_once('../common/ConnectDB.php');
        $edate=strtotime($date_s); 
        $edate=date("Y-m-d H:i:s",$edate);
        $db = new ConnectDB();
         $db->conn();
         $sql = "INSERT INTO tb_press " 
                . "(i_seq, s_subject_th, s_subject_en, s_date, "
                . "s_img, s_pathfile, d_date, s_status) "
                . "VALUES "
                . "(NULL, '".$subject_th."', '".$subject_en."',"
                . " '".$date."', '".$img."', "
                . " '".$file."', '".$edate."', '".$status."')";
        $arr = array(
            array("query" => "$sql")
        );
        $reslut = $db->insert_for_upadte($arr);
        $db->commit();
        return $reslut;
    }
        function update_press($seq,$subject_th,$subject_en,$status,$date,$pic,$file) {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
         $db->conn();//	s_pathfile --	s_img
         $sql = "UPDATE tb_press SET "
                 . "s_subject_th = '".$subject_th."', " 
                 . "s_subject_en = '".$subject_en."', "
                 . "s_pathfile ='".$file."',"
                 . "s_img ='".$pic."',"
                 . "s_status ='".$status."',"
                 . "s_date = '".$date."' "
                 . "WHERE i_seq = ".$seq." ";
        $arr = array(
            array("query" => "$sql")
        );
        $reslut = $db->insert_for_upadte($arr);
        $db->commit();
        return $reslut;
    }

}
