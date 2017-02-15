
<html>
    <head>
        <title>Your Website Title</title>

    </head>
    <body>

        <?php
        
        
        echo "GET url : " . $_GET["url"];
        if ($_GET["url"] != NULL) {
            $link = $_GET["url"];
        } else {
            $link = "http://biotecitalia-thailand.com/";
        }
        include './manage/bio/common/social.php';
        $social = new social();
        echo $social->twitter_Share_button("test message share twitter biotecitalia-thailand.com");
        echo $social->googlePlus_Share_button($link);
        echo $social->facebook_like_button($link, FALSE);
        
        
        
        ?>



    </body>
</body>
</html>