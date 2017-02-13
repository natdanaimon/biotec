<?php

@session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_func = $_POST["func"];
} else {
    $_func = $_GET["func"];
}



$controller = new contentController();
switch ($_func) {
    case "add_index" :
        echo $controller->add_index($_POST["s_type"], $_POST["index"], $_POST["status"], $_POST["s_topic_th"], $_POST["s_topic_en"], $_POST["s_url"], $_POST["detail_th"], $_POST["detail_en"]);
        break;
    case "update_index" :
        echo $controller->update_index($_POST["s_type"], $_POST["index"], $_POST["status"], $_POST["s_topic_th"], $_POST["s_topic_en"], $_POST["s_url"], $_POST["detail_th"], $_POST["detail_en"], $_POST["i_seq"], $_POST["s_img_current"]);
        break;
    case "delete":
        echo $controller->delete($_GET["seq"], $_GET["img"], $_GET["type"]);
        break;
    case "dataTable":
        echo $controller->dataTable($_GET["type"]);
        break;
}

class contentController {

    public function __construct() {
        
    }

    public function add_index($type, $index, $status, $topic_th, $topic_en, $url, $detail_th, $detail_en) {
        if ($this->isValid("ADD", $index, $topic_th, $topic_en, $url, $detail_th, $detail_en) == 1) {
            include '../service/contentService.php';
            include '../common/upload.php';
            require_once('../common/ConnectDB.php');
            $service = new contentService();
            $doc = new upload();
            $folder = $this->getFolder($type);
            $doc->set_path("../../../images/$folder/");
            $doc->add_FileName($_FILES["uploadPic"]);
            $flg = $doc->AddFile();
            if ($flg) {
                $cout = 0;
                $cout_data = array();
                foreach ($doc->get_FilenameResult() as $value) {
                    $cout_data[$cout++] = $value;
                }
                if ($service->add_index($cout_data[0], $type, $index, $status, $topic_th, $topic_en, $url, $detail_th, $detail_en)) {
                    echo $_SESSION['cd_0000'];
                } else {
                    $doc->clearFileAddFail();
                    echo $_SESSION['cd_2001'];
                }
            } else {
                $doc->clearFileAddFail();
                echo $doc->get_errorMessage();
            }
        }
    }

    public function update_index($type, $index, $status, $topic_th, $topic_en, $url, $detail_th, $detail_en, $seq, $img_current) {
        if ($this->isValid("EDIT", $index, $topic_th, $topic_en, $url, $detail_th, $detail_en) == 1) {
            include '../service/contentService.php';
            include '../common/upload.php';
            require_once('../common/ConnectDB.php');
            $service = new contentService();
            $doc = new upload();
            $folder = $this->getFolder($type);
            $doc->set_path("../../../images/$folder/");


            if ($_FILES["uploadPic"]["error"] != 0) {
                if ($service->update_index($type, $index, $status, $topic_th, $topic_en, $url, $detail_th, $detail_en, $seq, NULL)) {
                    echo $_SESSION['cd_0000'];
                } else {
                    echo $_SESSION['cd_2001'];
                }
            } else {
                $doc->add_FileName($_FILES["uploadPic"]);
                $flg = $doc->AddFile();
                if ($flg) {
                    $cout = 0;
                    $cout_data = array();
                    foreach ($doc->get_FilenameResult() as $value) {
                        $cout_data[$cout++] = $value;
                    }
                    if ($service->update_index($type, $index, $status, $topic_th, $topic_en, $url, $detail_th, $detail_en, $seq, $cout_data[0])) {
                        $doc->Initial_and_Clear();
                        $doc->set_path("../../../images/$folder/");
                        $doc->add_FileName($img_current);
                        if ($doc->deleteFile()) {
                            echo $_SESSION['cd_0000'];
                        }
                    } else {
                        $doc->clearFileAddFail();
                        echo $_SESSION['cd_2001'];
                    }
                } else {
                    $doc->clearFileAddFail();
                    echo $doc->get_errorMessage();
                }
            }
        }
    }

    public function isValid($condition, $index, $topic_th, $topic_en, $url, $detail_th, $detail_en) {
        $intReturn = 0;
        if ($this->isEmpty($index)) {
            $return2099 = $_SESSION['cd_2099'];
            $return2099 = eregi_replace("field", $_SESSION["col_index_index"], $return2099);
            echo $return2099;
        } else if ($this->isEmpty($topic_th)) {
            $return2099 = $_SESSION['cd_2099'];
            $return2099 = eregi_replace("field", $_SESSION["col_index_topic_th"], $return2099);
            echo $return2099;
        } else if (!$this->overLenght($topic_th, 15)) {
            $return2098 = $_SESSION['cd_2098'];
            $return2098 = eregi_replace("field", $_SESSION["col_index_topic_th"], $return2098);
            $return2098 = eregi_replace("xxx", "15", $return2098);
            echo $return2098;
        } else if ($this->isEmpty($topic_en)) {
            $return2099 = $_SESSION['cd_2099'];
            $return2099 = eregi_replace("field", $_SESSION["col_index_topic_en"], $return2099);
            echo $return2099;
        } else if (!$this->overLenght($topic_en, 15)) {
            $return2098 = $_SESSION['cd_2098'];
            $return2098 = eregi_replace("field", $_SESSION["col_index_topic_en"], $return2098);
            $return2098 = eregi_replace("xxx", "15", $return2098);
            echo $return2098;
        } else if ($this->isEmpty($url)) {
            $return2099 = $_SESSION['cd_2099'];
            $return2099 = eregi_replace("field", $_SESSION["col_index_url"], $return2099);
            echo $return2099;
        } else if ($this->isEmpty($detail_th)) {
            $return2099 = $_SESSION['cd_2099'];
            $return2099 = eregi_replace("field", $_SESSION["col_index_detail_th"], $return2099);
            echo $return2099;
        } else if (!$this->overLenght($detail_th, 500)) {
            $return2098 = $_SESSION['cd_2098'];
            $return2098 = eregi_replace("field", $_SESSION["col_index_detail_th"], $return2098);
            $return2098 = eregi_replace("xxx", "500", $return2098);
            echo $return2098;
        } else if ($this->isEmpty($detail_en)) {
            $return2099 = $_SESSION['cd_2099'];
            $return2099 = eregi_replace("field", $_SESSION["col_index_detail_en"], $return2099);
            echo $return2099;
        } else if (!$this->overLenght($detail_en, 500)) {
            $return2098 = $_SESSION['cd_2098'];
            $return2098 = eregi_replace("field", $_SESSION["col_index_detail_en"], $return2098);
            $return2098 = eregi_replace("xxx", "500", $return2098);
            echo $return2098;
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

    private function overLenght($str, $limit) {
        $len = trim(strlen(utf8_decode($str)));
        if ($len > $limit) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function getFolder($type) {
        if ($type == "top") {
            return "top_content";
        } else if ($type == "bottom") {
            return "bottom_content";
        }
    }

    public function dataTable($type) {
        include '../service/contentService.php';
        $service = new contentService();
        $_dataTable = $service->dataTable($type);
        if ($_dataTable != NULL) {
            return json_encode($_dataTable);
        } else {
            return NULL;
        }
    }

    public function dataTable_seq($pageTxt, $seq) {
        $service = new contentService();
        $_dataTable = $service->dataTable_seq($pageTxt, $seq);
        if ($_dataTable != NULL) {
            return $_dataTable;
        } else {
            return NULL;
        }
    }

    public function delete($seq, $img, $type) {
        include '../service/contentService.php';
        include '../common/upload.php';
        $service = new contentService();
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $db->conn();
        if ($service->delete($seq, $type, $db)) {
            $doc = new upload();
            $doc->Initial_and_Clear();
            $folder = $this->getFolder($type);
            $doc->set_path("../../../images/$folder/");
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

}
