<?php

@session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_func = $_POST["func"];
} else {
    $_func = $_GET["func"];
}

//$fileToUpload_name = $_FILES['uploadPic']['name'];

$controller = new pressController();
switch ($_func) {
    case "delete":
        echo $controller->delete($_GET["seq"], $_GET["file"], $_GET["pdf"]);
        break;
    case "add_press":
        echo $controller->add_press();
        break;
    case "update_press":
        echo $controller->update_press();
        break;
    case "preview":
        echo $controller->preview($_GET["filename"]);
        break;
    case "dataTable":
        echo $controller->dataTable();
        break;
}

class pressController {

    public function __construct() {
        
    }

    public function preview($filename) {
        $file = 'file/press/' . $filename;
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . $filename . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        @readfile($file);
    }

    public function dataTable() {
        include '../service/pressService.php';
        $service = new pressService();
        $_dataTable = $service->dataTable();
        if ($_dataTable != NULL) {
            return json_encode($_dataTable);
        } else {
            return NULL;
        }
    }

    public function dataTable_sel($seq_i) {
        $service = new pressService();
        $_dataTable = $service->dataTable_sel($seq_i);
        if ($_dataTable != NULL) {
            return $_dataTable;
        } else {
            return NULL;
        }
    }

    public function delete($seq, $file, $pdf) {
        include '../service/pressService.php';
        include '../common/upload.php';
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $db->conn();
        $service = new pressService();
        if ($service->delete($seq, $db)) {
            $doc = new upload();
            $doc->Initial_and_Clear();
            $doc->set_path("./file/press/");
            $doc->add_FileName($file);
            $doc->add_FileName($pdf);
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

    public function add_press() {

        include '../service/pressService.php';
        include '../common/upload.php';
        require_once('../common/ConnectDB.php');
        $service = new pressService();
        $doc = new upload(); 
        $doc->set_path("./file/press/");
        $doc->add_FileName($_FILES["uploadPic"]);
        $doc->add_FileName($_FILES["uploadFile"]);
        //----------------------------------//
        $check_type_file = $_FILES["uploadFile"]['name'];
        $check_type_pic = $_FILES["uploadPic"]['name'];
        $arraypic = explode(".", $check_type_pic); //แบ่งชื่อไฟล์กับนามสกุลออกจากกัน
        $lastname = strtolower($arraypic);
        $filetype_pic = $arraypic[1];
        $arraytype = explode(".", $check_type_file); //แบ่งชื่อไฟล์กับนามสกุลออกจากกัน
        $lastname2 = strtolower($arraytype);
        $filetype_type = $arraytype[1];
        //----------------------------------//
        $flg = $doc->AddFile();
        $cout = 0;
        $cout_data = array();

        if ($flg) {
            foreach ($doc->get_FilenameResult() as $value) {
                $cout_data[$cout] = $value;
                $cout++;
                //echo $value;
                // เก็บใส่ตัวแปล
            }
           if (( $_POST["subject_th"] == NULL)|| ($_POST["subject_en"]== NULL)) {
                 $doc->clearFileAddFail();
                echo $_SESSION['cd_2205'];
            } else if ($_POST["date"] == NULL) {
                 $doc->clearFileAddFail();
                echo $_SESSION['cd_2206'];
            }else if ($arraytype[1] != "pdf") {
                 $doc->clearFileAddFail();
                echo $_SESSION['cd_2203'];
            } else if (($filetype_pic != "png" ) && ( $filetype_pic != "jpeg") && ($filetype_pic != "jpg")) {
                 $doc->clearFileAddFail();
                echo $_SESSION['cd_2204'];
            } else if ($_POST["date"] == NULL) {
                 $doc->clearFileAddFail();
                echo $_SESSION['cd_2202'];
            } else  if ($service->add_press($_POST["subject_th"], $_POST["subject_en"], $_POST["date"], $cout_data[0], $cout_data[1], $_POST["date"], $_POST["status"])) {
                echo $_SESSION['cd_0000'];
            } else {
                $doc->clearFileAddFail();
                echo $_SESSION['cd_2001'];
            }
        } else {
            $doc->clearFileAddFail();
            echo $_SESSION['cd_2001'];
        }
    }

    public function update_press() {

        include '../service/pressService.php';
        include '../common/upload.php';
        $doc = new upload();
        $service = new pressService();
        $doc->set_path("./file/press/");
        
        //----------------------------------//
        $check_type_file = $_FILES["uploadFile"]['name'];
        $check_type_pic = $_FILES["uploadPic"]['name'];
        $arraypic = explode(".", $check_type_pic); //แบ่งชื่อไฟล์กับนามสกุลออกจากกัน
        $lastname = strtolower($arraypic);
        $filetype_pic = $arraypic[1];
        $arraytype = explode(".", $check_type_file); //แบ่งชื่อไฟล์กับนามสกุลออกจากกัน
        $lastname2 = strtolower($arraytype);
        $filetype_type = $arraytype[1];
        //----------------------------------//
        if ($_FILES["uploadPic"]["error"] != 0 && $_FILES["uploadFile"]["error"] != 0) {

            if ($service->update_press($_POST["seq_i"], $_POST["subject_th"], $_POST["subject_en"], $_POST["status"], $_POST["date"], $_POST["curent_pic"], $_POST["curent_file"])) {
                echo $_SESSION['cd_0000'];
            } else if ($arraytype[1] != "pdf") {
                echo $_SESSION['cd_2203'];
            } else if (($filetype_pic != "png" ) && ( $filetype_pic != "jpeg") && ($filetype_pic != "jpg")) {
                echo $_SESSION['cd_2204'];
            } else {
                echo $_SESSION['cd_2001'];
            }
        } else if ($_FILES["uploadPic"]["error"] == 0 && $_FILES["uploadFile"]["error"] != 0) {
            $doc->add_FileName($_FILES["uploadPic"]);
            $doc->set_path("./file/press/");
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
                } else if ($service->update_press($_POST["seq_i"], $_POST["subject_th"], $_POST["subject_en"], $_POST["status"], $_POST["date"], $cout_data[0], $_POST["curent_file"])) {
                    $doc->Initial_and_Clear();
                    $doc->set_path("./file/press/");
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
        } else if ($_FILES["uploadFile"]["error"] == 0 && $_FILES["uploadPic"]["error"] != 0) {
            $doc->add_FileName($_FILES["uploadFile"]);
            $doc->set_path("./file/press/");
            $flg = $doc->AddFile();
            $cout = 0;
            $cout_data = array();
            if ($flg) {
                foreach ($doc->get_FilenameResult() as $value) {
                    $cout_data[$cout] = $value;
                    $cout++;
                }
                if ($filetype_type != "pdf") {
                    echo $_SESSION['cd_2203'];
                } else if ($service->update_press($_POST["seq_i"], $_POST["subject_th"], $_POST["subject_en"], $_POST["status"], $_POST["date"], $_POST["curent_pic"], $cout_data[0])) {
                    $doc->Initial_and_Clear();
                    $doc->set_path("./file/press/");
                    $doc->add_FileName($_POST["curent_file"]);
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
        } else if ($_FILES["uploadPic"]["error"] == 0 && $_FILES["uploadFile"]["error"] == 0) {

            $doc->add_FileName($_FILES["uploadPic"]);
            $doc->add_FileName($_FILES["uploadFile"]);
            $flg = $doc->AddFile();
            $cout = 0;
            $cout_data = array();
            if ($flg) {
                foreach ($doc->get_FilenameResult() as $value) {
                    $cout_data[$cout] = $value;
                    $cout++;
                }
                if ($arraytype[1] != "pdf") {
                    echo $_SESSION['cd_2203'];
                } else if (($filetype_pic != "png" ) && ( $filetype_pic != "jpeg") && ($filetype_pic != "jpg")) {
                    echo $_SESSION['cd_2204'];
                } else if ($_POST["date"] == NULL) {
                    echo $_SESSION['cd_2202'];
                } else if ($service->update_press($_POST["seq_i"], $_POST["subject_th"], $_POST["subject_en"], $_POST["status"], $_POST["date"], $cout_data[0], $cout_data[1])) {
                    $doc->Initial_and_Clear();
                    $doc->set_path("./file/press/");
                    $doc->add_FileName($_POST["curent_pic"]);
                    $doc->add_FileName($_POST["curent_file"]);
                    if ($doc->deleteFile()) {
                        echo $_SESSION['cd_0000'];
                    }
                } else {
                    $doc->clearFileAddFail();
                    echo $_SESSION['cd_2001'];
                }
            } else {
                $doc->clearFileAddFail();
                echo $_SESSION['cd_2001'];
            }
        }
    }

}
