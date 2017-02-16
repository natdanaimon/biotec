<?php

@session_start();
include '../service/loginService.php';
include '../service/commonService.php';
include '../common/Utility.php';
$servic = new loginService();
$common = new commonService();
$util = new Utility();
$util->setPathXML("../language/language.xml");
$util->LanguageConfig("th");
$_SESSION["lan"] = "th";
$user = $_POST[user];
$pass = $_POST[pass];

$flgUser = $util->isEmptyReg($user);

if ($flgUser) {
    echo $_SESSION['cd_4001'];
}


$flgPass = $util->isEmptyReg($pass);
if ($flgPass && !$flgUser) {
    echo $_SESSION['cd_4002'];
}


if (!$flgUser && !$flgPass) {
    $_data = $servic->login($user, $pass);

    if ($_data != NULL) {
        $_SESSION["sessionStatus"] = $common->getSessionStatus(1);
        foreach ($_data as $key => $value) {
            $_SESSION["username"] = $_data[$key]['s_user'];
            $_SESSION["password"] = $_data[$key]['s_pass'];
            $_SESSION["img_profile"] = $_data[$key]['s_image'];
            $_SESSION["full_name"] = $_data[$key]['s_firstname'];
        }
        echo $_SESSION['cd_0000'];
    } else {
        echo $_SESSION['cd_4003'];
    }
}

