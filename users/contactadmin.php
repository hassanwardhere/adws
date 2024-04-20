<?php
include '../include/config.php';
include '../include/headeruser.php';
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['contactadmin'])) {
    // Retrieve form data
    // Get user ID from session
    $userId = $_SESSION['user_id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Insert form data into the contactadmin table
    try {
        $stmt = $pdo->prepare("INSERT INTO contactadmin (userid, fullnames, email, subject, message) VALUES (:userid, :fullname, :email, :subject, :message)");
        $stmt->bindParam(':userid', $userId);
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':message', $message);
        $stmt->execute();

        // Send email to admin
        $mail = new PHPMailer(true);
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'mail.tayoinc.com'; // SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'test@tayoinc.com'; // SMTP username
        $mail->Password   = 'Hassan135790,.';     // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        $mail->Port       = 587;  // TCP port to connect to

        // Sender and recipient settings
        $mail->setFrom($email, $fullname);
        $mail->addAddress('tayadahost@gmail.com'); // Admin email address
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Send email
        $mail->send();

        echo "Message sent successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}
?>

<div class="row">
    <div class="col-12 col-lg-4 mx-auto">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                    </div>
                    <button type="submit" name="contactadmin" class="btn btn-success">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../include/footeruser.php'; ?>