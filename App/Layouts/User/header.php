<body class=" ">
    <!-- START TOPBAR -->
    <div class='page-topbar gradient-blue1'>
        <div class='logo-area crypto'>

        </div>
        <div class='quick-area'>
            <div class='pull-left'>
                <ul class="info-menu left-links list-inline list-unstyled">
                    <li class="sidebar-toggle-wrap">
                        <a href="#" data-toggle="sidebar" class="sidebar_toggle">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>                                                                    
                </ul>
            </div>
            <div class='pull-right'>
                <ul class="info-menu right-links list-inline list-unstyled">                                    
                    <li class="profile">
                        <a href="#" data-toggle="dropdown" class="toggle">                            
                            <span><b><?php echo $_SESSION['username']; ?></b> &nbsp; <i class="fa fa-angle-down"></i></span>
                        </a>
                        <ul class="dropdown-menu profile animated fadeIn">                            
                            <li>
                                <a href="edit-profile.php">
                                    <i class="fa fa-user"></i> Profile
                                </a>
                            </li>
                            <li class="last">
                                <a href="index.php?logout=true">
                                    <i class="fa fa-lock"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END TOPBAR -->
