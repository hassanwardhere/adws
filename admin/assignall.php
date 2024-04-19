<?php
// Include the database connection file
include '../include/config.php';

// Check if the offer ID is provided in the URL
if(isset($_GET['id'])) {
    $offer_id = $_GET['id'];
    $userid = $_SESSION['user_id'];

    // Logic to assign the offer to all users
    try {
        // Insert assignment records for all users
        $stmt = $pdo->prepare("INSERT INTO offerassign (offerid, userid, assignedto) SELECT ?, id, 'all' FROM users WHERE role = 'User' AND status = 'active'");
        $stmt->execute([$offer_id]);

        // Redirect back to the manageoffers.php page with success message
        header("Location: managespecialoffers.php?alertType=success&alertMessage=Offer assigned to all users successfully.");
        exit();
    } catch(PDOException $e) {
        // Redirect back to the manageoffers.php page with error message
        header("Location: managespecialoffers.php?alertType=danger&alertMessage=Error assigning offer to all users: " . $e->getMessage());
        exit();
    }
} else {
    // Redirect back to the manageoffers.php page if offer ID is not provided
    header("Location: managespecialoffers.php?alertType=danger&alertMessage=Offer ID not provided.");
    exit();
}
?>
