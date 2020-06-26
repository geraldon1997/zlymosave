<div class="sidebar" style="width:100%; min-height: 100%; background-color:red;" data-background-color="red" data-active-color="danger">
<!--
    Tip 1: you can change the color of the sidebar's background using: data-background-color="white | blue"
    Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
-->
<div class="sidebar-wrapper">
            <div class="logo">
                <a href="/dash/" class="simple-text">
                    <img src="/assets/images/logio.png" class="img img-responsive"/>
                </a>
            </div>

            <ul class="nav">
            <?php
            if (auth_user()['is_admin']) {
                ?>
                <li>
                    <a href="users.php">
                        <i class="fa fa-user-secret"></i>
                        <p>All Users</p>
                    </a>
                </li>
                <li>
                    <a href="fundings.php">
                        <i class="fa fa-user-secret"></i>
                        <p>All Funding Requests</p>
                    </a>
                </li>
                <li>
                    <a href="withdrawals.php">
                        <i class="fa fa-user-secret"></i>
                        <p>All Withdrawals</p>
                    </a>
                </li>
                <?php
            }
            ?>
                <li class="active">
                    <a href="/dash/">
                        <i class="ti-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="bank-fund.php">
                        <i class="ti-arrow-circle-up"></i>
                        <p>Fund Account</p>
                    </a>
                </li>
                <li>
                    <a href="withdraw.php">
                        <i class="ti-arrow-circle-down"></i>
                        <p>Withdraw</p>
                    </a>
                </li>
                <li>
                    <a href="history.php">
                        <i class="fa fa-history"></i>
                        <p>History</p>
                    </a>
                </li>
                <li>
                    <a href="user.php">
                        <i class="ti-user"></i>
                        <p>Account Details</p>
                    </a>
                </li>
                <li>
                    <a href="verified.php">
                        <i class="ti-check"></i>
                        <p>Account Verified</p>
                    </a>
                </li>
                  <li>
                    <a href="referral.php">
                        <i class="ti-check"></i>
                        <p>Referrals</p>
                    </a>
                </li>
                <li>
                    <a href="feedback.php">
                        <i class="ti-email"></i>
                        <p>Send Feedback</p>
                    </a>
                </li>
                
            </ul>
        </div>
        </div>