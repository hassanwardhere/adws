<?php
ob_start();
session_start(); // Start or resume existing session

// Check if the user is not logged in or session has expired
if (!isset($_SESSION['user_id']) || $_SESSION['expire_time'] < time()) {
    // Destroy all session data
    session_destroy();

    // Redirect to the login page
    header("Location: ../auth/login.php");
    exit();
}

// Reset session expiration time on each page load to extend the session
$_SESSION['expire_time'] = time() + (10 * 60); // Extend session for 10 minutes
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>CheapDeals - Admin Panel</title>
    <!-- Vector CSS -->
    <link href="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- simplebar CSS-->
    <link href="../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--Data Tables -->
    <link href="../assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <!-- animate CSS-->
    <link href="../assets/css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
    <!-- Sidebar CSS-->
    <link href="../assets/css/sidebar-menu.css" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="../assets/css/app-style.css" rel="stylesheet" />
    <!-- skins CSS-->
    <link href="../assets/css/skins.css" rel="stylesheet" />
</head>

<body>
    <!-- Start wrapper-->
    <div id="wrapper">
        <!--Start sidebar-wrapper-->
        <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
            <div class="brand-logo">
                <a href="../admin/dashboard.php">
                    <img src="../assets/images/logo-icon.png" class="logo-icon" alt="logo icon" />
                    <h5 class="logo-text">Admin Panel</h5>
                </a>
            </div>
            <div class="user-details">
                <div class="media align-items-center user-pointer collapsed" data-toggle="collapse" data-target="#user-dropdown">
                    <div class="avatar">
                        <img class="mr-3 side-user-img" src="../assets/images/placeholder110by110.jpg" alt="user avatar" />
                    </div>
                    <div class="media-body">
                        <h6 class="side-user-name">Hassan</h6>
                    </div>
                </div>
                <div id="user-dropdown" class="collapse">
                    <ul class="user-setting-menu">
                        <li>
                            <a href="javaScript:void();"><i class="icon-user"></i> My Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
            <ul class="sidebar-menu">
                <li class="sidebar-header">MAIN NAVIGATION</li>
                <li>
                    <a href="../admin/dashboard.php" class="waves-effect">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="../admin/managecustomers.php" class="waves-effect">
                        Manage Customers
                    </a>
                </li>
                <li>
                    <a href="../admin/managepackages.php" class="waves-effect">
                        Manage Packages
                    </a>
                </li>
                <li>
                    <a href="../admin/managespecialoffers.php" class="waves-effect">
                        Manage Special Offers
                    </a>
                </li>
                <li>
                    <a href="../admin/processorderp.php" class="waves-effect">
                        Process Orders Packages
                    </a>
                </li>
                <li>
                    <a href="../admin/processordero.php" class="waves-effect">
                        Process Orders Offers
                    </a>
                </li>
                <li>
                    <a href="../admin/managecustomersupport.php" class="waves-effect">
                        Support
                    </a>
                </li>
                <li class="sidebar-header">Quick Actions</li>
                <li>
                    <a href="javaScript:void();" class="waves-effect"><i class="fa fa-envelope-open"></i>
                        <span>Contact Admin</span></a>
                </li>
            </ul>
        </div>
        <!--End sidebar-wrapper-->

        <!--Start topbar header-->
        <header class="topbar-nav">
            <nav id="header-setting" class="navbar navbar-expand fixed-top">
                <ul class="navbar-nav mr-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link toggle-menu" href="javascript:void();">
                            <i class="icon-menu menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form class="search-bar">
                            <input type="text" class="form-control" placeholder="Enter keywords" />
                            <a href="javascript:void();"><i class="icon-magnifier"></i></a>
                        </form>
                    </li>
                </ul>
                <ul class="navbar-nav align-items-right">
                    <li class="nav-item">
                        <a class="btn btn-danger" href="../auth/logout.php"> Log Out </a>
                    </li>
                </ul>
            </nav>
        </header>
        <!--End topbar header-->

        <div class="clearfix"></div>

        <div class="content-wrapper">
            <div class="container-fluid">



                <!--End Row-->

                <!--End Dashboard Content-->
                <!--start overlay-->