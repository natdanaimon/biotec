<?php

@session_start();
error_reporting(0);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_func = $_POST["func"];
    $info = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', json_encode($_POST)), true);
} else {
    $_func = $_GET["func"];
    $info = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', json_encode($_GET)), true);
}




$controller = new cosmeController();
switch ($_func) {
    case "add_cosme":
        echo $controller->add_cosme($info);
        break;
    case "add_cosme_item":
        echo $controller->add_cosme_item($info);
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

    public function add_cosme($info) {
        $flgInsert = ($info[cosme_id] == NULL ? TRUE : FALSE);
        if ($this->isValidType($flgInsert, $info)) {
            include '../service/cosmeService.php';
            include '../common/upload.php';
            $service = new cosmeService();
            $doc = new upload();
            $doc->set_path("../uploads/cosme_type/");
            if (!$flgInsert) {

                $flgImg = ($_FILES["main_img"]["error"] == 0 ? TRUE : FALSE);
                $flgLogo = ($_FILES["main_logo"]["error"] == 0 ? TRUE : FALSE);

                if (!$flgImg && !$flgLogo) {
                    if ($service->add_cosme($info, NULL, NULL)) {
                        echo $_SESSION['cd_0000'];
                    } else {
                        echo $_SESSION['cd_2001'];
                    }
                } else if ($flgImg && !$flgLogo) {
                    $doc->add_FileName($_FILES["main_img"]);
                    $flg = $doc->AddFile();
                    if ($flg) {
                        $cout = 0;
                        $cout_data = array();
                        foreach ($doc->get_FilenameResult() as $value) {
                            $cout_data[$cout++] = $value;
                        }
                        if ($service->add_cosme($info, $cout_data[0], NULL)) {
                            $doc->Initial_and_Clear();
                            $doc->set_path("../uploads/cosme_type/");
                            $doc->add_FileName($info[current_main_img]);
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
                } else if (!$flgImg && $flgLogo) {
                    $doc->add_FileName($_FILES["main_logo"]);
                    $flg = $doc->AddFile();
                    if ($flg) {
                        $cout = 0;
                        $cout_data = array();
                        foreach ($doc->get_FilenameResult() as $value) {
                            $cout_data[$cout++] = $value;
                        }
                        if ($service->add_cosme($info, NULL, $cout_data[0])) {
                            $doc->Initial_and_Clear();
                            $doc->set_path("../uploads/cosme_type/");
                            $doc->add_FileName($info[current_main_logo]);
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
                } else if ($flgImg && $flgLogo) {
                    $doc->add_FileName($_FILES["main_img"]);
                    $doc->add_FileName($_FILES["main_logo"]);
                    $flg = $doc->AddFile();
                    if ($flg) {
                        $cout = 0;
                        $cout_data = array();
                        foreach ($doc->get_FilenameResult() as $value) {
                            $cout_data[$cout++] = $value;
                        }
                        if ($service->add_cosme($info, $cout_data[0], $cout_data[1])) {
                            $doc->Initial_and_Clear();
                            $doc->set_path("../uploads/cosme_type/");
                            $doc->add_FileName($info[current_main_img]);
                            $doc->add_FileName($info[current_main_logo]);
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
    }

    public function add_cosme_item_backup() {
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
          // */

        $flg = TRUE;
        $cout = 0;
        $cout_data = array();
        if ($flg) {
            /*
              foreach ($doc->get_FilenameResult() as $value) {
              $cout_data[$cout] = $value;
              $cout++;
              }
              // */
            if ($service->add_cosme_item()) {
                echo $_SESSION['cd_0000'];
            } else {
                echo $_SESSION['cd_2001'];
            }
            //กรณี insert fail remove file
            //pic->clearFileAddFail();
        } else {
            $pic->clearFileAddFail();
        }
//*/
    }

    private function isEmpty($tmp) {
        if ($tmp == NULL || trim($tmp) == '') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function isValidType($insert, $info) {
        $intReturn = 0;

        if ($this->isEmpty($info[subject_th])) {
            $return2099 = $_SESSION['cd_2099'];
            $return2099 = eregi_replace("field", $_SESSION["press_tb_tr_subject_th"], $return2099);
            echo $return2099;
        } else if ($this->isEmpty($info[subject_en])) {
            $return2099 = $_SESSION['cd_2099'];
            $return2099 = eregi_replace("field", $_SESSION["press_tb_tr_subject_en"], $return2099);
            echo $return2099;
        } else {
            $intReturn = 1;
        }
        return $intReturn;
    }

    public function isValid($insert, $info) {
        $intReturn = 0;

        if ($_FILES["img"]["error"] == 4 && (boolean) $insert) {
            echo $_SESSION['cd_2207'];
        } else if ($this->isEmpty($info[title_th])) {
            $return2099 = $_SESSION['cd_2099'];
            $return2099 = eregi_replace("field", $_SESSION["cosme_subject_th"], $return2099);
            echo $return2099;
        } else if ($this->isEmpty($info[title_en])) {
            $return2099 = $_SESSION['cd_2099'];
            $return2099 = eregi_replace("field", $_SESSION["cosme_subject_en"], $return2099);
            echo $return2099;
        } else if ($this->isEmpty($info[topic_th])) {
            $return2099 = $_SESSION['cd_2099'];
            $return2099 = eregi_replace("field", $_SESSION["cosme_subject_light_th"], $return2099);
            echo $return2099;
        } else if ($this->isEmpty($info[topic_en])) {
            $return2099 = $_SESSION['cd_2099'];
            $return2099 = eregi_replace("field", $_SESSION["cosme_subject_light_en"], $return2099);
            echo $return2099;
        } else {
            $intReturn = 1;
        }
        return $intReturn;
    }

    public function add_cosme_item($info) {
        $flgInsert = ($info[id] == NULL ? TRUE : FALSE);
        if ($this->isValid($flgInsert, $info) == 1) {
            include '../service/cosmeService.php';
            include '../common/upload.php';
            $service = new cosmeService();
            $doc = new upload();
            $doc->set_path("../uploads/cosme_item/");

            if ($flgInsert) {
                $doc->add_FileName($_FILES["img"]);
                $flg = $doc->AddFile();
                if ($flg) {
                    $cout = 0;
                    $cout_data = array();
                    foreach ($doc->get_FilenameResult() as $value) {
                        $cout_data[$cout++] = $value;
                    }
                    if ($service->insert_item_cosme($info, $cout_data[0])) {
                        echo $_SESSION['cd_0000'];
                    } else {
                        $doc->clearFileAddFail();
                        echo $_SESSION['cd_2001'];
                    }
                } else {
                    $doc->clearFileAddFail();
                    echo $doc->get_errorMessage();
                }
            } else {
                if ($_FILES["img"]["error"] != 0) {
                    if ($service->update_item_cosme($info, NULL)) {
                        echo $_SESSION['cd_0000'];
                    } else {
                        echo $_SESSION['cd_2001'];
                    }
                } else {
                    $doc->add_FileName($_FILES["img"]);
                    $flg = $doc->AddFile();
                    if ($flg) {
                        $cout = 0;
                        $cout_data = array();
                        foreach ($doc->get_FilenameResult() as $value) {
                            $cout_data[$cout++] = $value;
                        }
                        if ($service->update_item_cosme($info, $cout_data[0])) {
                            $doc->Initial_and_Clear();
                            $doc->set_path("../uploads/cosme_item/");
                            $doc->add_FileName($info[img_current]);
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
