<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header">
            <a class="navbar-brand" href="dash.php">
                <img src="images/logo/logo-2.png" class="my-logo" />
                <span>
                    <img src="images/logo/tryonlogo-4.png" class="dark-logo" />
                </span>
            </a>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark"
                                         href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
                <li class="nav-item hidden-xs-down search-box"> <a
                        class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i
                            class="fa fa-search"></i></a>
                    <form class="app-search">
                        <input type="text" class="form-control" placeholder="Search & enter"> <a
                            class="srh-btn"><i class="fa fa-times"></i></a></form>
                </li>
            </ul>
        </div>       
            
        <div class="nav-toggler dropdown">
            <ul class="navbar-nav">
                <li  data-toggle="dropdown">
                    <a class="nav-link waves-effect waves-dark profile-pic">
                        <img src="images/people/5.jpg"/>
                        <span class="hidden-md-down"><?php echo $_SESSION['fullName']; ?></span>
                    </a>
                </li>
                <li class="dropdown-menu">
                    <a class="nav-link" href="#">Profile</a>
                    <a class="nav-link" href="#">Another action</a>
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li> <a class="waves-effect waves-dark" href="dash.php" aria-expanded="false"><i
                            class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="staff.php" aria-expanded="false"><i
                            class="fa fa-user-circle-o"></i><span class="hide-menu">Staff</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="client.php" aria-expanded="false"><i
                            class="fa fa-user"></i><span class="hide-menu">Client</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="enquiry.php" aria-expanded="false"><i
                            class="fa fa-question-circle-o"></i><span class="hide-menu">Enquiry</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="packages.php" aria-expanded="false"><i
                            class="fa fa-gift"></i><span class="hide-menu">Packages</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="diet.php" aria-expanded="false"><i
                            class="fa fa-cutlery"></i><span class="hide-menu">Diet Plans</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="receipt.php" aria-expanded="false"><i
                            class="fa fa-money"></i><span class="hide-menu">Receipt</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="expense.php" aria-expanded="false"><i
                            class="fa fa-bolt"></i><span class="hide-menu">Expense</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="staffAttendance.php" aria-expanded="false"><i
                            class="fa fa-calendar"></i><span class="hide-menu">Attendance</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="users.php" aria-expanded="false"><i
                            class="fa fa-users"></i><span class="hide-menu">Users</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="report.php" aria-expanded="false"><i
                            class="fa fa-file-text-o"></i><span class="hide-menu">Report</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="settings.php" aria-expanded="false"><i
                            class="fa fa-cogs"></i><span class="hide-menu">Settings</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="test.php" aria-expanded="false"><i
                            class="fa fa-bookmark-o"></i><span class="hide-menu">Test</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="test2.php" aria-expanded="false"><i
                            class="fa fa-bookmark-o"></i><span class="hide-menu">Test-2</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="test3.php" aria-expanded="false"><i
                            class="fa fa-bookmark-o"></i><span class="hide-menu">Test-3</span></a>
                </li>
            </ul>
        </nav>
    </div>
</aside>