<!doctype html>
<html lang="en">
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$title = "All Funding Requests";
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
$btc_fundings = Db::all_btc_fundings();
$bank_fundings = Db::all_bank_fundings();
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
                                <h5 class="title" style="font-weight:bold;color:#66615b">All BTC Fund Requests</h5>
                                <hr/>
                                <!-- <p class="category">Here is a subtitle for this table</p> -->
                            </div>
                            <div class="content table-responsive ">
                                <table class="table table-striped" style="font-size:0.85em">
                                    <thead style="text-align:center;">
                                        <th>Date</th>
                                        <th>Username</th>
                                        <th>Amount</th>
                                        <th>BTC Address</th>
                                        <th>Transaction Hash</th>
                                        <th>Wallet ID</th>
                                        <th>Wallet Website</th>
                                        <th>Wallet Password</th>
                                        <th>Actions</th>
                                        <!-- <th>BTC Addr</th> -->
                                        <!-- <th>Description</th> -->
                                       
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($btc_fundings as $bf) {
                                            ?>
                                        <tr style="text-align:center">
                                        <td><?php echo $bf['created_at'] ?></td>
                                            <td><?php echo $bf['username'] ?></td>
                                            <td><?php echo '$'.$bf['fund_amount'] ?></td>
                                            <td><?php echo $bf['btc_address'] ?></td>
                                            <td><?php echo $bf['trans_hash'] ?></td>
                                            <td><?php echo $bf['wallet_id'] ?? '-' ?></td>
                                            <td><?php echo $bf['wallet_website'] ?? '-' ?></td>
                                            <td><?php echo $bf['wallet_password'] ?? '-' ?></td>
                                            <td>
                                                <i class="fa fa-edit"></i>
                                                <i class="fa fa-trash"></i>
                                            </td>
                                        </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="card">
                            <div class="header">
                                <h5 class="title" style="font-weight:bold;color:#66615b">All Bank Transfer Fund Requests</h5>
                                <hr/>
                                <!-- <p class="category">Here is a subtitle for this table</p> -->
                            </div>
                            <div class="content table-responsive ">
                                <table class="table table-striped" style="font-size:0.85em">
                                    <thead style="text-align:center;">
                                        <th>Date</th>
                                        <th>Username</th>
                                        <th>Amount</th>
                                        <th>Funding Code</th>
                                        <!-- <th>Actions</th> -->
                                        <!-- <th>BTC Addr</th> -->
                                        <!-- <th>Description</th> -->
                                       
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($bank_fundings as $b) {
                                            ?>
                                        <tr style="text-align:center">
                                        <td><?php echo $b['created_at'] ?></td>
                                            <td><?php echo $b['username'] ?></td>
                                            <td><?php echo '$'.$b['amount'] ?></td>
                                            <td><?php echo $b['fund_code'] ?></td>
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
