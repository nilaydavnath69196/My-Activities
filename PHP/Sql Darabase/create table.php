<?php 
$connection = mysqli_connect("localhost", "root", "", "Nilay_db");

if (!$connection) {
    die("Connection Failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS lab_user_data(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    telephone VARCHAR(20) NOT NULL
) ENGINE=InnoDB";

if (mysqli_query($connection, $sql)) {
    echo "Table Created!";
} else {
    echo "Error: " . mysqli_error($connection);
}

mysqli_close($connection);
?>
