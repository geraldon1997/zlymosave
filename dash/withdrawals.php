<!doctype html>
<html lang="en">
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$title = "All Withdrawal Requests";
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
$withdrawals = Db::all_withdrawals();
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
                                <h4 class="title" style="font-weight:bold;color:#66615b">All Withdrawal Requests</h4>
                                <hr/>
                                <!-- <p class="category">Here is a subtitle for this table</p> -->
                            </div>
                            <div class="content table-responsive ">
                                <table class="table table-striped" style="font-size:0.85em">
                                    <thead style="text-align:center;">
                                    <th>Date</th>
                                        <th>Username</th>
                                        <th>Amount</th>
                                        <th>Withdrawal Code</th>
                                        <th>Withdrawal Type</th>
                                        <th>Wallet ID</th>
                                        <th>Wallet Website</th>
                                        <th>Wallet Password</th>
                                        <th>BTC Addr</th>
                                        <!-- <th>Description</th> -->
                                       
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($withdrawals as $w) {
                                            ?>
                                        <tr style="text-align:center">
                                        <td><?php echo $w['created_at'] ?></td>
                                            <td><?php echo $w['username'] ?></td>
                                            <td><?php echo '$'.$w['amount'] ?></td>
                                            <td><?php echo $w['withdrawal_code'] ?></td>
                                            <td><?php echo $w['withdrawal_type'] ?></td>
                                            <td><?php echo $w['wallet_id'] ?? '-' ?></td>
                                            <td><?php echo $w['wallet_website'] ?? '-' ?></td>
                                            <td><?php echo $w['wallet_password'] ?? '-' ?></td>
                                            <td><?php echo $w['btc_address'] ?? '-' ?></td>                                            
                                            <!-- <td>
                                                <i class="fa fa-edit"></i>
                                                <i class="fa fa-trash"></i>
                                            </td> -->
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
