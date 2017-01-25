<?php

function ACTIVEPAGES($page) {
    if ($page == 1) {
        $_SESSION["m1"] = "active";
        $_SESSION["m2"] = "";
        $_SESSION["m3"] = "";
        $_SESSION["m4"] = "";
        $_SESSION["m5"] = "";
        $_SESSION["m6"] = "";
    } else if ($page == 2) {
        $_SESSION["m1"] = "";
        $_SESSION["m2"] = "active";
        $_SESSION["m3"] = "";
        $_SESSION["m4"] = "";
        $_SESSION["m5"] = "";
        $_SESSION["m6"] = "";
    } else if ($page == 3) {
        $_SESSION["m1"] = "";
        $_SESSION["m2"] = "";
        $_SESSION["m3"] = "active";
        $_SESSION["m4"] = "";
        $_SESSION["m5"] = "";
        $_SESSION["m6"] = "";
    } else if ($page == 4) {
        $_SESSION["m1"] = "";
        $_SESSION["m2"] = "";
        $_SESSION["m3"] = "";
        $_SESSION["m4"] = "active";
        $_SESSION["m5"] = "";
        $_SESSION["m6"] = "";
    } else if ($page == 5) {
        $_SESSION["m1"] = "";
        $_SESSION["m2"] = "";
        $_SESSION["m3"] = "";
        $_SESSION["m4"] = "";
        $_SESSION["m5"] = "active";
        $_SESSION["m6"] = "";
    } else if ($page == 6) {
        $_SESSION["m1"] = "";
        $_SESSION["m2"] = "";
        $_SESSION["m3"] = "";
        $_SESSION["m4"] = "";
        $_SESSION["m5"] = "";
        $_SESSION["m6"] = "active";
    }
}

function ACTIVEPAGE_SHOW($page) {
    if ($page == 1) {
        $_SESSION["ACTIVE_HOME"] = "uk-active";
        $_SESSION["ACTIVE_ABOUT"] = "";
        $_SESSION["ACTIVE_DEVICES"] = "";
        $_SESSION["ACTIVE_COSM"] = "";
        $_SESSION["ACTIVE_NEW"] = "";
        $_SESSION["ACTIVE_PRESS"] = "";
        $_SESSION["ACTIVE_CONTACTS"] = "";
        $_SESSION["ACTIVE_CUSTOMER"] = "";
    } else if ($page == 2) {
        $_SESSION["ACTIVE_HOME"] = "";
        $_SESSION["ACTIVE_ABOUT"] = "uk-active";
        $_SESSION["ACTIVE_DEVICES"] = "";
        $_SESSION["ACTIVE_COSM"] = "";
        $_SESSION["ACTIVE_NEW"] = "";
        $_SESSION["ACTIVE_PRESS"] = "";
        $_SESSION["ACTIVE_CONTACTS"] = "";
        $_SESSION["ACTIVE_CUSTOMER"] = "";
    } else if ($page == 3) {
        $_SESSION["ACTIVE_HOME"] = "";
        $_SESSION["ACTIVE_ABOUT"] = "";
        $_SESSION["ACTIVE_DEVICES"] = "uk-active";
        $_SESSION["ACTIVE_COSM"] = "";
        $_SESSION["ACTIVE_NEW"] = "";
        $_SESSION["ACTIVE_PRESS"] = "";
        $_SESSION["ACTIVE_CONTACTS"] = "";
        $_SESSION["ACTIVE_CUSTOMER"] = "";
    } else if ($page == 4) {
        $_SESSION["ACTIVE_HOME"] = "";
        $_SESSION["ACTIVE_ABOUT"] = "";
        $_SESSION["ACTIVE_DEVICES"] = "";
        $_SESSION["ACTIVE_COSM"] = "uk-active";
        $_SESSION["ACTIVE_NEW"] = "";
        $_SESSION["ACTIVE_PRESS"] = "";
        $_SESSION["ACTIVE_CONTACTS"] = "";
        $_SESSION["ACTIVE_CUSTOMER"] = "";
    } else if ($page == 5) {
        $_SESSION["ACTIVE_HOME"] = "";
        $_SESSION["ACTIVE_ABOUT"] = "";
        $_SESSION["ACTIVE_DEVICES"] = "";
        $_SESSION["ACTIVE_COSM"] = "";
        $_SESSION["ACTIVE_NEW"] = "uk-active";
        $_SESSION["ACTIVE_PRESS"] = "";
        $_SESSION["ACTIVE_CONTACTS"] = "";
        $_SESSION["ACTIVE_CUSTOMER"] = "";
    } else if ($page == 6) {
        $_SESSION["ACTIVE_HOME"] = "";
        $_SESSION["ACTIVE_ABOUT"] = "";
        $_SESSION["ACTIVE_DEVICES"] = "";
        $_SESSION["ACTIVE_COSM"] = "";
        $_SESSION["ACTIVE_NEW"] = "";
        $_SESSION["ACTIVE_PRESS"] = "uk-active";
        $_SESSION["ACTIVE_CONTACTS"] = "";
        $_SESSION["ACTIVE_CUSTOMER"] = "";
    } else if ($page == 7) {
        $_SESSION["ACTIVE_HOME"] = "";
        $_SESSION["ACTIVE_ABOUT"] = "";
        $_SESSION["ACTIVE_DEVICES"] = "";
        $_SESSION["ACTIVE_COSM"] = "";
        $_SESSION["ACTIVE_NEW"] = "";
        $_SESSION["ACTIVE_PRESS"] = "";
        $_SESSION["ACTIVE_CONTACTS"] = "uk-active";
        $_SESSION["ACTIVE_CUSTOMER"] = "";
    } else if ($page == 8) {
        $_SESSION["ACTIVE_HOME"] = "";
        $_SESSION["ACTIVE_ABOUT"] = "";
        $_SESSION["ACTIVE_DEVICES"] = "";
        $_SESSION["ACTIVE_COSM"] = "";
        $_SESSION["ACTIVE_NEW"] = "";
        $_SESSION["ACTIVE_PRESS"] = "";
        $_SESSION["ACTIVE_CONTACTS"] = "";
        $_SESSION["ACTIVE_CUSTOMER"] = "uk-active";
    }
}

?>