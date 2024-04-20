<?php
// Include the database connection file
include '../include/config.php';
include '../include/headeruser.php';
$offerId = $_GET['id'];
?>

<!--Start Dashboard Content-->
<h6 class="text-uppercase">More Details</h6>
<hr />
<div class="row">
    <?php
    // Fetch hybrid packages from the database
    $stmt = $pdo->query("SELECT * FROM packages WHERE id = '$offerId'");
    $Packages = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display each hybrid package in a card
    foreach ($Packages as $package) {
    ?>
        <div class="col-6 col-lg-4">
            <div class="card">
                <img src="../assets/images/placeholder800by500.jpg" class="card-img-top" alt="Card image cap" />
                <div class="card-body">
                    <h4 class="card-title"><?php echo $package['packagename']; ?></h4>
                    <p><b>Description: </b><?php echo $package['packagedescription']; ?></p>
                    <p><b>Includes: </b><?php echo $package['additionaldetails']; ?></p>
                    <p><b>Price: </b>Ksh/= <?php echo $package['price']; ?></p>
                    <p><b>Discount: </b><?php echo $package['discount']; ?>%</p>
                    <p><b>Total You Pay: </b>Ksh/= <?php echo $package['total']; ?></p>
                    <hr />
                    <a href="allpackages.php" class="btn btn-danger btn-sm text-white">Back</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<!--End Row-->


<?php include '../include/footeruser.php'; ?>