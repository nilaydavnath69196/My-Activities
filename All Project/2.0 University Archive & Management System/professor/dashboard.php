<?php

include("../includes/professor_session.php");

include("../includes/db.php");

$project_query = "

SELECT *

FROM projects

WHERE status='Pending'

ORDER BY project_id DESC

";

$project_result =
mysqli_query($conn, $project_query);

?>

<!DOCTYPE html>
<html>

<head>

    <title>
        Professor Dashboard
    </title>

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
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color: #fff;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: rgba(255,255,255,0.08);
            backdrop-filter: blur(15px);
            padding: 20px;
            position: fixed;
            height: 100%;
            box-shadow: 5px 0 25px rgba(0,0,0,0.4);
        }

        .sidebar h2 {
            margin-bottom: 25px;
            text-align: center;
        }

        .sidebar a {
            display: block;
            color: #fff;
            text-decoration: none;
            padding: 12px;
            margin: 8px 0;
            border-radius: 10px;
            transition: 0.3s;
            background: rgba(255,255,255,0.05);
        }

        .sidebar a:hover {
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            transform: translateX(6px);
        }

        /* Content */
        .content {
            margin-left: 250px;
            width: calc(100% - 250px);
            padding: 30px;
        }

        /* Cards */
        .card {
            background: rgba(255,255,255,0.10);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
            animation: fadeIn 0.8s ease-in-out;
        }

        h1, h2 {
            margin-bottom: 10px;
        }

        p {
            opacity: 0.9;
        }

        /* Project box */
        .project {
            background: rgba(255,255,255,0.08);
            padding: 15px;
            border-radius: 12px;
            margin: 10px 0;
            transition: 0.3s;
        }

        .project:hover {
            background: rgba(0,198,255,0.15);
            transform: scale(1.02);
        }

        .project b {
            color: #00e6ff;
        }

        hr {
            border: 0;
            height: 1px;
            background: rgba(255,255,255,0.2);
            margin: 10px 0;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Floating background */
        body::before, body::after {
            content: "";
            position: absolute;
            width: 250px;
            height: 250px;
            background: rgba(255,255,255,0.06);
            border-radius: 50%;
            animation: float 6s infinite ease-in-out;
            z-index: -1;
        }

        body::before {
            top: -50px;
            left: -50px;
        }

        body::after {
            bottom: -50px;
            right: -50px;
            animation-delay: 3s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(30px);
            }
        }

    </style>

</head>

<body>

<div class="sidebar">

    <h2>Professor Panel</h2>

    <a href="dashboard.php">Dashboard</a>
    <a href="students.php">Student List</a>
    <a href="update_marks.php">Update Marks</a>
    <a href="attendance.php">Attendance</a>
    <a href="approve_projects.php">Approve Projects</a>
    <a href="messages.php">Messages</a>
    <!-- <a href="../admin/dashboard.php">Admin</a> it need whenever i want to set professor as a admin -->
    <a href="change_credentials.php">
    Change Email / Password</a>
    <a href="../logout.php">Logout</a>

</div>

<div class="content">

    <div class="card">

        <h1>
            Welcome <?php echo $_SESSION['professor_name']; ?>
        </h1>

        <p>Professor Dashboard Overview</p>

    </div>

    <div class="card">

        <h2>Pending Project Notifications</h2>

        <?php

        while($project = mysqli_fetch_assoc($project_result)){

        ?>

        <div class="project">

            New Project Uploaded:
            <b><?php echo $project['title']; ?></b>

        </div>

        <?php
        }
        ?>

    </div>

</div>

</body>
</html>