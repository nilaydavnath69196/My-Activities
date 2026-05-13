<?php

include("../includes/professor_session.php");
include("../includes/db.php");

$message = "";

$professor_id = $_SESSION['professor_id'];

$student_id = 1;

// SEND REPLY
if(isset($_POST['send_message'])){

    $msg = $_POST['message'];

    $query = "INSERT INTO messages
    (
        sender_id,
        receiver_id,
        message
    )

    VALUES

    (
        '$professor_id',
        '$student_id',
        '$msg'
    )";

    if(mysqli_query($conn, $query)){
        $message = "Reply Sent";
    }else{
        $message = "Failed";
    }
}

// GET ALL MESSAGES
$query = "SELECT * FROM messages
          WHERE sender_id='$professor_id'
          OR receiver_id='$professor_id'
          ORDER BY timestamp DESC";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>

<head>

<title>Professor Messages</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Segoe UI;
}

body{
    display:flex;
    min-height:100vh;
    background:linear-gradient(135deg,#0f172a,#1e293b);
    color:white;
}

/* SIDEBAR */
.sidebar{
    width:260px;
    height:100vh;
    position:fixed;
    background:rgba(255,255,255,0.06);
    backdrop-filter:blur(15px);
    padding:20px;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:10px;
    margin:6px 0;
    border-radius:10px;
    background:rgba(255,255,255,0.05);
}

.sidebar a:hover{
    background:linear-gradient(135deg,#00c6ff,#0072ff);
}

/* CONTENT */
.content{
    margin-left:260px;
    width:100%;
    padding:30px;
    display:flex;
    flex-direction:column;
    gap:20px;
}

/* CARD */
.card{
    background:rgba(255,255,255,0.08);
    backdrop-filter:blur(15px);
    padding:20px;
    border-radius:15px;
    box-shadow:0 20px 50px rgba(0,0,0,0.3);
}

/* TEXTAREA */
textarea{
    width:100%;
    height:100px;
    padding:10px;
    border:none;
    border-radius:10px;
    resize:none;
    outline:none;
}

/* BUTTON */
button{
    margin-top:10px;
    width:100%;
    padding:10px;
    border:none;
    border-radius:10px;
    background:linear-gradient(135deg,#00c6ff,#0072ff);
    color:white;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    transform:scale(1.03);
}

/* MESSAGE BOX */
.msg-box{
    background:rgba(255,255,255,0.05);
    padding:12px;
    border-radius:12px;
    margin-bottom:10px;
    transition:0.3s;
}

.msg-box:hover{
    background:rgba(0,198,255,0.15);
}

small{
    opacity:0.7;
}

/* STATUS */
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

<h2>Professor Panel</h2>

<a href="dashboard.php">Dashboard</a>
<a href="students.php">Student List</a>
<a href="update_marks.php">Update Marks</a>
<a href="attendance.php">Attendance</a>
<a href="approve_projects.php">Approve Projects</a>
<a href="messages.php">Messages</a>
<a href="../logout.php">Logout</a>

</div>

<!-- CONTENT -->
<div class="content">

<!-- SEND MESSAGE -->
<div class="card">

<h2>Reply Message</h2>

<form method="POST">

<textarea name="message" placeholder="Write your reply..." required></textarea>

<button name="send_message">Send Reply</button>

</form>

<div class="status">
    <?php echo $message; ?>
</div>

</div>

<!-- INBOX -->
<div class="card">

<h2>Inbox</h2>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<div class="msg-box">

<b>Message:</b> <?php echo $row['message']; ?>

<br>

<small><?php echo $row['timestamp']; ?></small>

</div>

<?php } ?>

</div>

</div>

</body>
</html>