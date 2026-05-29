<?php

include("../includes/student_session.php");
include("../includes/db.php");

$message = "";

// =========================
// STUDENT ID
// =========================

$student_id =
$_SESSION['student_id'];

// =========================
// SEND MESSAGE
// =========================

if(isset($_POST['send_message'])){

    $receiver_id =
    $_POST['receiver_id'];

    $msg =
    trim($_POST['message']);

    if(!empty($msg)){

        $insert = "

        INSERT INTO messages(

        sender_id,
        receiver_id,
        message

        )

        VALUES(

        '$student_id',
        '$receiver_id',
        '$msg'

        )

        ";

        if(mysqli_query($conn,$insert)){

            $message =
            "Message Sent Successfully";

        }else{

            $message =
            "Failed";

        }

    }

}

// =========================
// GET PROFESSORS
// =========================

$professor_query =
"SELECT * FROM professors";

$professor_result =
mysqli_query($conn,$professor_query);

// =========================
// GET CHAT HISTORY
// =========================

$query = "

SELECT *

FROM messages

WHERE

sender_id='$student_id'

OR

receiver_id='$student_id'

ORDER BY message_id ASC

";

$result =
mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html>

<head>

<title>
Student Messages
</title>

<link rel="stylesheet"
href="../css/style.css">

<style>

select,
textarea{

    width:100%;
    padding:12px;

}

.chat-box{

    background:#f4f4f4;

    padding:15px;

    border-radius:10px;

    margin-bottom:10px;

}

.sent{

    border-left:5px solid green;

}

.received{

    border-left:5px solid blue;

}

</style>

</head>

<body>

<div class="sidebar">

<h2 align="center">
Student Panel
</h2>

<a href="dashboard.php">
Dashboard
</a>

<a href="attendance.php">
Attendance
</a>

<a href="marks.php">
Marks
</a>

<a href="upload_project.php">
Upload Project
</a>

<a href="messages.php">
Messages
</a>

<a href="../logout.php">
Logout
</a>

</div>

<div class="content">

<div class="card">

<h2>
Send Message
</h2>

<form method="POST">

<select name="receiver_id" required>

<option value="">
Choose Professor
</option>

<?php

while(
$professor =
mysqli_fetch_assoc($professor_result)
){

?>

<option value="<?php
echo $professor['professor_id'];
?>">

<?php

echo
"ID: "
.
$professor['professor_id']
.
" - "
.
$professor['name'];

?>

</option>

<?php
}
?>

</select>

<br><br>

<textarea

name="message"

placeholder="Write Message"

required>

</textarea>

<br><br>

<button name="send_message">

Send Message

</button>

</form>

<br>

<b>

<?php
echo $message;
?>

</b>

</div>

<!-- CHAT HISTORY -->

<div class="card">

<h2>
Chat History
</h2>

<br>

<?php

while(
$row =
mysqli_fetch_assoc($result)
){

?>

<div class="chat-box
<?php

if($row['sender_id']
== $student_id){

    echo "sent";

}else{

    echo "received";

}

?>
">

<b>

<?php

if($row['sender_id']
== $student_id){

    echo "You";

}else{

    echo "Professor";

}

?>

:</b>

<?php
echo $row['message'];
?>

<br><br>

<small>

<?php
echo $row['timestamp'];
?>

</small>

</div>

<?php
}
?>

</div>

</div>

</body>
</html>