<?php
include_once '../vendor/autoload.php';
use App\Layouts\User\UserLayout;
use App\Models\User;
use App\Controllers\User as UserController;

UserLayout::startcontent();

$um = new User();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uc = new UserController($_POST);
    $uc->updateProfileController();
}

?>
        <!--  SIDEBAR - END -->

        <div id="main-content" class="">
            <section class="wrapper main-wrapper row" style="">
                <div class='col-xs-12'>
                    <div class="page-title">

                        <div class="pull-left">
                            <!-- PAGE HEADING TAG - START -->
                            <h1 class="title">Personal Profile</h1>
                            <!-- PAGE HEADING TAG - END -->
                        </div>

                        <div class="pull-right hidden-xs">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="#"><i class="fa fa-home"></i>Home</a>
                                </li>
                                <li class="active">
                                    <strong>profile</strong>
                                </li>
                            </ol>
                        </div>

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-2"></div>
                <?php foreach ($um->getUserDetails() as $key => $value) : ?>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="box has-border-left-3">
                                <header class="panel_header gradient-blue">
                                    <h2 class="title pull-left w-text">Personal Information</h2>
                                </header>                                
                                <div class="content-body">    
                                    <div class="row">
                                        <div class="form-container mt-20 no-padding-right no-padding-left over-h">
                                            <form id="icon_validate" action="" method="post" novalidate="novalidate">

                                                <div class=" col-xs-12">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Name</label>
                                                                <span class="desc"></span> 
                                                                <div class="controls">
                                                                    <i class=""></i>
                                                                    <input type="text" class="form-control" name="fullname" placeholder="fullname" value="<?php echo $value['fullname'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Email</label>
                                                                <span class="desc"></span>
                                                                <div class="controls">
                                                                    <i class=""></i>
                                                                    <input type="email" class="form-control" name="email" placeholder="email address" value="<?php echo $value  ['email']; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Phone Number</label>
                                                                <span class="desc"></span>
                                                                <div class="controls">
                                                                    <i class=""></i>
                                                                    <input type="tel" class="form-control" name="phone" placeholder="phone" value="<?php echo $value    ['phone'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Birthday</label>
                                                                <span class="desc"></span>
                                                                <div class="controls">
                                                                    <i class=""></i>
                                                                    <input type="date" class="form-control" placeholder="date of birth" name="dob" value="<?php echo $value ['dob'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Zip Code</label>
                                                                <span class="desc"></span>
                                                                <div class="controls">
                                                                    <i class=""></i>
                                                                    <input type="text" class="form-control" placeholder="zip code" name="zip" value="<?php echo $value  ['zip_code'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label">City</label>
                                                                <div class="controls">
                                                                    <i class=""></i>
                                                                    <input type="text" class="form-control" placeholder="city" name="city" value="<?php echo $value ['city'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Country</label>
                                                                <span class="desc"></span>
                                                                <div class="controls">
                                                                    <i class=""></i>
                                                                    <input type="text" class="form-control" placeholder="country" name="country" value="<?php echo $value   ['country'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="pull-right mt-30 mr-10">
                                                            <button type="submit" class="btn btn-primary btn-corner right15"><i class="fa fa-check"></i> Update</button>                                                           
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>   
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </section>
                <?php endforeach; ?>
        </div>  
    </div>
    <!-- CORE JS FRAMEWORK - START -->
<?php UserLayout::endcontent(); ?>