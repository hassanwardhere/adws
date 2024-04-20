<?php
// Include the database connection file
include '../include/config.php';
include '../include/headeradmin.php';

// Fetch order ID from the URL
$orderId = isset($_GET['id']) ? $_GET['id'] : '';

// Fetch order details
$stmt = $pdo->prepare("SELECT `order`.*, users.*, packages.* FROM `order` 
                        INNER JOIN users ON `order`.userid = users.id 
                        INNER JOIN packages ON `order`.packageid = packages.id 
                        WHERE `order`.id = ?");
$stmt->execute([$orderId]);
$orderDetails = $stmt->fetch(PDO::FETCH_ASSOC);

// Extract user details
$userInfo = array(
    'firstname' => $orderDetails['firstname'],
    'middlename' => $orderDetails['middlename'],
    'lastname' => $orderDetails['lastname'],
    'phonenumber' => $orderDetails['phonenumber'],
    'email' => $orderDetails['email'],
    'gender' => $orderDetails['gender'],
    'address' => $orderDetails['address']
);

// Extract package details
$packageDetails = array(
    'packagename' => $orderDetails['packagename'],
    'additionaldetails' => $orderDetails['additionaldetails'],
    'price' => $orderDetails['price'],
    'discount' => $orderDetails['discount'],
    'total' => $orderDetails['totalpaid']
);

// Extract credit card details
$creditCardDetails = array(
    'names' => $orderDetails['namesoncreditcard'],
    'creditcardnumber' => $orderDetails['creditcardnumber'],
    'expirydate' => $orderDetails['expiredate'],
    'csv' => $orderDetails['csvnumber']
);
?>

<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Order Details</h4>
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
        </ol>
    </div>
</div>
<!-- End Breadcrumb-->
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h5>Order Details
                    <span>
                        <a href="processorderp.php" class="btn btn-danger float-right" style="margin-left: 10px;">Back</a>
                    </span>
                </h5>
            </div>
            <div class="card-body">
                <h5> Information</h5>
                <hr>
                <div class="form-group">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <label for="firstname">First Name: </label>
                                <input type="text" id="firstname" name="firstname" class="form-control input-shadow" value="<?php echo $userInfo['firstname']; ?>" readonly>
                            </div>
                            <div class="col">
                                <label for="middlename">Middle Name: </label>
                                <input type="text" id="middlename" name="middlename" class="form-control input-shadow" value="<?php echo $userInfo['middlename']; ?>" readonly>
                            </div>
                            <div class="col">
                                <label for="lastname">Last Name: </label>
                                <input type="text" id="lastname" name="lastname" class="form-control input-shadow" value="<?php echo $userInfo['lastname']; ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="phonenumber">Phone Number: </label>
                                <input type="tel" id="phonenumber" name="phonenumber" class="form-control input-shadow" value="<?php echo $userInfo['phonenumber']; ?>" readonly>
                            </div>
                            <div class="col">
                                <label for="email">Email: </label>
                                <input type="email" id="email" name="email" class="form-control input-shadow" value="<?php echo $userInfo['email']; ?>" readonly>
                            </div>
                            <div class="col">
                                <label for="gender">Your Gender: </label>
                                <input type="text" id="gender" name="gender" class="form-control input-shadow" value="<?php echo $userInfo['gender']; ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="address">Address: </label>
                                <input type="text" id="address" name="address" class="form-control input-shadow" value="<?php echo $userInfo['address']; ?>" readonly>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                <hr>
                <br>
                <h5>Package Ordered Information</h5>
                <hr>
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $packageDetails['packagename']; ?></h4>
                                <p><?php echo $packageDetails['additionaldetails']; ?></p>
                                <p><b>Price: </b>Ksh/= <?php echo $packageDetails['price']; ?></p>
                                <p><b>Discount: </b><?php echo $packageDetails['discount']; ?>%</p>
                                <p><b>Total You Pay: </b>Ksh/= <?php echo $packageDetails['total']; ?></p>
                                <hr />
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <br>
                <h5>Payment Information</h5>
                <hr>
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title">Credit Card</h4>
                        <div class="row">
                            <div class="col">
                                <label for="names">Names on the Card: </label>
                                <input type="text" id="names" name="names" class="form-control input-shadow" value="<?php echo $creditCardDetails['names']; ?>" readonly>
                            </div>
                            <div class="col">
                                <label for="creditcardnumber">Credit Card Number: </label>
                                <input type="text" id="creditcardnumber" name="creditcardnumber" class="form-control input-shadow" value="<?php echo $creditCardDetails['creditcardnumber']; ?>" readonly>
                            </div>
                            <div class="col">
                                <label for="expirydate">Expire Date: </label>
                                <input type="text" id="expirydate" name="expirydate" class="form-control input-shadow" value="<?php echo $creditCardDetails['expirydate']; ?>" readonly>
                            </div>
                            <div class="col">
                                <label for="csv">CSV Number: </label>
                                <input type="text" id="csv" name="csv" class="form-control input-shadow" value="<?php echo $creditCardDetails['csv']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="processingp.php?id=<?php echo $orderId; ?>" class="btn btn-info">Set to Processing</a>
                <a href="processedp.php?id=<?php echo $orderId; ?>" class="btn btn-info">Set to Processed</a>
                <a href="approvedp.php?id=<?php echo $orderId; ?>" class="btn btn-success">Set to Approved</a>
                <a href="orderdenyp.php?id=<?php echo $orderId; ?>" class="btn btn-danger">Set to Denied</a>
                <a href="fraudp.php?id=<?php echo $orderId; ?>" class="btn btn-danger">Set to Fraud</a>
            </div>
        </div>
    </div>
</div>

<?php include '../include/footeradmin.php'; ?>
