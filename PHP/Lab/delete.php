<?php
$connection = mysqli_connect("localhost", "root", "", "Nilay_db");

if (!$connection) {
    die("Connection failed");
}

$sql = "DELETE FROM lab_user_data WHERE id=3";
if(mysqli_query($connection, $sql)){
    echo "Deleted Successfully!";
} else {
    echo "Delete Error: " . mysqli_error($connection);
}

mysqli_close($connection);
?>
