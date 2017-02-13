<?php

class contentService {

    function dataTable_top() {
        require_once('./manage/bio/common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT * FROM  tb_top_content where s_status ='A' order by i_index asc , s_img asc   LIMIT 4 ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }
    
     function dataTable_bottom() {
        require_once('./manage/bio/common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT * FROM  tb_bottom_content where s_status ='A' order by i_index asc , s_img asc   LIMIT 4 ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }

}
