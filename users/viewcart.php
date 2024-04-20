<?php
// Include the database connection file
include '../include/config.php';
include '../include/headeruser.php';

// Check if alert message exists from previous page
$alertType = isset($_GET['alertType']) ? $_GET['alertType'] : '';
$alertMessage = isset($_GET['alertMessage']) ? $_GET['alertMessage'] : '';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: ../auth/login.php");
    exit();
}

// Fetch cart items for the logged-in user
$userId = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM cart WHERE userid = ?");
$stmt->execute([$userId]);
$cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

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
<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Manage Cart</h4>
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
        </ol>
    </div>
</div>
<!-- End Breadcrumb-->
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h5>Your Cart
                    <span>
                        <a href="removecartpackage.php?id=<?php echo $item['id']; ?>" class="btn btn-danger float-right"  style="margin-left: 10px;" onclick="return confirmDelete();">Remove</a>
                        <span></span>
                        <a href="allpackages.php" class="btn btn-success float-right" style="margin-left: 10px;">Browse More Packages</a>
                    </span>
                </h5>
            </div>
            <div class="card-body"></div>
            <div class="table-responsive">
                <table id="default-datatable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Package Name</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Total</th>
                            <th>Total Due</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cartItems as $item) : ?>
                            <tr>
                                <td><?php echo $item['packagename']; ?></td>
                                <td><?php echo $item['price']; ?></td>
                                <td><?php echo $item['discount']; ?></td>
                                <td><?php echo $item['totalpaid']; ?></td>
                                <td><?php echo $item['totalpaid']; ?></td>
                                <td>
                                    <a href="checkoutp.php?id=<?php echo $item['id']; ?>" class="btn btn-success btn-sm">Checkout</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Package Name</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Total</th>
                            <th>Total Due</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</div><!-- End Row-->
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to remove this package from your cart?");
    }
</script>

<?php include '../include/footeruser.php'; ?>