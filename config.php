<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Application settings
define('MAX_ARRAY_SIZE', 100);
define('MIN_VALUE', 10);
define('MAX_VALUE', 500);

// Database configuration (if needed)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'sorting_visualizer');

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>