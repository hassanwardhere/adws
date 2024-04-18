<?php
session_start(); // Start or resume existing session

// Check if the user is logged in and session is active
if (isset($_SESSION['user_id']) && $_SESSION['expire_time'] >= time()) {
    // Redirect logged-in users to their profile page
    header("Location: users/myprofile.php");
    exit();
}

// Reset session expiration time on each page load to extend the session
$_SESSION['expire_time'] = time() + (10 * 60); // Extend session for 10 minutes

// Redirect non-logged-in users to the main page
header("Location: gen/main.php");
exit();
?>
