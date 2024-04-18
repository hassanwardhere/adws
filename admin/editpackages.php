<?php
// Include the database connection file
include '../include/config.php';
include '../include/headeradmin.php';

// Check if package ID is provided in the URL
if (!isset($_GET['id'])) {
    // Redirect to managepackages.php if package ID is not provided
    header("Location: managepackages.php");
    exit(); // Stop further execution
}

// Fetch package details based on the provided ID
$packageId = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM packages WHERE id = :id");
$stmt->bindParam(':id', $packageId);
$stmt->execute();
$package = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if package exists
if (!$package) {
    // Redirect to managepackages.php if package does not exist
    header("Location: managepackages.php");
    exit(); // Stop further execution
}

// Check if form is submitted for updating package
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $packagename = $_POST['packagename'];
    $packagedescription = $_POST['packagedescription'];
    $additionaldetails = $_POST['additionaldetails'];
    $price = $_POST['pricing'];
    $discount = $_POST['discount'];
    $total = $price - ($price * ($discount / 100)); // Calculate total after discount
    $device = $_POST['device'];
    $validity = $_POST['validity'];

    try {
        // Prepare SQL statement to update package data
        $stmt = $pdo->prepare("UPDATE packages SET packagename = :packagename, packagedescription = :packagedescription, additionaldetails = :additionaldetails, price = :price, discount = :discount, total = :total, device = :device, validity = :validity WHERE id = :id");

        // Bind parameters
        $stmt->bindParam(':packagename', $packagename);
        $stmt->bindParam(':packagedescription', $packagedescription);
        $stmt->bindParam(':additionaldetails', $additionaldetails);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':discount', $discount);
        $stmt->bindParam(':total', $total);
        $stmt->bindParam(':device', $device);
        $stmt->bindParam(':validity', $validity);
        $stmt->bindParam(':id', $packageId);

        // Execute the statement
        $stmt->execute();

        // Redirect to managepackages.php after successful update
        header("Location: managepackages.php?alertType=success&alertMessage=Package updated successfully");
    } catch (PDOException $e) {
        // Display error message if query fails
        echo "Error: " . $e->getMessage();
    }
}
?>

<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Update Package</h4>
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
                    Update a Package
                    <a href="managepackages.php" class="btn btn-danger float-right">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data" onsubmit="calculateTotal()">
                    <div class="card-title"><strong><span style="color: black;">Package Information</span></strong></div>
                    <hr>
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="packagename"><strong><span style="color: black;">Package Name:</span></strong></label>
                                <input type="text" class="form-control" id="packagename" name="packagename" required placeholder="Enter Package Name:" value="<?php echo $package['packagename']; ?>">
                            </div>
                            <div class="col">
                                <label for="packagedescription"><strong><span style="color: black;">Package Description:</span></strong></label>
                                <input type="text" class="form-control" id="packagedescription" name="packagedescription" required placeholder="Enter Package Description:" value="<?php echo $package['packagedescription']; ?>">
                            </div>
                            <div class="col">
                                <label for="additionaldetails"><strong><span style="color: black;">Additional Details:</span></strong></label>
                                <input type="text" class="form-control" id="additionaldetails" name="additionaldetails" required placeholder="Enter Additional Details" value="<?php echo $package['additionaldetails']; ?>">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-title"><strong><span style="color: black;">Pricing Information</span></strong></div>
                    <hr>
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="pricing"><strong><span style="color: black;">Price:</span></strong></label>
                                <input type="text" class="form-control" id="pricing" name="pricing" required placeholder="Enter Price:" value="<?php echo $package['price']; ?>">
                            </div>
                            <div class="col">
                                <label for="discount"><strong><span style="color: black;">Discount %:</span></strong></label>
                                <input type="text" class="form-control" id="discount" name="discount" required placeholder="Enter Discount Percentage:" value="<?php echo $package['discount']; ?>">
                            </div>
                            <div class="col">
                                <label for="total"><strong><span style="color: black;">Total:</span></strong></label>
                                <input type="text" class="form-control" id="total" name="total" readonly value="<?php echo $package['total']; ?>">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-title"><strong><span style="color: black;">Other Information</span></strong></div>
                    <hr>
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="device"><strong><span style="color: black;">Device</span></strong></label>
                                <select class="form-control" id="device" name="device" required>
                                    <option <?php echo ($package['device'] == 'Mobile Only') ? 'selected' : ''; ?>>Mobile Only</option>
                                    <option <?php echo ($package['device'] == 'Tablet Only') ? 'selected' : ''; ?>>Tablet Only</option>
                                    <option <?php echo ($package['device'] == 'Broadband Only') ? 'selected' : ''; ?>>Broadband Only</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="validity"><strong><span style="color: black;">Valid Till:</span></strong></label>
                                <input type="date" class="form-control" id="validity" name="validity" value="<?php echo $package['validity']; ?>">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="updatepackage">Update Package</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- Add this script at the end of your HTML body -->
<script>
    // Function to calculate total based on price and discount
    function calculateTotal() {
        var price = parseFloat(document.getElementById('pricing').value);
        var discount = parseFloat(document.getElementById('discount').value);
        var total = price - (price * (discount / 100));
        document.getElementById('total').value = total.toFixed(2); // Display total with 2 decimal places
    }

    // Event listener to trigger calculation on form submission
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent form submission
            calculateTotal(); // Calculate total
            this.submit(); // Submit the form
        });
    });
</script>

<?php include '../include/footeradmin.php'; ?>