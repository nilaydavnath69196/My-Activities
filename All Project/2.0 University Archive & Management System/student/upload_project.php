<?php

include("../includes/student_session.php");

include("../includes/db.php");

$message = "";

// =========================
// GET PROFESSORS
// =========================

$professor_query =
"SELECT * FROM professors";

$professor_result =
mysqli_query($conn,$professor_query);

// =========================
// UPLOAD PROJECT
// =========================

if(isset($_POST['upload_project'])){

    $title =
    $_POST['title'];

    $abstract =
    $_POST['abstract'];

    $professor_id =
    $_POST['professor_id'];

    $student_id =
    $_SESSION['student_id'];

    // FILE

    $file_name =
    $_FILES['project_file']['name'];

    $temp_name =
    $_FILES['project_file']['tmp_name'];

    $folder =
    "../uploads/" . $file_name;

    // MOVE FILE

    move_uploaded_file(
    $temp_name,
    $folder
    );

    // INSERT QUERY

    $query = "

    INSERT INTO projects(

    student_id,
    professor_id,
    title,
    abstract,
    file_path,
    status

    )

    VALUES(

    '$student_id',
    '$professor_id',
    '$title',
    '$abstract',
    '$file_name',
    'Pending'

    )

    ";

    // EXECUTE

    if(mysqli_query($conn, $query)){

        $message =
        "Project Uploaded Successfully";

    }else{

        $message =
        "Upload Failed : "
        . mysqli_error($conn);

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

<form method="POST"
enctype="multipart/form-data">

<input type="text"

name="title"

placeholder="Project Title"

required>

<input type="text"

name="title"

placeholder="Write Course Name"

required>

<br><br>

<!-- PROFESSOR SELECT -->

<label>
Select Professor
</label>

<br><br>

<select name="professor_id" required>

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

echo
"ID: "
.
$professor['professor_id']
.
" - "
.
$professor['name'];

?>

</option>

<?php
}
?>

</select>

<br><br>

<textarea name="abstract"

placeholder="Project Abstract"

required>

</textarea>

<br><br>

<input type="file"

name="project_file"

required>

<br><br>

<button name="upload_project">

Upload Project

</button>

</form>

<br>

<b>

<?php
echo $message;
?>

</b>

</div>

</div>

</body>
</html>