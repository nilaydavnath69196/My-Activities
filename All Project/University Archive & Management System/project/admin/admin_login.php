<?php
session_start();
include("../includes/db.php");

$error = "";

if(isset($_POST['login'])){

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $query = "SELECT * FROM admin 
              WHERE email='$email' 
              AND password='$password'";

    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){

        $admin = mysqli_fetch_assoc($result);

        $_SESSION['admin_id'] = $admin['admin_id'];
        $_SESSION['admin_name'] = $admin['username'];
        $_SESSION['role'] = "admin";

        header("Location: dashboard.php");
        exit();

    }else{
        $error = "Invalid Admin Email or Password";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Login</title>

<style>

body{
    margin:0;
    font-family:Segoe UI;
    background:linear-gradient(135deg,#0f172a,#1e293b);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    color:white;
}

/* LOGIN CARD */
.login-box{
    width:360px;
    padding:30px;
    background:rgba(255,255,255,0.08);
    backdrop-filter:blur(15px);
    border-radius:18px;
    box-shadow:0 20px 60px rgba(0,0,0,0.4);
    text-align:center;
}

h2{
    margin-bottom:20px;
}

/* INPUT */
input{
    width:100%;
    padding:12px;
    margin:10px 0;
    border:none;
    border-radius:10px;
    outline:none;
}

/* BUTTON */
button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:10px;
    background:linear-gradient(135deg,#00c6ff,#0072ff);
    color:white;
    cursor:pointer;
    font-weight:bold;
    transition:0.3s;
}

button:hover{
    transform:scale(1.05);
}

/* ERROR */
.error{
    color:#ff4d4d;
    margin-top:10px;
}

/* HEADER TAG */
.tag{
    font-size:12px;
    opacity:0.7;
    margin-bottom:10px;
}

</style>

</head>

<body>

<div class="login-box">

<div class="tag">ADMIN PANEL ACCESS</div>

<h2>Admin Login</h2>

<form method="POST">

<input type="email" name="email" placeholder="Admin Email" required>

<input type="password" name="password" placeholder="Password" required>

<button name="login">Login</button>

</form>

<div class="error">
    <?php echo $error; ?>
</div>

</div>

</body>
</html>