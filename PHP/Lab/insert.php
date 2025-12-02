<?php 
$connection = mysqli_connect("localhost", "root", "", "Nilay_db");

if(!$connection){
    die("connection failed");
}

$id1 = 1;
$email1 = "nilay@gmail.com";
$telephone1 = "0184000000";
$sql1 = "INSERT INTO lab_user_data(id, email, telephone) VALUES('$id1', '$email1', '$telephone1')";
mysqli_query($connection, $sql1);
$id2 = 2;
$email2 = "nilay2@gmail.com";
$telephone2 = "01842000000";
$sql2 = "INSERT INTO lab_user_data(id, email, telephone) VALUES('$id2', '$email2', '$telephone2')";
mysqli_query($connection, $sql2);
$id3 = 3;
$email3 = "nilay3@gmail.com";
$telephone3 = "01843000000";
$sql3 = "INSERT INTO lab_user_data(id, email, telephone) VALUES('$id3', '$email3', '$telephone3')";
mysqli_query($connection, $sql3);

echo "3 Database Create Successfuly";
mysqli_close($connection);

?>