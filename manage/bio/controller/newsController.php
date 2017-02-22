<?php

@session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_func = $_POST["func"];
} else {
    $_func = $_GET["func"];
}
if ($_SERVER['REQUEST_METHOD'] === 'type') {
    $_type = $_POST["type"];
} else {
    $_type = $_GET["type"];
}


//$fileToUpload_name = $_FILES['uploadPic']['name'];

$controller = new newsController();
switch ($_func) {
    case "delete":
        echo $controller->delete($_GET["seq"], $_GET["img"]);
        break;
    case "add_news":
        echo $controller->add_news();
        break;
    case "update_news":
        echo $controller->update_news();
        break;
    case "preview":
        echo $controller->preview($_GET["filename"]);
        break;
    case "dataTable":
        echo $controller->dataTable($_type);
        break;
}

class newsController {

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

    public function dataTable($_type) {
        include '../service/newsService.php';
        $service = new newsService();
        $_dataTable = $service->dataTable($_type);
        if ($_dataTable != NULL) {
            foreach ($_dataTable as $key => $value) {
                $_dataTable[$key]['d_date'] = $this->ConvertDate_YYYYMMDD($_dataTable[$key]['d_date']);
            }
            return json_encode($_dataTable);
        } else {
            return NULL;
        }
    }

    public function dataTable_sel($seq_i) {
        $service = new newsService();
        $_dataTable = $service->dataTable_sel($seq_i);
        if ($_dataTable != NULL) {
            return $_dataTable;
        } else {
            return NULL;
        }
    }

    private function ConvertDate_YYYYMMDD($date) {
        $dd = substr($date, 8, 2);
        $mm = substr($date, 5, 2);
        $yyyy = substr($date, 0, 4);
        return $yyyy . "/" . $mm . "/" . $dd;
    }
    public function ConvertDate_MMDDYYYY($date) {
        $dd = substr($date, 8, 2);
        $mm = substr($date, 5, 2);
        $yyyy = substr($date, 0, 4);
        return $mm . "/" . $dd . "/" . $yyyy;
    }

    public function delete($seq,$img) {
        include '../service/newsService.php';
        include '../common/upload.php';
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $db->conn();
        $service = new newsService();
        if ($service->delete($seq,$db) && $service->delete_img($seq,$db)) {
            $doc = new upload();
            $doc->Initial_and_Clear();
            $doc->set_path("./file/news/");
            $doc->add_FileName($img);
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

    public function add_news() {
        if ($this->isValid("ADD") == 1) {
            include '../service/newsService.php';
            include '../common/upload.php';
            require_once('../common/ConnectDB.php');
            $service = new newsService();
            $db = new ConnectDB();
            $db->conn();
            $doc = new upload();
            $doc->set_path("./file/news/");
            $doc->add_FileName($_FILES["uploadPic"]);
            $flg = $doc->AddFile();
            $cout = 0;
            $cout_data = array();

            $dt = new DateTime();
            $time_to_id = $dt->format('Ymdhs');

            foreach ($doc->get_FilenameResult() as $value) {
                $cout_data[$cout] = $value;
                $cout++;
            }
            if ($service->add_img_news($time_to_id, $cout_data[0]) &&
                    $service->add_news($time_to_id, $_POST["subject_th"], $_POST["subject_en"], $_POST["detail_th"], $_POST["detail_en"], $_POST["type"], $_POST["date"], $_POST["status"])) {
                $db->commit();
                echo $_SESSION['cd_0000'];
            } else {
                $db->rollback();
                $doc->clearFileAddFail();
                echo $_SESSION['cd_2001'];
            }
        }
    }

    public function isValid($condition) {
        $intReturn = 0;
        if ($this->isEmpty($_POST["subject_th"])) {
            echo $_SESSION['cd_2205'];
        } else if ($this->isEmpty($_POST["subject_en"])) {
            echo $_SESSION['cd_2206'];
        } else if ($this->isEmpty($_POST["detail_en"])) {
            echo $_SESSION['cd_2213'];
        } else if ($this->isEmpty($_POST["detail_th"])) {
            echo $_SESSION['cd_2214'];
        } else if ($this->isEmpty($_POST["date"])) {
            echo $_SESSION['cd_2208'];
        } else if ($_FILES["uploadPic"]["error"] == 4 && $condition == "ADD") {
            echo $_SESSION['cd_2207'];
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

    public function update_news() {
        if ($this->isValid("EDIT") == 1) {
            include '../service/newsService.php';
            include '../common/upload.php';
            $doc = new upload();
            $service = new newsService();
            $doc->set_path("./file/news/");

//----------------------------------//
            $check_type_pic = $_FILES["uploadPic"]['name'];
            $arraypic = explode(".", $check_type_pic); //แบ่งชื่อไฟล์กับนามสกุลออกจากกัน
            $lastname = strtolower($arraypic);
            $filetype_pic = $arraypic[1];
            //$_POST["curent_pic"])
//----------------------------------//
            if ($_FILES["uploadPic"]["error"] != 0) {

                if ($service->update_news($_POST["seq_i"], $_POST["subject_th"], $_POST["subject_en"], $_POST["detail_th"], $_POST["detail_en"], $_POST["status"], $_POST["date"])) {
                    echo $_SESSION['cd_0000'];
                } else {
                    echo $_SESSION['cd_2001'];
                }
            } else if ($_FILES["uploadPic"]["error"] == 0) {
                $doc->add_FileName($_FILES["uploadPic"]);
                $doc->set_path("./file/news/");
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
                    } else if ($service->update_news($_POST["seq_i"], $_POST["subject_th"], $_POST["subject_en"], $_POST["detail_th"], $_POST["detail_en"], $_POST["status"], $_POST["date"])
                            && $service->update_news_img($_POST["seq_i"],$cout_data[0])) {
                        $doc->Initial_and_Clear();
                        $doc->set_path("./file/news/");
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

}
