<?php
// Include the database connection file
include '../include/config.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    try {
        // Prepare SQL statement to delete package
        $stmt = $pdo->prepare("DELETE FROM offers WHERE id = :id");
        // Bind parameter
        $stmt->bindParam(':id', $id);
        // Execute the statement
        $stmt->execute();

        // Redirect back to managepackages.php after successful deletion
        header("Location: managespecialoffers.php?alertType=success&alertMessage=Offer deleted successfully");
        exit();
    } catch (PDOException $e) {
        // Display error message if query fails
        echo "Error: " . $e->getMessage();
    }
}
?>
