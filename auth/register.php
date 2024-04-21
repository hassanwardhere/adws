<?php
// Include the database connection file
include '../include/config.php';
// Include PHPMailer Autoload
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user inputs
    $firstname = htmlspecialchars($_POST['firstname']);
    $middlename = htmlspecialchars($_POST['middlename']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $phonenumber = htmlspecialchars($_POST['phonenumber']);
    $email = htmlspecialchars($_POST['email']);
    $gender = htmlspecialchars($_POST['gender']);
    $address = htmlspecialchars($_POST['address']);
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $role = 'User'; // Default role
    $dateandtime = date('Y-m-d H:i:s'); // Current timestamp

    try {
        // Prepare SQL statement to insert user data
        $stmt = $pdo->prepare("INSERT INTO users (firstname, middlename, lastname, phonenumber, email, gender, address, username, password, role, dateandtime, status) 
        VALUES (:firstname, :middlename, :lastname, :phonenumber, :email, :gender, :address, :username, :password, :role, :dateandtime, :status)");

        // Bind parameters
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':middlename', $middlename);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':phonenumber', $phonenumber);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':dateandtime', $dateandtime);
        // Set default status to 'active'
        $status = 'active';
        $stmt->bindParam(':status', $status);

        // Execute the statement
        $stmt->execute();

        // Send thank you email
        $thankYouSubject = "Welcome to Cheap Deals Ltd!";
        $thankYouBody = "Dear $firstname,\n\nThank you for joining Cheap Deals Ltd. We are thrilled to welcome you aboard. Your account has been successfully created. You can now enjoy exclusive deals and offers on our platform.\n\nBest regards,\nCheap Deals Ltd Team";

        // Send account activation email
        $activationSubject = "Your Account Activation - Cheap Deals Ltd";
        $activationBody = "Dear $firstname,\n\nYour account has been successfully activated. You can now log in to your account and start exploring our services.\n\nBest regards,\nCheap Deals Ltd Team";

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

        // Set email content
        $mailer->setFrom('test@tayoinc.com', 'Cheap Deals Ltd');
        $mailer->addAddress($email, $firstname);
        $mailer->Subject = $thankYouSubject;
        $mailer->Body = $thankYouBody;

        // Send the email
        $mailer->send();

        // Update email content for activation email
        $mailer->Subject = $activationSubject;
        $mailer->Body = $activationBody;

        // Send the activation email
        $mailer->send();

        // Redirect to login page with success message
        header("Location: ../auth/login.php?alertType=success&alertMessage=Registration successful. Please log in.");
        exit();
    } catch (PDOException $e) {
        // Display error message if registration fails
        echo "Registration failed: " . $e->getMessage();
    } catch (Exception $e) {
        // Handle PHPMailer exceptions
        echo "Email sending failed: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>CheapDeals - Register</title>
    <!-- Bootstrap core CSS-->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="../assets/css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
    <!-- Custom Style-->
    <link href="../assets/css/app-style.css" rel="stylesheet" />

</head>

<body>
    <!-- Start wrapper-->
    <div id="wrapper">
        <div class="card card-authentication1 mx-auto my-4">
            <div class="card-body">
                <div class="card-content p-2">
                    <div class="card-title text-uppercase text-center py-3">Sign Up</div>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="firstname">First Name: </label>
                            <input type="text" id="firstname" name="firstname" class="form-control input-shadow" placeholder="Enter Your First Name" required>
                        </div>
                        <div class="form-group">
                            <label for="middlename">Middle Name: </label>
                            <input type="text" id="middlename" name="middlename" class="form-control input-shadow" placeholder="Enter Your Middle Name" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name: </label>
                            <input type="text" id="lastname" name="lastname" class="form-control input-shadow" placeholder="Enter Your Last Name" required>
                        </div>
                        <div class="form-group">
                            <label for="phonenumber">Phone Number: </label>
                            <input type="tel" id="phonenumber" name="phonenumber" class="form-control input-shadow" placeholder="Enter Your Phone Number" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email: </label>
                            <input type="email" id="email" name="email" class="form-control input-shadow" placeholder="Enter Your Email" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Your Gender: </label>
                            <select id="gender" name="gender" class="form-control input-shadow" required>
                                <option value="male">Male </option>
                                <option value="female">Female </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Address: </label>
                            <input type="text" id="address" name="address" class="form-control input-shadow" placeholder="Enter Your Address" required>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="username">Choose a Username: </label>
                            <input type="text" id="username" name="username" class="form-control input-shadow" placeholder="Enter Your Username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password: </label>
                            <input type="password" id="password" name="password" class="form-control input-shadow" placeholder="Choose a Password" required>
                        </div>
                        <div class="form-group">
                            <div class="icheck-material-primary">
                                <input type="checkbox" required id="user-checkbox" checked="" />
                                <label for="user-checkbox">I Agree With Terms & Conditions.</label>
                            </div>
                        </div>
                        <button type="submit" name="signup" class="btn btn-success btn-block waves-effect waves-light">Sign Up</button>
                    </form>
                </div>
            </div>
            <div class="card-footer text-center py-3">
                <p class="text-dark mb-0">Already have an account? <a href="../auth/login.php"> Sign In here</a></p>
            </div>
        </div>
    </div><!--wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- sidebar-menu js -->
    <script src="../assets/js/sidebar-menu.js"></script>

    <!-- Custom scripts -->
    <script src="../assets/js/app-script.js"></script>

</body>

</html>