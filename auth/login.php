<?php
// Include the database connection file
include '../include/config.php';

$alertType = '';
$alertMessage = '';
$redirectURL = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from form
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    try {
        // Prepare SQL statement to select user data
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");

        // Bind parameters
        $stmt->bindParam(':username', $username);

        // Execute the statement
        $stmt->execute();

        // Fetch user data
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify password and check user status
        if ($user && password_verify($password, $user['password'])) {
            // Check if user is active
            if ($user['status'] == 'active') {
                // Start a session
                session_start();

                // Store user data in session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                // Set session expiration time to 10 minutes
                $_SESSION['expire_time'] = time() + (10 * 60);

                // Set alert message
                $alertType = 'success';
                $alertMessage = 'Successfully authenticated.';

                // Redirect based on user role
                if ($user['role'] == 'User') {
                    $redirectURL = '../users/allpackages.php';
                } elseif ($user['role'] == 'Admin') {
                    $redirectURL = '../admin/dashboard.php';
                }
            } else {
                // User is deactivated
                $alertType = 'danger';
                $alertMessage = 'Your account has been deactivated. Please contact support for assistance.';
            }
        } else {
            // Password is incorrect or user does not exist
            $alertType = 'danger';
            $alertMessage = 'Invalid username or password.';
        }
    } catch (PDOException $e) {
        // Display error message if query fails
        $alertType = 'danger';
        $alertMessage = 'Error: ' . $e->getMessage();
    }
}

// Display alert for users arriving from register.php
if (isset($_GET['alertType']) && isset($_GET['alertMessage'])) {
    $alertType = $_GET['alertType'];
    $alertMessage = $_GET['alertMessage'];
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
    <title>CheapDeals - Sign In</title>
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

        <div class="card card-authentication1 mx-auto my-5">
            <div class="card-body">
                <?php if (!empty($alertType) && !empty($alertMessage)) : ?>
                    <div class="alert alert-<?php echo $alertType; ?> alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <div class="alert-icon">
                            <i class="fa fa-bell"></i>
                        </div>
                        <div class="alert-message">
                            <span><strong><?php echo ucfirst($alertType); ?>!</strong> <?php echo $alertMessage; ?></span>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (!empty($redirectURL)) : ?>
                    <script>
                        // Redirect after 2 seconds
                        setTimeout(function() {
                            window.location.href = "<?php echo $redirectURL; ?>";
                        }, 100);
                    </script>
                <?php endif; ?>
                <div class="card-content p-2">
                    <div class="card-title text-uppercase text-center py-3">Sign In</div>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="username">Username: </label>
                            <input type="text" id="username" name="username" class="form-control input-shadow" placeholder="Enter Username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password: </label>
                            <input type="password" id="password" name="password" class="form-control input-shadow" placeholder="Enter Password" required>
                        </div>
                        <div class="form-group">
                            <a href="authentication-reset-password.html">Reset Password</a>
                        </div>
                        <button type="submit" name="signin" class="btn btn-success btn-block">Sign In</button>
                    </form>
                </div>
            </div>
            <div class="card-footer text-center py-3">
                <p class="text-dark mb-0">Do not have an account? <a href="../auth/register.php"> Sign Up here</a></p>
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
