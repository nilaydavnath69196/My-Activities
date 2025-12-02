<?php 
$connection = mysqli_connect("localhost", "root", "", "Nilay_db");

if (!$connection) {
    die("Connection Failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS lab_user_data2(
  id INT(6)  PRIMARY KEY,
email VARCHAR(50) NOT NULL,
telephone VARCHAR(20) NOT NULL
) ";

if (mysqli_query($connection, $sql)) {
    echo "Table Created!";
} else {
    echo "Error: " . mysqli_error($connection);
}

mysqli_close($connection);
?>
