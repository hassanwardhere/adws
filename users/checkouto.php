<?php
// Include the database connection file
include '../include/config.php';
include '../include/headeruser.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

// Get user ID
$userid = $_SESSION['user_id'];

// Fetch user information from the users table
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$userid]);
$userInfo = $stmt->fetch(PDO::FETCH_ASSOC);

// Fetch cart ID from URL
$cartId = isset($_GET['id']) ? $_GET['id'] : '';

// Fetch offer information from the cart table
$stmt = $pdo->prepare("SELECT * FROM carto WHERE id = ?");
$stmt->execute([$cartId]);
$offerInfo = $stmt->fetch(PDO::FETCH_ASSOC);

// Fetch offer information from the offers table using the offer ID from the cart
$offerId = $offerInfo['offerid'];
$stmt = $pdo->prepare("SELECT * FROM offers WHERE id = ?");
$stmt->execute([$offerId]);
$offerDetails = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if form is submitted
if (isset($_POST['checkout'])) {
    // Extract form data
    $namesOnCard = $_POST['names'];
    $creditCardNumber = $_POST['creditcardnumber'];
    $expiryDate = $_POST['expirydate'];
    $csvNumber = $_POST['csv'];

    // Insert order information into the orders table
    $insertOrderStmt = $pdo->prepare("INSERT INTO `ordero` (offerid, userid, cartid, offername, additionaldetails, device, price, discount, totalpaid, validity, status, namesoncreditcard, creditcardnumber, expiredate, csvnumber) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $insertOrderStmt->execute([$offerDetails['id'], $userid, $cartId, $offerDetails['offername'], $offerDetails['additionaldetails'], $offerDetails['device'], $offerDetails['price'], $offerDetails['discount'], $offerDetails['total'], $offerDetails['validity'], 'Pending', $namesOnCard, $creditCardNumber, $expiryDate, $csvNumber]);

    // Send emails
    sendOrderPlacementEmail($userInfo['email']);
    sendThankYouEmail($userInfo['email']);

    // Redirect to myprofile.php
    header("Location: myprofile.php");
    exit();
}

// Function to send email for order placement awaiting confirmation
function sendOrderPlacementEmail($email)
{
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'mail.tayoinc.com'; // SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'test@tayoinc.com'; // SMTP username
        $mail->Password   = 'Hassan135790,.';     // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        $mail->Port       = 587;  // TCP port to connect to

        //Recipients
        $mail->setFrom('test@tayoinc.com', 'You Placed an Order');
        $mail->addAddress($email); // Add a recipient

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Order Placement Awaiting Confirmation';
        $mail->Body    = 'Your order has been placed and is awaiting confirmation.';

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Function to send email for thank you after placing the order
function sendThankYouEmail($email)
{
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'mail.tayoinc.com'; // SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'test@tayoinc.com'; // SMTP username
        $mail->Password   = 'Hassan135790,.';     // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        $mail->Port       = 587;  // TCP port to connect to


        //Recipients
        $mail->setFrom('newcargo@tayoinc.com', 'Thank You');
        $mail->addAddress($email); // Add a recipient

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Thank You for Placing an Order';
        $mail->Body    = 'Thank you for placing an order with us.';

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>



<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Checkout</h4>
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
                <h5>Checkout
                    <span>
                        <a href="viewcart.php" class="btn btn-danger float-right" style="margin-left: 10px;">Back</a>
                    </span>
                </h5>
            </div>
            <div class="card-body">
                <h5>Your Information</h5>
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
                <h5>offer Information</h5>
                <hr>
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $offerDetails['offername']; ?></h4>
                                <p><?php echo $offerDetails['additionaldetails']; ?></p>
                                <p><b>Price: </b>Ksh/= <?php echo $offerDetails['price']; ?></p>
                                <p><b>Discount: </b><?php echo $offerDetails['discount']; ?>%</p>
                                <p><b>Total You Pay: </b>Ksh/= <?php echo $offerDetails['total']; ?></p>
                                <hr />
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <br>
                <h5>Payment Information</h5>
                <hr>
                <form method="POST">
                    <div class="card shadow">
                        <div class="card-body">
                            <h4 class="card-title">Credit Card</h4>
                            <div class="row">
                                <div class="col">
                                    <label for="names">Names on the Card: </label>
                                    <input type="text" id="names" name="names" class="form-control input-shadow" placeholder="Enter Names on the card" required>
                                </div>
                                <div class="col">
                                    <label for="creditcardnumber">Credit Card Number: </label>
                                    <input type="text" id="creditcardnumber" name="creditcardnumber" class="form-control input-shadow" placeholder="Enter Your 16 Digit Card Number" required>
                                </div>
                                <div class="col">
                                    <label for="expirydate">Expire Date: </label>
                                    <input type="text" id="expirydate" name="expirydate" class="form-control input-shadow" placeholder="Enter Expire Date" required>
                                </div>
                                <div class="col">
                                    <label for="csv">CSV Number: </label>
                                    <input type="text" id="csv" name="csv" class="form-control input-shadow" placeholder="Enter CSV Number" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" name="checkout" class="btn btn-success">Checkout</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../include/footeruser.php'; ?>