<?php
include_once '../vendor/autoload.php';
use App\Layouts\User\UserLayout;
use App\Models\Investment as IV;
use App\Controllers\Investment;

UserLayout::startcontent();

$ci = new IV;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $i = new Investment($_POST);
    $i->invest();
}
?>
        <!--  SIDEBAR - END -->

        <div id="main-content" class="">
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
                                    <strong>Investment</strong>
                                </li>
                            </ol>
                        </div>

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <form action="" method="post">
                    <section class="box has-border-left-3 no-shadow">
                        <div class="content-body mt-15 pb0">    
                            <div class="row">
                                <div class="payment-info-wrap">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Choose Plan</label>
                                            <select class="form-control m-bot15" required id="ivplan" name="plan">
                                                <option value="choose">Choose Plan</option>
                                                <option value="silver">Silver</option>
                                                <option value="bronze">Bronze</option>
                                                <option value="gold">Gold</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Amount</label>
                                            <div class="controls">
                                                <input type="number" name="amount" class="form-control" placeholder="" id="ivamount" required="required" disabled="disabled">
                                            </div>
                                        </div>
                                    </div>                                   
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label class="form-label"></label>
                                            <div class="controls mt-5">
                                                <button class="btn btn-primary">Send</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    </form>
                </div>

                <div class="col-lg-12">
                <section class="box">
                    <header class="panel_header">
                        <h2 class="title pull-left">Investments</h2>
                        <div class="actions panel_actions pull-right">
                            <a class="box_toggle fa fa-chevron-down"></a>
                        </div>
                    </header>
                    <div class="content-body">
                        <div class="row">
                            <div class="col-xs-12">

                                <div class="table-responsive" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table vm trans table-small-font no-mb table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Ref</th>
                                                <th>Plan</th>
                                                <th>Amount</th>
                                                <th>Profit</th>
                                                <th>status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($ci->getInvestments() as $key => $value) :
                                                $ivid = $value['invest_id'];
                                                $plan = $value['plan'];
                                                $amount = $value['amount'];
                                                $profit = $value['profit'];
                                                $ivstatus = $value['invest_status']; ?>
                                                <tr>
                                                <td><?php echo $ivid ?></td>
                                                <td><?php echo $plan ?></td>
                                                <td>$<?php echo number_format($amount)?></td>
                                                <td>$<?php echo number_format($profit)?></td>
                                                
                                                <td>
                                                <?php
                                                if ($ivstatus == true) {
                                                    echo "<b style='color:green;'>active</b>";
                                                } else {
                                                    echo "<b style='color:orange;'>pending</b>";
                                                }
                                                ?>                                                  
                                                </td>
                                                <td>
                                                <?php
                                                if ($ivstatus == true) {
                                                    echo "<b style='color:green;'>paid</b>";
                                                } else {
                                                    echo "<b style='color:orange;'><a href='payment-method.php?amount=$amount'>pay now</a></b>";
                                                }
                                                ?>
                                                </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
                
            </div>
                <div class="col-lg-2"></div>
            </section>
        </div>  
    </div>

    <script>
        document.getElementById('ivplan').onchange = function() {
            var planName = document.getElementById('ivplan').value,
                amount = document.getElementById('ivamount')
            if (planName === 'silver') {

                amount.removeAttribute("disabled");
                amount.placeholder = 'between $36 and $50,000';
                amount.setAttribute("minlength", 3);
                amount.setAttribute("maxlength", 4);
                amount.setAttribute("min", 50);
                amount.setAttribute("max", 50000);

            } else if (planName === 'bronze') {

                amount.removeAttribute("disabled");
                amount.placeholder = 'between $3,000 and $100,000';
                amount.setAttribute("minlength", 4);
                amount.setAttribute("maxlength", 5);
                amount.setAttribute("min", 3000);
                amount.setAttribute("max", 100000);

            } else if (planName === 'gold') {

                amount.removeAttribute("disabled");
                amount.placeholder = 'between $10,000 and $1,250,000';
                amount.setAttribute("minlength", 5);
                amount.setAttribute("maxlength", 10);
                amount.setAttribute("min", 10000);
                amount.setAttribute("max", 1250000);

            } else if (planName === 'choose') {
                amount.placeholder = '';
                amount.setAttribute("disabled", "disabled");
            }
        };
    </script>
    <!-- CORE JS FRAMEWORK - START -->
<?php UserLayout::endcontent(); ?>