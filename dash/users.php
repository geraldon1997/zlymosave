<!doctype html>
<html lang="en">
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$title = "All Users";
include('./includes/header.php');
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

$id = auth_user()['id'];
$users = Db::all_users();
?>
<body>

<div class="wrapper">
    <?php include("./includes/sidebar.php") ?>

    <div class="main-panel">
        <?php include("./includes/topbar.php") ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title" style="font-weight:bold;color:#66615b">All Users</h4>
                                <hr/>
                                <!-- <p class="category">Here is a subtitle for this table</p> -->
                            </div>
                            <div class="content table-responsive ">
                                <table class="table table-striped">
                                    <thead style="text-align:center;">
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Full name</th>
                                        <th>Invested</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($users as $user) {
                                            ?>
                                        <tr style="text-align:center">
                                            <td><?php echo $user['username'] ?></td>
                                            <td><?php echo $user['email'] ?></td>
                                            <td><?php echo $user['first_name']." ".$user['last_name'] ?></td>
                                            <td><?php echo '$'.$user['invested_amount'] ?></td>
                                            <td>
                                                <a href="edit-user.php?user_id=<?php echo $user['id'] ?>">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                
                                                <!-- <i class="fa fa-trash"></i> -->
                                            </td>
                                        </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>

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
