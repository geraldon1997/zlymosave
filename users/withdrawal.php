<?php
include_once '../vendor/autoload.php';
use App\Layouts\User\UserLayout;

$ul = new UserLayout;
$ul->startcontent();
?>   
        <!--  SIDEBAR - END -->

        <div id="main-content" class="">
            <section class="wrapper main-wrapper row" style="">
                <div class='col-xs-12'>
                    <div class="page-title">

                        <div class="pull-left">
                            <!-- PAGE HEADING TAG - START -->
                            <h1 class="title">Withdrawal Request</h1>
                            <!-- PAGE HEADING TAG - END -->
                        </div>

                        <div class="pull-right hidden-xs">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="#"><i class="fa fa-home"></i>Home</a>
                                </li>
                                <li class="active">
                                    <strong>Withdrawal</strong>
                                </li>
                            </ol>
                        </div>

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <section class="box has-border-left-3 no-shadow">
                        <div class="content-body mt-15 pb0">    
                            <div class="row">
                                <div class="payment-info-wrap">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Amount</label>
                                            <div class="controls">
                                                <input type="number" class="form-control" placeholder="Select Amount" id="field-1" required disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Address</label>
                                            <div class="controls">
                                                <input type="text" class="form-control" placeholder="Enter Address" id="field-1" required disabled>
                                            </div>
                                        </div>
                                    </div>                                   
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label class="form-label"></label>
                                            <div class="controls mt-5">
                                                <button class="btn btn-primary" disabled>Withdraw</button>
                                            </div>
                                        </div>
                                        
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
    <!-- CORE JS FRAMEWORK - START -->
<?php UserLayout::endcontent(); ?>