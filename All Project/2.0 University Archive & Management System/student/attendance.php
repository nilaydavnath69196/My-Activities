<?php

include("../includes/student_session.php");
include("../includes/db.php");

$student_id = $_SESSION['student_id'];

$query = "SELECT * FROM attendance
          WHERE student_id='$student_id'";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Attendance</title>

    <link rel="stylesheet" href="../css/style.css">

    <style>
body{
    margin:0;
    font-family:Segoe UI;
    background:linear-gradient(135deg,#0f172a,#1e293b);
    color:white;
    display:flex;
}

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
    padding:10px;
    margin:6px 0;
    color:white;
    text-decoration:none;
    border-radius:10px;
    background:rgba(255,255,255,0.05);
}

.sidebar a:hover{
    background:linear-gradient(135deg,#00c6ff,#0072ff);
}

.content{
    margin-left:260px;
    padding:30px;
    width:100%;
}

.content h2{
    color:#0072ff;
}

.card{
    background:rgba(255,255,255,0.08);
    padding:20px;
    border-radius:15px;
    margin-bottom:20px;
    backdrop-filter:blur(15px);
}

/* ✅ TABLE FIX START */
table{
    width:100%;
    border-collapse:collapse;
    border-radius:10px;
    background:white;
}

th,td{
    padding:12px;
    text-align:center;
    border:1px solid rgba(0,0,0,0.1);
    color:black;
}

th{
    background:rgba(0,198,255,0.3);
    color:black;
}

tr:hover{
    background:rgba(0,198,255,0.1);
}
/* ✅ TABLE FIX END */

</style>

</head>

<body>

<div class="sidebar">

    <h2 align="center">Student Panel</h2>

    <a href="dashboard.php">Dashboard</a>
    <a href="attendance.php">Attendance</a>
    <a href="marks.php">Marks</a>
    <a href="upload_project.php">Upload Project</a>
    <a href="messages.php">Messages</a>
    <a href="../logout.php">Logout</a>

</div>

<div class="content">

    <div class="card">

        <h2>Attendance Information</h2>

        <table border="1" width="100%" cellpadding="10" class="table_color">

            <tr>
                <th>Course</th>
                <th>Total Classes</th>
                <th>Attended</th>
                <th>Percentage</th>
            </tr>

            <?php
            while($row = mysqli_fetch_assoc($result)){

                $percentage = ($row['attended'] / $row['total_classes']) * 100;
            ?>

            <tr>
                <td><?php echo $row['course_id']; ?></td>
                <td><?php echo $row['total_classes']; ?></td>
                <td><?php echo $row['attended']; ?></td>
                <td><?php echo round($percentage,2); ?>%</td>
            </tr>

            <?php } ?>

        </table>

    </div>

</div>

</body>
</html>