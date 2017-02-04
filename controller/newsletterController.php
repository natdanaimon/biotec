<?php

@session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_func = $_POST["func"];
} else {
    $_func = $_GET["func"];
}



$controller = new newsletterController();
switch ($_func) {
    case "sendNewsletter":
        echo $controller->sendletter($_POST["name"], $_POST["email"], $_POST["email_confirm"], $_POST["category"], $_POST["city"], $_POST["town"], $_POST["country"], $_POST["tel"], $_POST["website"]);
        break;
}

class newsletterController {

    public function __construct() {
        
    }

    public function sendletter($name, $email, $email_confirm, $category, $city, $town, $country, $tel, $website) {

        $resultValidate = $this->validateForm($name, $email, $email_confirm, $category, $city, $town, $country, $tel, $website);
        if ($resultValidate != "" || $resultValidate != NULL) {
            echo $resultValidate;
        } else {

            include_once '../service/newsletterService.php';
            $service = new newsletterService();

            if (!$service->check_dupplicate($email)) {
                $result = $service->sendletter($name, $email, $category, $city, $town, $country, $tel, $website);
                if ($result) {
                    echo $_SESSION["news_0000"];
                } else {
                    echo $_SESSION["news_3101"];
                }
            } else {
                echo $_SESSION["news_3106"];
            }
        }
    }

    private function validateForm($name, $email, $email_confirm, $category, $city, $town, $country, $tel, $website) {
        $strReturn3102 = $_SESSION["newsletter_3102"];
        $strReturn3104 = $_SESSION["newsletter_3104"];
        $reqSingleQoute = "/'/";

        if (trim($name) == "") {
            return $strReturn3102 = eregi_replace("field", $_SESSION["lb_newsletter_name"], $strReturn3102);
        }
        if (preg_match($reqSingleQoute, $name)) {
            return $strReturn3104 = eregi_replace("field", $_SESSION["lb_newsletter_name"], $strReturn3104);
        }




        if (trim($email) == "") {
            return $strReturn3102 = eregi_replace("field", $_SESSION["lb_newsletter_email"], $strReturn3102);
        }
        if (!filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
            return $_SESSION["newsletter_3103"];
        }

        if ($email != $email_confirm) {
            return $_SESSION["newsletter_3105"];
        }


        if (preg_match($reqSingleQoute, $city)) {
            return $strReturn3104 = eregi_replace("field", $_SESSION["lb_newsletter_city"], $strReturn3104);
        }



        if (preg_match($reqSingleQoute, $town)) {
            return $strReturn3104 = eregi_replace("field", $_SESSION["lb_newsletter_town"], $strReturn3104);
        }



        if (trim($country) == "") {
            return $strReturn3102 = eregi_replace("field", $_SESSION["lb_newsletter_country"], $strReturn3102);
        }
        if (preg_match($reqSingleQoute, $country)) {
            return $strReturn3104 = eregi_replace("field", $_SESSION["lb_newsletter_country"], $strReturn3104);
        }




        if (preg_match($reqSingleQoute, $tel)) {
            return $strReturn3104 = eregi_replace("field", $_SESSION["lb_newsletter_tel"], $strReturn3104);
        }





        if (preg_match($reqSingleQoute, $website)) {
            return $strReturn3104 = eregi_replace("field", $_SESSION["lb_newsletter_website"], $strReturn3104);
        }
    }

}
