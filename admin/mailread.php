<?php
// Include the database connection file
include '../include/config.php';
include '../include/headeradmin.php';

// Check if ID is provided in the URL
if(isset($_GET['id'])) {
    // Sanitize the ID
    $id = $_GET['id'];

    // Fetch mail/contact details from the database based on the ID
    $stmt = $pdo->prepare("SELECT * FROM contactadmin WHERE id = ?");
    $stmt->execute([$id]);
    $message = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    // Redirect or handle the case when ID is not provided
    // For example, redirect to managecustomersupport.php
    header("Location: managecustomersupport.php");
    exit();
}

// Handle form submission for sending a reply
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['reply_message'])) {
        // Sanitize and validate the reply message
        $replyMessage = htmlspecialchars($_POST['reply_message']);
        
        // Send the reply email to the original sender
        $to = $message['email'];
        $subject = "Re: " . $message['subject'];
        $body = "Dear " . $message['fullnames'] . ",\n\n" . $replyMessage;
        $headers = "From: Your Company Name <test@tayoinc.com>";

        if(mail($to, $subject, $body, $headers)) {
            // Email sent successfully
            $alertType = 'success';
            $alertMessage = 'Reply sent successfully.';
        } else {
            // Email sending failed
            $alertType = 'danger';
            $alertMessage = 'Failed to send reply. Please try again later.';
        }
    }
}
?>

<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Mail Read</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashtreme</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Mail</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Mail Read
            </li>
        </ol>
    </div>
</div>
<!-- End Breadcrumb-->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="media mb-3">
                    <img src="https://via.placeholder.com/110x110" class="rounded-circle mr-3 mail-img shadow" alt="media image" />
                    <div class="media-body">
                        <span class="media-meta float-right"><?php echo date('h:i A', strtotime($message['created_at'])); ?></span>
                        <h4 class="m-0"><?php echo htmlspecialchars($message['fullnames']); ?></h4>
                        <small>From : <?php echo htmlspecialchars($message['email']); ?></small>
                    </div>
                </div>
                <!-- media -->

                <p><b><?php echo htmlspecialchars($message['subject']); ?></b></p>
                <p><?php echo nl2br(htmlspecialchars($message['message'])); ?></p>

                <?php if(!empty($message['attachments'])) : ?>
                    <hr />
                    <h4>
                        <i class="fa fa-paperclip mr-2"></i> Attachments
                        <span>(<?php echo count(explode(',', $message['attachments'])); ?>)</span>
                    </h4>
                    <div class="row">
                        <?php foreach(explode(',', $message['attachments']) as $attachment) : ?>
                            <div class="col-sm-4 col-md-3">
                                <a href="<?php echo $attachment; ?>" target="_blank">
                                    <img src="<?php echo $attachment; ?>" alt="attachment" class="img-thumbnail" />
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <form method="POST" class="mt-3">
                    <div class="form-group">
                        <textarea class="form-control" name="reply_message" rows="9" placeholder="Reply here..."></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary waves-effect waves-light mt-3">
                            <i class="fa fa-send mr-1"></i> Send
                        </button>
                    </div>
                </form>

                <?php if(isset($alertType) && isset($alertMessage)) : ?>
                    <div class="alert alert-<?php echo $alertType; ?> mt-3">
                        <?php echo $alertMessage; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- End row -->

<?php include '../include/footeradmin.php'; ?>
