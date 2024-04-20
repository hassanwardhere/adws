<?php
// Include the database connection file
include '../include/config.php';
include '../include/headeruser.php';
?>



<!--Start Dashboard Content-->
<h6 class="text-uppercase">Hybrid offers</h6>
<hr />
<div class="row">
    <?php
    // Fetch hybrid offers from the database
    $stmt = $pdo->query("SELECT * FROM offers WHERE device = 'Hybrid' and status = 'active'");
    $hybridoffers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display each hybrid offer in a card
    foreach ($hybridoffers as $offer) {
    ?>
        <div class="col-12 col-lg-4">
            <div class="card">
                <img src="../assets/images/placeholder800by500hybrid.jpg" class="card-img-top" alt="Card image cap" />
                <div class="card-body">
                    <h4 class="card-title"><?php echo $offer['offername']; ?></h4>
                    <p><?php echo $offer['additionaldetails']; ?></p>
                    <p><b>Price: </b>Ksh/= <?php echo $offer['price']; ?></p>
                    <p><b>Discount: </b><?php echo $offer['discount']; ?>%</p>
                    <p><b>Total You Pay: </b>Ksh/= <?php echo $offer['total']; ?></p>
                    <hr />
                    <a href="subscribe.php?id=<?php echo $offer['id']; ?>" class="btn btn-success btn-sm text-white"> Subscribe</a>
                    <a href="readmore.php?id=<?php echo $offer['id']; ?>" class="btn btn-info btn-sm text-white"> Read More</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<!--End Row-->


<!--Start Dashboard Content-->
<h6 class="text-uppercase">Broadband Only offers</h6>
<hr />
<div class="row">
    <?php
    // Fetch hybrid offers from the database
    $stmt = $pdo->query("SELECT * FROM offers WHERE device = 'Broadband Only' and status = 'active'");
    $Broadbandoffers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display each hybrid offer in a card
    foreach ($Broadbandoffers as $offer) {
    ?>
        <div class="col-12 col-lg-4">
            <div class="card">
                <img src="../assets/images/placeholder800by500broadband.jpg" class="card-img-top" alt="Card image cap" />
                <div class="card-body">
                    <h4 class="card-title"><?php echo $offer['offername']; ?></h4>
                    <p><?php echo $offer['additionaldetails']; ?></p>
                    <p><b>Price: </b>Ksh/= <?php echo $offer['price']; ?></p>
                    <p><b>Discount: </b><?php echo $offer['discount']; ?>%</p>
                    <p><b>Total You Pay: </b>Ksh/= <?php echo $offer['total']; ?></p>
                    <hr />
                    <a href="subscribe.php?id=<?php echo $offer['id']; ?>" class="btn btn-success btn-sm text-white"> Subscribe</a>
                    <a href="readmore.php?id=<?php echo $offer['id']; ?>" class="btn btn-info btn-sm text-white"> Read More</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<!--End Row-->



<!--Start Dashboard Content-->
<h6 class="text-uppercase">Tablet Only offers</h6>
<hr />
<div class="row">
    <?php
    // Fetch hybrid offers from the database
    $stmt = $pdo->query("SELECT * FROM offers WHERE device = 'Tablet Only' and status = 'active'");
    $Tabletoffers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display each hybrid offer in a card
    foreach ($Tabletoffers as $offer) {
    ?>
        <div class="col-12 col-lg-4">
            <div class="card">
                <img src="../assets/images/placeholder800by500tablet.jpg" class="card-img-top" alt="Card image cap" />
                <div class="card-body">
                    <h4 class="card-title"><?php echo $offer['offername']; ?></h4>
                    <p><?php echo $offer['additionaldetails']; ?></p>
                    <p><b>Price: </b>Ksh/= <?php echo $offer['price']; ?></p>
                    <p><b>Discount: </b><?php echo $offer['discount']; ?>%</p>
                    <p><b>Total You Pay: </b>Ksh/= <?php echo $offer['total']; ?></p>
                    <hr />
                    <a href="subscribe.php?id=<?php echo $offer['id']; ?>" class="btn btn-success btn-sm text-white"> Subscribe</a>
                    <a href="readmore.php?id=<?php echo $offer['id']; ?>" class="btn btn-info btn-sm text-white"> Read More</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<!--End Row-->

<!--Start Dashboard Content-->
<h6 class="text-uppercase">Mobile Only offers</h6>
<hr />
<div class="row">
    <?php
    // Fetch hybrid offers from the database
    $stmt = $pdo->query("SELECT * FROM offers WHERE device = 'Mobile Only' and status = 'active'");
    $Mobileoffers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display each hybrid offer in a card
    foreach ($Mobileoffers as $offer) {
    ?>
        <div class="col-12 col-lg-4">
            <div class="card">
                <img src="../assets/images/placeholder800by500mobile.jpg" class="card-img-top" alt="Card image cap" />
                <div class="card-body">
                    <h4 class="card-title"><?php echo $offer['offername']; ?></h4>
                    <p><?php echo $offer['additionaldetails']; ?></p>
                    <p><b>Price: </b>Ksh/= <?php echo $offer['price']; ?></p>
                    <p><b>Discount: </b><?php echo $offer['discount']; ?>%</p>
                    <p><b>Total You Pay: </b>Ksh/= <?php echo $offer['total']; ?></p>
                    <hr />
                    <a href="subscribe.php?id=<?php echo $offer['id']; ?>" class="btn btn-success btn-sm text-white"> Subscribe</a>
                    <a href="readmore.php?id=<?php echo $offer['id']; ?>" class="btn btn-info btn-sm text-white"> Read More</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<!--End Row-->
<?php include '../include/footeruser.php'; ?>