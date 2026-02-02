<?php
session_start();
include "db.php";

if (isset($_POST['login'])) {
    $u = $_POST['username'];
    $p = $_POST['password'];

    if ($u === "admin" && $p === "1234") {
        $_SESSION['admin'] = $u;
        header("Location: admin/dashboard.php");
        exit;
    } else {
        $err = "Invalid Username or Password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Coaching Center Login</title>

<style>
body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #1f1c2c, #928dab);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}

/* floating circles */
body::before, body::after {
    content: "";
    position: absolute;
    width: 420px;
    height: 420px;
    border-radius: 50%;
    background: rgba(255,255,255,0.08);
    animation: float 8s infinite alternate;
}
body::before { top: -120px; left: -120px; }
body::after { bottom: -120px; right: -120px; }

@keyframes float {
    from { transform: translateY(0); }
    to { transform: translateY(40px); }
}

/* login card */
.login-card {
    background: rgba(255,255,255,0.18);
    backdrop-filter: blur(16px);
    padding: 50px 40px;
    border-radius: 25px;
    box-shadow: 0 20px 50px rgba(0,0,0,0.4);
    width: 400px;
    text-align: center;
    position: relative;
    animation: fadeIn 1s ease;
    color: #fff;
}

@keyframes fadeIn {
    from { opacity:0; transform: translateY(30px); }
    to { opacity:1; transform: translateY(0); }
}

.login-card h2 {
    font-size: 28px;
    margin-bottom: 8px;
}

.login-card p {
    font-size: 14px;
    color: #ddd;
    margin-bottom: 25px;
}

/* inputs */
.login-card input {
    width: 100%;
    padding: 14px;
    margin-bottom: 18px;
    border: none;
    border-radius: 12px;
    background: rgba(255,255,255,0.25);
    color: #fff;
    font-size: 15px;
}

.login-card input::placeholder {
    color: #eee;
}

.login-card input:focus {
    outline: none;
    background: rgba(255,255,255,0.35);
    box-shadow: 0 0 15px rgba(255,255,255,0.4);
}

/* admin login button */
.login-card input[type="submit"] {
    background: linear-gradient(135deg, #6dd5fa, #2980b9);
    font-size: 17px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

.login-card input[type="submit"]:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(41,128,185,0.6);
}

/* error */
.error {
    color: #ff4d4d;
    margin-top: 10px;
    font-weight: bold;
}

/* footer */
.footer-text {
    margin-top: 25px;
    font-size: 14px;
    color: #eee;
}

/* student portal button */
.student-btn {
    display: inline-block;
    margin-top: 12px;
    padding: 12px 24px;
    border-radius: 30px;
    background: linear-gradient(135deg, #f7971e, #ffd200);
    color: #000;
    font-weight: bold;
    text-decoration: none;
    transition: 0.3s;
}

.student-btn:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 10px 25px rgba(255, 210, 0, 0.6);
}

.copyright {
    margin-top: 20px;
    font-size: 12px;
    color: #ddd;
    opacity: 0.8;
}


</style>
</head>

<body>

<div class="login-card">
    <h2>🔐 Coaching Center Login</h2>
    <p>Admin access only</p>

    <form method="post">
        <input type="text" name="username" placeholder="Admin Username" required>
        <input type="password" name="password" placeholder="Admin Password" required>
        <input type="submit" name="login" value="Login To Admin Panel">
    </form>

    <?php if(isset($err)) echo "<div class='error'>$err</div>"; ?>

    <div class="footer-text">
        <p>Are you a student?</p>
        <a href="student/login.php" class="student-btn">
            🎓 Access Student Portal
        </a>
    </div>
    <div class="copyright">
  © <?php echo date("Y"); ?> nilaytech. All Rights Reserved.
</div>

</div>

</body>
</html>
