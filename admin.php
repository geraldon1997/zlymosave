<?php
include_once 'vendor/autoload.php';

use App\Controllers\Admin;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = new Admin($_POST);
    $u->adminLoginController();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>ZlymoSave | Invest in The Future with Trus</title>
    <meta content="This is an online trading platform where you invest your cash" name="description">
    <meta content="Gerrad" name="author">
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />
    <!-- CORE CSS FRAMEWORK - START -->
    <link href="assests/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assests/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assests/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="assests/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="assests/fonts/webfont/cryptocoins.css" rel="stylesheet" type="text/css" />
    <link href="assests/css/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="assests/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
    <!-- CORE CSS FRAMEWORK - END -->

    <!-- HEADER SCRIPTS INCLUDED ON THIS PAGE - START -->

    <link href="assests/plugins/jvectormap/jquery-jvectormap-2.0.1.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assests/plugins/morris-chart/css/morris.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assests/plugins/calendar/fullcalendar.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="assests/plugins/icheck/skins/minimal/minimal.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="assests/plugins/swiper/swiper.css" rel="stylesheet" type="text/css">

    <!-- CORE CSS TEMPLATE - START -->
    <link href="assests/css/style.css" rel="stylesheet" type="text/css" />
    <link href="assests/css/responsive.css" rel="stylesheet" type="text/css" />

    <!-- CORE CSS TEMPLATE - END -->

    <style>
    .loginfo{
        color:whitesmoke; 
        margin:0 auto; 
        margin-top:5px; 
        padding:15px; 
        width:70%; 
        text-align:center; 
        font-size:1.5em; 
        font-weight:bold;
    }
    #logerror{
        background: crimson;
    }
    @media (max-width: 700px){
        .loginfo{
            width:100%;
            font-size: 15px;
        }
    }
    </style>
</head>
<body class=" login_page login-bg">
    <div class="container">
        <div class="row">
            <div class=" mt-90 col-lg-8 col-lg-offset-2">
                <div class="row">
                    <div class="login-wrapper crypto">
                        <div class="col-lg-5 col-sm-12 hidden-sm no-padding-left  no-padding-right">
                            <img src="data/crypto-dash/login-img.png" alt="">
                        </div>
                        <div class="col-lg-7 col-sm-12">
                            <div id="login" class="login loginpage mt-0 no-pl no-pr pt30 pb30">    
                                <div class="login-form-header  flex align-items-center">
                                     <img src="data/crypto-dash/padlock.png" alt="login-icon" style="max-width:64px">
                                     <div class="login-header">
                                         <h4 class="bold">Login Now!</h4>                                         
                                     </div>
                                </div>
                               
                                <div class="box login">

                                    <div class="content-body" style="padding-top:30px">

                                        <form action="" method="post" id="msg_validate" action="#" novalidate="novalidate" class="no-mb no-mt">
                                            <div class="row">
                                                <div class="col-xs-12">

                                                    <div class="form-group">
                                                        <label class="form-label">Username</label>
                                                        <div class="controls">
                                                            <input type="text" class="form-control" name="username" placeholder="username">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="form-label">Password</label>
                                                        <div class="controls">
                                                            <input type="password" class="form-control" name="password" placeholder="password">
                                                        </div>
                                                    </div>

                                                    <div class="text-center">
                                                        <button class="btn btn-primary mt-10 btn-corner right-15">Log in</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- <p id="nav" class="over-h">
                                    <a class="pull-left blue-text" href="#" title="Password Lost and Found">Forgot password?</a>
                                    <a class="pull-right blue-text" href="register.php" title="Sign Up">Sign Up</a>
                                </p> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- CORE JS FRAMEWORK - START -->
    <script src="assests/plugins/swiper/jquery.min.js"></script>
    <script src="assests/js/jquery.easing.min.js"></script>
    <script src="assests/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assests/plugins/pace/pace.min.js"></script>
    <script src="assests/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="assests/js/jquery-1.11.2.min.js"><\/script>');
    </script>
    <!-- CORE JS FRAMEWORK - END -->

    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
    <script src="assests/plugins/sparkline-chart/jquery.sparkline.min.js"></script>
    <script src="assests/js/chart-flot.js"></script>
    <script src="assests/js/dashboard-crypto.js"></script>

    
    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->

    <!-- CORE TEMPLATE JS - START -->
    <script src="assests/js/scripts.js"></script>
    <!-- END CORE TEMPLATE JS - END -->
</body>
</html>