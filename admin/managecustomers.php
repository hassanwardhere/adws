<?php
// Include the database connection file
include '../include/config.php';
include '../include/headeradmin.php';

// Check if alert message exists from previous page
$alertType = isset($_GET['alertType']) ? $_GET['alertType'] : '';
$alertMessage = isset($_GET['alertMessage']) ? $_GET['alertMessage'] : '';

// Fetch all packages
$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <h4 class="page-title">Manage Customers</h4>
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
                <h5>All Customers
                    <span>
                        <a href="addcustomer.php" class="btn btn-success float-right" style="margin-left: 10px;">Add Customer</a>
                    </span>
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="default-datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Username</th>
                                <th>Status</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user) : ?>
                                <tr>
                                    <td><?php echo $user['firstname']; ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td><?php echo $user['phonenumber']; ?></td>
                                    <td><?php echo $user['username']; ?></td>
                                    <td><?php echo $user['status']; ?></td>
                                    <td><?php echo $user['role']; ?></td>
                                    <td>
                                        <a href="editcustomer.php?id=<?php echo $user['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="revokecustomer.php?id=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirmRevoke();">Revoke</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Username</th>
                                <th>Status</th>
                                <th>Role</th>
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
    function confirmRevoke() {
        return confirm("Are you sure you want to revoke this user?");
    }
</script>

<?php include '../include/footeradmin.php'; ?>