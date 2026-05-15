<?php

if(session_status() == PHP_SESSION_NONE){

    session_start();

}

// =========================
// CHECK ADMIN LOGIN
// =========================

if(!isset($_SESSION['admin_id'])){

    header("Location: ../admin/admin_login.php");

    exit();

}

?>