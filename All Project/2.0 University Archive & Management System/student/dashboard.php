<?php

include("../includes/student_session.php");
include("../includes/db.php");

$student_id = $_SESSION['student_id'];

// NOTIFICATION QUERY
$notification_query = "
SELECT *
FROM projects
WHERE student_id='$student_id'
AND
(
status='Approved'
OR
status='Rejected'
)
ORDER BY project_id DESC
";

$notification_result =
mysqli_query($conn, $notification_query);

?>

<!DOCTYPE html>
<html>

<head>

<title>Student Dashboard</title>

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
    box-shadow:5px 0 20px rgba(0,0,0,0.4);
}

.sidebar h2{
    text-align:center;
    margin-bottom:15px;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:10px;
    margin:6px 0;
    border-radius:10px;
    background:rgba(255,255,255,0.05);
    transition:0.3s;
}

.sidebar a:hover{
    background:linear-gradient(135deg,#00c6ff,#0072ff);
    transform:translateX(5px);
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
    border-radius:18px;
    padding:25px;
    box-shadow:0 20px 50px rgba(0,0,0,0.3);
    animation:fadeIn 0.6s ease-in-out;
}

/* WELCOME TEXT */
h1{
    font-size:28px;
    margin-bottom:10px;
}

/* NOTIFICATION */
.notification-text{
    padding:12px;
    margin:10px 0;
    background:rgba(255,255,255,0.05);
    border-radius:12px;
    line-height:1.6;
    transition:0.3s;
}

.notification-text:hover{
    background:rgba(0,198,255,0.15);
    transform:scale(1.02);
}

b{
    color:#00e6ff;
}

/* DIVIDER */
hr{
    border:none;
    height:1px;
    background:rgba(255,255,255,0.1);
}

/* ANIMATION */
@keyframes fadeIn{
    from{
        opacity:0;
        transform:scale(0.95);
    }
    to{
        opacity:1;
        transform:scale(1);
    }
}

</style>

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

<h2>Student Panel</h2>

<a href="dashboard.php">Dashboard</a>
<a href="attendance.php">Attendance</a>
<a href="marks.php">Marks</a>
<a href="upload_project.php">Upload Project</a>
<a href="../archive.php">Archive</a>
<a href="messages.php">Messages</a>
<a href="profile.php">Profile</a>
<a href="../logout.php">Logout</a>

</div>
<div class="content">

<div class="card">

<h1>
    Welcome <?php echo $_SESSION['student_name']; ?>
</h1>

<p>Student Dashboard Overview</p>

</div>

<div class="card">

<h2>Notifications</h2>

<?php while($notification = mysqli_fetch_assoc($notification_result)){ ?>

<div class="notification-text">

Your Project: <b><?php echo $notification['title']; ?></b>
has been <b><?php echo $notification['status']; ?></b>

</div>

<hr>

<?php } ?>

</div>

</div>

</body>
</html>