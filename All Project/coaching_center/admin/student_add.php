<?php
session_start();
include "../db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

if (isset($_POST['add'])) {
    $name     = $_POST['name'];
    $class    = $_POST['class'];
    $phone    = $_POST['phone'];
    $status   = $_POST['status'];
    $password = $_POST['password'];

    $sql = "INSERT INTO students (name, class, phone, status, password)
            VALUES ('$name','$class','$phone','$status','$password')";

    if (mysqli_query($conn, $sql)) {
        $msg = "Student Added Successfully!";
    } else {
        $msg = "Something went wrong!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI',sans-serif;
        }

        body{
            min-height:100vh;
            background: linear-gradient(135deg,#667eea,#764ba2);
            display:flex;
            align-items:center;
            justify-content:center;
        }

        .card{
            width:400px;
            padding:35px;
            background:rgba(255,255,255,0.93);
            border-radius:20px;
            box-shadow:0 30px 60px rgba(0,0,0,0.25);
            animation: pop 0.7s ease;
        }

        @keyframes pop{
            from{
                opacity:0;
                transform:scale(0.7) translateY(60px);
            }
            to{
                opacity:1;
                transform:scale(1) translateY(0);
            }
        }

        h2{
            text-align:center;
            margin-bottom:20px;
            color:#4f46e5;
            font-size:26px;
        }

        .msg{
            background:#dcfce7;
            color:#166534;
            padding:12px;
            border-radius:10px;
            text-align:center;
            margin-bottom:15px;
        }

        input,select{
            width:100%;
            padding:14px;
            margin-bottom:14px;
            border-radius:12px;
            border:1px solid #c7d2fe;
            font-size:15px;
            transition:0.3s;
        }

        input:focus,select:focus{
            outline:none;
            border-color:#6366f1;
            box-shadow:0 0 0 3px rgba(99,102,241,0.25);
        }

        button{
            width:100%;
            padding:14px;
            margin-top:10px;
            border:none;
            border-radius:14px;
            font-size:16px;
            color:white;
            background:linear-gradient(135deg,#4f46e5,#6366f1);
            cursor:pointer;
            transition:0.4s;
        }

        button:hover{
            transform:translateY(-3px);
            box-shadow:0 15px 35px rgba(99,102,241,0.6);
        }

        .back{
            display:block;
            text-align:center;
            margin-top:18px;
            text-decoration:none;
            font-weight:500;
            color:#4f46e5;
        }

        .back:hover{
            text-decoration:underline;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Add Student</h2>

    <?php if(isset($msg)) { ?>
        <div class="msg"><?= $msg ?></div>
    <?php } ?>

    <form method="post">

        <input type="text" name="name" placeholder="Student Name" required>

        <input type="text" name="class" placeholder="Class" required>

        <input type="text" name="phone" placeholder="Phone Number" required>

        <input type="text" name="password" placeholder="Password" required>

        <select name="status" required>
            <option value="">Select Status</option>
            <option>Active</option>
            <option>Inactive</option>
        </select>

        <button type="submit" name="add">Add Student</button>
    </form>

    <a href="dashboard.php" class="back">← Back to Dashboard</a>
</div>
</body>
</html>
