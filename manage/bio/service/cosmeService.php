<?php

class cosmeService {

    function delete($seq) {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $db->conn();
        $strSQL = "DELETE FROM tb_cosme WHERE id = " . $seq;
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
        $sql = " SELECT c.* FROM  tb_cosme_type c   "
                . " ORDER BY c.id  asc ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }

    function dataTable_item($i_seq) {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT c.* FROM  tb_cosme c   "
                . " WHERE c.cosme_type = '" . $i_seq . "'   "
                . " ORDER BY c.id  asc ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }

    function dataTable_item_row($i_seq) {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT c.* FROM  tb_cosme c   "
                . " WHERE c.id = '" . $i_seq . "'   "
                . "  ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }

    function dataTable_title($i_seq) {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT c.* FROM  tb_cosme_type c   "
                . " WHERE c.id = '" . $i_seq . "'   "
                . " ORDER BY c.id  desc ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }

    //////////////// Add new cosme
    function add_cosme($info, $img, $logo) {
        $flgInsert = ($info[cosme_id] == NULL ? TRUE : FALSE);
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $db->conn();
        if (!$flgInsert) {

            $sql = "UPDATE tb_cosme_type ";
            $sql .= " set   cosme_th = '" . $info[subject_th] . "'";
            $sql .= " ,   cosme_en  = '" . $info[subject_en] . "' ";
            if ($img != NULL) {
                $sql .= " ,   main_img  = '" . $img . "' ";
            }
            if ($logo != NULL) {
                $sql .= " ,   main_logo  = '" . $logo . "' ";
            }
            $sql .= " where id = $info[cosme_id]";
            $arr = array(
                array("query" => "$sql")
            );
            $reslut = $db->insert_for_upadte($arr);
        }
        $db->commit();
        return $reslut;
    }

    function add_cosme_backup() {
        $id = $_POST["id"];
        $data_arr['cosme_th'] = $_POST["subject_th"];
        $data_arr['cosme_en'] = $_POST["subject_en"];

        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $db->conn();

        ////////// Add New
        if ($id == NULL) {
            ///// insert data
            $db->add_db("tb_cosme_type", $data_arr);
            $id = mysql_insert_id();
        }
        ////////// Update 
        else {
            $db->update_db("tb_cosme_type", $data_arr, "id = '" . $id . "' ");
        }

        //*
        /////////// start check mkdir
        $save_uploads = "../uploads";
        if (!file_exists($save_uploads)) {
            mkdir($save_uploads, 0777);
        }
        $save_cosme_type = "../uploads/cosme_type";
        if (!file_exists($save_cosme_type)) {
            mkdir($save_cosme_type, 0777);
        }
        $save_cosme_item = "../uploads/cosme_item";
        if (!file_exists($save_cosme_item)) {
            mkdir($save_cosme_item, 0777);
        }
        /*
          /////////// end check mkdir
          /////////////// create folder
          mkdir("../uploads/cosme_item/icon/".$id, 0777);
          mkdir("../uploads/cosme_item/logo/".$id, 0777);
          mkdir("../uploads/cosme_item/img/".$id, 0777);

          // */
        ////////// update images
        $part_image = "../uploads/cosme_type/";
        if ($_FILES["main_img"]) {
            $value = $_FILES["main_img"];
            $temp = explode(".", $value["name"]);
            $tmpFileName = $id . 'main_img.' . end($temp);
            $newfilename = $part_image . $tmpFileName;
            move_uploaded_file($value["tmp_name"], $newfilename);
            $main_img['main_img'] = $tmpFileName;
            $db->update_db("tb_cosme_type", $main_img, "id = '" . $id . "' ");
        }
        if ($_FILES["main_logo"]) {
            $value = $_FILES["main_logo"];
            $temp = explode(".", $value["name"]);
            $tmpFileName = $id . 'main_logo.' . end($temp);
            $newfilename = $part_image . $tmpFileName;
            move_uploaded_file($value["tmp_name"], $newfilename);
            $main_logo['main_logo'] = $tmpFileName;
            $db->update_db("tb_cosme_type", $main_logo, "id = '" . $id . "' ");
        }


        $reslut = TRUE;
        $db->commit();
        return $reslut;
    }

    /**
     * **************************
     * ********** Add New cosme Item ****************
     * **************************
     */
    function insert_item_cosme($info, $img) {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $db->conn();
        $sql = "INSERT INTO tb_cosme "
                . "(cosme_type, title_th, title_en, topic_th, topic_en, detail_th, detail_en, img) "
                . "VALUES "
                . "( "
                . "  " . $info[type] . ","
                . " '" . $info[title_th] . "',"
                . " '" . $info[title_en] . "',"
                . " '" . $info[topic_th] . "',"
                . " '" . $info[topic_en] . "',"
                . " '" . $info[detail_th] . "',"
                . " '" . $info[detail_en] . "',"
                . " '" . $img . "'"
                . ")";
        $arr = array(
            array("query" => "$sql")
        );
        $reslut = $db->insert_for_upadte($arr);
        $db->commit();
        return $reslut;
    }

    function update_item_cosme($info, $img) {
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $db->conn();
        $sql = "UPDATE tb_cosme ";
        $sql .= " set   title_th = '" . $info[title_th] . "'";
        $sql .= " ,   title_en  = '" . $info[title_en] . "' ";
        $sql .= " ,   topic_th  = '" . $info[topic_th] . "' ";
        $sql .= " ,   topic_en  = '" . $info[topic_en] . "' ";
        $sql .= " ,   detail_th  = '" . $info[detail_th] . "' ";
        $sql .= " ,   detail_en  = '" . $info[detail_en] . "' ";
        if ($img != NULL) {
            $sql .= " ,   img  = '" . $img . "' ";
        }
        $sql .= " where id = $info[id]";
        $arr = array(
            array("query" => "$sql")
        );
        $reslut = $db->insert_for_upadte($arr);
        $db->commit();
        return $reslut;
    }

    function add_cosme_item($icon, $logo) {
        $id = $_POST["id"];


        $data_arr['title_th'] = $_POST["title_th"];
        $data_arr['title_en'] = $_POST["title_en"];
        $data_arr['topic_th'] = $_POST["topic_th"];
        $data_arr['topic_en'] = $_POST["topic_en"];
        $data_arr['detail_th'] = $_POST["detail_th"];
        $data_arr['detail_en'] = $_POST["detail_en"];



        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $db->conn();
        $flgUpdate = FALSE;
        ////////// Add New
        if ($id == NULL) {
            $data_arr['cosme_type'] = $_POST["type"];
            ///// insert data
            $db->add_db("tb_cosme", $data_arr);
            $id = mysql_insert_id();
        } else {
            ////////// Update 
            $flgUpdate = TRUE;
            $db->update_db("tb_cosme", $data_arr, "id = '" . $id . "' ");
        }


        ////////// update images
        $part_image = "../uploads/cosme_item/";
        if ($_FILES["img"]["error"] != 0) {
            $value = $_FILES["img"];
            $temp = explode(".", $value["name"]);
            $tmpFileName = $id . 'img.' . end($temp);
            $newfilename = $part_image . $tmpFileName;
            move_uploaded_file($value["tmp_name"], $newfilename);
            $data_img['img'] = $tmpFileName;
            $db->update_db("tb_cosme", $data_img, "id = '" . $id . "' ");
        }










        $reslut = $id;
        $db->commit();
        return $reslut;
    }

}
