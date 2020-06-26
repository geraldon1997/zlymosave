<!doctype html>
<html lang="en">
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$title = "Admin Edit User";
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
if (!auth_user()['is_admin']) {
    header("Location: /");
}


$user_id = $_GET['user_id'] ?? null;
if (!$user_id) {
    header("Location: users.php");
}
$user = Db::user_by_id($user_id);
if (!$user) {
    header("Location: users.php");
}
$old = $user;

$errors = [
    'username' => '',
    'password' => '',
    'amount' => '',
    'active' => ''
];
$submitted = false;
$success_msg = '';

if (isset($_POST) and !empty($_POST)) {
    $submitted = true;
    $username = purify($_POST['username']);
    $password = purify($_POST['password']);
    $amount = $_POST['amount'];
    $balance = $_POST['balance'];
    $active = $_POST['active'];
    $rank = $_POST['rank'];

    if (!is_valid_username($username)) {
        $errors['username'] = 'invalid username';
    }

    if (Db::username_exists($username) and $username !== $old['username']) {
        $errors['username'] = 'username not available';
    }
   
    if (!has_errors($errors)) {
        Db::admin_update_user($user, [
            'username' => $username,
            'password' => $password,
            'active' => $active,
            'amount' => $amount,
            'balance' => $balance,
            'rank' => $rank
        ]);
        $success_msg = "you have updated the user's profile successfully";
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
                                <h4 class="title">Edit User's Profile</h4>
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
                                                    placeholder="Username" value="<?php echo $user['username'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                    <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control border-input"
                                                    placeholder="Email" disabled value="<?php echo $user['email'] ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control border-input" disabled placeholder="Company"
                                                    value="<?php echo $user['first_name'] ?>">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="">
                                    <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control border-input" disabled placeholder="Last Name"
                                                    value="<?php echo $user['last_name'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                    <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="text" name="password" class="form-control border-input" placeholder="Enter new password"
                                                    >
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="">
                                    <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Invested Amount</label>
                                                <input type="number" name="amount" class="form-control border-input"
                                                    value="<?php echo $user['invested_amount'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                    <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Balance</label>
                                                <input type="number" name="balance" class="form-control border-input"
                                                    value="<?php echo $user['balance'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                    <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Activated</label>
                                                <select name="active" class="form-control border-input">
                                                    <option value="0" <?php echo !$user['is_active'] ? 'selected': '' ?>>No</option>
                                                    <option value="1" <?php echo $user['is_active'] ? 'selected': '' ?>>Yes</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="">
                                    <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Trade Rank</label>
                                                <input name="rank" class="form-control border-input"
                                                    value="<?php echo $user['trade_rank'] ?>">
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
