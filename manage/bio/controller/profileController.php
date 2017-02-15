<?php

@session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $info = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', json_encode($_POST)), true);
} else {
    $info = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', json_encode($_GET)), true);
}



$controller = new profileController();
switch ($info[func]) {
    case "update_profile":
        echo $controller->update_profile($info);
        break;
}

class profileController {

    public function __construct() {
        
    }

    public function dataTable_sel($user) {
        $service = new profileService();
        $_dataTable = $service->dataTable_sel($user);
        if ($_dataTable != NULL) {
            $_SESSION['current_pass'] = $_dataTable[0][s_pass];
            return $_dataTable;
        } else {
            return NULL;
        }
    }

    public function isValid($info) {
        include '../common/Utility.php';
        $util = new Utility();
        $intReturn = 0;
        if ($_SESSION[current_pass] != $info[s_pass_old]) {
            echo $_SESSION['cd_2302']; // password current invalid
        } else if ($this->isEmpty($info[s_firstname])) {
            echo $_SESSION['cd_2301']; // name emptry
        } else if ($util->isEmptyReg($info[s_pass])) {
            echo $_SESSION['cd_2302']; // password & regular emptry
        } else if ($info[s_pass_confirm] === $info[s_pass]) {
            echo $_SESSION['cd_2303']; // password confirm not match
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

    public function update_profile($info) {
        if ($this->isValid($info) == 1) {
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
