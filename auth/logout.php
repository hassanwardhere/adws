<?php
session_start(); // Start or resume existing session

// Destroy all session data
session_destroy();

// Redirect to the login page
header("Location: ../index.php");
exit();
?>
