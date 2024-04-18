<?php
// Include the database connection file
include '../include/config.php';
include '../include/headeradmin.php';

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
        $stmt = $pdo->prepare("INSERT INTO users (firstname, middlename, lastname, phonenumber, email, gender, address, username, password, role, dateandtime, status) VALUES (:firstname, :middlename, :lastname, :phonenumber, :email, :gender, :address, :username, :password, :role, :dateandtime, :status)");

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

        // Redirect to login page with success message
        header("Location: managecustomers.php?alertType=success&alertMessage=Registration successful.");
        exit();
    } catch (PDOException $e) {
        // Display error message if registration fails
        echo "Registration failed: " . $e->getMessage();
    }
}
?>



<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Add Customer</h4>
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
                    Add a Customer
                    <a href="managecustomers.php" class="btn btn-danger float-right">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="card-title"><strong><span style="color: black;">Customer Information</span></strong></div>
                    <hr>
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="firstname">First Name: </label>
                                <input type="text" id="firstname" name="firstname" class="form-control input-shadow" placeholder="Enter Your First Name">
                            </div>
                            <div class="col">
                                <label for="middlename">Middle Name: </label>
                                <input type="text" id="middlename" name="middlename" class="form-control input-shadow" placeholder="Enter Your Middle Name">
                            </div>
                            <div class="col">
                                <label for="lastname">Last Name: </label>
                                <input type="text" id="lastname" name="lastname" class="form-control input-shadow" placeholder="Enter Your Last Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="phonenumber">Phone Number: </label>
                                <input type="tel" id="phonenumber" name="phonenumber" class="form-control input-shadow" placeholder="Enter Your Phone Number">
                            </div>
                            <div class="col">
                                <label for="email">Email: </label>
                                <input type="email" id="email" name="email" class="form-control input-shadow" placeholder="Enter Your Email">
                            </div>
                            <div class="col">
                                <label for="gender">Your Gender: </label>
                                <select id="gender" name="gender" class="form-control input-shadow">
                                    <option value="male">Male </option>
                                    <option value="female">Female </option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="address">Address: </label>
                                <input type="text" id="address" name="address" class="form-control input-shadow" placeholder="Enter Your Address">
                            </div>
                            <div class="col">
                                <label for="username">Choose a Username: </label>
                                <input type="text" id="username" name="username" class="form-control input-shadow" placeholder="Enter Your Username">
                            </div>
                            <div class="col">
                                <label for="password">Password: </label>
                                <input type="password" id="password" name="password" class="form-control input-shadow" placeholder="Choose a Password">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="addcustomer">Add Customer</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


<?php include '../include/footeradmin.php'; ?>