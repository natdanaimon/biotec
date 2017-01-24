<?php
session_start();
include '../manage/bio/common/Utility.php';
$util = new Utility();
$type = ($util->isEmptyReg($_GET[lan]) ? "th" : $_GET[lan]);
$util->setPathXML("../manage/bio/language/language.xml");
$_SESSION["main_lan"] = $type;
$util->LanguageConfig($type);

header("location:$_GET[url]");
