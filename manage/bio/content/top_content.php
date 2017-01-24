<?php @session_start();
$actual_link = "$_SERVER[REQUEST_URI]";
?>



<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>


            </div>


            <ul class="nav navbar-nav navbar-right">



                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="images/img.jpg" alt=""><?=$_SESSION["full_name"]?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="javascript:;"> <?= $_SESSION["profile"] ?></a></li>
                     
                        <li><a href="javascript:;"><?= $_SESSION["help"] ?></a></li>
                        <li><a href="controller/logoutController.php"><i class="fa fa-sign-out pull-right"></i> <?= $_SESSION["logout"] ?></a></li>
                    </ul>
                </li>

                <!--                <li role="presentation" class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-envelope-o"></i>
                                        <span class="badge bg-green">6</span>
                                    </a>
                                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                        <li>
                                            <a>
                                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="text-center">
                                                <a>
                                                    <strong>See All Alerts</strong>
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>-->



                <li  role="presentation" class="dropdown">

                    <a href="controller/changelanguageController.php?lan=en&url=<?= $actual_link ?>"   class="user-profile dropdown-toggle" data-toggle="#" aria-expanded="true">

                        <img alt="" width="30" height="25" src="language/img/ENG.png" />
                    </a>
                </li>
                <li   role="presentation" class="dropdown">

                    <a href="controller/changelanguageController.php?lan=th&url=<?= $actual_link ?>"  class="user-profile dropdown-toggle" data-toggle="#" aria-expanded="true">

                        <img alt="" width="30" height="25" src="language/img/TH.png" />
                    </a>
                </li> 
               <li role="presentation" class="dropdown">
                    <a   class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        <b><font color="#1ABB9C"><span ><?= date("l d F Y") ?></span></font></b>
                    </a>

                </li>
            </ul>
        </nav>
    </div>
</div>
<?php
include_once './common/Utility.php';
$util = new Utility();
$util->setCSSPageLoading();
?>
<div class='se-pre-con' id="se-pre-con" > </div>
<script  type="text/javascript">

    function loading() {
        $('#se-pre-con').fadeIn();
    }
    function unloading() {
        $('#se-pre-con').delay(1000).fadeOut();
    }

</script>
