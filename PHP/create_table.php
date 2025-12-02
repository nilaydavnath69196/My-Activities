<?php
$conn = mysqli_connect("localhost", "root", "", "Nilay_db");

if (!$conn) {
    die("Connection Failed");
}

$sql = "CREATE TABLE IF NOT EXISTS marks (
    id INT PRIMARY KEY,
    nam VARCHAR(100) NOT NULL,
    sub VARCHAR(100) NOT NULL,
    mark INT NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Table Created!";
} else {
    echo "Error!";
}

mysqli_close($conn);
