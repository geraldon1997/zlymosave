<?php
include_once '../vendor/autoload.php';
use App\Layouts\User\UserLayout;
use App\Controllers\User;

UserLayout::startcontent();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uc = new User($_POST);
    $uc->changePasswordController();
}

?> 
        <!--  SIDEBAR - END -->

        <div id="main-content" class="">
            <section class="wrapper main-wrapper row" style="">
                <div class='col-xs-12'>
                    <div class="page-title">

                        <div class="pull-left">
                            <!-- PAGE HEADING TAG - START -->
                            <h1 class="title">Account Settings</h1>
                            <!-- PAGE HEADING TAG - END -->
                        </div>

                        <div class="pull-right hidden-xs">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="#"><i class="fa fa-home"></i>Home</a>
                                </li>
                                <li class="active">
                                    <strong>Account Settings</strong>
                                </li>
                            </ol>
                        </div>

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="box">
                                <header class="panel_header" style="border-bottom:1px solid #eee">
                                    <h2 class="title pull-left"><img src="../data/crypto-dash/set4.png" class="wd mr-5" alt="">Security: Password</h2>
                                    <div class="actions panel_actions pull-right">
                                        <div class="form-group no-mb">
                                        <form action="" method="post">
                                            <button type="submit" class="btn btn-primary btn-corner "><i class="fa fa-check"></i> Update Password</button>
                                        </div>
                                    </div>
                                </header>  
                                <div class="content-body">
                                    <div class="row">
                                        
                                            <div class="col-xs-12 mt-20">

                                                <div class="form-group">
                                                    <label class="form-label">Current Password</label>
                                                    <span class="desc"></span>
                                                    <div class="controls">
                                                        <input type="password" name="oldpassword" class="form-control" value="" placeholder="Enter you current password" id="field-31">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label">New Password</label>
                                                    <span class="desc"></span>
                                                    <div class="controls">
                                                        <input type="password" name="password" class="form-control" value="" placeholder="Enter you new password" id="field-41" minlength="7">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-xs-12 padding-bottom-30">
                                                <div class="pull-left">
                                                    <h4><i class="fa fa-info-circle color-primary complete f-s-14"></i><small>Avoid using easy to guess password</small></h4>
                                                    <ul class="ml-20 mt-30 list-unstyled">
                                                        <li><h5><i class="fa fa-dot-circle-o blue-text mr-10"></i>Password must be at lest 7 - 15 character</h5></li>
                                                        <li><h5><i class="fa fa-dot-circle-o blue-text mr-10"></i>Password must contain Lowercase and uppercase letters</h5></li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </form>
                                    </div>

                                </div>
                            </section>
                        </div>   
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </section>
        </div>  
    </div>
    <!-- CORE JS FRAMEWORK - START -->
<?php UserLayout::endcontent(); ?>