<?php

class slideService {

    function dataTable($_page) {
        if ($_page == "renlive") {
            require_once('../../manage/bio/common/ConnectDB.php');
        } else {
            require_once('./manage/bio/common/ConnectDB.php');
        }
        $db = new ConnectDB();
        $sql = " SELECT * FROM  tb_slide where s_page='$_page' and s_status ='A' order by i_index asc , s_img asc ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }

}
