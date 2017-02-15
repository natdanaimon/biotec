<?php

@session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_func = $_POST["func"];
} else {
    $_func = $_GET["func"];
}

//$fileToUpload_name = $_FILES['uploadPic']['name'];

$controller = new profileController();
switch ($_func) {
    case "update_profile":
        echo $controller->update_profile();
        break;
}

class profileController {

    public function __construct() {
        
    }

    public function dataTable_sel($user) {
        $service = new profileService();
        $_dataTable = $service->dataTable_sel($user);
        if ($_dataTable != NULL) {
            return $_dataTable;
        } else {
            return NULL;
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

    public function update_profile() {
        if ($this->isValid("EDIT") == 1) {
            include '../service/customersService.php';
            include '../common/upload.php';
            $doc = new upload();
            $service = new customersService();
            $doc->set_path("./file/customers/");


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
                    if ($service->update_customers($_POST["seq_i"], $_POST["name_th"], $_POST["name_en"], $_POST["status"], $_POST["link"], $cout_data[0])) {
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
                    echo $doc->get_errorMessage();
                }
            }
        }
    }

}
