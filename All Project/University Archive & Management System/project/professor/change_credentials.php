<?php

include("../includes/professor_session.php");
include("../includes/db.php");

$message = "";
$professor_id = $_SESSION['professor_id'];

// Update email + password
if(isset($_POST['update'])){

    $email = trim($_POST['email']);
    $current_password = trim($_POST['current_password']);
    $new_password = trim($_POST['new_password']);

    // check current password
    $check = "SELECT * FROM professors 
              WHERE professor_id='$professor_id' 
              AND password='$current_password'";

    $result = mysqli_query($conn, $check);

    if(mysqli_num_rows($result) > 0){

        $update = "UPDATE professors 
                   SET email='$email', password='$new_password'
                   WHERE professor_id='$professor_id'";

        if(mysqli_query($conn, $update)){
            $message = "Credentials Updated Successfully";
        } else {
            $message = "Update Failed";
        }

    } else {
        $message = "Current Password is Wrong";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Credentials</title>

    <link rel="stylesheet" href="../css/style.css">

    <style>
        body{
            margin:0;
            font-family:Segoe UI;
            background: linear-gradient(135deg,#141e30,#243b55);
            color:white;
            display:flex;
        }

        .sidebar{
            width:250px;
            height:100vh;
            position:fixed;
            background:rgba(255,255,255,0.08);
            backdrop-filter:blur(15px);
            padding:20px;
        }

        .sidebar a{
            display:block;
            padding:10px;
            margin:8px 0;
            color:white;
            text-decoration:none;
            background:rgba(255,255,255,0.05);
            border-radius:10px;
        }

        .sidebar a:hover{
            background:linear-gradient(135deg,#00c6ff,#0072ff);
        }

        .content{
            margin-left:250px;
            width:100%;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .card{
            width:400px;
            padding:25px;
            border-radius:15px;
            background:rgba(255,255,255,0.1);
            backdrop-filter:blur(15px);
            box-shadow:0 20px 50px rgba(0,0,0,0.4);
        }

        input{
            width:100%;
            padding:10px;
            margin:8px 0;
            border:none;
            border-radius:8px;
        }

        button{
            width:100%;
            padding:10px;
            border:none;
            border-radius:20px;
            background:linear-gradient(135deg,#00c6ff,#0072ff);
            color:white;
            cursor:pointer;
        }

        .msg{
            text-align:center;
            margin-top:10px;
            color:#00ffcc;
        }

    </style>
</head>

<body>

<div class="sidebar">

    <h3>Professor Panel</h3>

    <a href="dashboard.php">Dashboard</a>
    <a href="students.php">Student List</a>
    <a href="update_marks.php">Update Marks</a>
    <a href="attendance.php">Attendance</a>
    <a href="approve_projects.php">Approve Projects</a>
    <a href="messages.php">Messages</a>
    <a href="change_credentials.php">Change Email/Password</a>
    <a href="../logout.php">Logout</a>

</div>

<div class="content">

    <div class="card">

        <h2>Change Credentials</h2>

        <form method="POST">

            <input type="email"
                   name="email"
                   placeholder="New Email"
                   required>

            <input type="password"
                   name="current_password"
                   placeholder="Current Password"
                   required>

            <input type="password"
                   name="new_password"
                   placeholder="New Password"
                   required>

            <button name="update">Update</button>

        </form>

        <div class="msg">
            <?php echo $message; ?>
        </div>

    </div>

</div>

</body>
</html>