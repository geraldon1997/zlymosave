<?php
include_once '../vendor/autoload.php';
use App\Layouts\User\UserLayout;
use App\Controllers\Investment;
use App\Models\User;

UserLayout::startcontent();

$u = new User;
$result = $u->getUserDetails();

if (isset($_GET['method'])) {
    $i = new Investment($result);
    $i->requesPaymentDetails($_GET['method'], $_GET['amount']);
}

?>
<div id="main-content">
<section class="wrapper main-wrapper row" style="">
<div class="col-xs-12">
                    <div class="page-title">

                        <div class="pull-left">
                            <!-- PAGE HEADING TAG - START -->
                            <h1 class="title">Make Investment</h1>
                            <!-- PAGE HEADING TAG - END -->
                        </div>

                        <div class="pull-right hidden-xs">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="#"><i class="fa fa-home"></i>Home</a>
                                </li>
                                <li class="active">
                                    <strong>Payment Method</strong>
                                </li>
                            </ol>
                        </div>

                    </div>
                </div>  
            <div class="clearfix"></div>
            <!-- MAIN CONTENT AREA STARTS -->
                            
            <div class="col-md-1"></div>
            
            <div class="clearfix"></div>
   
            <div class="col-lg-12">
                <section class="box">
                    <header class="panel_header">
                        <h2 class="title pull-left">Payment Methods</h2>
                        <div class="actions panel_actions pull-right">
                            <a class="box_toggle fa fa-chevron-down"></a>
                        </div>
                    </header>
                    <div class="content-body">
                        <div class="row">
                            <div class="col-xs-12">

                                <div class="table-responsive" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Method</th>
                                                <th>Merchant</th>
                                                <th>Currency accepted</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Coin</td>
                                                <td>
                                                <form action="https://www.coinpayments.net/index.php" method="post">
                                                    <input type="hidden" name="cmd" value="_pay_simple">
                                                    <input type="hidden" name="reset" value="1">
                                                    <input type="hidden" name="merchant" value="fe5353d9d6cfb42e0f8f2d40f75593ad">
                                                    <input type="hidden" name="item_name" value="ZlymoSave Investment">
                                                    <input type="hidden" name="item_desc" value="Autopilot Investment Platform">
                                                    <input type="hidden" name="currency" value="USD">
                                                    <input type="hidden" name="amountf" value="<?php echo $_GET['amount']; ?>">
                                                    <input type="hidden" name="want_shipping" value="0">
                                                    <input type="hidden" name="success_url" value="http://zlymosave.com/users/make-investment.php">
                                                    <input type="hidden" name="cancel_url" value="http://zylmosave.com/users/payment-method.php">
                                                    <input type="image" src="https://www.coinpayments.net/images/pub/CP-third-med.png" alt="Buy Now with CoinPayments.net">
                                                </form>

                                                </td>                                                    
                                                <td>
                                                    <span class="badge  w-70 round-warning">BTC</span>
                                                   
                                                </td>
                                            </tr>
                                            <tr>
                                                    <td>2</td>
                                                    <td>Bank Transfer</td>
                                                    <td><a href="?method=bank transfer&amount=<?php echo $_GET['amount'];?>">Request for details</td>
                                                    <td>
                                                        <input type="image" src="http://londotrade.online/data/crypto-dash/exchange-arrows.png" alt="Pay with bank transfer" width="50">
                                                    </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Card Payment</td>
                                                <td><a href="?method=card payment&amount=<?php echo $_GET['amount'];?>">Request details</a></td>
                                                <td>
                                                    <input type="image" src="http://londotrade.online/data/crypto-dash/payment3.png" alt="pay with card">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
                
            </div>


        
            <div class="clearfix"></div>
</section>
</div>
<?php UserLayout::endcontent(); ?>
