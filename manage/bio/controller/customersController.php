<?php

@session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_func = $_POST["func"];
} else {
    $_func = $_GET["func"];
}

//$fileToUpload_name = $_FILES['uploadPic']['name'];

$controller = new customersController();
switch ($_func) {
    case "delete":
        echo $controller->delete($_GET["seq"], $_GET["file"]);
        break;
    case "add_customers":
        echo $controller->add_customers();
        break;
    case "update_customers":
        echo $controller->update_customers();
        break;
    case "dataTable":
        echo $controller->dataTable();
        break;
}

class customersController {

    public function __construct() {
        
    }

    public function dataTable() {
        include '../service/customersService.php';
        $service = new customersService();
        $_dataTable = $service->dataTable();
        if ($_dataTable != NULL) {
            return json_encode($_dataTable);
        } else {
            return NULL;
        }
    }

    public function dataTable_sel($seq_i) {
        $service = new customersService();
        $_dataTable = $service->dataTable_sel($seq_i);
        if ($_dataTable != NULL) {
            return $_dataTable;
        } else {
            return NULL;
        }
    }

    private function ConvertDate($date) {
        $dd = substr($date, 3, 2);
        $mm = substr($date, 0, 2);
        $yyyy = substr($date, 6, 4);
        return $yyyy . "/" . $mm . "/" . $dd;
    }

    public function delete($seq, $file) {
        include '../service/customersService.php';
        include '../common/upload.php';
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $db->conn();
        $service = new customersService();
        if ($service->delete($seq, $db)) {
            $doc = new upload();
            $doc->Initial_and_Clear();
            $doc->set_path("./file/customers/");
            $doc->add_FileName($file);
            if ($doc->deleteFile()) {
                $db->commit();
                echo $_SESSION['cd_0000'];
            } else {
                $db->rollback();
                echo $_SESSION['cd_2001'];
            }
        } else {
            $db->rollback();
            echo $_SESSION['cd_2001'];
        }
    }

    public function add_customers() {
        if ($this->isValid("ADD") == 1) {
            include '../service/customersService.php';
            include '../common/upload.php';
            require_once('../common/ConnectDB.php');
            $service = new customersService();
            $doc = new upload();
            $doc->set_path("./file/customers/");
            $doc->add_FileName($_FILES["uploadPic"]);
            $flg = $doc->AddFile();
         

            if ($flg) {
                   $cout = 0;
                   $cout_data = array();
                foreach ($doc->get_FilenameResult() as $value) {
                    $cout_data[$cout++] = $value;
                }
                if ($service->add_customers($_POST["name_th"], $_POST["name_en"], $_POST["link"], $cout_data[0], $_POST["status"])) {
                    echo $_SESSION['cd_0000'];
                } else {
                    $doc->clearFileAddFail();
                    echo $_SESSION['cd_2001'];
                }
            } else {
                $doc->clearFileAddFail();
                echo  $doc->get_errorMessage();
            }
        }
    }

    public function isValid($condition) {
        $intReturn = 0;
        if ($this->isEmpty($_POST["name_th"])) {
            echo $_SESSION['cd_2301'];
        } else if ($this->isEmpty($_POST["name_en"])) {
            echo $_SESSION['cd_2302'];
        } else if ($this->isEmpty($_POST["link"])) {
            echo $_SESSION['cd_2303'];
        } else if ($_FILES["uploadPic"]["error"] == 4 && $condition == "ADD") {
            echo $_SESSION['cd_2304'];
        } else {
            $intReturn = 1;
        }
        return $intReturn;
    }

    private function isEmpty($tmp) {
        if ($tmp == NULL || trim($tmp) == '') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update_customers() {
        if ($this->isValid("EDIT") == 1) {
            include '../service/customersService.php';
            include '../common/upload.php';
            $doc = new upload();
            $service = new customersService();
            $doc->set_path("./file/customers/");

//----------------------------------//
            $check_type_pic = $_FILES["uploadPic"]['name'];
            $arraypic = explode(".", $check_type_pic); //แบ่งชื่อไฟล์กับนามสกุลออกจากกัน
            $lastname = strtolower($arraypic);
            $filetype_pic = $arraypic[1];
//----------------------------------//
            if ($_FILES["uploadPic"]["error"] != 0) {

                if ($service->update_customers($_POST["seq_i"], $_POST["name_th"], $_POST["name_en"], $_POST["status"], $_POST["link"], $_POST["curent_pic"])) {
                    echo $_SESSION['cd_0000'];
                } else {
                    echo $_SESSION['cd_2001'];
                }
            } else {
                $doc->add_FileName($_FILES["uploadPic"]);
                $doc->set_path("./file/customers/");
                $flg = $doc->AddFile();

                $cout = 0;
                $cout_data = array();
                if ($flg) {
                    foreach ($doc->get_FilenameResult() as $value) {
                        $cout_data[$cout] = $value;
                        $cout++;
                    }
                    if (($filetype_pic != "png" ) && ( $filetype_pic != "jpeg") && ($filetype_pic != "jpg")) {
                        echo $_SESSION['cd_2204'];
                    } else if ($service->update_customers($_POST["seq_i"], $_POST["name_th"], $_POST["name_en"], $_POST["status"], $_POST["link"], $cout_data[0])) {
                        $doc->Initial_and_Clear();
                        $doc->set_path("./file/customers/");
                        $doc->add_FileName($_POST["curent_pic"]);
                        if ($doc->deleteFile()) {
                            echo $_SESSION['cd_0000'];
                        }
                    } else {
                        echo $_SESSION['cd_2001'];
                    }
                } else {
                    $doc->clearFileAddFail();
                    echo $_SESSION['cd_2001'];
                }
            }
        }
    }

}
