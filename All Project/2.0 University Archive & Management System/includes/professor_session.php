<?php

session_start();

if(!isset($_SESSION['professor_id'])){
    header("Location: ../login.php");
}

?>