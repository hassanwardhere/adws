<?php

// Define database connection constants
define('DB_HOST', 'localhost');
define('DB_NAME', 'adws');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
    
    // Set PDO to throw exceptions on errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Optional: Set the default fetch mode to associative array
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    // Echo a message if connected successfully
    // echo "Connected to the database successfully!";
} catch (PDOException $e) {
    // If connection fails, echo the error message
    echo "Connection failed: " . $e->getMessage();
}
?>
