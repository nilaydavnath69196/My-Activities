<?php 
$connection = mysqli_connect("localhost", "root", "", "Nilay_db");

if(!$connection){
    die("connection failed");
}

$roll = 240242104;
$name = "Nilay Dav Nath";
$sub = "Computer Fundamental";
$mark = 94;

$sql = "INSERT INTO marks(roll, name, sub, mark) VALUES('$roll', '$name', '$sub', '$mark')";
mysqli_query($connection, $sql);

echo "Database Create Successfuly";
mysqli_close($connection);

?>