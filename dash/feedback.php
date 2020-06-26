<!doctype html>
<html lang="en">
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$title = "Send Feedback";
include "./includes/header.php";
$root = $_SERVER['DOCUMENT_ROOT'];
require "$root/funcs/database.php";
require "$root/funcs/functions.php";

function auth_user()
{
    $user_id = $_SESSION['user_id'];
    $user = Db::user_by_id($user_id);
    return $user;
}

$submitted = false;
$success_msg = '';

if (isset($_POST) and !empty($_POST)) {
    $submitted = true;
    $feedback = $_POST['feedback'];
    if ($feedback) {
        Db::add_feedback(auth_user(), $feedback);
        $success_msg = "you have submitted your feedback successfully";
    }
}
?>
<body>

<div class="wrapper">
    <?php include "./includes/sidebar.php"?>
    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">User Profile</a>
                </div>
               <?php include "./includes/topbar.php";?>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Send us your feedback</h4>
                                <small>Feedbacks help us serve you better</small>
                            </div>
                            <div class="content">
                                <?php
                                if ($success_msg) {
                                    echo "<div class='alert alert-success'>$success_msg</div>";
                                }
                                ?>
                                <form method="post" action="">
                                    <div class="">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Username:</label>
                                                <input type="text" name="username" class="form-control border-input"
                                                    placeholder="Username" disabled value="<?php echo auth_user()['username'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                    <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address:</label>
                                                <input type="email" class="form-control border-input"
                                                    placeholder="Email" disabled value="<?php echo auth_user()['email'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="">
                                    <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Feedback:</label>
                                                <textarea name="feedback" class="form-control border-input" 
                                                    placeholder="" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Submit</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="assets/js/bootstrap-checkbox-radio.js"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="assets/js/paper-dashboard.js"></script>

    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>

</html>
