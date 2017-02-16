<?php

class profileService {

    function dataTable_sel($user) {
        require_once('./common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT * FROM  tb_user u  "
                . " WHERE u.s_user = '" . $user . "' ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();
        return $_data;
    }

    function update_profile($info, $pic) {
        $pic = ($pic == NULL ? $info["curent_pic"] : $pic);
        require_once('../common/ConnectDB.php');
        $db = new ConnectDB();
        $db->conn(); //	s_pathfile --	s_img
        $sql = "UPDATE tb_user SET "
                . "s_firstname = '" . $info["s_firstname"] . "', "
                . "s_pass = '" . $info["s_pass"] . "', "
                . "s_image ='" . $pic . "' "
                . "WHERE s_user = '" . $info["s_username"] . "' ";
        $arr = array(
            array("query" => "$sql")
        );
        $reslut = $db->insert_for_upadte($arr);
        $db->commit();
        return $reslut;
    }

}
