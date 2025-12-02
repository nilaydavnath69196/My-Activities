<?php
// config
$host = "laocalhost";   // or "localhost"
$user = "root";
$pass = "";            // XAMPP default empty
$db   = "Nilay_db";

// connection
$conn = mysqli_connect($host, $user, $pass, $db);

// check
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>
