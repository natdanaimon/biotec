<?php

function ACTIVEPAGES($page) {
    $_SESSION["style2"] = "display: none;";
    $_SESSION["style3"] = "display: none;";
    if ($page == 1) {
        $_SESSION["m1"] = "active";
        $_SESSION["m2"] = "";
        $_SESSION["m3"] = "";
        $_SESSION["m4"] = "";
        $_SESSION["m5"] = "";
        $_SESSION["m6"] = "";
        $_SESSION["m7"] = "";
    } else if ($page == 2) {
        $_SESSION["style2"] = "display: block;";
        $_SESSION["m1"] = "";
        $_SESSION["m2"] = "active";
        $_SESSION["m3"] = "";
        $_SESSION["m4"] = "";
        $_SESSION["m5"] = "";
        $_SESSION["m6"] = "";
        $_SESSION["m7"] = "";
    } else if ($page == 3) {
        $_SESSION["style3"] = "display: block;";
        $_SESSION["m1"] = "";
        $_SESSION["m2"] = "";
        $_SESSION["m3"] = "active";
        $_SESSION["m4"] = "";
        $_SESSION["m5"] = "";
        $_SESSION["m6"] = "";
        $_SESSION["m7"] = "";
    } else if ($page == 4) {
        $_SESSION["m1"] = "";
        $_SESSION["m2"] = "";
        $_SESSION["m3"] = "";
        $_SESSION["m4"] = "active";
        $_SESSION["m5"] = "";
        $_SESSION["m6"] = "";
        $_SESSION["m7"] = "";
    } else if ($page == 5) {
        $_SESSION["m1"] = "";
        $_SESSION["m2"] = "";
        $_SESSION["m3"] = "";
        $_SESSION["m4"] = "";
        $_SESSION["m5"] = "active";
        $_SESSION["m6"] = "";
        $_SESSION["m7"] = "";
    } else if ($page == 6) {
        $_SESSION["m1"] = "";
        $_SESSION["m2"] = "";
        $_SESSION["m3"] = "";
        $_SESSION["m4"] = "";
        $_SESSION["m5"] = "";
        $_SESSION["m6"] = "active";
        $_SESSION["m7"] = "";
    } else if ($page == 7) {
        $_SESSION["m1"] = "";
        $_SESSION["m2"] = "";
        $_SESSION["m3"] = "";
        $_SESSION["m4"] = "";
        $_SESSION["m5"] = "";
        $_SESSION["m6"] = "";
        $_SESSION["m7"] = "active";
    }
    //clear sub menu
    $_SESSION["sm1"] = "";
    $_SESSION["sm2"] = "";
    $_SESSION["s1"] = "";
    $_SESSION["s2"] = "";
    $_SESSION["s3"] = "";
    $_SESSION["s4"] = "";
    $_SESSION["s5"] = "";
    $_SESSION["s6"] = "";
    $_SESSION["s7"] = "";
    $_SESSION["s8"] = "";
    $_SESSION["s9"] = "";
}

function ACTIVEPAGES_SUB($main, $sub) {
    if ($main == 2) {
        if ($sub == 0) {
            $_SESSION["sm1"] = "current-page";
        } else if ($sub == 1) {
            $_SESSION["s1"] = "current-page";
        } else if ($sub == 2) {
            $_SESSION["s2"] = "current-page";
        }
    } else if ($main == 3) {
        if ($sub == 0) {
            $_SESSION["sm2"] = "current-page";
        } else if ($sub == 1) {
            $_SESSION["s3"] = "current-page";
        } else if ($sub == 2) {
            $_SESSION["s4"] = "current-page";
        } else if ($sub == 3) {
            $_SESSION["s5"] = "current-page";
        } else if ($sub == 4) {
            $_SESSION["s6"] = "current-page";
        } else if ($sub == 5) {
            $_SESSION["s7"] = "current-page";
        } else if ($sub == 6) {
            $_SESSION["s8"] = "current-page";
        } else if ($sub == 7) {
            $_SESSION["s9"] = "current-page";
        }
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