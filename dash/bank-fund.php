<!doctype html>
<html lang="en">
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$title = "Bank Transfer Funding";
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

$fund_code = rand(1000, 9999);

$errors = [
    'amount' => '',
    'address' => '',
];
$submitted = false;
$success_msg = '';

if (isset($_POST) and !empty($_POST)) {
    $submitted = true;
    $amount = purify($_POST['amount']);
    $desc = purify($_POST['desc']);
    $funding_code = purify($_POST['funding_code']);
    if ($amount < 500) {
        $errors['amount'] = 'minimum account funding amount is 500 USD';
    }
   
    if (!has_errors($errors)) {
        Db::add_bank_funding(auth_user(), [
            'amount' => $amount,
            'desc' => $desc,
            'funding_code' => $funding_code
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
                                <h4 class="title" style="font-weight:bold;color:#66615b">Fund Account</h4>
                                <hr/>
                                <a href="bank-fund.php" class="btn btn-danger active">Bank Funding</a>&nbsp;&nbsp;
                                <a href="btc-fund.php" class="btn btn-info">Bitcoin Funding</a>
                                <br><br>
                                <p class="small">
                                    Please Note that Minimum Fund Amount is $100. Contact support@londotrade.online for a more detailed description. 
                                    Ensure to provide your Funding Code when contacting support. 
                                    If you encounter any issue while funding your account, please contact support@londotrade.online for assistance
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
                                                <label>Fund Amount:</label>
                                                <input type="number" name="amount" class="form-control border-input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Funding Code:</label>
                                                <input type="number" readonly name="funding_code" class="form-control border-input"
                                                    value="<?php echo $fund_code ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Description:</label>
                                                <textarea class="form-control border-input" name="desc" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <div class="col-md-10">
                                            <button type="submit" class="btn btn-info btn-fill btn-wd">Submit</button>
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
                            <img src="assets/img/billings/card_maestro.png" class="img img-responsive"/>
                           
                        </li>
                        <li>
                            <img src="assets/img/billings/card_skrill.png" class="img img-responsive"/>
                           
                        </li>
                        <li>
                            <img src="assets/img/billings/card_unionpay.png" class="img img-responsive"/>
                           
                        </li>
                        <li>
                            <img src="assets/img/billings/card_visa.png" class="img img-responsive"/>
                           
                        </li>
                        <li>
                            <img src="assets/img/billings/coin.png" class="img img-responsive"/>
                           
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
