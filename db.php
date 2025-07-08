<?php
// Automatically detect server environment
if ($_SERVER['HTTP_HOST'] == 'localhost') {
    // Localhost (XAMPP)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "database"; // Your local DB name
} else {
    // Online (InfinityFree or other hosting)
    $servername = "sql308.infinityfree.com";  // Replace with your actual SQL host
    $username = "if0_39401636";              // Replace with your InfinityFree username
    $password = "0YVnZs0p5J";              // Replace with your InfinityFree DB password
    $dbname = "if0_39401636_database";    // Replace with your full InfinityFree DB name
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
