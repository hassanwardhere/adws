<?php
// Include the database connection file
include '../include/config.php';
include '../include/headeradmin.php';

// Check if alert message exists from previous page
$alertType = isset($_GET['alertType']) ? $_GET['alertType'] : '';
$alertMessage = isset($_GET['alertMessage']) ? $_GET['alertMessage'] : '';

// Fetch all packages
$stmt = $pdo->query("SELECT * FROM offers");
$offers = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <h4 class="page-title">Manage Offers</h4>
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
                <h5>All Offers
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
                                <th>Offer Name</th>
                                <th>Device</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Validity</th>
                                <th>Assigned</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($offers as $offer) : ?>
                                <tr>
                                    <td><?php echo $offer['offername']; ?></td>
                                    <td><?php echo $offer['device']; ?></td>
                                    <td><?php echo $offer['price']; ?></td>
                                    <td><?php echo $offer['discount']; ?>%</td>
                                    <td><?php echo $offer['validity']; ?></td>
                                    <td>All</td>
                                    <td>
                                        <a href="editoffers.php?id=<?php echo $offer['id']; ?>" class="btn btn-info btn-sm">Edit</a>
                                        <a href="deleteoffers.php?id=<?php echo $offer['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirmDelete();">Delete</a>
                                        <div class='btn-group m-1' role='group'>
                                            <button type='button' class='btn btn-dark waves-effect waves-light dropdown-toggle btn-sm' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Assign</button>
                                            <div class='dropdown-menu'>
                                                <a href='assignall.php?id=<?php echo $offer['id']; ?>' class='btn btn-dark m-1 btn-sm'>All</a>
                                                <br>
                                                <a href='indassign.php?id=<?php echo $offer['id']; ?>' class='btn btn-dark m-1 btn-sm'>Individual</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Offer Name</th>
                                <th>Device</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Validity</th>
                                <th>Assigned</th>
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
        return confirm("Are you sure you want to delete this special offer?");
    }
</script>

<?php include '../include/footeradmin.php'; ?>