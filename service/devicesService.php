<?php



class devicesService {

   

    function dataTable($id) {
        require_once('../../manage/bio/common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT d.*  FROM  tb_devices d "
                . " WHERE d.s_devices_type = '".$id."' "
                . " ORDER BY d.id  desc ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }
    
    function dataTable_get($id) {
        require_once('../../../manage/bio/common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT d.*,c.*,img.*  FROM  tb_devices d , tb_devices_content c, tb_devices_img img "
                . " WHERE d.id = '".$id."' "
                . " AND d.id = c.i_seq "
                . " AND d.id = img.i_seq "
                . " ORDER BY d.id  desc ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }

}
