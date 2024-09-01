<html>
<head>
</head>
<body>
<?php 
session_start();
error_reporting(E_ALL); 
ini_set('display_errors', 1); 

include "db_connect.php";

// Check if the form is submitted via POST method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Invalid request method.";
    exit;
}

// Check if required POST variables are set
if (!isset($_POST['username'], $_POST['password'])) {
    echo "Required fields are missing.";
    exit;
}

$username = $_POST['username'];
$password = $_POST['password'];

echo "<h2>You attempted to login with " . htmlspecialchars($username, ENT_QUOTES, 'UTF-8') . "</h2>";

// Retrieve the user data from the database
$sql = "SELECT userid, username, password FROM users WHERE username = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($userid, $fetched_name, $fetched_pass);

if ($stmt->num_rows > 0) {
    $stmt->fetch();
    
    // Verify the password against the hashed password in the database
    if (password_verify($password, $fetched_pass)) {
        echo "Found 1 person with that username<br>";
        echo "<p>Login success</p>";
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $userid;
    } else {
        echo "Incorrect password<br>";
        $_SESSION = [];
        session_destroy();
    }
} else {
    echo "0 results. Not logged in<br>";
    $_SESSION = [];
    session_destroy();
}

echo "Session variable = ";
print_r($_SESSION);

echo "<br>";
echo "<a href='index.php'>Return to main page</a>";
?>
</body>
</html>
