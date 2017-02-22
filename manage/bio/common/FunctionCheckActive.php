<?php

function ACTIVEPAGES($page) {
    $_SESSION["style2"] = "display: none;";
    $_SESSION["style3"] = "display: none;";
    $_SESSION["style4"] = "display: none;";
    $_SESSION["style5"] = "display: none;";
    $_SESSION["m1"] = "";
    $_SESSION["m2"] = "";
    $_SESSION["m3"] = "";
    $_SESSION["m4"] = "";
    $_SESSION["m5"] = "";
    $_SESSION["m6"] = "";
    $_SESSION["m7"] = "";
    $_SESSION["m8"] = "";
    $_SESSION["m9"] = "";
    //clear sub menu
    $_SESSION["sm1"] = "";
    $_SESSION["sm2"] = "";
    $_SESSION["sm3"] = "";
    $_SESSION["sm4"] = "";
    $_SESSION["s1"] = "";
    $_SESSION["s2"] = "";
    $_SESSION["s3"] = "";
    $_SESSION["s4"] = "";
    $_SESSION["s5"] = "";
    $_SESSION["s6"] = "";
    $_SESSION["s7"] = "";
    $_SESSION["s8"] = "";
    $_SESSION["s9"] = "";
    $_SESSION["s10"] = "";
    $_SESSION["s11"] = "";
    $_SESSION["s12"] = "";
    $_SESSION["s13"] = "";

    if ($page == 1) {
        $_SESSION["m1"] = "active";
    } else if ($page == 2) {
        $_SESSION["style2"] = "display: block;";
        $_SESSION["m2"] = "active";
    } else if ($page == 3) {
        $_SESSION["style3"] = "display: block;";
        $_SESSION["m3"] = "active";
    } else if ($page == 4) {
        $_SESSION["style4"] = "display: block;";
        $_SESSION["m4"] = "active";
    } else if ($page == 5) {
        $_SESSION["m5"] = "active";
    } else if ($page == 6) {
        $_SESSION["m6"] = "active";
    } else if ($page == 7) {
        $_SESSION["m7"] = "active";
    } else if ($page == 8) {
        $_SESSION["m8"] = "active";
    } else if ($page == 9) {
        $_SESSION["style5"] = "display: block;";
        $_SESSION["m9"] = "active";
    }
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
    } else if ($main == 4) {
        if ($sub == 1) {
            $_SESSION["sm3"] = "current-page";
        } else if ($sub == 2) {
            $_SESSION["s11"] = "current-page";
        } else if ($sub == 3) {
            $_SESSION["s12"] = "current-page";
        } else if ($sub == 4) {
            $_SESSION["s13"] = "current-page";
        }
    } else if ($main == 9) {
        if ($sub == 1) {
            $_SESSION["sm4"] = "current-page";
        } else if ($sub == 2) {
            $_SESSION["s10"] = "current-page";
        }
    }
}

function ACTIVEPAGE_SHOW($page) {
    $_SESSION["ACTIVE_HOME"] = "";
    $_SESSION["ACTIVE_ABOUT"] = "";
    $_SESSION["ACTIVE_DEVICES"] = "";
    $_SESSION["ACTIVE_COSM"] = "";
    $_SESSION["ACTIVE_NEWS"] = "";
    $_SESSION["ACTIVE_PRESS"] = "";
    $_SESSION["ACTIVE_CONTACTS"] = "";
    $_SESSION["ACTIVE_CUSTOMER"] = "";
    if ($page == 1) {
        $_SESSION["ACTIVE_HOME"] = "uk-active";
    } else if ($page == 2) {
        $_SESSION["ACTIVE_ABOUT"] = "uk-active";
    } else if ($page == 3) {
        $_SESSION["ACTIVE_DEVICES"] = "uk-active";
    } else if ($page == 4) {
        $_SESSION["ACTIVE_COSM"] = "uk-active";
    } else if ($page == 5) {
        $_SESSION["ACTIVE_NEWS"] = "uk-active";
    } else if ($page == 6) {
        $_SESSION["ACTIVE_PRESS"] = "uk-active";
    } else if ($page == 7) {
        $_SESSION["ACTIVE_CONTACTS"] = "uk-active";
    } else if ($page == 8) {
        $_SESSION["ACTIVE_CUSTOMER"] = "uk-active";
    }
}

?>