<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Get database URL from environment variables
$dbUrl = parse_url(getenv("DATABASE_URL"));

// Extract database connection details
$host = $dbUrl["host"];
$username = $dbUrl["user"];
$user_pass = $dbUrl["pass"];
$database_in_use = ltrim($dbUrl["path"], '/');

// Create a new mysqli connection
$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);

// Check connection
if ($mysqli->connect_error) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "<br>";

?>
