<?php
include_once '../vendor/autoload.php';

use App\Layouts\Admin\AdminLayout;
use App\Controllers\Investment;
use App\Controllers\Admin;

if (isset($_GET['civ'])) {
    $ad = new Admin($_GET['civ']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $iv = new Investment($_POST);
    $iv->updateUserInvestment($_GET['civ']);
}


AdminLayout::startcontent();
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
                            <h2 class="title pull-left">Edit Investment</h2>
                            <div class="actions panel_actions pull-right">
                                <a class="box_toggle fa fa-chevron-down"></a>
                            </div>
                        </header>
                        <div class="content-body">
                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="table-responsive" data-pattern="priority-columns">
                                    <div class="box login">

                                    <div class="content-body" style="padding-top:25px">

                                        <form action="" method="post" id="msg_validate" novalidate="novalidate" class="no-mb no-mt">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                <?php foreach ($ad->getUserInvestmentDetails() as $key => $value) :?>
                                                    <div class="form-group">
                                                        <label class="form-label">Username</label>
                                                        <div class="controls">
                                                            <input type="text" class="form-control" name="username" placeholder="enter username" value="<?php echo $value['username']; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Plan</label>
                                                        <div class="controls">
                                                        <select class="form-control m-bot15" required id="ivplan" name="plan">
                                                            <option value="<?php echo $value['plan'] ?>"><?php echo $value['plan']; ?></option>
                                                            <option value="silver">Silver</option>
                                                            <option value="bronze">Bronze</option>
                                                            <option value="gold">Gold</option>

                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Invested Amount</label>
                                                        <div class="controls">
                                                        <input type="number" name="amount" class="form-control" placeholder="" id="ivamount" value="<?php echo $value['amount'] ?>" required="required">
                                                        </div>
                                                    </div>                                                 
                                                    <div class="form-group">
                                                        <label class="form-label">Investment Status</label>
                                                        <div class="controls">
                                                            <input type="text" class="form-control" name="ivstatus" placeholder="investment status" value="<?php if ($value['invest_status'] == true) {echo 'active';} else {echo 'inactive';}?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <button class="btn btn-primary mt-10 btn-corner right-15">Update</button>
                                                    </div>
                                                <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                    
                </div>
</div>
</section>

<script>
        document.getElementById('ivplan').onchange = function() {
            var planName = document.getElementById('ivplan').value,
                amount = document.getElementById('ivamount')
            if (planName === 'silver') {

                amount.removeAttribute("disabled");
                amount.placeholder = 'between $50 and $50,000';
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

<?php AdminLayout::endcontent(); ?>
