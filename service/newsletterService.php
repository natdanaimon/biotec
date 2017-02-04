<?php

class newsletterService {

    function sendletter($name, $email, $category, $city, $town, $country, $tel, $website) {
        require_once('../manage/bio/common/ConnectDB.php');
        $db = new ConnectDB();
        $db->conn();
        $running = date('YmdHis');
        $strSQL = " INSERT INTO  tb_newsletter ( s_running , s_name ,  s_email ,  s_category ,  s_city ,   s_town , s_country ,  s_phone ,  s_website ,  s_status  ) ";
        $strSQL .= " VALUES ";
        $strSQL .= "('$running','$name','$email','$category','$city','$town','$country','$tel','$website','A')";
        $arr = array(
            array("query" => "$strSQL")
        );
        $reslut = $db->insert_for_upadte($arr);
        $db->commit();
        return $reslut;
    }

    function check_dupplicate($email) {
        require_once('../manage/bio/common/ConnectDB.php');
        $db = new ConnectDB();
        $sql = " SELECT * FROM tb_newsletter "
                . " WHERE s_email = '" . $email . "' ";
        $_data = $db->Search_Data_FormatJson($sql);
        $db->close_conn();


        return ($_data != NULL && count($_data) > 0 ? TRUE : FALSE);
    }

}
