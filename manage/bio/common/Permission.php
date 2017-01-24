<?php
@session_start();
if ($_SESSION["username"] == null || $_SESSION["username"] == "") {
    header("location:index.php");
}
//if ($_SESSION["username"] > 0) {
//    header("location:login.php");
//    exit(0);
//}
?>