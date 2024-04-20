<?php
// Start session
// Include database connection file
include '../include/config.php';
session_start();
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

// Check if offer ID is provided in the URL
if (!isset($_GET['id'])) {
    // Redirect to an error page or previous page with an error message
    header("Location: error.php");
    exit();
}

// Get the offer ID from the URL
$offerId = $_GET['id'];

// Fetch offer details from the database
$stmt = $pdo->prepare("SELECT * FROM offers WHERE id = ?");
$stmt->execute([$offerId]);
$offer = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the offer exists
if (!$offer) {
    // Redirect to an error page or previous page with an error message
    header("Location: error.php");
    exit();
}

// Extract offer details
$offerName = $offer['offername'];
$additionalDetails = $offer['additionaldetails'];
$device = $offer['device'];
$price = $offer['price'];
$discount = $offer['discount'];
$totalPaid = $offer['total'];
$validity = $offer['validity'];

// Get user ID from session
$userId = $_SESSION['user_id'];

// Insert order details into the cart table
$stmt = $pdo->prepare("INSERT INTO carto (offerid, userid, offername, additionaldetails, device, price, discount, totalpaid, validity) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([$offerId, $userId, $offerName, $additionalDetails, $device, $price, $discount, $totalPaid, $validity]);


// Redirect to viewcart.php
header("Location: viewcarto.php?alertType=success&alertMessage=offer Added to Cart successfully");
exit();

?>