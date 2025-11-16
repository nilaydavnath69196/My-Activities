<?php
$connection = mysqli_connect("localhost", "root", "", "Nilay_db");

if (!$connection) {
    die("Connection failed");
}

$delete_rolls = [101, 102, 104]; 
$list = implode(",", $delete_rolls);

$sql = "DELETE FROM marks WHERE roll IN ($list)";

if(mysqli_query($connection, $sql)){
    echo "Deleted Successfully!";
} else {
    echo "Delete Error: " . mysqli_error($connection);
}

mysqli_close($connection);
?>
