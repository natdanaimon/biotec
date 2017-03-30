<?php

class devicesService {

    function delete($seq) {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $db->conn();
        $strSQL = "DELETE FROM tb_devices WHERE id = " . $seq;
        $arr = array(
            array("query" => "$strSQL")
        );
        $reslut = $db->insert_for_upadte($arr);
        $db->commit();
        return $reslut;
    }

    function dataTable() {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT c.* FROM  tb_devices_type c   "
                 
                . " ORDER BY c.s_device_type  asc ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }
    
    function dataTable_item($i_seq) {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT c.* FROM  tb_devices c   "
                . " WHERE c.s_devices_type = '".$i_seq."'   "
                . " ORDER BY c.s_devices_type  asc ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }
    
    function dataTable_item_row($i_seq) {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT d.*,c.*,img.* FROM  tb_devices d , tb_devices_content c, tb_devices_img img   "
                . " WHERE d.id = '".$i_seq."'   "
                . " AND c.i_seq = d.id "
                . " AND img.i_seq = d.id "
                . "  ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }
    
    function dataTable_title($i_seq) {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT c.* FROM  tb_devices_type c   "
                . " WHERE c.s_device_type = '".$i_seq."'   "
 
                . " ORDER BY c.s_device_type  desc ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }

	
	
	//////////////// Add new Devices
	function add_devices() {
        $id = $_POST["devices_id"];
        $data_arr['s_detail_th'] = $_POST["subject_th"];
        $data_arr['s_detail_en'] = $_POST["subject_en"];
        
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $db->conn();
        
        ////////// Add New
        if($id == NULL){      
        ///// insert data
        $db->add_db("tb_devices_type",$data_arr);
        $last_id = mysql_insert_id();
		}
		////////// Update 
		else{
	        $db->update_db("tb_devices_type",$data_arr,"s_device_type = '".$id."' ");
		}
        $reslut = TRUE;
        $db->commit();
        return $reslut;
    }		
    /**
	* **************************
	* ********** Add New Devices Item ****************
	* **************************
	*/ 
	function add_devices_item($icon,$logo) {
        $id = $_POST["seq_i"];
 
        
        $data_arr['s_devices_th'] = $_POST["subject_th"];
        $data_arr['s_devices_en'] = $_POST["subject_en"];
        $data_arr['s_devices_video'] = $_POST["s_devices_video"];
        $data_arr['s_device_detail_th'] = $_POST["s_device_detail_th"];
        $data_arr['s_device_detail_en'] = $_POST["s_device_detail_en"];
        
        
        ////////// content
         $content_arr['s_technology_th'] = $_POST["s_technology_th"];
         $content_arr['s_technology_en'] = $_POST["s_technology_en"];
         $content_arr['s_procedures_th'] = $_POST["s_procedures_th"];
         $content_arr['s_procedures_en'] = $_POST["s_procedures_en"];
         $content_arr['s_techmocal_th'] = $_POST["s_techmocal_th"];
         $content_arr['s_techmocal_en'] = $_POST["s_techmocal_en"];
         $content_arr['s_pubblications_th'] = $_POST["s_pubblications_th"];
         $content_arr['s_pubblications_en'] = $_POST["s_pubblications_en"];
        
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $db->conn();
        
        ////////// Add New
        if($id == NULL){      
        $data_arr['s_devices_type'] = $_POST["type"];
        ///// insert data
        $db->add_db("tb_devices",$data_arr);
        $id = mysql_insert_id();
        
        $content_arr['i_seq'] = $id;
        $db->add_db("tb_devices_content",$content_arr);
        
        /*
        /////////// start check mkdir
        $save_uploads = "../uploads";
		if (!file_exists($save_uploads)) {
		   mkdir($save_uploads, 0777);
		}
		$save_devices = "../uploads/devices_item";
		if (!file_exists($save_devices)) {
			mkdir($save_devices, 0777);
			mkdir($save_devices."/icon", 0777);
			mkdir($save_devices."/logo", 0777);
			mkdir($save_devices."/img", 0777);
		}
        /////////// end check mkdir
        /////////////// create folder
		mkdir("../uploads/devices_item/icon/".$id, 0777);
		mkdir("../uploads/devices_item/logo/".$id, 0777);
		mkdir("../uploads/devices_item/img/".$id, 0777);
		
		//*/
		}
		////////// Update 
		else{
	        $db->update_db("tb_devices",$data_arr,"id = '".$id."' ");
	        $db->update_db("tb_devices_content",$content_arr,"i_seq = '".$id."' ");
		}
		
		
		////////// update images
		$part_image = "../uploads/devices_item/";
		if($_FILES["icon"]["name"] != NULL){
			$value = $_FILES["icon"];
			$temp = explode(".", $value["name"]);
	        $tmpFileName = $id . 'icon.' . end($temp);
	        $newfilename = $part_image . $tmpFileName;
			move_uploaded_file($value["tmp_name"], $newfilename);
			$data_icon['s_devices_icon'] = $tmpFileName;
			$db->update_db("tb_devices",$data_icon,"id = '".$id."' ");
		}
		
		if($_FILES["logo"]["name"] != NULL){
			$value = $_FILES["logo"];
			$temp = explode(".", $value["name"]);
	        $tmpFileName = $id . 'logo.' . end($temp);
	        $newfilename = $part_image . $tmpFileName;
			move_uploaded_file($value["tmp_name"], $newfilename);
			$data_img['s_devices_logo'] = $tmpFileName;
			$db->update_db("tb_devices",$data_img,"id = '".$id."' ");
		}
		
		///////// 02
		if($_FILES["logo02"]["name"] != NULL){
			$value = $_FILES["logo02"];
			$temp = explode(".", $value["name"]);
	        $tmpFileName = $id . 'logo02.' . end($temp);
	        $newfilename = $part_image . $tmpFileName;
			move_uploaded_file($value["tmp_name"], $newfilename);
			$data_img02['s_devices_logo02'] = $tmpFileName;
			$db->update_db("tb_devices",$data_img02,"id = '".$id."' ");
		}
		///////// 03
		if($_FILES["logo03"]["name"] != NULL){
			$value = $_FILES["logo03"];
			$temp = explode(".", $value["name"]);
	        $tmpFileName = $id . 'logo03.' . end($temp);
	        $newfilename = $part_image . $tmpFileName;
			move_uploaded_file($value["tmp_name"], $newfilename);
			$data_img03['s_devices_logo03'] = $tmpFileName;
			$db->update_db("tb_devices",$data_img03,"id = '".$id."' ");
		}
		
		////////// 01
		if($_FILES["01_before"]["name"]){
			$value = $_FILES["01_before"];
			$temp = explode(".", $value["name"]);
	        $tmpFileName = $id . '01b.' . end($temp);
	        $newfilename = $part_image . $tmpFileName;
			move_uploaded_file($value["tmp_name"], $newfilename);
			$data_ba['s_01_before'] = $tmpFileName;
		}
		if($_FILES["01_after"]["name"]){
			$value = $_FILES["01_after"];
			$temp = explode(".", $value["name"]);
	        $tmpFileName = $id . '01a.' . end($temp);
	        $newfilename = $part_image . $tmpFileName;
			move_uploaded_file($value["tmp_name"], $newfilename);
			$data_ba['s_01_after'] = $tmpFileName;
		}
		
		////////// 02
		if($_FILES["02_before"]["name"]){
			$value = $_FILES["02_before"];
			$temp = explode(".", $value["name"]);
	        $tmpFileName = $id . '02b.' . end($temp);
	        $newfilename = $part_image . $tmpFileName;
			move_uploaded_file($value["tmp_name"], $newfilename);
			$data_ba['s_02_before'] = $tmpFileName;
		}
		if($_FILES["02_after"]["name"]){
			$value = $_FILES["02_after"];
			$temp = explode(".", $value["name"]);
	        $tmpFileName = $id . '02a.' . end($temp);
	        $newfilename = $part_image . $tmpFileName;
			move_uploaded_file($value["tmp_name"], $newfilename);
			$data_ba['s_02_after'] = $tmpFileName;
		}
		
		////////// 03
		if($_FILES["03_before"]["name"]){
			$value = $_FILES["03_before"];
			$temp = explode(".", $value["name"]);
	        $tmpFileName = $id . '03b.' . end($temp);
	        $newfilename = $part_image . $tmpFileName;
			move_uploaded_file($value["tmp_name"], $newfilename);
			$data_ba['s_03_before'] = $tmpFileName;
		}
		if($_FILES["03_after"]["name"]){
			$value = $_FILES["03_after"];
			$temp = explode(".", $value["name"]);
	        $tmpFileName = $id . '03a.' . end($temp);
	        $newfilename = $part_image . $tmpFileName;
			move_uploaded_file($value["tmp_name"], $newfilename);
			$data_ba['s_03_after'] = $tmpFileName;
		
		
		}
 		
 		if($_POST["seq_i"] == NULL){
 			$data_ba['i_seq'] = $id;
			$db->add_db("tb_devices_img",$data_ba);
		}else{
			$db->update_db("tb_devices_img",$data_ba,"i_seq = '".$id."' ");
		}
 		
 		

		
		
		
		
		
        $reslut = $id;
        $db->commit();
        return $reslut;
    }		

}
