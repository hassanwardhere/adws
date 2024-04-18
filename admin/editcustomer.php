<?php
// Include the database connection file
include '../include/config.php';
include '../include/headeradmin.php';

// Check if user ID is provided in the URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch user details from the database based on the ID
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    // If ID is not provided, redirect back to managecustomers.php with an alert
    header("Location: managecustomers.php?alertType=danger&alertMessage=User ID not provided");
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    try {
        // Prepare SQL statement to update user data
        $stmt = $pdo->prepare("UPDATE users SET firstname = :firstname, middlename = :middlename, lastname = :lastname, phonenumber = :phonenumber, email = :email, gender = :gender, address = :address, username = :username, password = :password WHERE id = :id");

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
        $stmt->bindParam(':id', $id);

        // Execute the statement
        $stmt->execute();

        // Redirect to managecustomers.php after successful update
        header("Location: managecustomers.php?alertType=success&alertMessage=User updated successfully");
        exit();
    } catch (PDOException $e) {
        // Display error message if query fails
        echo "Error: " . $e->getMessage();
    }
}
?>

<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Update User</h4>
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
                    Update a User
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
                                    <option value="male" <?php if($user['gender'] == 'male') echo 'selected'; ?>>Male</option>
                                    <option value="female" <?php if($user['gender'] == 'female') echo 'selected'; ?>>Female</option>
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
                    <button type="submit" class="btn btn-primary" name="updatecustomer">Update Customer</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../include/footeradmin.php'; ?>
