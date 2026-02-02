<?php
session_start();
include "../db.php";

if (isset($_POST['login'])) {

    $phone = $_POST['phone'];
    $pass  = $_POST['password'];

    $q = mysqli_query($conn,
        "SELECT * FROM students 
         WHERE phone='$phone' AND password='$pass'"
    );

    if (mysqli_num_rows($q) == 1) {
        $row = mysqli_fetch_assoc($q);
        $_SESSION['student_id'] = $row['id'];

       header("Location: dashboard.php");
exit;

    } else {
        echo "❌ Invalid login.Please Enter Correct Username and Password or Contact with your Institude..";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Student Portal</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="bg">
    <div class="overlay"></div>
  </div>

  <main class="container">
    <section class="card">
      <div class="brand">
        <div class="logo">🎓</div>
        <h1 class="title">Student Portal</h1>
        <p class="subtitle">Sign in to access your dashboard</p>
      </div>

      <form method="post" class="form" autocomplete="off" novalidate>
        <div class="field">
          <label for="phone">Phone</label>
          <input type="text" id="phone" name="phone" placeholder="e.g., 01XXXXXXXXX" required />
        </div>

        <div class="field">
          <label for="password">Password</label>
          <div class="password-wrap">
            <input type="password" id="password" name="password" placeholder="Enter your password" required />
            <button type="button" class="toggle" aria-label="Show password">👁️</button>
          </div>
        </div>

        <div class="actions">
          <input type="submit" name="login" value="Login" class="btn" />
        </div>

        <div class="meta">
          <a href="#" class="link">Forgot password?</a>
        </div>
      </form>
    </section>

    <footer class="footer">
      <p>© <span id="year"></span> nilaytech • All rights reserved</p>
    </footer>
  </main>

  <script>
    // Year auto update
    document.getElementById('year').textContent = new Date().getFullYear();

    // Password toggle
    const toggle = document.querySelector('.toggle');
    const pwd = document.getElementById('password');
    toggle.addEventListener('click', () => {
      const isText = pwd.type === 'text';
      pwd.type = isText ? 'password' : 'text';
      toggle.textContent = isText ? '👁️' : '🙈';
    });
  </script>
</body>
</html>
