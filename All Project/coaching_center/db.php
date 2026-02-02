<?php
$conn = mysqli_connect("localhost", "root", "", "coaching_center");

if (!$conn) {
    die("DB Connection Failed");
}
