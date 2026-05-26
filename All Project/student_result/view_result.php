<?php
include("db.php");


// SEARCH SYSTEM

if(isset($_GET['search'])){

    $search = $_GET['search'];

    $query = mysqli_query($conn,

    "SELECT students.id,
    students.name,
    subjects.subject_name,
    subjects.subject_code,
    marks.mark,

    CASE

        WHEN marks.mark >= 80 THEN 'A+'

        WHEN marks.mark >= 70 THEN 'A'

        WHEN marks.mark >= 60 THEN 'A-'

        WHEN marks.mark >= 40 THEN 'B'

        ELSE 'F'

    END AS grade,

    CASE

        WHEN marks.mark >= 40 THEN 'PASS'

        ELSE 'FAIL'

    END AS status

    FROM marks

    JOIN students
    ON marks.student_id = students.id

    JOIN subjects
    ON marks.subject_id = subjects.id

    WHERE students.name LIKE '%$search%'");

}

else{

    $query = mysqli_query($conn,

    "SELECT students.id,
    students.name,
    subjects.subject_name,
    subjects.subject_code,
    marks.mark,

    CASE

        WHEN marks.mark >= 80 THEN 'A+'

        WHEN marks.mark >= 70 THEN 'A'

        WHEN marks.mark >= 60 THEN 'A-'

        WHEN marks.mark >= 40 THEN 'B'

        ELSE 'F'

    END AS grade,

    CASE

        WHEN marks.mark >= 40 THEN 'PASS'

        ELSE 'FAIL'

    END AS status

    FROM marks

    JOIN students
    ON marks.student_id = students.id

    JOIN subjects
    ON marks.subject_id = subjects.id");

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>View Result</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background:#f4f4f4;">

<div class="container mt-5">

    <div class="card p-4 shadow">

        <h2 class="text-center mb-4">
            Student Result
        </h2>


        <!-- SEARCH BOX -->

        <form method="GET">

            <div class="row mb-4">

                <div class="col-md-10">

                    <input type="text"
                    name="search"
                    class="form-control"
                    placeholder="Search Student Name">

                </div>

                <div class="col-md-2">

                    <button class="btn btn-primary w-100">

                        Search

                    </button>

                </div>

            </div>

        </form>


        <!-- RESULT TABLE -->

        <table class="table table-bordered table-striped">

            <tr class="table-dark">

                <th>Student ID</th>

                <th>Name</th>

                <th>Subject</th>

                <th>Subject Code</th>

                <th>Mark</th>

                <th>Grade</th>

                <th>Status</th>

            </tr>


            <?php

            while($row = mysqli_fetch_assoc($query)){

            ?>

            <tr>

                <td>
                    <?php echo $row['id']; ?>
                </td>

                <td>
                    <?php echo $row['name']; ?>
                </td>

                <td>
                    <?php echo $row['subject_name']; ?>
                </td>

                <td>
                    <?php echo $row['subject_code']; ?>
                </td>

                <td>
                    <?php echo $row['mark']; ?>
                </td>

                <td>
                    <?php echo $row['grade']; ?>
                </td>

                <td>
                    <?php echo $row['status']; ?>
                </td>

            </tr>

            <?php } ?>

        </table>


        <div class="text-center mt-3">

            <a href="index.php"
            class="btn btn-dark">

            Back To Dashboard

            </a>

        </div>

    </div>

</div>

</body>
</html>