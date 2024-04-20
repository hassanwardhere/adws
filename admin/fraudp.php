<?php
// Include the database connection file
include '../include/config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

// Fetch order ID from the URL
$orderId = isset($_GET['id']) ? $_GET['id'] : '';

// Update order status to Processing
$stmt = $pdo->prepare("UPDATE `order` SET status = 'Fraud' WHERE id = ?");
$stmt->execute([$orderId]);

// Fetch user email
$stmt = $pdo->prepare("SELECT users.email FROM `order` INNER JOIN users ON `order`.userid = users.id WHERE `order`.id = ?");
$stmt->execute([$orderId]);
$userEmail = $stmt->fetchColumn();

// Send email notification
sendStatusChangeEmail($userEmail, 'Fraud');

// Redirect back to order details page
header("Location: processorderp.php?alertType=success&alertMessage=Package Set to Processed successfully");
exit();

// Function to send email for status change
function sendStatusChangeEmail($email, $status)
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
        $mail->Subject = 'Order Status Update';
        $mail->Body    = "Your order status has been updated to $status.";

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
