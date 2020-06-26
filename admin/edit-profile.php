<?php
include_once '../vendor/autoload.php';
use App\Layouts\Admin\AdminLayout;

AdminLayout::startcontent();
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
                                            <form id="icon_validate" action="#" novalidate="novalidate">

                                                <div class=" col-xs-12">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Name</label>
                                                                <span class="desc"></span>
                                                                <div class="controls">
                                                                    <i class=""></i>
                                                                    <input type="text" class="form-control" name="formfield1" value="" placeholder="Smith Wright">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Email</label>
                                                                <span class="desc"></span>
                                                                <div class="controls">
                                                                    <i class=""></i>
                                                                    <input type="email" class="form-control" value="" name="formfield2" placeholder="info@domain.com">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Phone Number</label>
                                                                <span class="desc"></span>
                                                                <div class="controls">
                                                                    <i class=""></i>
                                                                    <input type="text" class="form-control" value="" name="formfield1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Birthday</label>
                                                                <span class="desc"></span>
                                                                <div class="controls">
                                                                    <i class=""></i>
                                                                    <input type="text" class="form-control" value="" placeholder="17 September 1989" name="formfield2">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Zip Code</label>
                                                                <span class="desc"></span>
                                                                <div class="controls">
                                                                    <i class=""></i>
                                                                    <input type="text" class="form-control" value="" placeholder="17256" name="formfield1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label">City</label>
                                                                <div class="controls">
                                                                    <i class=""></i>
                                                                    <input type="text" class="form-control" value="" placeholder="New York" name="formfield2">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Country</label>
                                                                <span class="desc"></span>
                                                                <div class="controls">
                                                                    <i class=""></i>
                                                                    <input type="text" class="form-control" value="" placeholder="United States" name="formfield2">
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
        </div>  
    </div>
    <!-- CORE JS FRAMEWORK - START -->
<?php AdminLayout::endcontent(); ?>