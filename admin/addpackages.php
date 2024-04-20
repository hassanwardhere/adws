<?php
// Include the database connection file
include '../include/config.php';
include '../include/headeradmin.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $userid = $_SESSION['user_id']; // Assuming user is logged in
    $packagename = $_POST['packagename'];
    $packagedescription = $_POST['packagedescription'];
    $additionaldetails = $_POST['additionaldetails'];
    $price = $_POST['pricing'];
    $discount = $_POST['discount'];
    $total = $price - ($price * ($discount / 100)); // Calculate total after discount
    $device = $_POST['device'];
    $validity = $_POST['validity'];

    try {
        // Prepare SQL statement to insert package data
        $stmt = $pdo->prepare("INSERT INTO packages (userid, packagename, packagedescription, additionaldetails, price, discount, total, device, validity) VALUES (:userid, :packagename, :packagedescription, :additionaldetails, :price, :discount, :total, :device, :validity)");

        // Bind parameters
        $stmt->bindParam(':userid', $userid);
        $stmt->bindParam(':packagename', $packagename);
        $stmt->bindParam(':packagedescription', $packagedescription);
        $stmt->bindParam(':additionaldetails', $additionaldetails);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':discount', $discount);
        $stmt->bindParam(':total', $total);
        $stmt->bindParam(':device', $device);
        $stmt->bindParam(':validity', $validity);

        // Execute the statement
        $stmt->execute();

        // Redirect to managepackages.php after successful insertion
        header("Location: managepackages.php?alertType=success&alertMessage=Package added successfully");
    } catch (PDOException $e) {
        // Display error message if query fails
        echo "Error: " . $e->getMessage();
    }
}
?>



<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Add Package</h4>
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
                    Add a Package
                    <a href="managepackages.php" class="btn btn-danger float-right">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data" calculateTotal()>
                    <div class="card-title"><strong><span style="color: black;">Package Information</span></strong></div>
                    <hr>
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="packagename"><strong><span style="color: black;">Package Name:</span></strong></label>
                                <input type="text" class="form-control" id="packagename" name="packagename" required placeholder="Enter Package Name:">
                            </div>
                            <div class="col">
                                <label for="packagedescription"><strong><span style="color: black;">Package Description:</span></strong></label>
                                <input type="text" class="form-control" id="packagedescription" name="packagedescription" required placeholder="Enter Package Description:">
                            </div>
                            <div class="col">
                                <label for="additionaldetails"><strong><span style="color: black;">Additional Details:</span></strong></label>
                                <input type="text" class="form-control" id="additionaldetails" name="additionaldetails" required placeholder="Enter Additional Details">
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
                                <input type="text" class="form-control" id="pricing" name="pricing" required placeholder="Enter Price:">
                            </div>
                            <div class="col">
                                <label for="discount"><strong><span style="color: black;">Discount %:</span></strong></label>
                                <input type="text" class="form-control" id="discount" name="discount" required placeholder="Enter Discount Percentage:">
                            </div>
                            <div class="col">
                                <label for="total"><strong><span style="color: black;">Total:</span></strong></label>
                                <input type="text" class="form-control" id="total" name="total" readonly>
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
                                    <option>Hybrid</option>
                                    <option>Mobile Only</option>
                                    <option>Tablet Only</option>
                                    <option>Broadband Only</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="validity"><strong><span style="color: black;">Valid Till:</span></strong></label>
                                <input type="date" class="form-control" id="validity" name="validity">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="addpackage">Add Package</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    // Function to calculate total based on price and discount
    function calculateTotal() {
        var price = parseFloat(document.getElementById('pricing').value);
        var discount = parseFloat(document.getElementById('discount').value);
        var total = price - (price * (discount / 100));
        document.getElementById('total').value = total.toFixed(2); // Display total with 2 decimal places
    }

    // Event listener to trigger calculation on input change
    document.getElementById('pricing').addEventListener('input', calculateTotal);
    document.getElementById('discount').addEventListener('input', calculateTotal);

    // Initial calculation on page load
    calculateTotal();
</script>
<?php include '../include/footeradmin.php'; ?>