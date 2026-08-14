<?php

include("../includes/professor_session.php");
include("../includes/db.php");

$message = "";

if(isset($_POST['add_attendance'])){

    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $total_classes = $_POST['total_classes'];
    $attended = $_POST['attended'];

    $query = "INSERT INTO attendance
    (
        student_id,
        course_id,
        total_classes,
        attended
    )

    VALUES

    (
        '$student_id',
        '$course_id',
        '$total_classes',
        '$attended'
    )";

    if(mysqli_query($conn, $query)){

        $message = "Attendance Added Successfully";

    }else{

        $message = "Failed";

    }

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>
        Attendance Management
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
            background: linear-gradient(135deg, #141e30, #243b55);
            color: #fff;
        }

        /* Sidebar */
        .sidebar {
            width: 240px;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(15px);
            padding: 20px;
            position: fixed;
            height: 100%;
            box-shadow: 5px 0 20px rgba(0,0,0,0.3);
        }

        .sidebar h2 {
            margin-bottom: 25px;
            font-size: 20px;
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
            transform: translateX(5px);
        }

        /* Content */
        .content {
            margin-left: 240px;
            width: calc(100% - 240px);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        /* Card */
        .card {
            width: 100%;
            max-width: 500px;
            background: rgba(255, 255, 255, 0.10);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.4);
            animation: fadeIn 0.8s ease-in-out;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 10px;
            outline: none;
            font-size: 14px;
        }

        input {
            background: rgba(255,255,255,0.9);
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            border: none;
            border-radius: 30px;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            transform: translateY(-3px);
            background: linear-gradient(135deg, #0072ff, #00c6ff);
        }

        .msg {
            text-align: center;
            margin-top: 15px;
            font-weight: bold;
            color: #00ffcc;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Floating background circles */
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
    <a href="../logout.php">Logout</a>

</div>

<div class="content">

    <div class="card">

        <h2>Add Attendance</h2>

        <form method="POST">

            <input type="number"
                   name="student_id"
                   placeholder="Student ID"
                   required>

            <input type="text"
                   name="course_id"
                   placeholder="Course ID"
                   required>

            <input type="number"
                   name="total_classes"
                   placeholder="Total Classes"
                   required>

            <input type="number"
                   name="attended"
                   placeholder="Attended Classes"
                   required>

            <button name="add_attendance">
                Add Attendance
            </button>

        </form>

        <div class="msg">
            <?php echo $message; ?>
        </div>

    </div>

</div>

</body>
</html>