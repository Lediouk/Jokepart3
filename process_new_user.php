<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "db_connect.php";

// Check if the form is submitted via POST method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Invalid request method.";
    exit;
}

// Check if required POST variables are set
if (!isset($_POST['username'], $_POST['password'], $_POST['password-confirm'])) {
    echo "Required fields are missing.";
    exit;
}

$new_username = $_POST['username'];
$new_password1 = $_POST['password'];
$new_password2 = $_POST['password-confirm'];

// Display user inputs for debugging purposes (remove in production)
echo "<h2>Trying to add a new user " . htmlspecialchars($new_username, ENT_QUOTES, 'UTF-8') . "</h2>";

if ($new_password1 !== $new_password2) {
    echo "The passwords do not match. Please try again.";
    exit;
}

if (!preg_match('/[0-9]/', $new_password1)) {
    echo "The password must have at least one number<br>";
    exit;
}

if (!preg_match('/[!@#$%^&*()]+/', $new_password1)) {
    echo "The password must have at least one special character like !@#$%^&*()<br>";
    exit;
}

if (strlen($new_password1) < 8) {
    echo "The password must be at least 8 characters long<br>";
    exit;
}

// Check if the username already exists
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $new_username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "The username " . htmlspecialchars($new_username, ENT_QUOTES, 'UTF-8') . " is already in use. Try another.";
    exit;
}

// Hash the password before storing it
$new_password_hashed = password_hash($new_password1, PASSWORD_BCRYPT);

// Insert the new user into the database
$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss", $new_username, $new_password_hashed);

if ($stmt->execute()) {
    echo "Registration success!";
} else {
    echo "Something went wrong. Not registered.";
}

echo "<a href='index.php'>Return to main</a>";
?>
