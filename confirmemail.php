<?php
include_once 'vendor/autoload.php';
use App\Controllers\User;

if (isset($_GET['username'])) {
    $uc = new User($_GET);
    $uc->confirmUserEmailController();
    echo "<div class='loginfo' id='logsuccess'>
            your email has been verified successfully
        </div>
        <script>
            setTimeout(function(){
                document.querySelector('.loginfo').style.display = 'none';
                window.location.href = 'login.php';
            },5000);
        </script>";
} else {
    header('location: index.php');
}

?>

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
    #logsuccess{
        background: green;
    }
    @media (max-width: 700px){
        .loginfo{
            width:100%;
            font-size: 15px;
        }
    }
    </style>