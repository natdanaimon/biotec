<?php

//
//include '../model/morris.php';
//for ($i = 0; $i < 10; $i++) {
//    $morris = new morris();
//    $date = date_create(date("Y-m-d"));
//    $morris->setDate(date_format(date_add($date, date_interval_create_from_date_string('-' . $i . ' days')), 'Y-m-d'));
//    $morris->setQty($i);
//    $_d[] = (array) $morris;
//}
//echo (json_encode($_d));
//
$i = 9;
$date = date_create(date("Y-m-d", new DateTimeZone('Asia/Bangkok')), new DateTimeZone('Asia/Bangkok'));
$condition = date_format(date_add($date, date_interval_create_from_date_string('-' . $i . ' days')), 'Y-m-d');
include '../common/ConnectDB.php';
$db = new ConnectDB();
$strSql = "";
$strSql .= "SELECT count(*) cnt  FROM  tb_contacts  WHERE DATE_FORMAT(d_date,'%Y-%m-%d') = '$condition' ";

$_data = $db->Search_Data_FormatJson($strSql);
$db->close_conn();

echo $_data[0][cnt];




return $_data[0][cnt];
