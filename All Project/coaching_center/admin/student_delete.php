<?php
session_start();
include "../db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM students WHERE id=$id");

header("Location: student_list.php");
exit;
