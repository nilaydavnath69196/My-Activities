<?php

include("../includes/student_session.php");
include("../includes/db.php");

$message = "";

if(isset($_POST['upload_project'])){

    $title = $_POST['title'];
    $abstract = $_POST['abstract'];

    $student_id = $_SESSION['student_id'];

    $supervisor_id = 1;

    $status = "Pending";

    // FILE

    $file_name =
        $_FILES['project_file']['name'];

    $temp_name =
        $_FILES['project_file']['tmp_name'];

    $folder =
        "../uploads/" . $file_name;

    move_uploaded_file($temp_name, $folder);

    // INSERT DATABASE

    $query = "INSERT INTO projects
    (
        title,
        abstract,
        file_path,
        student_id,
        supervisor_id,
        status
    )

    VALUES

    (
        '$title',
        '$abstract',
        '$file_name',
        '$student_id',
        '$supervisor_id',
        '$status'
    )";

    if(mysqli_query($conn, $query)){

        $message =
            "Project Uploaded Successfully";

    }else{

        $message =
            "Upload Failed";

    }

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>
        Upload Project
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
            Upload Thesis / Project
        </h2>

        <form method="POST"
              enctype="multipart/form-data">

            <input type="text"
                   name="title"
                   placeholder="Project Title"
                   required>

            <textarea name="abstract"
                      placeholder="Project Abstract"
                      required>
            </textarea>

            <br><br>

            <input type="file"
                   name="project_file"
                   required>

            <button name="upload_project">

                Upload Project

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