<?php
// Include the database connection file
include '../include/config.php';
include '../include/headeruser.php';
// Include PHPMailer and configure email settings
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: ../auth/login.php");
    exit();
}

// Check if user ID is provided in the URL
if (!isset($_GET['userid']) || empty($_GET['userid'])) {
    // Redirect back to profile page if user ID is missing
    header("Location: myprofile.php");
    exit();
}

// Retrieve user ID from the URL
$userId = $_GET['userid'];

// Retrieve user details based on the provided user ID
$userDetailsStmt = $pdo->prepare("SELECT * FROM users WHERE id = :user_id LIMIT 1");
$userDetailsStmt->bindParam(':user_id', $userId);
$userDetailsStmt->execute();
$user = $userDetailsStmt->fetch(PDO::FETCH_ASSOC);

// Check if user exists
if (!$user) {
    // Redirect back to profile page if user does not exist
    header("Location: myprofile.php");
    exit();
}

// Check if the form is submitted for update
if (isset($_POST['update'])) {
    // Retrieve updated user information from the form
    $firstname = htmlspecialchars($_POST['firstname']);
    $middlename = htmlspecialchars($_POST['middlename']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $phonenumber = htmlspecialchars($_POST['phonenumber']);
    $email = htmlspecialchars($_POST['email']);
    $gender = htmlspecialchars($_POST['gender']);
    $address = htmlspecialchars($_POST['address']);
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    try {
        // Prepare SQL statement to update user data
        $updateStmt = $pdo->prepare("UPDATE users SET firstname = :firstname, middlename = :middlename, lastname = :lastname, phonenumber = :phonenumber, email = :email, gender = :gender, address = :address, username = :username, password = :password WHERE id = :user_id");

        // Bind parameters
        $updateStmt->bindParam(':firstname', $firstname);
        $updateStmt->bindParam(':middlename', $middlename);
        $updateStmt->bindParam(':lastname', $lastname);
        $updateStmt->bindParam(':phonenumber', $phonenumber);
        $updateStmt->bindParam(':email', $email);
        $updateStmt->bindParam(':gender', $gender);
        $updateStmt->bindParam(':address', $address);
        $updateStmt->bindParam(':username', $username);
        $updateStmt->bindParam(':password', $password);
        $updateStmt->bindParam(':user_id', $userId);

        // Execute the statement
        $updateStmt->execute();

        // Send email notification about the update using PHPMailer


        // Send emails using PHPMailer
        $mailer = new PHPMailer(true);

        // Set mailer to use SMTP
        $mailer->isSMTP();
        $mailer->Host = 'mail.tayoinc.com'; // Your SMTP host
        $mailer->SMTPAuth = true;
        $mailer->Username = 'test@tayoinc.com'; // Your SMTP username
        $mailer->Password = 'Hassan135790,.'; // Your SMTP password
        $mailer->SMTPSecure = 'tls';
        $mailer->Port = 587;

        // Set email content and send it
        $mailer->setFrom('test@tayoinc.com', 'Cheap Deals LTD');
        $mailer->addAddress($email);
        $mailer->Subject = 'Your information has been updated';
        $mailer->Body = 'Dear ' . $firstname . ',<br><br>Your information has been successfully updated.<br><br>Best regards,<br>Your Company';

        // Send the email
        if ($mailer->send()) {
            // Redirect back to profile page after successful update and email sent
            header("Location: myprofile.php?alertType=success&alertMessage=Your information has been successfully updated. Email notification sent.");
            exit();
        } else {
            // Redirect back to profile page if email sending failed
            header("Location: myprofile.php?alertType=danger&alertMessage=Your information has been updated, but there was an error sending the email notification.");
            exit();
        }
    } catch (PDOException $e) {
        // Display error message if update fails
        echo "Update failed: " . $e->getMessage();
    }
}
?>

<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">My Info</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
        </ol>
    </div>
</div>
<!-- End Breadcrumb-->

<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header">
                <h4>
                    Update My Info
                    <a href="myprofile.php" class="btn btn-danger float-right">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="card-title"><strong><span style="color: black;">My Information</span></strong></div>
                    <hr>
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="firstname">First Name: </label>
                                <input type="text" id="firstname" name="firstname" class="form-control input-shadow" placeholder="Enter Your First Name" value="<?php echo $user['firstname']; ?>">
                            </div>
                            <div class="col">
                                <label for="middlename">Middle Name: </label>
                                <input type="text" id="middlename" name="middlename" class="form-control input-shadow" placeholder="Enter Your Middle Name" value="<?php echo $user['middlename']; ?>">
                            </div>
                            <div class="col">
                                <label for="lastname">Last Name: </label>
                                <input type="text" id="lastname" name="lastname" class="form-control input-shadow" placeholder="Enter Your Last Name" value="<?php echo $user['lastname']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="phonenumber">Phone Number: </label>
                                <input type="tel" id="phonenumber" name="phonenumber" class="form-control input-shadow" placeholder="Enter Your Phone Number" value="<?php echo $user['phonenumber']; ?>">
                            </div>
                            <div class="col">
                                <label for="email">Email: </label>
                                <input type="email" id="email" name="email" class="form-control input-shadow" placeholder="Enter Your Email" value="<?php echo $user['email']; ?>">
                            </div>
                            <div class="col">
                                <label for="gender">Your Gender: </label>
                                <select id="gender" name="gender" class="form-control input-shadow">
                                    <option value="male" <?php if ($user['gender'] == 'male') echo 'selected'; ?>>Male</option>
                                    <option value="female" <?php if ($user['gender'] == 'female') echo 'selected'; ?>>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="address">Address: </label>
                                <input type="text" id="address" name="address" class="form-control input-shadow" placeholder="Enter Your Address" value="<?php echo $user['address']; ?>">
                            </div>
                            <div class="col">
                                <label for="username">Choose a Username: </label>
                                <input type="text" id="username" name="username" class="form-control input-shadow" placeholder="Enter Your Username" value="<?php echo $user['username']; ?>">
                            </div>
                            <div class="col">
                                <label for="password">Password: </label>
                                <input type="password" id="password" name="password" class="form-control input-shadow" placeholder="Choose a Password">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../include/footeruser.php'; ?>