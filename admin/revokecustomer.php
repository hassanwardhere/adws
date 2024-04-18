<?php
// Include the database connection file
include '../include/config.php';

// Check if user ID is provided in the URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Prepare SQL statement to update user status to "deactivated"
        $stmt = $pdo->prepare("UPDATE users SET status = 'deactivated' WHERE id = :id");

        // Bind parameters
        $stmt->bindParam(':id', $id);

        // Execute the statement
        $stmt->execute();

        // Redirect back to managecustomers.php with success message
        header("Location: managecustomers.php?alertType=success&alertMessage=User deactivated successfully");
        exit();
    } catch (PDOException $e) {
        // Redirect back to managecustomers.php with error message if query fails
        header("Location: managecustomers.php?alertType=danger&alertMessage=Failed to deactivate user");
        exit();
    }
} else {
    // If ID is not provided, redirect back to managecustomers.php with an alert
    header("Location: managecustomers.php?alertType=danger&alertMessage=User ID not provided");
    exit();
}
?>
