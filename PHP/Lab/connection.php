<?php 
mysqli_report(MYSQLI_REPORT_OFF);

$host = "localhost";
$user = "root";
$pass = "";
$db = "Nilay_db";

$conn = @mysqli_connect($host ,$user, $pass, $db);

if(!$conn){
 die("Opps Connection Failed ");
}
else{
    echo "Connection Succesfully";
}

?>