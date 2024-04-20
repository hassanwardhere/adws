<?php
// Include the database connection file
include '../include/config.php';
include '../include/headeruser.php';
?>



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
                    <a href="addtocart.php?id=<?php echo $package['id']; ?>" class="btn btn-success btn-sm text-white"> Subscribe</a>
                    <a href="packagedetails.php?id=<?php echo $package['id']; ?>" class="btn btn-info btn-sm text-white"> Read More</a>
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
                    <a href="addtocart.php?id=<?php echo $package['id']; ?>" class="btn btn-success btn-sm text-white"> Subscribe</a>
                    <a href="packagedetails.php?id=<?php echo $package['id']; ?>" class="btn btn-info btn-sm text-white"> Read More</a>
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
                    <a href="addtocart.php?id=<?php echo $package['id']; ?>" class="btn btn-success btn-sm text-white"> Subscribe</a>
                    <a href="packagedetails.php?id=<?php echo $package['id']; ?>" class="btn btn-info btn-sm text-white"> Read More</a>
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
                    <a href="addtocart.php?id=<?php echo $package['id']; ?>" class="btn btn-success btn-sm text-white"> Subscribe</a>
                    <a href="packagedetails.php?id=<?php echo $package['id']; ?>" class="btn btn-info btn-sm text-white"> Read More</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<!--End Row-->
<?php include '../include/footeruser.php'; ?>