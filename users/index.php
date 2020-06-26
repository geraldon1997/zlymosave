<?php
include_once '../vendor/autoload.php';

use App\Layouts\User\UserLayout;
use App\Models\Investment;

UserLayout::startcontent();

$ci = new Investment;
?>
    <link rel="shortcut icon" type="image/png" href="./images/zly.png" />

<!-- START CONTENT -->
    <section id="main-content" class=" ">
        <div class="wrapper main-wrapper row">

            <div class='col-xs-12'>
                <div class="page-title">

                    <div class="pull-left">
                        <!-- PAGE HEADING TAG - START -->
                        <h1 class="title">Dashboard</h1>
                        <!-- PAGE HEADING TAG - END -->
                    </div>

                </div>
            </div>
            <div class="col-lg-12">
                <section class="box nobox marginBottom0">
                    <div class="content-body">
                        <div class="row">
                            
                            <div class="col-lg-3 col-sm-6 col-xs-12">
                                <div class="statistics-box">
                                    <div class="mb-15">
                                        <i class="pull-left ico-icon icon-md icon-primary">
                                            <img src="../data/crypto-dash/s1.png" class="ico-icon-o" alt="">
                                        </i>
                                        <div class="stats">
                                            <h3 class="boldy mb-5">$<?php foreach ($ci->getCurrentInvestment() as $key => $value) {
                                                                            echo number_format($value['amount']);
                                                                    } ?>
                                            </h3>
                                            <span>Current Investment</span>
                                        </div>
                                    </div>
                                    <span class="crypto1"><canvas width="239" height="40"></canvas></span>
                                </div>
                            </div> 
                            <div class="col-lg-3 col-sm-6 col-xs-12">
                                <div class="statistics-box">
                                    <div class="mb-15">
                                        <i class="pull-left ico-icon icon-md icon-primary">
                                            <img src="../data/crypto-dash/s2.png" class="ico-icon-o" alt="">
                                        </i>
                                        <div class="stats">
                                            <h3 class="boldy mb-5">$<?php $ci->getTotalInvestment();?></h3>
                                            <span>Total Investment</span>
                                        </div>
                                    </div>
                                    <span class="crypto2"><canvas width="239" height="40"></canvas></span>

                                </div>
                            </div>
                            
                            <div class="col-lg-5 col-sm-6 col-xs-12">
                                <div class="statistics-box">
                                    <div class="mb-15">
                                        <i class="pull-left ico-icon icon-md icon-primary">
                                            <img src="../data/crypto-dash/s2.png" class="ico-icon-o" alt="">
                                        </i>
                                        <div class="stats">
                                            <h3 class='boldy mb-5' id='profitcount'>$</h3>
                                            
                                            <span>Profit</span>
                                        </div>
                                    </div>
                                    <span class="crypto3"><canvas width="239" height="40"></canvas></span>

                                </div>
                            </div>
                        </div>
                        <!-- End .row -->
                    </div>
                </section>
            </div>

            <div class="clearfix"></div>
            <!-- MAIN CONTENT AREA STARTS -->
                            
            <div class="col-md-1"></div>
            
            <div class="clearfix"></div>

            <div class="col-lg-12">
                <section class="box">
                    <header class="panel_header">
                        <h2 class="title pull-left">Trading Chart</h2>
                        <div class="actions panel_actions pull-right">
                            <a class="box_toggle fa fa-chevron-down"></a>
                        </div>
                    </header>
                    <div class="content-body">
                        <div class="row">
                            <div class="col-xs-12">

                                <div class="table-responsive" data-pattern="priority-columns">
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
                                </div>

                            </div>
                        </div>
                        <hr>
                        <div class="row">
				<div class="col-12">
					<div class="box">
						<iframe 
							src="https://www.widgets.investing.com/live-currency-cross-rates?theme=darkTheme&hideTitle=true&roundedCorners=true&pairs=1,3,2,4,7,5,8,6,9,49,11" 
							width="100%" 
							height="500px" frameborder="0" 
							allowtransparency="true" marginwidth="0" marginheight="0">            
						</iframe>
					</div>
				</div>
			</div>
			<div class="poweredBy" style="font-family: Arial, Helvetica, sans-serif;"> 
            	<a href="https://www.investing.com?utm_source=WMT&amp;utm_medium=referral&amp;utm_campaign=LIVE_CURRENCY_X_RATES&amp;utm_content=Footer%20Link" 
				target="_blank" 
				rel="nofollow">                
            </a>
        </div>
                    </div>
                </section>
                
            </div>


        
            <div class="clearfix"></div>

            <!-- MAIN CONTENT AREA ENDS -->
        </div>
    </section>
    <!-- END CONTENT -->                
</div>
<!-- END CONTAINER -->
<?php foreach ($ci->getCurrentInvestment() as $key => $value) :?>
    <input type="hidden" id="amount" value="<?php echo $value['amount']?>">
    <input type="hidden" id="profit" value="<?php echo $value['profit']?>">
    <input type="hidden" id="start" value="<?php echo $value['invest_date']?>">
    <input type="hidden" id="stop" value="<?php echo $value['mature']?>">
    <input type="hidden" id="time" value="<?php echo time(); ?>">
    <input type="hidden" id="ivstatus" value="<?php echo $value['invest_status']; ?>">
<?php endforeach; ?>
<script>
    
    var i = 0;
    var f = parseInt(document.querySelector('#profit').value);
    var time = parseInt(document.querySelector('#time').value);
    var start = parseInt(document.querySelector('#start').value);
    var stop = parseInt(document.querySelector('#stop').value);
    var ivstatus = parseInt(document.querySelector('#ivstatus').value);

    function profit(){
        if (ivstatus == true) {

            if (time < stop) {

            var r = stop - time;
            var n = f / r;
            
            if (i < f) {
                i += n;
                document.querySelector('#profitcount').innerHTML = '$' + i.toLocaleString();
            }
            
            } else {
                document.querySelector('#profitcount').innerHTML = '$' + f.toLocaleString();
            }   
        } else {
            document.querySelector('#profitcount').innerHTML = 'pending';
        }
    }
    
    setInterval(profit, 1000)

</script>

<?php UserLayout::endcontent(); ?>
