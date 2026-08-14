<?php

include("../includes/professor_session.php");

include("../includes/db.php");

$message = "";

// =========================
// PROFESSOR ID
// =========================

$professor_id =
$_SESSION['professor_id'];

// =========================
// SEND REPLY
// =========================

if(isset($_POST['send_reply'])){

    $student_id =
    $_POST['student_id'];

    $reply =
    $_POST['reply'];

    $query = "

    INSERT INTO messages(

    sender_id,
    receiver_id,
    message

    )

    VALUES(

    '$professor_id',
    '$student_id',
    '$reply'

    )

    ";

    if(mysqli_query($conn, $query)){

        $message =
        "Reply Sent Successfully";

    }else{

        $message =
        "Failed : "
        .
        mysqli_error($conn);

    }

}

// =========================
// GET PROFESSOR MESSAGES
// =========================

$query = "

SELECT

messages.*,
students.name AS student_name,
students.student_id

FROM messages

JOIN students

ON messages.sender_id =
students.student_id

WHERE messages.receiver_id='$professor_id'

ORDER BY messages.timestamp DESC

";

$result =
mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>

<head>

<title>
Professor Messages
</title>

<style>

*{

    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Segoe UI;

}

body{

    display:flex;

    background:
    linear-gradient(
    135deg,
    #0f172a,
    #1e293b
    );

    min-height:100vh;

    color:white;

}

/* SIDEBAR */

.sidebar{

    width:260px;

    height:100vh;

    position:fixed;

    padding:20px;

    background:
    rgba(255,255,255,0.06);

    backdrop-filter:blur(15px);

}

.sidebar h2{

    margin-bottom:20px;

}

.sidebar a{

    display:block;

    padding:12px;

    margin:8px 0;

    color:white;

    text-decoration:none;

    border-radius:10px;

    background:
    rgba(255,255,255,0.05);

}

.sidebar a:hover{

    background:
    linear-gradient(
    135deg,
    #00c6ff,
    #0072ff
    );

}

/* CONTENT */

.content{

    margin-left:260px;

    width:100%;

    padding:30px;

}

/* CARD */

.card{

    background:
    rgba(255,255,255,0.08);

    padding:20px;

    border-radius:15px;

    margin-bottom:20px;

    backdrop-filter:blur(15px);

}

/* MESSAGE BOX */

.msg-box{

    background:
    rgba(255,255,255,0.05);

    padding:15px;

    border-radius:12px;

    margin-bottom:15px;

}

/* TEXTAREA */

textarea{

    width:100%;

    height:100px;

    padding:10px;

    border:none;

    border-radius:10px;

    margin-top:10px;

}

/* BUTTON */

button{

    width:100%;

    padding:12px;

    border:none;

    border-radius:10px;

    margin-top:10px;

    background:
    linear-gradient(
    135deg,
    #00c6ff,
    #0072ff
    );

    color:white;

    cursor:pointer;

}

button:hover{

    opacity:0.9;

}

.status{

    color:#00ffcc;

    text-align:center;

    margin-top:10px;

}

</style>

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

<h2>
Professor Panel
</h2>

<a href="dashboard.php">
Dashboard
</a>

<a href="students.php">
Student List
</a>

<a href="update_marks.php">
Update Marks
</a>

<a href="attendance.php">
Attendance
</a>

<a href="approve_projects.php">
Approve Projects
</a>

<a href="messages.php">
Messages
</a>

<a href="../logout.php">
Logout
</a>

</div>

<!-- CONTENT -->

<div class="content">

<div class="card">

<h2>
Student Messages
</h2>

<br>

<?php

while(
$row =
mysqli_fetch_assoc($result)
){

?>

<div class="msg-box">

<b>

Student ID:

<?php
echo $row['student_id'];
?>

</b>

<br><br>

<b>

Student Name:

<?php
echo $row['student_name'];
?>

</b>

<br><br>

<b>
Message:
</b>

<br><br>

<?php
echo $row['message'];
?>

<br><br>

<small>

<?php
echo $row['timestamp'];
?>

</small>

<hr style="margin:15px 0;">

<!-- REPLY FORM -->

<form method="POST">

<input type="hidden"

name="student_id"

value="<?php
echo $row['student_id'];
?>">

<textarea

name="reply"

placeholder="Write Reply..."

required>

</textarea>

<button name="send_reply">

Send Reply

</button>

</form>

</div>

<?php
}
?>

<div class="status">

<?php
echo $message;
?>

</div>

</div>

</div>

</body>
</html>