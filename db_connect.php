<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Parse the DATABASE_URL environment variable
$db_url = parse_url(getenv('DATABASE_URL'));

// Extract database connection details from the URL
$host = $db_url['host'];
$port = $db_url['port'];
$username = $db_url['user'];
$password = $db_url['pass'];
$database = ltrim($db_url['path'], '/');

// Create a connection to the PostgreSQL database using mysqli
$mysqli = new mysqli($host, $username, $password, $database, $port);

// Check the connection
if ($mysqli->connect_error) {
    die("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
}

echo "Connected successfully to database: " . $mysqli->host_info . "<br>";

?>
