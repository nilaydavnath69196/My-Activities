<?php

include("../includes/student_session.php");
include("../includes/db.php");

$student_id = $_SESSION['student_id'];

$message = "";

// =========================
// UPDATE PROFILE
// =========================



// =========================
// CHANGE PASSWORD
// =========================

$password_message = "";

if(isset($_POST['change_password'])){

    $old_password =
    $_POST['old_password'];

    $new_password =
    $_POST['new_password'];

    $confirm_password =
    $_POST['confirm_password'];

    // GET CURRENT PASSWORD

    $password_query = "

    SELECT password

    FROM students

    WHERE student_id='$student_id'

    ";

    $password_result =
    mysqli_query($conn, $password_query);

    $password_row =
    mysqli_fetch_assoc($password_result);

    // CHECK OLD PASSWORD

    if(
    $old_password ==
    $password_row['password']
    ){

        // CHECK CONFIRM PASSWORD

        if(
        $new_password ==
        $confirm_password
        ){

            $update_password = "

            UPDATE students

            SET password='$new_password'

            WHERE student_id='$student_id'

            ";

            if(
            mysqli_query(
            $conn,
            $update_password
            )
            ){

                $password_message =
                "Password Changed Successfully";

            }else{

                $password_message =
                "Failed";

            }

        }else{

            $password_message =
            "New Password Does Not Match";

        }

    }else{

        $password_message =
        "Old Password Incorrect";

    }

}




if(isset($_POST['update_profile'])){

    $name = $_POST['name'];

    $email = $_POST['email'];

    $phone = $_POST['phone'];

    $department = $_POST['department'];

    $password = $_POST['password'];

    $query = "UPDATE students

    SET

    name='$name',
    email='$email',
    phone='$phone',
    department='$department',
    password='$password'

    WHERE student_id='$student_id'";

    if(mysqli_query($conn, $query)){

        $_SESSION['student_name'] = $name;

        $message =
        "Profile Updated Successfully";

    }else{

        $message =
        "Update Failed";

    }

}

// =========================
// GET STUDENT INFO
// =========================

$query = "SELECT * FROM students
          WHERE student_id='$student_id'";

$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>

<head>

    <title>
        Student Profile
    </title>

</head>

<body>

<h1>
    Student Profile
</h1>

<form method="POST">

    <label>
        Name
    </label>

    <br>

    <input type="text"
           name="name"

           value="<?php
           echo $row['name'];
           ?>"

           required>

    <br><br>

    <label>
        Email
    </label>

    <br>

    <input type="email"
           name="email"

           value="<?php
           echo $row['email'];
           ?>"

           required>

    <br><br>

    <label>
        Phone
    </label>

    <br>

    <input type="text"
           name="phone"

           value="<?php
           echo $row['phone'];
           ?>">

    <br><br>

    <label>
        Department
    </label>

    <br>

    <input type="text"
           name="department"

           value="<?php
           echo $row['department'];
           ?>">

    <br><br>

    <label>
        Password
    </label>

    <br>

    <input type="text"
           name="password"

           value="<?php
           echo $row['password'];
           ?>"

           required>

    <br><br>

    <button name="update_profile">

        Update Profile

    </button>

</form>

<br>


<br><br>

<h2>
Change Password
</h2>

<form method="POST">

    <input type="password"

           name="old_password"

           placeholder="Old Password"

           required>

    <br><br>

    <input type="password"

           name="new_password"

           placeholder="New Password"

           required>

    <br><br>

    <input type="password"

           name="confirm_password"

           placeholder="Confirm Password"

           required>

    <br><br>

    <button name="change_password">

        Change Password

    </button>

</form>

<br>

<?php
echo $password_message;
?>

<?php
echo $message;
?>

</body>
</html>