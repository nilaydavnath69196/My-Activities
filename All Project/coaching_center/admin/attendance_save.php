<?php
session_start();
include "../db.php";

$date = date("Y-m-d");

foreach ($_POST['student_id'] as $i => $sid) {
    $status = $_POST['status'][$i];
    mysqli_query($conn, "INSERT INTO attendance (student_id, date, status) 
                          VALUES ('$sid', '$date', '$status')");
}

header("Location: dashboard.php");
exit;
