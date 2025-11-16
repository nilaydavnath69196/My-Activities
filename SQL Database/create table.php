<?php 
$connection = mysqli_connect("localhost" ,"root", "", "Nilay_db");

if(!$connection){

    die("conncetion Failed");
}

$sql = " CREATE TABLE IF NOT EXISTS sheet2(
ID INT PRIMARY KEY,
NAME VARCHAR(100) NOT NULL,
SUB VARCHAR(100) NOT NULL,
MARKS INT NOT NULL,
Remarks VARCHAR(100) NOT NULL,
PERCENTAGE INT NOT NULL

)";

if(mysqli_query($connection, $sql)){
echo "Table Created!";
}

else{
    echo "Error";
}

mysqli_close($connection);
?>