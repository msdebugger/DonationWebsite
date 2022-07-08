<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="shortcut icon" type="image/png" href="/imgs/favicon.png" /> -->

        <title>Blockchain in Charity</title>

        <!-- inject:css -->
        <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
        <!-- endinject -->

        <link rel="stylesheet" href="../dist/css/main.css">

        <!-- Bootstrap DatePicker Dependencies -->
        <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css">

        <!--Data Table-->
        <link href="../bower_components/datatables/media/css/jquery.dataTables.css" rel="stylesheet">
        <link href="../bower_components/datatables-tabletools/css/dataTables.tableTools.css" rel="stylesheet">
        <link href="../bower_components/datatables-colvis/css/dataTables.colVis.css" rel="stylesheet">
        <link href="../bower_components/datatables-responsive/css/responsive.dataTables.scss" rel="stylesheet">
        <link href="../bower_components/datatables-scroller/css/scroller.dataTables.scss" rel="stylesheet">


        <script src="../assets/js/modernizr-custom.js"></script>
    </head>
    <body>

        <div id="ui" class="ui">

            <!--header start-->
            <header id="header" class="ui-header">

                <div class="navbar-header">
                    <!--logo start-->
                    <a href="index.html" class="navbar-brand">
                        <span class="logo"><img src="../imgs/logo.png" alt="" style="height: 45px" /></span>
                        <span class="logo-compact"><img src="../imgs/logo.png" alt="" style="height: 45px"/></span>
                    </a>
                    <!--logo end-->
                </div>

                <div class="navbar-collapse nav-responsive-disabled">

                    <!--toggle buttons start-->
                    <ul class="nav navbar-nav">
                        <li>
                            <a class="toggle-btn" data-toggle="ui-nav" href="">
                                <i class="fa fa-bars"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- toggle buttons end -->


                    <!--notification start-->
                    <ul class="nav navbar-nav navbar-right">
                        


                        <li class="dropdown dropdown-usermenu">
                            <a href="#" class=" dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <div class="user-avatar"><img src="../imgs/a0.jpg" alt="..."></div>
                                <span class="hidden-sm hidden-xs"><?php echo $_SESSION['u_name']; ?></span>
                                <!--<i class="fa fa-angle-down"></i>-->
                                <span class="caret hidden-sm hidden-xs"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                                <li class="divider"></li>
                                <li><a href="logout.php"><i class="fa fa-sign-out"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!--notification end-->

                </div>

            </header>
            <!--header end-->

            <!--sidebar start-->
            <aside id="aside" class="ui-aside">
                <ul class="nav" ui-nav>
                    <!-- <li>
                        <a href="index.php"><i class="fa fa-group"></i><span> Users </span></a>
                        <ul class="nav nav-sub">
                            <li class="nav-sub-header"><a href="index.php"><span>All Users</span></a></li>
                        </ul>
                    </li> -->
                    <li>
                        <a href="index.php"><i class="fa fa-list-alt"></i><span> Donation Requirement </span></a>
                        <ul class="nav nav-sub">
                            <li class="nav-sub-header"><a href="index.php"><span>Donation Requirement</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="my_donations.php"><i class="fa fa-list-alt"></i><span> My Donations </span></a>
                        <ul class="nav nav-sub">
                            <li class="nav-sub-header"><a href="my_donations.php"><span>My Donations</span></a></li>
                        </ul>
                    </li>
                    <!-- <li>
                        <a href=""><i class="fa fa-group"></i><span>NGO</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="nav nav-sub">
                            <li class="nav-sub-header"><a href=""><span>NGO</span></a></li>
                            <li><a href="index.php"><span>All NGO</span></a></li>
                            <li><a href="add_ngo.php"><span>Add NGO</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-user"></i><span>Contractor</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="nav nav-sub">
                            <li class="nav-sub-header"><a href=""><span>Contractor</span></a></li>
                            <li><a href="all_contractor.php"><span>All Contractor</span></a></li>
                            <li><a href="add_contractor.php"><span>Add Contractor</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="all_users.php"><i class="fa fa-list-alt"></i><span> All Users </span></a>
                        <ul class="nav nav-sub">
                            <li class="nav-sub-header"><a href="all_users.php"><span>All Users</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="index.php"><i class="fa fa-list-alt"></i><span> Donation Requirement </span></a>
                        <ul class="nav nav-sub">
                            <li class="nav-sub-header"><a href="index.php"><span>Donation Requirement</span></a></li>
                        </ul>
                    </li> -->
                    <!-- <li>
                        <a href=""><i class="fa fa fa-bell"></i><span>Notice</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="nav nav-sub">
                            <li class="nav-sub-header"><a href=""><span>Notice</span></a></li>
                            <li><a href="all_notice.php"><span>All Notice</span></a></li>
                            <li><a href="add_notice.php"><span>Add Notice</span></a></li>
                        </ul>
                    </li> -->
                </ul>
            </aside>
            <!--sidebar end-->