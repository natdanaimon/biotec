<?php



class customersService {

   

    function dataTable() {
        require_once('./manage/bio/common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT * FROM  tb_customers c , tb_status s "
                . " WHERE c.s_status = s.s_status "
                . " AND c.s_status = 'A' "
                . " AND s.s_type = 'OTH' "
                . " ORDER BY c.i_seq  desc ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }

}
