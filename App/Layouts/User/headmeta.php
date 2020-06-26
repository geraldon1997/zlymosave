<?php
include_once '../vendor/autoload.php';
use App\Controllers\User as UserController;

if (!isset($_SESSION['username'])) {
    header('location: ../index.html');
}

if (isset($_GET['logout'])) {
    $logout = new UserController($_GET['logout']);
    $logout->logoutController();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>ZlymoSave | Invest in The Future with Trust</title>
    <meta content="This is an online trading platform where you invest your cash" name="description">
    <meta content="Gerrad" name="author">
    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon" />
    <!-- CORE CSS FRAMEWORK - START -->
    <link href="../assests/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../assests/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assests/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="../assests/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="../assests/fonts/webfont/cryptocoins.css" rel="stylesheet" type="text/css" />
    <link href="../assests/css/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="../assests/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
    <!-- CORE CSS FRAMEWORK - END -->

    <!-- HEADER SCRIPTS INCLUDED ON THIS PAGE - START -->

    <link href="../assests/plugins/jvectormap/jquery-jvectormap-2.0.1.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../assests/plugins/morris-chart/css/morris.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../assests/plugins/calendar/fullcalendar.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="../assests/plugins/icheck/skins/minimal/minimal.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="../assests/plugins/swiper/swiper.css" rel="stylesheet" type="text/css">

    <!-- CORE CSS TEMPLATE - START -->
    <link href="../assests/css/style.css" rel="stylesheet" type="text/css" />
    <link href="../assests/css/responsive.css" rel="stylesheet" type="text/css" />

    <!-- CORE CSS TEMPLATE - END -->

</head>