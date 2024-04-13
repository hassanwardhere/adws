<?php
session_start(); // Start or resume existing session

// Check if the user is not logged in or session has expired
if (!isset($_SESSION['user_id']) || $_SESSION['expire_time'] < time()) {
    // Destroy all session data
    session_destroy();

    // Redirect to the login page
    header("Location: auth/login.php");
    exit();
}

// Reset session expiration time on each page load to extend the session
$_SESSION['expire_time'] = time() + (10 * 60); // Extend session for 10 minutes
?>