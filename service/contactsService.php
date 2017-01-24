<?php

class contactsService {

    function sendMsg($dogousername, $dogolastname, $dogoemail, $dogophone, $dogocity, $dogocountry, $dogosubject, $dogomessage) {
        require_once('../manage/bio/common/ConnectDB.php');
        $db = new ConnectDB();
        $db->conn();
        $strSQL = " INSERT INTO  tb_contacts ( s_name ,  s_lastname ,  s_email ,  s_number ,  s_city ,  s_country ,  s_subject ,  s_message ,  d_date ,  s_status ) ";
        $strSQL .= " VALUES ";
        $strSQL .= "('$dogousername','$dogolastname','$dogoemail','$dogophone','$dogocity','$dogocountry','$dogosubject','$dogomessage',now(),'W')";
        $arr = array(
            array("query" => "$strSQL")
        );
        $reslut = $db->insert_for_upadte($arr);
        $db->commit();
        return $reslut;
    }

}
