<?php

include("../includes/professor_session.php");
include("../includes/db.php");

$message = "";

if(isset($_POST['add_marks'])){

    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $ct_marks = $_POST['ct_marks'];
    $assignment_marks = $_POST['assignment_marks'];
    $exam_marks = $_POST['exam_marks'];

    $total =
    $ct_marks +
    $assignment_marks +
    $exam_marks;

    $query = "INSERT INTO marks
    (
        student_id,
        course_id,
        ct_marks,
        assignment_marks,
        exam_marks,
        total
    )

    VALUES

    (
        '$student_id',
        '$course_id',
        '$ct_marks',
        '$assignment_marks',
        '$exam_marks',
        '$total'
    )";

    if(mysqli_query($conn, $query)){

        $message = "Marks Added Successfully";

    }else{

        $message = "Failed";

    }

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>
        Update Marks
    </title>

    <link rel="stylesheet"
          href="../css/style.css">

</head>

<body>

<div class="sidebar">

    <h2 align="center">
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

<div class="content">

    <div class="card">

        <h2>
            Add Student Marks
        </h2>

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
                   name="ct_marks"
                   placeholder="CT Marks"
                   required>

            <input type="number"
                   name="assignment_marks"
                   placeholder="Assignment Marks"
                   required>

            <input type="number"
                   name="exam_marks"
                   placeholder="Exam Marks"
                   required>

            <button name="add_marks">

                Add Marks

            </button>

        </form>

        <br>

        <?php
        echo $message;
        ?>

    </div>

</div>

</body>
</html>