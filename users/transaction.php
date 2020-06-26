<?php
include_once '../vendor/autoload.php';
use App\Layouts\User\UserLayout;
use App\Models\Investment;

UserLayout::startcontent();

$ci = new Investment;
?>
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
                    <div class="pull-right hidden-xs">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="#"><i class="fa fa-home"></i>Home</a>
                                </li>
                                <li class="active">
                                    <strong>Transactions</strong>
                                </li>
                            </ol>
                        </div>
                </div>
            </div>
            <div class="col-lg-12">
                <section class="box nobox marginBottom0">
                    <div class="content-body">
                        <div class="row">
                            
                            
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
                        <h2 class="title pull-left">Transaction History</h2>
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
                                                <th>Date Invested</th>
                                                <th>Profit</th>
                                                <th>Maturity</th>
                                                <th>Investment</th>
                                                <th>Withdrawal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($ci->getInvestments() as $key => $value) :
                                                $mature = date('Y-m-d h:i:s', $value['mature']);?>
                                                <tr>
                                                <td><?php echo $value['invest_id']?></td>
                                                <td><?php echo $value['plan']?></td>
                                                <td>$<?php echo number_format($value['amount'])?></td>
                                                <td><?php echo $value['created_on']?></td>
                                                <td>$<?php echo number_format($value['profit'])?></td>
                                                <td><?php echo $mature?></td>
                                                <td>
                                                <?php
                                                if ($value['invest_status'] == true) {
                                                    echo "<b style='color:green;'>active</b>";
                                                } else {
                                                    echo "<b style='color:orange;'>pending</b>";
                                                }
                                                ?>
                                                </td>
                                                <td>
                                                <?php
                                                if ($value['withdraw_status'] == true) {
                                                    echo "<b style='color:green;'>active</b>";
                                                } else {
                                                    echo "<b style='color:orange;'>pending</b>";
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


        
            <div class="clearfix"></div>

            <!-- MAIN CONTENT AREA ENDS -->
        </div>
    </section>
    <!-- END CONTENT -->                

<!-- END CONTAINER -->

<?php UserLayout::endcontent(); ?>
