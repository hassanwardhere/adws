<?php
// Include the database connection file
include '../include/config.php';
include '../include/headeradmin.php';

// Check if alert message exists from previous page
$alertType = isset($_GET['alertType']) ? $_GET['alertType'] : '';
$alertMessage = isset($_GET['alertMessage']) ? $_GET['alertMessage'] : '';

// Fetch all orders with user information
$stmt = $pdo->query("SELECT `order`.*, users.firstname, users.lastname FROM `order` INNER JOIN users ON `order`.userid = users.id");
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <h4 class="page-title">Manage Orders</h4>
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
                <h5>All Orders
                    <span>
                        <a href="addspecialoffers.php" class="btn btn-success float-right" style="margin-left: 10px;">Add Offer</a>
                    </span>
                </h5>
            </div>
            <div class="card-body"></div>
            <div class="table-responsive">
                <table id="default-datatable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Package Name</th>
                            <th>Device</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Total Paid</th>
                            <th>Status</th>
                            <th>Ordered By</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order) : ?>
                            <tr>
                                <td><?php echo $order['packagename']; ?></td>
                                <td><?php echo $order['device']; ?></td>
                                <td><?php echo $order['price']; ?></td>
                                <td><?php echo $order['discount']; ?>%</td>
                                <td><?php echo $order['totalpaid']; ?></td>
                                <td><?php echo $order['status']; ?></td>
                                <td><?php echo $order['firstname'] . ' ' . $order['lastname']; ?></td>
                                <td>
                                    <a href="orderdetailsp.php?id=<?php echo $order['id']; ?>" class="btn btn-info btn-sm">Details</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Package Name</th>
                            <th>Device</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Total Paid</th>
                            <th>Status</th>
                            <th>Ordered By</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</div><!-- End Row-->

<?php include '../include/footeradmin.php'; ?>
