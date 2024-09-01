<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Get the DATABASE_URL environment variable
$db_url = getenv('DATABASE_URL');

// Check if DATABASE_URL is set
if (!$db_url) {
    die("DATABASE_URL environment variable is not set.");
}

// Parse the DATABASE_URL
$parsed_url = parse_url($db_url);

// Check if the parse was successful and required keys exist
if (!$parsed_url || !isset($parsed_url['host'], $parsed_url['port'], $parsed_url['user'], $parsed_url['pass'])) {
    die("Error parsing DATABASE_URL. Ensure it is correctly formatted.");
}

// Extract database connection details from the URL
$host = $parsed_url['host'];
$port = $parsed_url['port'];
$username = $parsed_url['user'];
$password = $parsed_url['pass'];
$database = ltrim($parsed_url['path'], '/');

// Create a connection to the PostgreSQL database using mysqli
$mysqli = new mysqli($host, $username, $password, $database, $port);

// Check the connection
if ($mysqli->connect_error) {
    die("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
}

echo "Connected successfully to database: " . $mysqli->host_info . "<br>";

?>
