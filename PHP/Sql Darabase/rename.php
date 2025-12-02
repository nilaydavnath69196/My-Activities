<?php 
$connection = mysqli_connect("localhost" ,"root", "", "Nilay_db");

if(!$connection){

    die("conncetion Failed");
}

$sql = "ALTER TABLE marks CHANGE id roll INT";

if (mysqli_query($connection, $sql)) {
    echo "Column renamed successfully!";
} else {
    echo "Error renaming column!";
}
mysqli_close($connection);
?>