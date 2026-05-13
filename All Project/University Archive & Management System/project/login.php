<?php

session_start();

include("includes/db.php");

$error = "";

if(isset($_POST['login'])){

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);
    if($role == "student"){

        $query = "SELECT * FROM students 
                  WHERE email='$email' 
                  AND password='$password'";

        $result = mysqli_query($conn, $query);

        if($result){

            if(mysqli_num_rows($result) > 0){

                $student = mysqli_fetch_assoc($result);

                $_SESSION['student_id']
                    = $student['student_id'];

                $_SESSION['student_name']
                    = $student['name'];

                header("Location: student/dashboard.php");
                exit();

            }else{

                $error = "Invalid Student Login";

            }

        }else{

            $error = "Student Query Failed";

        }

    }


    elseif($role == "professor"){

        $query = "SELECT * FROM professors 
                  WHERE email='$email' 
                  AND password='$password'";

        $result = mysqli_query($conn, $query);

        if($result){

            if(mysqli_num_rows($result) > 0){

                $professor = mysqli_fetch_assoc($result);

                $_SESSION['professor_id']
                    = $professor['professor_id'];

                $_SESSION['professor_name']
                    = $professor['name'];

                header("Location: professor/dashboard.php");
                exit();

            }else{

                $error = "Invalid Professor Login";

            }

        }else{

            $error = "Professor Query Failed";

        }

    }

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Login</title>

    <link rel="stylesheet" href="css/style.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
        }

        .container {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            width: 90%;
            max-width: 420px;
            background: rgba(222, 223, 235, 0.12);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 35px;
            text-align: center;
            color: #fff;
            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
            animation: fadeIn 0.8s ease-in-out;
            
        }
       .col{
        color: #d3d6f5;
       }
        h2 {
            margin-bottom: 20px;
            font-size: 26px;
        }

        input, select {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 10px;
            outline: none;
            font-size: 14px;
        }

        input, select {
            background: rgba(255,255,255,0.9);
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            border: none;
            border-radius: 30px;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s ease;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        button:hover {
            transform: translateY(-3px);
            background: linear-gradient(135deg, #0072ff, #00c6ff);
        }

        p {
            margin-top: 10px;
        }

        .error {
            color: #ff4d4d;
            font-weight: bold;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Floating glow circles */
        body::before, body::after {
            content: "";
            position: absolute;
            width: 250px;
            height: 250px;
            background: rgba(255,255,255,0.08);
            border-radius: 50%;
            animation: float 6s infinite ease-in-out;
        }

        body::before {
            top: -60px;
            left: -60px;
        }

        body::after {
            bottom: -60px;
            right: -60px;
            animation-delay: 3s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(25px);
            }
        }

        select {
            cursor: pointer;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="card">

        <h2 class="col">Please Enter Your Information..</h2>

        <form method="POST">

            <input type="email"
                   name="email"
                   placeholder="Enter Email"
                   required>

            <input type="password"
                   name="password"
                   placeholder="Enter Password"
                   required>

            <select name="role" required>

                <option value="">Select Role</option>
                <option value="student">Student</option>
                <option value="professor">Professor</option>

            </select>

            <button type="submit" name="login">
                Login
            </button>

        </form>

        <p class="error">
            <?php echo $error; ?>
        </p>

    </div>

</div>

</body>
</html>