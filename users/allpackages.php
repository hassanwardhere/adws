<?php
// Include the database connection file
include '../include/config.php';
include '../include/headeruser.php';

// Initialize searchResult array
$searchResult = [];

// Check if search query is submitted
if (isset($_POST['search'])) {
    // Retrieve search query
    $searchQuery = $_POST['searchQuery'];

    // Fetch packages from the database based on the search query
    $stmt = $pdo->prepare("SELECT * FROM packages WHERE packagename LIKE :search_query OR additionaldetails LIKE :search_query");
    $stmt->bindValue(':search_query', '%' . $searchQuery . '%');
    $stmt->execute();
    $searchResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<div class="card">
    <div class="card-header text-uppercase">Search for a Package</div>
    <div class="card-body">
        <form action="" method="POST">
            <div class="input-group">
                <input type="text" class="form-control" name="searchQuery" placeholder="Enter keywords">
                <div class="input-group-append">
                    <button class="btn btn-outline-success" type="submit" name="search">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!--Start Dashboard Content-->
<?php if (!empty($searchResult)) : ?>
    <?php foreach ($searchResult as $package) : ?>
        <div class="col-12 col-lg-4">
            <div class="card">
                <img src="../assets/images/placeholder800by500.jpg" class="card-img-top" alt="Card image cap" />
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
    <?php endforeach; ?>
<?php endif; ?>
<!--End Dashboard Content-->












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