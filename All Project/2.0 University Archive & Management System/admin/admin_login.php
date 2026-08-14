<?php

session_start();

include("../includes/db.php");

$error = "";

if(isset($_POST['login'])){

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // ADMIN LOGIN QUERY

    $query = "SELECT * FROM admin
              WHERE email='$email'
              AND password='$password'";

    $result = mysqli_query($conn,$query);

    // CHECK LOGIN

    if(mysqli_num_rows($result) > 0){

        $admin = mysqli_fetch_assoc($result);

        $_SESSION['admin_id']
        = $admin['admin_id'];

        $_SESSION['admin_name']
        = $admin['username'];

        $_SESSION['role']
        = "admin";

        header("Location: dashboard.php");

        exit();

    }else{

        $error =
        "Invalid Admin Email or Password";

    }

}

?>

<!DOCTYPE html>
<html>

<head>

<title>
Admin Login
</title>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<link rel="preconnect"
href="https://fonts.googleapis.com">

<link rel="preconnect"
href="https://fonts.gstatic.com"
crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{

    font-family:'Poppins',sans-serif;

    height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

    overflow:hidden;

    background:
    linear-gradient(
    135deg,
    #0f172a,
    #1e293b,
    #0f172a
    );

    position:relative;

}

/* BACKGROUND CIRCLES */

.circle1{

    width:350px;
    height:350px;

    background:#2563eb;

    position:absolute;

    top:-100px;
    left:-100px;

    border-radius:50%;

    filter:blur(120px);

    opacity:0.5;

}

.circle2{

    width:350px;
    height:350px;

    background:#00c6ff;

    position:absolute;

    bottom:-120px;
    right:-100px;

    border-radius:50%;

    filter:blur(120px);

    opacity:0.4;

}

/* LOGIN CARD */

.login-box{

    width:400px;

    padding:40px;

    border-radius:24px;

    background:
    rgba(255,255,255,0.08);

    backdrop-filter:blur(18px);

    border:
    1px solid rgba(255,255,255,0.15);

    box-shadow:
    0 25px 60px rgba(0,0,0,0.45);

    text-align:center;

    color:white;

    position:relative;

    z-index:10;

    animation:fadeIn 1s ease;

}

@keyframes fadeIn{

    from{

        opacity:0;
        transform:translateY(30px);

    }

    to{

        opacity:1;
        transform:translateY(0);

    }

}

/* ICON */

.icon{

    font-size:55px;

    margin-bottom:15px;

}

/* TAG */

.tag{

    font-size:12px;

    letter-spacing:2px;

    color:#cbd5e1;

    margin-bottom:10px;

}

/* TITLE */

h2{

    font-size:32px;

    margin-bottom:10px;

}

.subtitle{

    color:#cbd5e1;

    font-size:14px;

    margin-bottom:30px;

}

/* INPUT GROUP */

.input-group{

    position:relative;

    margin-bottom:20px;

}

.input-group input{

    width:100%;

    padding:15px 18px;

    border:none;

    border-radius:14px;

    background:
    rgba(255,255,255,0.12);

    color:white;

    font-size:15px;

    outline:none;

    transition:0.3s;

}

.input-group input:focus{

    background:
    rgba(255,255,255,0.18);

    box-shadow:
    0 0 10px rgba(37,99,235,0.5);

}

.input-group input::placeholder{

    color:#d1d5db;

}

/* BUTTON */

button{

    width:100%;

    padding:15px;

    border:none;

    border-radius:14px;

    background:
    linear-gradient(
    135deg,
    #00c6ff,
    #2563eb
    );

    color:white;

    font-size:16px;

    font-weight:600;

    cursor:pointer;

    transition:0.3s;

    margin-top:10px;

}

button:hover{

    transform:translateY(-3px);

    box-shadow:
    0 10px 20px rgba(37,99,235,0.4);

}

/* ERROR */

.error{

    color:#ff6b6b;

    margin-top:18px;

    font-size:14px;

    font-weight:500;

}

/* FOOTER */

.footer{

    margin-top:25px;

    font-size:12px;

    color:#cbd5e1;

}

</style>

</head>

<body>

<div class="circle1"></div>

<div class="circle2"></div>

<div class="login-box">

<div class="icon">
🎓
</div>

<div class="tag">
UNIVERSITY ADMIN PANEL
</div>

<h2>
Welcome Back
</h2>

<div class="subtitle">

Login to access
University Archive System

</div>

<form method="POST">

<div class="input-group">

<input type="email"

name="email"

placeholder="Enter Admin Email"

required>

</div>

<div class="input-group">

<input type="password"

name="password"

placeholder="Enter Password"

required>

</div>

<button name="login">

Login Now

</button>

</form>

<div class="error">

<?php
echo $error;
?>

</div>

<div class="footer">

University Academic Archive &
Management System

</div>

</div>

</body>
</html>