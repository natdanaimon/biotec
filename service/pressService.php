<?php



class pressService {

   

    function dataTable() {
        require_once('./manage/bio/common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT * FROM  tb_press p , tb_status s "
                . " WHERE p.s_status = s.s_status "
                . " AND p.s_status = 'A' "
                . " AND s.s_type = 'OTH' "
                . " ORDER BY p.i_seq  desc ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }

}
