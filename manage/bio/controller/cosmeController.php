<?php

@session_start();
error_reporting(0);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_func = $_POST["func"];
} else {
    $_func = $_GET["func"];
}


 
$controller = new cosmeController();
switch ($_func) {
    case "add_cosme":
        echo $controller->add_cosme();
        break;
    case "add_cosme_item":
        echo $controller->add_cosme_item();
        break;
    case "delete":
        echo $controller->delete($_GET["id"]);
        break;
    case "view":
        echo $controller->view($_GET["id"]);
        break;
    case "dataTable":
        echo $controller->dataTable();
        break;
    case "dataTable_title":
        echo $controller->dataTable_title($_GET["id"]);
        break;
    case "dataTable_item":
        echo $controller->dataTable_item($_GET["id"]);
        break;
    case "dataTable_item_row":
        echo $controller->dataTable_item_row($_GET["id"]);
        break;
}

class cosmeController {

    public function __construct() {
        
    }

    public function add_cosme() {
        include '../service/cosmeService.php';
        $service = new cosmeService();
        if ($service->add_cosme()) {
            echo $_SESSION['cd_0000'];
        } else {
            echo $_SESSION['cd_2001'];
        }
    }
    
 
    public function add_cosme_item() {
    	//echo "aa";
//*
        include '../service/cosmeService.php';
        include '../common/upload.php';
        $doc = new upload();
        $service = new cosmeService();

        $save_cosme = "../uploads/cosme_item";
		if (!file_exists($save_cosme)) {
			mkdir($save_cosme, 0777);
		}
        
        /*
        $doc->set_path("../uploads/cosme_item/");
        
        if($_FILES["icon"]){
			$doc->add_FileName($_FILES["icon"]);
			$flg = $doc->AddFile();
			$icon = $doc->get_FilenameResult();
		}
        if($_FILES["logo"]){
			$doc->add_FileName($_FILES["logo"]);
			$flg = $doc->AddFile();
			$logo = $doc->get_FilenameResult();
		}
        //*/

        $flg = TRUE;
        $cout = 0; 
        $cout_data = array();
        if ($flg) {
            /*
            foreach ($doc->get_FilenameResult() as $value) {
                $cout_data[$cout] = $value;
                $cout++;
            }
            //*/
	        if ($service->add_cosme_item()) {
	            echo $_SESSION['cd_0000'];
	        } 
	        else {
	            echo $_SESSION['cd_2001'];
	        }
            //กรณี insert fail remove file
            //pic->clearFileAddFail();
        } 
        else {
            $pic->clearFileAddFail();
        }
//*/
    }
    
    
    
    
    
    public function dataTable() {
        include '../service/cosmeService.php';
        $service = new cosmeService();
        $_dataTable = $service->dataTable();
        if ($_dataTable != NULL) {
            return json_encode($_dataTable);
        } else {
            return NULL;
        }
    }
    
    public function dataTable_title($i_seq) {
        //echo $i_seq;
        //*
        include '../service/cosmeService.php';
        $service = new cosmeService();
        $_dataTable = $service->dataTable_title($i_seq);
        if ($_dataTable != NULL) {
            return json_encode($_dataTable);
        } else {
            return NULL;
        }
        //*/
    }
    
    public function dataTable_item($i_seq) {

        include '../service/cosmeService.php';
        $service = new cosmeService();
        $_dataTable = $service->dataTable_item($i_seq);
        if ($_dataTable != NULL) {
            return json_encode($_dataTable);
        } else {
            return NULL;
        }
    }
    
    public function dataTable_item_row($i_seq) {

        include '../service/cosmeService.php';
        $service = new cosmeService();
        $_dataTable = $service->dataTable_item_row($i_seq);
        if ($_dataTable != NULL) {
            return json_encode($_dataTable);
        } else {
            return NULL;
        }
    }
    

    public function delete($seq) {
        include '../service/cosmeService.php';
        $service = new cosmeService();
        if ($service->delete($seq)) {
            echo $_SESSION['cd_0000'];
        } else {
            echo $_SESSION['cd_2001'];
        }
    }

    public function view($seq) {
        include '../service/cosmeService.php';
        $service = new cosmeService();
        $result = "";
        $_data = $service->view($seq);
        foreach ($_data as $key => $value) {

            $result = $_data[$key]['i_seq'] . ",";
            $result .= $_SESSION["contacts_fullname"] . " : " . $_data[$key]['s_name'] . " " . $_data[$key]['s_lastname'] . ",";

            $result .= $_SESSION["tb_col_phone"] . " : " . $_data[$key]['s_number'] . ",";
            $result .= $_SESSION["tb_col_email"] . " : " . $_data[$key]['s_email'] . ",";
            $result .= $_SESSION["contacts_city"] . " : " . $_data[$key]['s_city'] . ",";
            $result .= $_SESSION["contacts_country"] . " : " . $_data[$key]['s_country'] . ",";
            $result .= $_SESSION["tb_col_subject"] . " : " . $_data[$key]['s_subject'] . ",";
            $result .= $_data[$key]['s_message'] . ",";
            $result .= $_SESSION["contacts_time"] . " : " . $_data[$key]['d_date'] . "";
        }
        echo $result;
    }

}
