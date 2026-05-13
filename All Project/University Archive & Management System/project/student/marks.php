<?php

include("../includes/student_session.php");
include("../includes/db.php");

$student_id = $_SESSION['student_id'];

$query = "SELECT * FROM marks
          WHERE student_id='$student_id'";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>

<head>

    <title>
        Student Marks
    </title>

    <link rel="stylesheet"
          href="../css/style.css">

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
            Marks Information
        </h2>

        <table border="1"
               width="100%"
               cellpadding="10">

            <tr>

                <th>
                    Course
                </th>

                <th>
                    CT Marks
                </th>

                <th>
                    Assignment
                </th>

                <th>
                    Exam
                </th>

                <th>
                    Total
                </th>

            </tr>

            <?php

            while($row = mysqli_fetch_assoc($result)){

            ?>

            <tr>

                <td>
                    <?php
                    echo $row['course_id'];
                    ?>
                </td>

                <td>
                    <?php
                    echo $row['ct_marks'];
                    ?>
                </td>

                <td>
                    <?php
                    echo $row['assignment_marks'];
                    ?>
                </td>

                <td>
                    <?php
                    echo $row['exam_marks'];
                    ?>
                </td>

                <td>
                    <?php
                    echo $row['total'];
                    ?>
                </td>

            </tr>

            <?php
            }
            ?>

        </table>

    </div>

</div>

</body>
</html>