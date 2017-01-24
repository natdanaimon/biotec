<?php
session_start();
include '../common/Utility.php';
$util = new Utility();
$type = ($util->isEmptyReg($_GET[lan]) ? "th" : $_GET[lan]);
$_SESSION["lan"] = $type;
$util->setPathXML("../language/language.xml");
$util->LanguageConfig($type);
header("location:$_GET[url]");
