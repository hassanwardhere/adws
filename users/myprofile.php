<?php
// Include the database connection file
include '../include/config.php';
include '../include/headeruser.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: ../auth/login.php");
    exit();
}
// Retrieve user details
$userId = $_SESSION['user_id'];
$userDetailsStmt = $pdo->prepare("SELECT * FROM users WHERE id = :user_id LIMIT 1");
$userDetailsStmt->bindParam(':user_id', $userId);
$userDetailsStmt->execute();
$userDetails = $userDetailsStmt->fetch(PDO::FETCH_ASSOC);

// Retrieve credit card information
$creditCardStmt = $pdo->prepare("SELECT * FROM `order` WHERE userid = :user_id LIMIT 1");
$creditCardStmt->bindParam(':user_id', $userId);
$creditCardStmt->execute();
$creditCard = $creditCardStmt->fetch(PDO::FETCH_ASSOC);

// Retrieve subscription details from both order and ordero tables
$subscriptionStmt = $pdo->prepare("SELECT * FROM `order` WHERE userid = :user_id LIMIT 1");
$subscriptionStmt->bindParam(':user_id', $userId);
$subscriptionStmt->execute();
$packageSubscription = $subscriptionStmt->fetch(PDO::FETCH_ASSOC);

$subscriptionStmt = $pdo->prepare("SELECT * FROM `ordero` WHERE userid = :user_id LIMIT 1");
$subscriptionStmt->bindParam(':user_id', $userId);
$subscriptionStmt->execute();
$offerSubscription = $subscriptionStmt->fetch(PDO::FETCH_ASSOC);
?>

<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">User Profile</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
        </ol>
    </div>
</div>
<!-- End Breadcrumb-->

<div class="row">
    <div class="col-lg-4">
        <div class="card profile-card-2">
            <div class="card-img-block">
                <img class="img-fluid" src="../assets/images/placeholder800by500.jpg" alt="Card image cap" />
            </div>
            <div class="card-body pt-5">
                <img src="../assets/images/placeholder110by110.jpg" alt="profile-image" class="profile" />
                <h5 class="card-title"><?php echo $userDetails['firstname']; ?>
                <a href="../users/updatemyinfo.php?userid=<?php echo $userId; ?>" class="btn btn-info btn-sm float-right">Edit Profile</a></h5>
                <p class="card-text">Welcome.</p>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                    <li class="nav-item">
                        <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active"><i class="icon-user"></i>
                            <span class="hidden-xs">Profile Details</span></a>
                    </li>
                </ul>
                <div class="tab-content p-3">
                    <div class="tab-pane active" id="profile">
                        <h5 class="mb-3">Your Details</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <h6>About</h6>
                                <p><b>First Name:</b> <?php echo $userDetails['firstname']; ?><br>
                                    <b>Middle Name:</b> <?php echo $userDetails['middlename']; ?><br>
                                    <b>Last Name:</b> <?php echo $userDetails['lastname']; ?><br>
                                    <b>Address:</b> <?php echo $userDetails['address']; ?><br>
                                </p>
                            </div>
                        </div>
                        <!--/row-->
                        <h6 class="text-uppercase">Payment Methods</h6>
                        <hr />
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <?php if ($creditCard) : ?>
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <div class="card-title">
                                                Credit Card: <?php echo $creditCard['namesoncreditcard']; ?>
                                                <div class="card-action">
                                                    <div class="dropdown">
                                                        <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                                                            <i class="icon-options"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="javascript:void();">Edit</a>
                                                            <a class="dropdown-item" href="javascript:void();">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6>
                                                Card Number: <small><?php echo $creditCard['creditcardnumber']; ?></small><br>
                                                Expiry Date: <small><?php echo $creditCard['expiredate']; ?></small>
                                            </h6>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <p>No credit card info found. Please make an order to store one.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!--End Row-->
                        <h6 class="text-uppercase">Your Subscriptions</h6>
                        <hr />
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <?php if ($packageSubscription) : ?>
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <div class="card-title">
                                                Package Name: <?php echo $packageSubscription['packagename']; ?>
                                                <div class="card-action">
                                                    <div class="dropdown">
                                                        <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                                                            <i class="icon-options"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="javascript:void();">Renew</a>
                                                            <a class="dropdown-item" href="javascript:void();">End Subscription</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6>
                                                Type: <small><?php echo $packageSubscription['device']; ?></small><br>
                                                Price: <small>Ksh /= <?php echo $packageSubscription['price']; ?></small><br>
                                                Expiry Date: <small><?php echo $packageSubscription['validity']; ?></small>
                                            </h6>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <p>No Packages Subscriptions.</p>
                                <?php endif; ?>
                            </div>
                            <div class="col-12 col-lg-6">
                                <?php if ($offerSubscription) : ?>
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <div class="card-title">
                                                Offer Name: <?php echo $offerSubscription['offername']; ?>
                                                <div class="card-action">
                                                    <div class="dropdown">
                                                        <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                                                            <i class="icon-options"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="javascript:void();">Renew</a>
                                                            <a class="dropdown-item" href="javascript:void();">End Subscription</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6>
                                                Type: <small><?php echo $offerSubscription['device']; ?></small><br>
                                                Price: <small>Ksh /= <?php echo $offerSubscription['price']; ?></small><br>
                                                Expiry Date: <small><?php echo $offerSubscription['validity']; ?></small>
                                            </h6>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <p>No Offers Subscriptions.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!--End Row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End row -->

<?php include '../include/footeruser.php'; ?>