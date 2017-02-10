<?php



class newsService {

   

    function dataTable() {
        require_once('./manage/bio/common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT * FROM  tb_news n "
                . " WHERE n.s_status = 'A' ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }
        function dataTable_type($type_i) {
        require_once('./manage/bio/common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT * FROM  tb_news n "
                . " WHERE n.s_status = 'A' "
                . " AND s_category = '".$type_i."' ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }
        function query_dataTable($id) {
        require_once('./manage/bio/common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT * FROM  tb_news n "
                . " WHERE n.s_status = 'A' "
                . " AND n.s_seq = '".$id."'";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }

}
