
<!doctype html>
<html lang="en">
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$title = "My Dashboard";
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
$user = auth_user();
?>
<body style="background-color:black;"  >

<div class="wrapper">
<?php include "./includes/sidebar.php"?>
    <div class="main-panel">
        <?php include "./includes/topbar.php"?>
   <div class="" style="padding: 20px;background-color:black;color:white;">
                <script type="text/javascript" src="//www.exchangeratewidget.com/converter.php?l=en&amp;f=USD&amp;t=USDEUR,USDGBP,USDJPY,USDCHF,USDCAD,USDAUD,EURGBP,EURJPY,EURAUD,EURRUB,GBPJPY,&amp;a=1&amp;d=DFDFDF&amp;n=FFFFFF&amp;o=000000&amp;v=11"></script>
                </div>
                <style>
                
                .card.mb-3 {
    margin-bottom: 30px !important;
}


.mb-3, .my-3 {
    margin-bottom: 1rem !important;
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.125);
    border-radius: 0.25rem;
}</style>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-stats-up"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Invested</p>
                                             $<?php echo $user['invested_amount'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-money"></i> Invested Tradings
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-money"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Balance</p>
                                            $<?php echo $user['balance'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-money"></i> Available Balance
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="ti-world"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Withdrawable</p>
                                           $ <?php echo $user['withdrawable'];  ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        Today Is<i class="ti-calendar"></i> <?php echo date("F j, Y, g:i a"); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <div class="icon-big icon-info text-center">
                                            <i class="ti-star"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-10">
                                        <div class="numbers">
                                            <p>Joined LondoTrade</p>
                                            <?php echo $user['created_at'] !== '' ? $user['created_at'] : "Beginner" ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-arrow-up"></i> $50K to upgrade
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-stats-up"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Current Trade Success</p>
                                             $<?php echo $user['current_profit'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-money"></i> Invested Tradings
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-money"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Balance</p>
                                            $<?php echo $user['current_profit'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-money"></i> Available Balance
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="ti-world"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Accessed</p>
                                            <?php echo $user['country_code'];  ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-calendar"></i> <?php echo date("F j, Y, g:i a"); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <div class="icon-big icon-info text-center">
                                            <i class="ti-star"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-10">
                                        <div class="numbers">
                                            <p>Trade Rank</p>
                                            <?php echo $user['trade_rank'] !== '' ? $user['trade_rank'] : "Beginner" ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-arrow-up"></i> $50K to upgrade
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                
                <div class="">
            <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
            <script type="text/javascript">
                new TradingView.widget({
                "width": '100%',
                "height": 610,
                "symbol": "NASDAQ:AAPL",
                "interval": "15",
                "timezone": "Etc/UTC",
                "theme": "dark",
                "style": "4",
                "locale": "en",
                "toolbar_bg": "rgba(0, 0, 0, 1)",
                "enable_publishing": false,
                "allow_symbol_change": true,
                "hideideas": true,
                "news": [
                            "headlines"
                        ]
                });
                
            </script>
            
            <style>
                
            </style>
        </div>
        <iframe src="https://www.widgets.investing.com/live-currency-cross-rates?theme=darkTheme&hideTitle=true&roundedCorners=true&pairs=1,3,2,4,7,5,8,6,9,49,11" width="100%" height="500px" frameborder="0" allowtransparency="true" marginwidth="0" marginheight="0"></iframe><div class="poweredBy" style="font-family: Arial, Helvetica, sans-serif;"> <a href="https://www.investing.com?utm_source=WMT&amp;utm_medium=referral&amp;utm_campaign=LIVE_CURRENCY_X_RATES&amp;utm_content=Footer%20Link" target="_blank" rel="nofollow"></a></div>
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

    <!-- <script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'ti-gift',
                message: "Welcome to <b>Paper Dashboard</b> - a beautiful Bootstrap freebie for your next project."

            },{
                type: 'success',
                timer: 4000
            });

        });
    </script> -->

</html>
