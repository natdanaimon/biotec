<?php

class newsService {

    function dataTable() {
        require_once('./manage/bio/common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT tb_news.*,tb_news_img.*  FROM  tb_news  "
                . " INNER JOIN tb_news_img ON "
                . " tb_news.s_seq = tb_news_img.s_seq WHERE tb_news.s_status = 'A' "
            . " order by tb_news.d_date desc ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }

    function dataTable_type($type_i) {
        require_once('./manage/bio/common/ConnectDB.php');
        $db = new ConnectDB();
        /*$sql = " SELECT * FROM  tb_news n "
                . " WHERE n.s_status = 'A' "
                . " AND s_category = '" . $type_i . "' ";*/
        $sql = " SELECT tb_news.*,tb_news_img.*  FROM  tb_news  "
                . " INNER JOIN tb_news_img ON "
                . " tb_news.s_seq = tb_news_img.s_seq WHERE tb_news.s_status = 'A' AND s_category = '" . $type_i . "' ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }

    function dataTable_pic($seq) {

        require_once('./manage/bio/common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT * FROM `tb_news_img` WHERE s_seq='" . $seq . "'";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }

    function query_dataTable($id) {
        require_once('./manage/bio/common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT tb_news.*,tb_news_img.*  FROM  tb_news  "
                . " INNER JOIN tb_news_img ON "
                . " tb_news.s_seq = tb_news_img.s_seq "
                . " WHERE tb_news.s_status = 'A' AND tb_news.s_seq = '" . $id . "'";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }

}
