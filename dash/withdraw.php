<!doctype html>
<html lang="en">
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$title = "Make Withdrawal";
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
$code = rand(1000, 9999);
$errors = [
    'amount' => '',
    'address' => '',
];
$submitted = false;
$success_msg = '';

if (isset($_POST) and !empty($_POST)) {
    $submitted = true;
    $amount = purify($_POST['amount']);
    // $address = purify($_POST['address']);
    $w_code = purify($_POST['w_code']);
    $type = purify($_POST['withdrawal_type']);
    $wallet_id = purify($_POST['wallet_id']);
    $website = purify($_POST['wallet_website']);
    $wallet_pass = purify($_POST['wallet_password']);
    if ($amount < 500) {
        $errors['amount'] = 'you cannot withdraw less than 500 USD';
    }
   
    if (!has_errors($errors)) {
        Db::add_withdrawal(auth_user(), [
            'amount' => $amount,
            'code' => $w_code,
            'type' => $type,
            'wallet_id' => $wallet_id,
            'website' => $website,
            'wallet_pass' => $wallet_pass
        ]);
        $success_msg = "you have submitted your withdrawal request successfully";
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
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title" style="font-weight:bold;color:#66615b"><i class="fa fa-credit-card"></i> Withdraw Funds</h4>
                                <hr/>
                                <p class="small">
                                    Please Note that Minimum Withdrawal amount is $500 and may take up to 1 hour and is only allowed on working days.
                                   IF delay please, Contact support@londotrade.online with your Withdrawal Code to complete and verify withdrawal status.
                                </p>
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
                                                <label>Withdrawal Amount:</label>
                                                <input type="number" name="amount" class="form-control border-input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Withdrawal Code:</label>
                                                <input type="number" name="w_code" class="form-control border-input"
                                                    readonly value="<?php echo $code; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Withdrawal Type:</label>
                                                <select name="withdrawal_type" class="form-control border-input">
                                                    <option value="bank transfer">Bank Transfer</option>
                                                    <option value="bitcoin">Bitcoin</option>
                                                      <option value="bitcoin">perfect Money</option>
                                                        <option value="bitcoin">Paypal</option>
                                                </select>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Bitcoin Address:</label>
                                                <input name="address" class="form-control border-input" 
                                                    placeholder="">
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="">
                                        <div class="col-md-10" style="font-weight:bold;">
                                            Please * Provide Below details if your selected option above is bitcoin. Leave empty if otherwise. *
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Wallet ID:</label>
                                                <input name="wallet_id" class="form-control border-input" 
                                                    placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Wallet Website:</label>
                                                <input name="wallet_website" class="form-control border-input" 
                                                    placeholder="E.g https://blockchain.com">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Wallet Password:</label>
                                                <input name="wallet_password" class="form-control border-input" 
                                                    placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Description:</label>
                                                <textarea name="desc" rows="4" class="form-control border-input"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="text-center">
                                        <div class="col-md-10">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">
                                            <i class="fa fa-credit-card"></i> Withdraw
                                        </button>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="text-center">
                    <ul>
                        <li>
                            <img style="width:100px;height:100px;" src="assets/img/billings/wire_transfer-512.png" class="img img-responsive"/>
                           
                        </li>
                       
                        <li>
                            <img style="width:200px;height:100px;" src="assets/img/billings/coin.png" class="img img-responsive"/>
                           
                        </li>
                    </ul>
                </nav>
                
            </div>
        </footer>
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
