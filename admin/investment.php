<?php
include_once '../vendor/autoload.php';
use App\Layouts\Admin\AdminLayout;
use App\Models\Investment;
use App\Controllers\Activity;

$activity = new Activity;

AdminLayout::startcontent();

$iv = new Investment;

$date = date('d-m-Y');
$time = date('h:i:s');

if (isset($_GET['civ']) && isset($_GET['user']) && isset($_GET['plan'])) {
    $iv->confirmInvestment($_GET['civ'], $_GET['plan']);
    $activity->addNewActivity($_GET['user'], "investment with reference number ".$_GET['civ']." was approved on $date at $time");
}

?>

<section id="main-content" class=" ">
<div class="wrapper main-wrapper row" style=''>
<div class='col-xs-12'>
                    <div class="page-title">

                        <div class="pull-left">
                            <!-- PAGE HEADING TAG - START -->
                            <h1 class="title">Investments</h1>
                            <!-- PAGE HEADING TAG - END -->
                        </div>
                        <div class="pull-right hidden-xs">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="#"><i class="fa fa-home"></i>Home</a>
                                </li>
                                <li class="active">
                                    <strong>Investments</strong>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
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
                                                    <th>Username</th>
                                                    <th>Plan</th>
                                                    <th>Amount</th>
                                                    <th>Date Invested</th>
                                                    <th>Profit</th>
                                                    <th>Maturity</th>
                                                    <th>Investment</th>
                                                    <th>Withdrawal</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $iv->getAllInvestments(); ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                    
                </div>
</div>
</section>

            

<?php AdminLayout::endcontent(); ?>
