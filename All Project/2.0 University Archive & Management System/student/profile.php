<?php

include("../includes/student_session.php");
include("../includes/db.php");

$student_id = $_SESSION['student_id'];

$message = "";
$password_message = "";

/* =========================
CHANGE PASSWORD
========================= */

if(isset($_POST['change_password'])){

    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $password_query = "
    SELECT password
    FROM students
    WHERE student_id='$student_id'
    ";

    $password_result = mysqli_query($conn, $password_query);
    $password_row = mysqli_fetch_assoc($password_result);

    if($old_password == $password_row['password']){

        if($new_password == $confirm_password){

            $update_password = "
            UPDATE students
            SET password='$new_password'
            WHERE student_id='$student_id'
            ";

            if(mysqli_query($conn, $update_password)){
                $password_message = "Password Changed Successfully";
            }else{
                $password_message = "Failed";
            }

        }else{
            $password_message = "New Password Does Not Match";
        }

    }else{
        $password_message = "Old Password Incorrect";
    }
}

/* =========================
UPDATE PROFILE
========================= */

if(isset($_POST['update_profile'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $password = $_POST['password'];

    $query = "UPDATE students
    SET name='$name',
    email='$email',
    phone='$phone',
    department='$department',
    password='$password'
    WHERE student_id='$student_id'";

    if(mysqli_query($conn, $query)){
        $_SESSION['student_name'] = $name;
        $message = "Profile Updated Successfully";
    }else{
        $message = "Update Failed";
    }
}

/* =========================
GET STUDENT INFO
========================= */

$query = "SELECT * FROM students WHERE student_id='$student_id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>

<head>
<title>Student Profile</title>

<style>

body{
    margin:0;
    font-family:Segoe UI;
    background:linear-gradient(135deg,#0f172a,#1e293b);
    color:white;
}

/* CONTAINER */
.container{
    max-width:900px;
    margin:40px auto;
    padding:20px;
}

/* CARD */
.card{
    background:rgba(255,255,255,0.08);
    backdrop-filter:blur(15px);
    padding:25px;
    border-radius:15px;
    margin-bottom:20px;
    box-shadow:0 10px 25px rgba(0,0,0,0.3);
}

/* TITLE */
h1,h2{
    text-align:center;
    color:#00c6ff;
}

/* INPUT */
input{
    width:100%;
    padding:12px;
    margin:8px 0;
    border:none;
    border-radius:10px;
    outline:none;
    font-size:14px;
}

/* BUTTON */
button{
    width:100%;
    padding:12px;
    margin-top:10px;
    border:none;
    border-radius:10px;
    background:linear-gradient(135deg,#00c6ff,#0072ff);
    color:white;
    font-size:16px;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    transform:scale(1.03);
}

/* MESSAGE */
.msg{
    text-align:center;
    margin-top:10px;
    color:#00ff99;
}

.error{
    text-align:center;
    margin-top:10px;
    color:#ff4d4d;
}

/* SECTION */
.section-title{
    margin:20px 0;
    color:white;
    text-align:center;
}

</style>

</head>

<body>

<div class="container">

    <h1>Student Profile</h1>

    <!-- PROFILE CARD -->
    <div class="card">

        <form method="POST">

            <label>Name</label>
            <input type="text" name="name" value="<?php echo $row['name']; ?>" required>

            <label>Email</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>" required>

            <label>Phone</label>
            <input type="text" name="phone" value="<?php echo $row['phone']; ?>">

            <label>Department</label>
            <input type="text" name="department" value="<?php echo $row['department']; ?>">

            <label>Password</label>
            <input type="text" name="password" value="<?php echo $row['password']; ?>" required>

            <button name="update_profile">Update Profile</button>

        </form>

        <?php if($message != "") { ?>
            <div class="msg"><?php echo $message; ?></div>
        <?php } ?>

    </div>

    <!-- PASSWORD CARD -->
    <div class="card">

        <h2 class="section-title">Change Password</h2>

        <form method="POST">

            <input type="password" name="old_password" placeholder="Old Password" required>
            <input type="password" name="new_password" placeholder="New Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>

            <button name="change_password">Change Password</button>

        </form>

        <?php if($password_message != "") { ?>
            <div class="msg"><?php echo $password_message; ?></div>
        <?php } ?>

    </div>

</div>

</body>
</html>