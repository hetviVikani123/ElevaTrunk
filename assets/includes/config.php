<?php
// config.php - Database configuration
// Security: Prevent direct access
if (!defined('DB_CONFIG_LOADED')) {
    define('DB_CONFIG_LOADED', true);
}

// Database credentials
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'elevatrunk');

// Establish database connection with improved error handling
try {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
    ];
    
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
} catch(PDOException $e) {
    // Log error instead of displaying to users
    error_log("Database Connection Error: " . $e->getMessage());
    
    // Display user-friendly message
    die("We're experiencing technical difficulties. Please try again later.");
}

// Set timezone
date_default_timezone_set('Asia/Kolkata');

// Start output buffering
ob_start();
?>