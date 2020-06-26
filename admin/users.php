<?php
include_once '../vendor/autoload.php';
use App\Layouts\Admin\AdminLayout;
use App\Models\User;
use App\Controllers\Activity;

$activity = new Activity;

AdminLayout::startcontent();

$u = new User;

$date = Date('d-m-Y');
$time = Date('h:i:s');

if (isset($_GET['confirm'])) {
    $u->confirmUserEmail($_GET['confirm']);
    $activity->addNewActivity($_GET['confirm'], "confirmed email on $date at $time");
}

if (isset($_GET['deactivate'])) {
    $u->deactivateUser($_GET['deactivate']);
    $activity->addNewActivity($_GET['deactivate'], "was deactivated on $date at $time");
}
?>

<section id="main-content" class=" ">
<div class="wrapper main-wrapper row" style=''>
<div class='col-xs-12'>
                    <div class="page-title">

                        <div class="pull-left">
                            <!-- PAGE HEADING TAG - START -->
                            <h1 class="title">Users</h1>
                            <!-- PAGE HEADING TAG - END -->
                        </div>
                        <div class="pull-right hidden-xs">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="#"><i class="fa fa-home"></i>Home</a>
                                </li>
                                <li class="active">
                                    <strong>Users</strong>
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
                            <h2 class="title pull-left">Users</h2>
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
                                                    <th>S/N</th>
                                                    <th>Fullname</th>
                                                    <th>username</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php foreach ($u->getAllUsers() as $key => $value) : ?>
                                                <tr>
                                                    <td><?php echo $value['id']?></td>
                                                    <td><?php echo $value['fullname']?></td>
                                                    <td><?php echo $value['username'] ?></td>
                                                    <td><?php echo $value['email']?></td>
                                                    <td><?php echo $value['phone']?></td>
                                                    <td><?php echo $value['status']?></td>
                                                    <td>
                                                        <?php
                                                        if ($value['status'] == false) {
                                                            $user = $value['username'];
                                                            echo "<a href='?confirm=$user'> activate user </a>";
                                                        } else {
                                                            $user = $value['username'];
                                                            echo "<a href='?deactivate=$user'> deactivate user </a>";
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
</div>
</section>

<?php AdminLayout::endcontent(); ?>
