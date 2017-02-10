<?php

@session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_func = $_POST["func"];
} else {
    $_func = $_GET["func"];
}



$controller = new slideController();
switch ($_func) {
    case "add_slide" :
        echo $controller->add_slide($_POST["s_page"], $_POST["index"], $_POST["status"]);
        break;
    case "update_slide" :
        echo $controller->update_slide($_POST["s_page"], $_POST["index"], $_POST["status"], $_POST["i_seq"], $_POST["s_img_current"]);
        break;
    case "delete":
        echo $controller->delete($_GET["seq"], $_GET["img"], $_GET["page"]);
        break;
    case "dataTable":
        echo $controller->dataTable($_GET["page"]);
        break;
    case "updateStatus":
        echo $controller->updateStatus($_GET["email"], $_GET["status"]);
        break;
    case "updateCategory":
        echo $controller->updateCategory($_GET["email"], $_GET["category"]);
        break;
}

class slideController {

    public function __construct() {
        
    }

    public function add_slide($page, $index, $status) {
        if ($this->isValid("ADD", $index) == 1) {
            include '../service/slideService.php';
            include '../common/upload.php';
            require_once('../common/ConnectDB.php');
            $service = new slideService();
            $doc = new upload();
            $folder = $this->getFolder($page);
            $doc->set_path("../../../images/slideshow/$folder/");
            $doc->add_FileName($_FILES["uploadPic"]);
            $flg = $doc->AddFile();
            if ($flg) {
                $cout = 0;
                $cout_data = array();
                foreach ($doc->get_FilenameResult() as $value) {
                    $cout_data[$cout++] = $value;
                }
                if ($service->add_slide($cout_data[0], $index, $page, $status)) {
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

    public function update_slide($page, $index, $status, $seq, $img_current) {
        if ($this->isValid("EDIT", $index) == 1) {
            include '../service/slideService.php';
            include '../common/upload.php';
            require_once('../common/ConnectDB.php');
            $service = new slideService();
            $doc = new upload();
            $folder = $this->getFolder($page);
            $doc->set_path("../../../images/slideshow/$folder/");


            if ($_FILES["uploadPic"]["error"] != 0) {
                if ($service->update_slide($index, $status, $seq, NULL)) {
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
                    if ($service->update_slide($index, $status, $seq,$cout_data[0])) {
                        $doc->Initial_and_Clear();
                        $doc->set_path("../../../images/slideshow/$folder/");
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

    public function isValid($condition, $index) {
        $intReturn = 0;
        if ($this->isEmpty($index)) {
            $return2099 = $_SESSION['cd_2099'];
            $return2099 = eregi_replace("field", $_SESSION["col_slide_index"], $return2099);
            echo $return2099;
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

    function getFolder($page) {
        if ($page == "index") {
            return "homepage";
        } else if ($page == "about") {
            return "chisiamo";
        } else if ($page == "contacts") {
            return "contacts";
        }
    }

    function getTyle($type) {
        if ($type == 1) {
            return "index";
        } else if ($type == 2) {
            return "about";
        } else if ($type == 3) {
            return "contacts";
        }
    }

    public function dataTable($page) {
        include '../service/slideService.php';
        $service = new slideService();
        $_dataTable = $service->dataTable($page);
        if ($_dataTable != NULL) {
            return json_encode($_dataTable);
        } else {
            return NULL;
        }
    }

    public function dataTable_seq($pageTxt, $seq) {
        include '../service/slideService.php';
        $service = new slideService();
        $_dataTable = $service->dataTable_seq($pageTxt, $seq);
        if ($_dataTable != NULL) {
            return $_dataTable;
        } else {
            return NULL;
        }
    }

    public function updateStatus($email, $status) {
        include '../service/newsletterService.php';
        $service = new newsletterService();
        if ($service->updateStatus($email, $status)) {
            echo $_SESSION['cd_0000'];
        } else {
            echo $_SESSION['cd_2001'];
        }
    }

    public function delete($seq, $img, $page) {
        include '../service/slideService.php';
        include '../common/upload.php';
        $service = new slideService();
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $db->conn();
        if ($service->delete($seq, $db)) {
            $doc = new upload();
            $doc->Initial_and_Clear();
            $folder = $this->getFolder($page);
            $doc->set_path("../../../images/slideshow/$folder/");
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
