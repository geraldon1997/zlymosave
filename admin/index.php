<?php
include_once '../vendor/autoload.php';
use App\Layouts\Admin\AdminLayout;
use App\Models\User;
use App\Models\Investment;
use App\Controllers\Activity;

$activity = new Activity;

$al = new AdminLayout;
$al->startcontent();

$u = new User;
$iv = new Investment;
?>
<!-- START CONTENT -->
        <section id="main-content" class=" ">
            <div class="wrapper main-wrapper row" style=''>

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
                                                <h3 class="boldy mb-5"><?php $u->getTotalNumberOfUsers() ?></h3>
                                                <span>Total Users</span>
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
                                                <h3 class="boldy mb-5"><?php $iv->getTotalNumberOfInvestments() ?></h3>
                                                <span>Total Investments</span>
                                            </div>
                                        </div>
                                        <span class="crypto2"><canvas width="239" height="40"></canvas></span>

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
                        <h2 class="title pull-left">Acitivites Log</h2>
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
                                                <th>Activity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $activity->displayActivities(); ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
                
            </div>

                <!-- MAIN CONTENT AREA ENDS -->
            </div>
        </section>
        <!-- END CONTENT -->                
    </div>
    <!-- END CONTAINER -->
<?php $al->endcontent(); ?>