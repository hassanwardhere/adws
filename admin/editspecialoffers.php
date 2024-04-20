<?php
// Include the database connection file
include '../include/config.php';
include '../include/headeradmin.php';

// Check if offer ID is provided in the URL
if(isset($_GET['id'])) {
    // Fetch offer details based on the offer ID
    $offerId = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM offers WHERE id = ?");
    $stmt->execute([$offerId]);
    $offer = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!$offer) {
        // Offer not found, redirect to error page or handle accordingly
        header("Location: error.php");
        exit;
    }
}

// Check if form is submitted for updating offer
if(isset($_POST['updateoffer'])) {
    // Retrieve form data
    $offername = $_POST['offername'];
    $offerdescription = $_POST['offerdescription'];
    $additionaldetails = $_POST['additionaldetails'];
    $pricing = $_POST['pricing'];
    $discount = $_POST['discount'];
    $device = $_POST['device'];
    $validity = $_POST['validity'];
    $status = $_POST['status'];

    // Perform validation if needed

    // Update offer details in the database
    $stmt = $pdo->prepare("UPDATE offers SET offername = ?, offerdescription = ?, additionaldetails = ?, price = ?, discount = ?, device = ?, validity = ?, status = ? WHERE id = ?");
    $stmt->execute([$offername, $offerdescription, $additionaldetails, $pricing, $discount, $device, $validity, $status, $offerId]);

    // Redirect to manage special offers page or any other appropriate page
    header("Location: managespecialoffers.php?alertType=success&alertMessage=Offer updated successfully");
    exit;
}
?>

<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Edit Offer</h4>
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
                    Edit an Offer
                    <a href="managespecialoffers.php" class="btn btn-danger float-right">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="card-title"><strong><span style="color: black;">Special Offer Information</span></strong></div>
                    <hr>
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="offername"><strong><span style="color: black;">Offer Name:</span></strong></label>
                                <input type="text" class="form-control" id="offername" name="offername"  placeholder="Enter Offer Name:" value="<?php echo $offer['offername']; ?>">
                            </div>
                            <div class="col">
                                <label for="offerdescription"><strong><span style="color: black;">Offer Description:</span></strong></label>
                                <input type="text" class="form-control" id="offerdescription" name="offerdescription"  placeholder="Enter Offer Description:" value="<?php echo $offer['offerdescription']; ?>">
                            </div>
                            <div class="col">
                                <label for="additionaldetails"><strong><span style="color: black;">Additional Details:</span></strong></label>
                                <input type="text" class="form-control" id="additionaldetails" name="additionaldetails"  placeholder="Enter Additional Details" value="<?php echo $offer['additionaldetails']; ?>">
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
                                <input type="text" class="form-control" id="pricing" name="pricing"  placeholder="Enter Price:" value="<?php echo $offer['price']; ?>">
                            </div>
                            <div class="col">
                                <label for="discount"><strong><span style="color: black;">Discount %:</span></strong></label>
                                <input type="text" class="form-control" id="discount" name="discount"  placeholder="Enter Discount Percentage:" value="<?php echo $offer['discount']; ?>">
                            </div>
                            <div class="col">
                                <label for="total"><strong><span style="color: black;">Total:</span></strong></label>
                                <input type="text" class="form-control" id="total" name="total" readonly value="<?php echo $offer['total']; ?>">
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
                                <select class="form-control" id="device" name="device" >
                                    <option <?php if($offer['device'] == 'Hybrid') echo 'selected'; ?>>Hybrid</option>
                                    <option <?php if($offer['device'] == 'Mobile Only') echo 'selected'; ?>>Mobile Only</option>
                                    <option <?php if($offer['device'] == 'Tablet Only') echo 'selected'; ?>>Tablet Only</option>
                                    <option <?php if($offer['device'] == 'Broadband Only') echo 'selected'; ?>>Broadband Only</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="validity"><strong><span style="color: black;">Valid Till:</span></strong></label>
                                <input type="date" class="form-control" id="validity" name="validity" value="<?php echo $offer['validity']; ?>">
                            </div>
                            <div class="col">
                                <label for="status"><strong><span style="color: black;">Status:</span></strong></label>
                                <select class="form-control" id="status" name="status" >
                                    <option <?php if($offer['status'] == 'Active') echo 'selected'; ?>>Active</option>
                                    <option <?php if($offer['status'] == 'Inactive') echo 'selected'; ?>>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success" name="updateoffer">Update Offer</button>
                </form>
            </div>
        </div>
    </div>
</div>

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
