<?php

class social {

    private $_FBappID = "1308539565850437";

    function __construct() {
        $this->initial_social();
    }

    public function initial_social() {
        $var = "<!-- initial facebook SDK -->";
        $var .= "<div id=\"fb-root\"></div> ";
        $var .= "<script>(function(d, s, id) { ";
        $var .= "  var js, fjs = d.getElementsByTagName(s)[0]; ";
        $var .= "  if (d.getElementById(id)) return; ";
        $var .= "  js = d.createElement(s); js.id = id; ";
        $var .= "  js.src = \"//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=$this->_FBappID\"; ";
        $var .= "  fjs.parentNode.insertBefore(js, fjs); ";
        $var .= " }(document, 'script', 'facebook-jssdk'));</script>";
        $var .= "<!-- initial facebook SDK --> </br>";

        $var .= "<!-- initial script google+ -->";
        $var .= "<script src = \"https://apis.google.com/js/platform.js\" async defer></script>";
        $var .= "<!-- initial script google+ --></br>";

        $var .= "<!-- initial script twitter -->";
        $var .= "<script src=\"http://platform.twitter.com/widgets.js\" type=\"text/javascript\"></script>";
        $var .= "<!-- initial script twitter --></br>";
        echo $var;
    }

    public function facebook_like_button($url, $_share) {
        $share = (!is_bool($_share) ? "true" : strtolower($_share));
        $var = "<!-- facebook like button -->";
        $var .= "<div class=\"fb-like\" ";
        $var .= "	data-href=\"" . $url . "\"  ";
        $var .= "	data-header=\"true\"  ";
        $var .= "	data-layout=\"button_count\"  ";
        $var .= "	data-action=\"like\"  ";
        $var .= "	data-size=\"small\"  ";
        $var .= "	data-show-faces=\"true\"  ";
        $var .= "	data-share=\"" . $share . "\"> ";
        $var .= "</div> ";
        $var .= "<!-- facebook like button --> ";
        echo $var;
    }

    public function googlePlus_Share_button($url) {
        $var = "<!-- script google+ -->";
        $var .="  <div class=\"g-plusone\" data-size=\"medium\" data-annotation=\"none\" data-href=\"" . $url . "\"></div>";
        $var .="<!-- script google+ --> ";
        echo $var;
    }

    public function twitter_Share_button($url, $msg) {
        $var = "<!-- script twitter -->";
        $var .="    <a class=\"twitter-share-button\" ";
        $var .="   data-size = \"small\" ";
        $var .="   data-text = \"" . $msg . "\" ";
        if ($url != NULL) {
            $var .="   data-url = \"" . $url . "\" ";
        }
//        $var .="   data-hashtags = \"biotecitalia-thailand\" ";
//        $var .="   data-via = \"$url\" ";
        $var .="   data-related = \"twitterapi,twitter\"> ";
        $var .="   Tweet ";
        $var .="   </a > ";
        $var .="<!-- script twitter --> ";
        echo $var;
    }

}
