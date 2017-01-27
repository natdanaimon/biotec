<?php



class cosmeService {

   function dataTable_type($id) {
        require_once('../../manage/bio/common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT d.*  FROM  tb_cosme_type d "
                . " ORDER BY d.id  asc ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }
    function dataTable_type_d($id) {
        require_once('../../../manage/bio/common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT d.*  FROM  tb_cosme_type d "
                . " WHERE d.id = '".$id."' "
                . " ORDER BY d.id  asc ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }
    
    function dataTable_item($id) {
        require_once('../../../manage/bio/common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT d.*  FROM  tb_cosme d "
                . " WHERE d.cosme_type = '".$id."' "
                . " ORDER BY d.id  asc ";
                
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }
    
    function dataTable_item_type($id) {
        require_once('../../../../manage/bio/common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT d.*  FROM  tb_cosme d "
                . " WHERE d.cosme_type = '".$id."' "
                . " ORDER BY d.id  asc ";
                
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }
    
    function dataTable_item_get($id) {
        require_once('../../../../manage/bio/common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT d.*  FROM  tb_cosme d "
                . " WHERE d.id = '".$id."' "
                . " ORDER BY d.id  asc ";
                
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }

    function dataTable($id) {
        require_once('../../manage/bio/common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT d.*  FROM  tb_cosme d "
                . " WHERE d.s_cosme_type = '".$id."' "
                . " ORDER BY d.id  desc ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }
    
    function dataTable_get($id) {
        require_once('../../../manage/bio/common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT d.*,c.*,img.*  FROM  tb_cosme d , tb_cosme_content c, tb_cosme_img img "
                . " WHERE d.id = '".$id."' "
                . " AND d.id = c.i_seq "
                . " AND d.id = img.i_seq "
                . " ORDER BY d.id  desc ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }

}
