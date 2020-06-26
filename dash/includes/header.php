<head>
    <?php

    if (!isset($_SESSION['user_id'])) {
        header("Location: /login.php");
    }
    
    ?>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title><?php echo $title ?> | Londotrade</title>



    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">
    <link href="assets/css/fontawesome/styles.min.css" rel="stylesheet">

    <style>
    .sidebar .nav p {
        text-transform: capitalize !important;
        font-size: 1em;
    }
    form label {
        font-weight: bold !important;
        font-size: 0.9em !important;
        color: #333 !important;
    }
    thead th {
        font-weight: bold !important;
        text-align: center !important;
        font-size: 1em !important;
    }
    </style>
    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    include("$root/includes/tawkto.php")
    ?>

</head>