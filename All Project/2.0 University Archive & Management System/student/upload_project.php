<?php

include("../includes/student_session.php");
include("../includes/db.php");

$message = "";

// =========================
// GET PROFESSORS
// =========================

$professor_query = "SELECT * FROM professors";

$professor_result = mysqli_query($conn, $professor_query);


// =========================
// UPLOAD PROJECT
// =========================

if(isset($_POST['upload_project'])){

    $title = mysqli_real_escape_string(
        $conn,
        $_POST['title']
    );

    $abstract = mysqli_real_escape_string(
        $conn,
        $_POST['abstract']
    );

    $supervisor_id = intval(
        $_POST['supervisor_id']
    );

    $student_id = intval(
        $_SESSION['student_id']
    );


    // =========================
    // FILE UPLOAD
    // =========================

    if(isset($_FILES['project_file']) &&
       $_FILES['project_file']['error'] == 0){

        $file_name = basename(
            $_FILES['project_file']['name']
        );

        $temp_name =
            $_FILES['project_file']['tmp_name'];

        $folder =
            "../uploads/" . $file_name;


        // MOVE FILE

        if(move_uploaded_file(
            $temp_name,
            $folder
        )){

            // =========================
            // INSERT PROJECT
            // =========================

            $query = "

            INSERT INTO projects(

                student_id,
                supervisor_id,
                title,
                abstract,
                file_path,
                status

            )

            VALUES(

                '$student_id',
                '$supervisor_id',
                '$title',
                '$abstract',
                '$file_name',
                'Pending'

            )

            ";


            if(mysqli_query($conn, $query)){

                $message =
                    "Project Uploaded Successfully";

            }else{

                $message =
                    "Upload Failed : "
                    . mysqli_error($conn);

            }

        }else{

            $message =
                "File Upload Failed";

        }

    }else{

        $message =
            "Please select a valid project file";

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

<style>

select{

    width:100%;
    padding:12px;

}

</style>

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


<?php

if($message != ""){

    echo "<p><b>$message</b></p>";

}

?>


<form method="POST"
      enctype="multipart/form-data">


<!-- PROJECT TITLE -->

<input type="text"

       name="title"

       placeholder="Project Title"

       required>


<br><br>


<!-- PROFESSOR SELECT -->

<label>
Select Professor
</label>

<br><br>


<select name="supervisor_id"
        required>

<option value="">
Choose Professor
</option>


<?php

while(
    $professor =
    mysqli_fetch_assoc($professor_result)
){

?>

<option value="<?php

echo $professor['professor_id'];

?>">

<?php

echo "ID: "
    . $professor['professor_id']
    . " - "
    . $professor['name'];

?>

</option>


<?php

}

?>

</select>


<br><br>


<!-- ABSTRACT -->

<textarea name="abstract"

          placeholder="Project Abstract"

          required>

</textarea>


<br><br>


<!-- PROJECT FILE -->

<input type="file"

       name="project_file"

       accept=".pdf,.doc,.docx"

       required>


<br><br>


<button type="submit"
        name="upload_project">

Upload Project

</button>


</form>

</div>

</div>

</body>

</html>