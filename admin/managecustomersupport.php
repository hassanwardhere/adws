<?php
// Include the database connection file
include '../include/config.php';
include '../include/headeradmin.php';

// Fetch all messages from the contactadmin table
$stmt = $pdo->query("SELECT * FROM contactadmin");
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Mail Inbox</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Mail Inbox</li>
        </ol>
    </div>
</div>
<!-- End Breadcrumb-->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <!-- Left sidebar -->
                    <div class="col-lg-3 col-md-4">
                        <a href="mail-compose.html" class="btn btn-danger btn-block">New Mail</a>
                        <div class="card mt-3 shadow-none">
                            <div class="list-group shadow-none">
                                <a href="../admin/managecustomersupport.php" class="list-group-item active">
                                    <i class="fa fa-inbox mr-2"></i>Inbox <b>(<?php echo count($messages); ?>)</b>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Left sidebar -->

                    <!-- Right Sidebar -->
                    <div class="col-lg-9 col-md-8">
                        <!-- Mail list -->
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                    <?php foreach ($messages as $message) : ?>
                                        <tr>
                                            <td>
                                                <div class="icheck-material-primary my-0">
                                                    <input id="checkbox1" type="checkbox" checked="checked" />
                                                    <label for="checkbox1"> </label>
                                                </div>
                                            </td>
                                            <td class="mail-rateing">
                                                <i class="fa fa-star"></i>
                                            </td>
                                            <td>
                                                <a href="mailread.php?id=<?php echo $message['id']; ?>"><?php echo htmlspecialchars($message['fullnames']); ?></a>
                                            </td>
                                            <td>
                                                <a href="mailread.php?id=<?php echo $message['id']; ?>">
                                                    <i class="fa fa-circle text-info mr-2"></i><?php echo htmlspecialchars($message['subject']); ?>
                                                </a>
                                            </td>
                                            <td>
                                                <i class="fa fa-paperclip"></i>
                                            </td>
                                            <td class="text-right"><?php echo date('h:i A', strtotime($message['created_at'])); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End Mail list -->
                        <!-- End Mail list -->
                    </div>
                    <!-- end Col-9 -->
                </div>
                <!-- End row -->
            </div>
        </div>
    </div>
</div>
<!-- End row -->

<?php include '../include/footeradmin.php'; ?>