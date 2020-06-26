<?php
include_once '../vendor/autoload.php';
use App\Layouts\User\UserLayout;
use App\Models\User;
use App\Models\Referal;

$u = new User;
$r = new Referal;

UserLayout::startcontent();
?>
        <!--  SIDEBAR - END -->

        <div id="main-content" class="">
            <section class="wrapper main-wrapper row">                
                <div class="col-xs-12">
                    <div class="page-title">

                        <div class="pull-left">
                            <!-- PAGE HEADING TAG - START -->
                            <h1 class="title">Affiliate Program</h1>
                            <!-- PAGE HEADING TAG - END -->
                        </div>

                        <div class="pull-right hidden-xs">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="#"><i class="fa fa-home"></i>Home</a>
                                </li>
                                <li class="active">
                                    <strong>Referal</strong>
                                </li>
                            </ol>
                        </div>

                    </div>
                </div>
                <div class="clearfix"></div>
                
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="statistics-box ref-bg1 mt-15">
                        <div class="mb-15">
                            <div class="real-earn">
                                <h2 class="w-text boldy mb-5">$<?php $r->getTotalReferalEarnings($u->getUserId()); ?></h2>
                                <span class="g-text">Referal Earnings</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-lg-12">
                    <section class="box ">
                        <div class="referal-head gradient-blue">
                            <h2 class="w-text mt-0 boldy">Refer Friends & Earn Credits</h2>                                                        
                        </div>
                        <div class="content-body">

                            <div class="row">
                                <div class="col-xs-12">

                                    <!-- start -->

                                    <div class="row">
                                       <div class="col-xs-12">
                                           <div class="text-center mt-30">
                                               <h3 class="boldy">Share My Affiliate Links</h3>
                                           </div>
                                       </div>
                                       <div class="col-md-8 col-md-offset-2 col-sm-12">
                                           <div class="affiliate-link mt-30">
                                               <div class="input-group">
                                                    <input type="text" class="form-control" value="http://zlymosave.com/register.php?ref_id=<?php echo $u->getUserId(); ?>" aria-describedby="basic-addon2">
                                                    <span class="input-group-addon orange-bg w-text" id="basic-addon2"><i class="fa fa-copy mr-10"></i>Copy Link</span>
                                                </div>
                                           </div>
                                       </div>
                                    </div>  
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h3>Referal summary</h3>
                                            
                                            <div class="table-responsive">
                                                <table class="table table-hover invoice-table">
                                                    <thead>
                                                        <th>Referred Members</th>
                                                        <th class="text-center">Referal bonuses</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php $r->getReferedUsers($u->getUserId()); ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="clearfix"></div>

            </section>
        </div>  
    </div>
    <!-- CORE JS FRAMEWORK - START -->
<?php UserLayout::endcontent(); ?>