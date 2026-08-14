<?php
include("../includes/admin_session.php");

include("../includes/db.php");


// TOTAL STUDENTS
$student_query = "SELECT * FROM students";
$student_result = mysqli_query($conn, $student_query);
$total_students = mysqli_num_rows($student_result);

// TOTAL PROFESSORS
$professor_query = "SELECT * FROM professors";
$professor_result = mysqli_query($conn, $professor_query);
$total_professors = mysqli_num_rows($professor_result);

// TOTAL PROJECTS
$project_query = "SELECT * FROM projects";
$project_result = mysqli_query($conn, $project_query);
$total_projects = mysqli_num_rows($project_result);

// APPROVED PROJECTS
$approved_query = "SELECT * FROM projects WHERE status='Approved'";
$approved_result = mysqli_query($conn, $approved_query);
$total_approved = mysqli_num_rows($approved_result);

// REJECTED PROJECTS
$rejected_query = "SELECT * FROM projects WHERE status='Rejected'";
$rejected_result = mysqli_query($conn, $rejected_query);
$total_rejected = mysqli_num_rows($rejected_result);

// TOTAL MESSAGES
$message_query = "SELECT * FROM messages";
$message_result = mysqli_query($conn, $message_query);
$total_messages = mysqli_num_rows($message_result);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="../css/style.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background: linear-gradient(135deg, #0f172a, #1e293b);
            color: white;
        }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            background: rgba(255,255,255,0.06);
            backdrop-filter: blur(15px);
            padding: 20px;
            box-shadow: 5px 0 25px rgba(0,0,0,0.4);
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 15px;
        }

        .menu-title {
            font-size: 11px;
            margin-top: 15px;
            opacity: 0.6;
            letter-spacing: 1px;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px 12px;
            margin: 6px 0;
            border-radius: 10px;
            background: rgba(255,255,255,0.05);
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            transform: translateX(6px);
        }

        /* CONTENT */
        .content {
            margin-left: 260px;
            padding: 30px;
            width: 100%;
            
        }
        .content h1{
            color: #7fd4eb;
        }
        .content h2{
            color: #7fd4eb;
        }

        h1 {
            margin-bottom: 20px;
        }

        /* GRID CARDS */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .card {
            background: rgba(255,255,255,0.08);
            backdrop-filter: blur(15px);
            border-radius: 18px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
            transition: 0.3s;
            position: relative;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-8px);
            background: rgba(0,198,255,0.15);
        }

        .card h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .card span {
            font-size: 32px;
            font-weight: bold;
            color: #00e6ff;
        }

        /* glow effect */
        .card::before {
            content: "";
            position: absolute;
            width: 120px;
            height: 120px;
            background: rgba(0,198,255,0.3);
            border-radius: 50%;
            top: -30px;
            right: -30px;
            filter: blur(20px);
        }

    </style>

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <h2>Admin Panel</h2>

    <div class="menu-title">MAIN</div>
    <a href="dashboard.php">🏠 Dashboard</a>

    <div class="menu-title">USER MANAGEMENT</div>
    <a href="students.php">👨‍🎓 Manage Students</a>
    <a href="professors.php">👨‍🏫 Manage Professors</a>

    <div class="menu-title">SYSTEM</div>
    <a href="analytics.php">📊 Analytics</a>

    <div class="menu-title">ACCOUNT</div>
    <a href="../logout.php">🚪 Logout</a>

</div>

<!-- CONTENT -->
<div class="content">

    <h1>Analytics Dashboard</h1>

    <div class="grid">

        <div class="card">
            <h2>Total Students</h2>
            <span><?php echo $total_students; ?></span>
        </div>

        <div class="card">
            <h2>Total Professors</h2>
            <span><?php echo $total_professors; ?></span>
        </div>

        <div class="card">
            <h2>Total Projects</h2>
            <span><?php echo $total_projects; ?></span>
        </div>

        <div class="card">
            <h2>Approved Projects</h2>
            <span><?php echo $total_approved; ?></span>
        </div>

        <div class="card">
            <h2>Rejected Projects</h2>
            <span><?php echo $total_rejected; ?></span>
        </div>

        <div class="card">
            <h2>Total Messages</h2>
            <span><?php echo $total_messages; ?></span>
        </div>

    </div>

</div>

</body>
</html>