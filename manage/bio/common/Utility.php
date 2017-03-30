<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utility
 *
 * @author nag
 */
class Utility {

    protected $_pathXML = "language.xml";
    protected $_parameter = "";
    protected $_imageLoading = "images/5.gif";
    protected $_locationRedirectPremissionUser = "index.php";
    protected $_locationRedirectPremissionAdmin = "index.php";
    protected $_limitPaging = 16;
    protected $_limitPaging_dv = 9;

    function getPathXML() {
        return $this->_pathXML;
    }

    function getLimitPaging() {
        return $this->_limitPaging;
    }
    function getLimitPaging_dv() {
        return $this->_limitPaging_dv;
    }
    function setLimitPaging($limitPaging) {
        $this->_limitPaging = $limitPaging;
    }
    
    function setPathXML($pathXML) {
        $this->_pathXML = $pathXML;
    }

    function getParameterAjax() {
        return $this->__parameter;
    }

    function ClearParameterAjax() {
        $this->__parameter = "";
    }

    function getImageLoading() {
        return $this->_imageLoading;
    }

    function setImageLoading($imageLoading) {
        $this->_imageLoading = $imageLoading;
    }

    function getlocationRedirectPremissionUser() {
        return $this->_locationRedirectPremissionUser;
    }

    function setlocationRedirectPremissionUser($locationRedirectPremission) {
        $this->_locationRedirectPremissionUser = $locationRedirectPremission;
    }

    function getlocationRedirectPremissionAdmin() {
        return $this->_locationRedirectPremissionAdmin;
    }

    function setlocationRedirectPremissionAdmin($locationRedirectPremission) {
        $this->_locationRedirectPremissionAdmin = $locationRedirectPremission;
    }

    function setParameterAjax($variable, $value, $endParameter) {
        $tmp = $variable . "=" . $value;
        $space = "&";
        if ($endParameter) {
            $space = "";
        }

        $this->__parameter = $this->__parameter . $tmp . $space;
    }

    function LanguageConfig($type) {

        $xml = simplexml_load_file($this->_pathXML) or die("Error: Cannot create object");
        foreach ($xml->children() as $languages) {
            if ($type == "th") {
                $_SESSION["$languages->variable"] = (string) $languages->th;
            } else if ($type == "en") {
                $_SESSION["$languages->variable"] = (string) $languages->en;
            }
        }
    }

    function AddModal_Action($modalName, $Action) {
        echo "<script type='text/javascript'>";
        echo "$('#$modalName').modal('$Action');";
        echo "</script>";
    }

    function AddAjaxGetResultResponseText($FunctionName, $element, $path, $modalName) {
        $newline = "\n";
        echo $script = '' . $newline;
        echo $script = '<script type="text/javascript">  ' . $newline;
        echo $script = ' function ' . $FunctionName . '(param,seq) { ' . $newline;
        echo $script = '                   $(\'#' . $modalName . '\').modal(\'show\'); ' . $newline; // parameter $modalName for project biotec
        echo $script = '                var xmlhttp = new XMLHttpRequest();  ' . $newline;
        echo $script = '                xmlhttp.onreadystatechange = function () { ' . $newline;
        echo $script = '                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { ' . $newline;
        echo $script = '                        var result = xmlhttp.responseText.split(","); ' . $newline;
        $cnt = 0;
        foreach ($element as $ele) {
            echo $script = '                        document.getElementById("' . $ele[0] . '").' . $ele[1] . ' = result[' . $cnt++ . ']; ' . $newline;
        }
        /**
         * 
         * @var ****** Start  Sctrip For Reload After read Contact
         * 
         */
        echo $script = '                  update_icon_text(seq);  ' . $newline;
        echo $script = '                   unloading();  ' . $newline;
        /**
         * 
         * @var ****** End  Sctrip For Reload After read Contact
         * 
         */
        echo $script = '                    } ' . $newline;
        echo $script = '                } ' . $newline;
        echo $script = '              ' . $newline;
        echo $script = '                xmlhttp.open("GET", "' . $path . '?" + param, true); ' . $newline;
        echo $script = '                xmlhttp.send(); ' . $newline;
        echo $script = '        } ' . $newline;
        echo $script = "  </script> " . $newline;
        ############################################ AJAX STEP BY STEP ##########################################
//        $util = new Utility();
//
//        //Set -> ElementID , Properties 
//        $element = array(
//            array("par", "innerHTML"),
//            array("txt1", "innerHTML"),
//            array("txtfield", "value")
//        ); 
//        //Set -> FunctionName , Element , PhpAjaxFile , modalName
//                $util->AddAjaxGetResultResponseText("ABC", $element, "ajax.php" ,"modalName")
//                $util->ClearParameterAjax(); 
//                $util->setParameterAjax("param", $i, TRUE);
//        <input type="button" value="OK" onclick="ABC('<?= $util->getParameterAjax() >');"/>
        ########################################## AJAX STEP BY STEP ##########################################
    }

    function setScriptPageLoading($loadJS_Client, $sec) {
        $sec = $sec * 1000;
        if ($loadJS_Client) {
            echo "<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js'></script>\n";
            echo "<script src='http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js'></script>\n";
        } else {
            echo "<script src='js/jquery1.5.2.js'></script>\n";
            echo "<script src='js/modern.js'></script>\n";
        }
        echo "<script> $(window).load(function () { $('.se-pre-con').delay(" . $sec . ").fadeOut('slow');   }); </script>\n";
    }

    function setCSSPageLoading() {
        $CSS = "";
        $CSS .= "<style> ";
        $CSS .= " ";
        $CSS .= "            .no-js #loader { display: none;  } ";
        $CSS .= "            .js #loader { display: block; position: absolute; left: 100px; top: 0; } ";
        $CSS .= "            .se-pre-con { ";
        $CSS .= "                width:100%; ";
        $CSS .= "                height:100%; ";
        $CSS .= "                position:fixed; ";
        $CSS .= "                top:0; ";
        $CSS .= "                left:0; ";
        $CSS .= "                z-index:999; ";
        $CSS .= "                background: rgba(255,255,255,.5) url(" . $this->_imageLoading . ")    no-repeat; ";
        $CSS .= "                background-size: 90px 90px; ";
        $CSS .= "                background-position: center center; ";
        $CSS .= "            } ";
        $CSS .= "        </style> ";

        echo $CSS;
    }

    function getPageLoading($loadJS_Client, $sec) {
        $this->setCSSPageLoading();
        $this->setScriptPageLoading($loadJS_Client, $sec);
        echo " <div class='se-pre-con' > </div>";
    }

    function CheckPermissionAdmin($Admin) {
        if ($Admin == null || $Admin == "") {
            header("location:" . $this->_locationRedirectPremissionAdmin);
        }
    }

    function CheckPermissionUser($User) {

        if ($User == null || $User == "") {
            header("location:" . $this->_locationRedirectPremissionUser);
        }
    }

    function isEmptyReg($value) {
        if ($value == null || $value == "") {
            return TRUE;
        } else {
            if (preg_match("/[^A-Za-z0-9]/", $value)) {
                return TRUE;
            }
        }
    }

    function countObject($_data) {
        $no = 0;
        foreach ($_data as $key => $value) {
            $no++;
        }
        return $no;
    }

    function ContinueObject($page, $seq) {
        $max = $page * $this->_limitPaging;
        $min = $max - $this->_limitPaging;
        if (($seq > $min) && ($seq <= $max)) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function CopyTemplatedMail($filemain, $filecopy, $msg) {
        $templatedMail = fopen($filemain, "r") or die("Unable to open file!");
        $txt = fread($templatedMail, filesize($filemain));
        fclose($templatedMail);
        $txt = eregi_replace("&detail;", $msg, $txt);
        $txt = eregi_replace("http://localhost/biotec/manage/bio/templatedEmail/", "../templatedEmail/", $txt);
        $txt = eregi_replace("http://biotecitalia-thailand.com/manage/bio/templatedEmail/", "../templatedEmail/", $txt);
        $txt = eregi_replace("http://www.biotecitalia-thailand.com/manage/bio/templatedEmail/", "../templatedEmail/", $txt);
        $temp = fopen($filecopy, "w") or die("Unable to open file!");
        fwrite($temp, $txt);
        fclose($temp);
    }

}
