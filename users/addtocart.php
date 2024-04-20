<?php
// Start session
// Include database connection file
include '../include/config.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: ../auth/login.php");
    exit();
}

// Check if package ID is provided in the URL
if (!isset($_GET['id'])) {
    // Redirect to an error page or previous page with an error message
    header("Location: error.php");
    exit();
}

// Get the package ID from the URL
$packageId = $_GET['id'];

// Fetch package details from the database
$stmt = $pdo->prepare("SELECT * FROM packages WHERE id = ?");
$stmt->execute([$packageId]);
$package = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the package exists
if (!$package) {
    // Redirect to an error page or previous page with an error message
    header("Location: error.php");
    exit();
}

// Extract package details
$packageName = $package['packagename'];
$additionalDetails = $package['additionaldetails'];
$device = $package['device'];
$price = $package['price'];
$discount = $package['discount'];
$totalPaid = $package['total'];
$validity = $package['validity'];

// Get user ID from session
$userId = $_SESSION['user_id'];

// Insert order details into the cart table
$stmt = $pdo->prepare("INSERT INTO cart (packageid, userid, packagename, additionaldetails, device, price, discount, totalpaid, validity) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([$packageId, $userId, $packageName, $additionalDetails, $device, $price, $discount, $totalPaid, $validity]);


// Redirect to viewcart.php
header("Location: viewcart.php?alertType=success&alertMessage=Package Added to Cart successfully");
exit();

?>