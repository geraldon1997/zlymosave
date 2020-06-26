<?php
include_once 'vendor/autoload.php';
use App\Controllers\User as UserController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $r = new UserController($_POST);
    if (isset($_GET['ref_id'])) {
        $regsuccess = $r->registerController($_GET['ref_id']);
    } else {
        $regsuccess = $r->registerController(0);
    }

    

    if ($regsuccess === true) {
        echo "<div class='reginfo' id='regsuccess'>
            Registration was successful, a confirmation link has been sent to your email
            </div>
            <script>setTimeout(function(){
                document.querySelector('.reginfo').style.display = 'none';
                window.location.href = 'login.php';
            },5000);</script>";
    } elseif ($regsuccess === false) {
        echo "<div class='reginfo' id='regerror'>
            Registration was rejected, you may be trying to use duplicate information
            </div>
            <script>setTimeout(function(){
                document.querySelector('.reginfo').style.display = 'none';
            },5000);</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>ZlymoSave | Invest in The Future with Trus</title>
    <meta content="This is an online trading platform where you invest to make profit" name="description">
    <meta content="LondoTrade" name="author">
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
    .reginfo{
        color:whitesmoke; 
        margin:0 auto; 
        margin-top:5px; 
        padding:15px; 
        width:70%; 
        text-align:center; 
        font-size:1.5em; 
        font-weight:bold;
    }
    #regsuccess{
        background:green;
    }
    #regerror{
        background: crimson;
    }
    @media (max-width: 700px){
        .reginfo{
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
                        <div class="col-lg-6 col-sm-12 over-h hidden-sm no-padding-left  no-padding-right">
                            <img src="data/crypto-dash/login-img.png" style="width:105%" alt="">
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div id="login" class="login loginpage mt-0 no-pl no-pr pt30 pb30">    
                                <div class="login-form-header flex align-items-center">
                                     <img src="data/crypto-dash/signup.png" alt="login-icon" style="max-width:64px">
                                     <div class="login-header">
                                         <h4 class="bold">Signup Now!</h4>
                                     </div>
                                </div>
                               
                                <div class="box login">

                                    <div class="content-body" style="padding-top:25px">

                                        <form action="" method="post" id="msg_validate" novalidate="novalidate" class="no-mb no-mt">
                                            <div class="row">
                                                <div class="col-xs-12">

                                                    <div class="form-group">
                                                        <label class="form-label">Username</label>
                                                        <div class="controls">
                                                            <input type="text" class="form-control" name="username" placeholder="enter username" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Email</label>
                                                        <div class="controls">
                                                            <input type="text" class="form-control" name="email" placeholder="enter email" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Phone</label>
                                                        <div class="controls">
                                                            <input type="text" class="form-control" name="phone" placeholder="enter phone" required>
                                                        </div>
                                                    </div>                                                 
                                                    <div class="form-group">
                                                        <label class="form-label">Password</label>
                                                        <div class="controls">
                                                            <input type="password" class="form-control" name="password" placeholder="password" required>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <button class="btn btn-primary mt-10 btn-corner right-15">Sign up</button>
                                                        <a href="login.php" class="btn mt-10 btn-corner signup">Login</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

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