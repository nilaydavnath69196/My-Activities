<?php


include("../includes/professor_session.php");
include("../includes/db.php");


$professor_id =
$_SESSION['professor_id'];

if(isset($_GET['approve'])){

    $project_id = $_GET['approve'];

    $query = "UPDATE projects
              SET status='Approved'
              WHERE project_id='$project_id'";

    mysqli_query($conn, $query);

}

if(isset($_GET['reject'])){

    $project_id = $_GET['reject'];

    $query = "UPDATE projects
              SET status='Rejected'
              WHERE project_id='$project_id'";

    mysqli_query($conn, $query);

}

$query = "

SELECT *

FROM projects

WHERE professor_id='$professor_id'

ORDER BY project_id DESC

";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>

<head>

    <title>
        Approve Projects
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
            Project Approval System
        </h2>

        <table border="1"
               width="100%"
               cellpadding="10">

            <tr>

                <th>
                    Title
                </th>

                <th>
                    Abstract
                </th>

                <th>
                    File
                </th>

                <th>
                    Status
                </th>

                <th>
                    Action
                </th>

            </tr>

            <?php

            while($row = mysqli_fetch_assoc($result)){

            ?>

            <tr>

                <td>
                    <?php
                    echo $row['title'];
                    ?>
                </td>

                <td>
                    <?php
                    echo $row['abstract'];
                    ?>
                </td>

                <td>

                    <a href="../uploads/<?php
                    echo $row['file_path'];
                    ?>"

                    download>

                    Download

                    </a>

                </td>

                <td>
                    <?php
                    echo $row['status'];
                    ?>
                </td>

                <td>

                    <a href="approve_projects.php?approve=<?php
                    echo $row['project_id'];
                    ?>">

                    Approve

                    </a>

                    |

                    <a href="approve_projects.php?reject=<?php
                    echo $row['project_id'];
                    ?>">

                    Reject

                    </a>

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