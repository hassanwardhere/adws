<?php
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
    <title>CheapDeals - Main</title>
    <!--favicon-->
    <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon" />
    <!-- Vector CSS -->
    <link href="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- simplebar CSS-->
    <link href="../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
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
                <a href="index.html">
                    <h5 class="logo-text">CheapDeals - User Area</h5>
                </a>
            </div>
            <div class="user-details">
                <div class="media align-items-center user-pointer collapsed" data-toggle="collapse" data-target="#user-dropdown">
                    <div class="avatar">
                        <img class="mr-3 side-user-img" src="https://via.placeholder.com/110x110" alt="user avatar" />
                    </div>
                    <div class="media-body">
                        <h6 class="side-user-name">Mark Johnson</h6>
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
                    <a href="#" class="waves-effect">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="waves-effect">
                        <i class="fa fa-question-circle-o"></i> <span>All Products</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="waves-effect">
                        <i class="fa fa-question-circle"></i> <span>Offers for You</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="waves-effect">
                        <i class="fa fa-shopping-cart"></i> <span>View Cart</span>
                    </a>
                </li>
                <li class="sidebar-header">Quick Actions</li>
                <li>
                    <a href="../pages/contactadmin.php" class="waves-effect"><i class="fa fa-envelope-open"></i>
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