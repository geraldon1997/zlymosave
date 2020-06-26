<!doctype html>
<html lang="en">
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$title = "My Profile";
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
$old = auth_user();
$user = auth_user();

$errors = [
    'username' => '',
    'password' => '',
];
$submitted = false;
$success_msg = '';

if (isset($_POST) and !empty($_POST)) {
    $submitted = true;
    $username = purify($_POST['username']);
    $password = purify($_POST['password']);
    if (!is_valid_username($username)) {
        $errors['username'] = 'invalid username';
    }

    if (Db::username_exists($username) and $username !== $old['username']) {
        $errors['username'] = 'username not available';
    }
   
    if (!has_errors($errors)) {
        Db::update_user(auth_user(), $username, $password);
        $success_msg = "you have updated your profile successfully";
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
                    <div class="col-lg-5 col-md-5">
                        <div class="card card-user">
                            <div class="content">
                                <br><br><br>
                                <div class="author">
                                    <!-- <i class="ti-user" style="color:black"></i> -->
                                  <img class="avatar border-white" src="assets/img/faces/user-icon.png" alt="..."/>
                                  <h4 class="title"><?php echo $user['first_name'] . " " . $user['last_name'] ?><br />
                                     <a href="#"><small>@<?php echo $user['username'] ?></small></a>
                                  </h4>
                                </div>
                                <p>
                                <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Email</td>
                                            <td style="text-align:right;">
                                                <label style="color:white;background-color:steelblue" class="badge alert-success text-info">
                                                    <?php echo $user['email'] ?>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Country</td>
                                            <td style="text-align:right;">
                                                <label class="badge" style="color:white;background-color:green">
                                                    <?php echo $user['country_code']; ?>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td style="text-align:right">
                                                <label class="badge" style="color:white;background-color:tomato">
                                                    <?php echo $user['phone'] ?>
                                                </label>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Trading Currency</td>
                                            <td style="text-align:right">
                                                <label class="badge" style="color:white;background-color:orange">$</label>
                                            </td>
                                        </tr>
                                        <!-- <tr>
                                            <td>Trading Status</td>
                                            <td style="text-align:right">
                                                <label class="badge" style="color:white;background-color:green">active</label>
                                            </td>

                                        </tr> -->
                                        <tr>
                                            <td>Account Balance</td>
                                            <td style="text-align:right">
                                                <label class="badge" style="color:white;background-color:steelblue">
                                                <?php echo '$'.$user['balance'] ?>
                                                </label>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Account Status</td>
                                            <td style="text-align:right">
                                                <?php
                                                if ($user['is_active']) {
                                                    ?>
                                                <label class="badge" style="color:white;background-color:green">verified</label>
                                                <?php } else { ?>
                                                    <label class="badge" style="color:white;background-color:tomato">not verified</label>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                                </p>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <?php
                                if (has_errors($errors)) {
                                    echo "<div class='alert alert-danger'><b>You have the following errors:</b><ul style='list-style-type:none;'>";
                                    foreach ($errors as $err) {
                                        echo "<li><b>$err</b></li>";
                                    }
                                    echo "</ul></div>";
                                }
                                if (!has_errors($errors) and $success_msg) {
                                    echo "<div class='alert alert-success'>$success_msg</div>";
                                }
                                ?>
                                <form method="post" action="">
                                    <div class="">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" class="form-control border-input"
                                                    placeholder="Username" value="<?php echo auth_user()['username'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                    <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control border-input"
                                                    placeholder="Email" disabled value="<?php echo auth_user()['email'] ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control border-input" disabled placeholder="Company"
                                                    value="<?php echo auth_user()['first_name'] ?>">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="">
                                    <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control border-input" disabled placeholder="Last Name"
                                                    value="<?php echo auth_user()['last_name'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                    <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control border-input" placeholder=""
                                                    value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
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
