<?php include '../include/config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Cheaps Deals</title>
    <!-- Vector CSS -->
    <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- simplebar CSS-->
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="assets/css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <!-- Horizontal menu CSS-->
    <link href="assets/css/horizontal-menu.css" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="assets/css/app-style.css" rel="stylesheet" />


</head>

<body>
    <!-- Start wrapper-->
    <div id="wrapper">
        <!--Start topbar header-->
        <header class="topbar-nav">
            <nav class="navbar navbar-expand">
                <ul class="navbar-nav mr-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void();">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <h5 class="logo-text"><b>Cheap Deals</b></h5>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav align-items-right">
                    <li class="nav-item">
                        <a class="btn btn-info" href="../auth/login.php"> Login / Register </a>
                    </li>
                </ul>
            </nav>
        </header>
        <!--End topbar header-->



        <div class="clearfix"></div>

        <div class="content-wrapper">
            <div class="container-fluid">

                <!--Start Dashboard Content-->
                <h6 class="text-uppercase">Hybrid Packages</h6>
                <hr />
                <div class="row">
                    <?php
                    // Fetch hybrid packages from the database
                    $stmt = $pdo->query("SELECT * FROM packages WHERE device = 'Hybrid'");
                    $hybridPackages = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Display each hybrid package in a card
                    foreach ($hybridPackages as $package) {
                    ?>
                        <div class="col-12 col-lg-4">
                            <div class="card">
                                <img src="../assets/images/placeholder800by500hybrid.jpg" class="card-img-top" alt="Card image cap" />
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $package['packagename']; ?></h4>
                                    <p><?php echo $package['additionaldetails']; ?></p>
                                    <p><b>Price: </b>Ksh/= <?php echo $package['price']; ?></p>
                                    <p><b>Discount: </b><?php echo $package['discount']; ?>%</p>
                                    <p><b>Total You Pay: </b>Ksh/= <?php echo $package['total']; ?></p>
                                    <hr />
                                    <a href="../users/../users/addtocart.php?id=<?php echo $package['id']; ?>" class="btn btn-success btn-sm text-white"> Subscribe</a>
                                    <a href="../users/packagedetails.php?id=<?php echo $package['id']; ?>" class="btn btn-info btn-sm text-white"> Read More</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!--End Row-->


                <!--Start Dashboard Content-->
                <h6 class="text-uppercase">Broadband Only Packages</h6>
                <hr />
                <div class="row">
                    <?php
                    // Fetch hybrid packages from the database
                    $stmt = $pdo->query("SELECT * FROM packages WHERE device = 'Broadband Only'");
                    $BroadbandPackages = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Display each hybrid package in a card
                    foreach ($BroadbandPackages as $package) {
                    ?>
                        <div class="col-12 col-lg-4">
                            <div class="card">
                                <img src="../assets/images/placeholder800by500broadband.jpg" class="card-img-top" alt="Card image cap" />
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $package['packagename']; ?></h4>
                                    <p><?php echo $package['additionaldetails']; ?></p>
                                    <p><b>Price: </b>Ksh/= <?php echo $package['price']; ?></p>
                                    <p><b>Discount: </b><?php echo $package['discount']; ?>%</p>
                                    <p><b>Total You Pay: </b>Ksh/= <?php echo $package['total']; ?></p>
                                    <hr />
                                    <a href="../users/addtocart.php?id=<?php echo $package['id']; ?>" class="btn btn-success btn-sm text-white"> Subscribe</a>
                                    <a href="../users/packagedetails.php?id=<?php echo $package['id']; ?>" class="btn btn-info btn-sm text-white"> Read More</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!--End Row-->



                <!--Start Dashboard Content-->
                <h6 class="text-uppercase">Tablet Only Packages</h6>
                <hr />
                <div class="row">
                    <?php
                    // Fetch hybrid packages from the database
                    $stmt = $pdo->query("SELECT * FROM packages WHERE device = 'Tablet Only'");
                    $TabletPackages = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Display each hybrid package in a card
                    foreach ($TabletPackages as $package) {
                    ?>
                        <div class="col-12 col-lg-4">
                            <div class="card">
                                <img src="../assets/images/placeholder800by500tablet.jpg" class="card-img-top" alt="Card image cap" />
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $package['packagename']; ?></h4>
                                    <p><?php echo $package['additionaldetails']; ?></p>
                                    <p><b>Price: </b>Ksh/= <?php echo $package['price']; ?></p>
                                    <p><b>Discount: </b><?php echo $package['discount']; ?>%</p>
                                    <p><b>Total You Pay: </b>Ksh/= <?php echo $package['total']; ?></p>
                                    <hr />
                                    <a href="../users/addtocart.php?id=<?php echo $package['id']; ?>" class="btn btn-success btn-sm text-white"> Subscribe</a>
                                    <a href="../users/packagedetails.php?id=<?php echo $package['id']; ?>" class="btn btn-info btn-sm text-white"> Read More</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!--End Row-->

                <!--Start Dashboard Content-->
                <h6 class="text-uppercase">Mobile Only Packages</h6>
                <hr />
                <div class="row">
                    <?php
                    // Fetch hybrid packages from the database
                    $stmt = $pdo->query("SELECT * FROM packages WHERE device = 'Mobile Only'");
                    $MobilePackages = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Display each hybrid package in a card
                    foreach ($MobilePackages as $package) {
                    ?>
                        <div class="col-12 col-lg-4">
                            <div class="card">
                                <img src="../assets/images/placeholder800by500mobile.jpg" class="card-img-top" alt="Card image cap" />
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $package['packagename']; ?></h4>
                                    <p><?php echo $package['additionaldetails']; ?></p>
                                    <p><b>Price: </b>Ksh/= <?php echo $package['price']; ?></p>
                                    <p><b>Discount: </b><?php echo $package['discount']; ?>%</p>
                                    <p><b>Total You Pay: </b>Ksh/= <?php echo $package['total']; ?></p>
                                    <hr />
                                    <a href="../users/addtocart.php?id=<?php echo $package['id']; ?>" class="btn btn-success btn-sm text-white"> Subscribe</a>
                                    <a href="../users/packagedetails.php?id=<?php echo $package['id']; ?>" class="btn btn-info btn-sm text-white"> Read More</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!--End Row-->

                <!--End Dashboard Content-->
                <!--start overlay-->
                <div class="overlay toggle-menu"></div>
                <!--end overlay-->
            </div>
            <!-- End container-fluid-->

        </div><!--End content-wrapper-->
        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->

        <!--Start footer-->
        <footer class="footer">
            <div class="container">
                <div class="text-center">
                    Copyright © 2024 Cheap Deals - All Rights Reserved.
                </div>
            </div>
        </footer>
        <!--End footer-->


    </div><!--End wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- simplebar js -->
    <script src="assets/plugins/simplebar/js/simplebar.js"></script>
    <!-- horizontal-menu js -->
    <script src="assets/js/horizontal-menu.js"></script>
    <!-- loader scripts -->
    <script src="assets/js/jquery.loading-indicator.js"></script>
    <!-- Custom scripts -->
    <script src="assets/js/app-script.js"></script>
    <!-- Chart js -->

    <script src="assets/plugins/Chart.js/Chart.min.js"></script>
    <!-- Vector map JavaScript -->
    <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- Easy Pie Chart JS -->
    <script src="assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
    <!-- Sparkline JS -->
    <script src="assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
    <script src="assets/plugins/jquery-knob/excanvas.js"></script>
    <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>

    <script>
        $(function() {
            $(".knob").knob();
        });
    </script>
    <!-- Index js -->
    <script src="assets/js/index.js"></script>


</body>

</html>