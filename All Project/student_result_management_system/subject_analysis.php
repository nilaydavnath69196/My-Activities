<?php
include("db.php");

$max_student = null;
$min_student = null;
$stats = null;

if(isset($_GET['subject_id'])){

    $subject_id = $_GET['subject_id'];

    // Highest

    $max_query = mysqli_query($conn,

    "SELECT students.id,
    students.name,
    students.semester,
    subjects.subject_name,
    marks.mark

    FROM marks

    JOIN students
    ON marks.student_id = students.id

    JOIN subjects
    ON marks.subject_id = subjects.id

    WHERE marks.subject_id='$subject_id'

    ORDER BY marks.mark DESC

    LIMIT 1");

    $max_student = mysqli_fetch_assoc($max_query);


    // Lowest

    $min_query = mysqli_query($conn,

    "SELECT students.id,
    students.name,
    students.semester,
    subjects.subject_name,
    marks.mark

    FROM marks

    JOIN students
    ON marks.student_id = students.id

    JOIN subjects
    ON marks.subject_id = subjects.id

    WHERE marks.subject_id='$subject_id'

    ORDER BY marks.mark ASC

    LIMIT 1");

    $min_student = mysqli_fetch_assoc($min_query);


    // Statistics

    $stat_query = mysqli_query($conn,

    "SELECT

    MAX(mark) AS highest,

    MIN(mark) AS lowest,

    AVG(mark) AS average

    FROM marks

    WHERE subject_id='$subject_id'");

    $stats = mysqli_fetch_assoc($stat_query);
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Subject Analysis</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f6fa;
}

.card{
    border:none;
    border-radius:15px;
}

</style>

</head>

<body>

<div class="container mt-5">

<h2 class="text-center mb-4">

📊 Subject Wise Analysis

</h2>


<form method="GET">

<div class="row">

<div class="col-md-10">

<select
name="subject_id"
class="form-control"
required>

<option value="">

Select Subject

</option>

<?php

$subjects = mysqli_query($conn,
"SELECT * FROM subjects");

while($sub=mysqli_fetch_assoc($subjects)){

?>

<option value="<?php echo $sub['id']; ?>">

<?php echo $sub['subject_name']; ?>

</option>

<?php } ?>

</select>

</div>

<div class="col-md-2">

<button
class="btn btn-primary w-100">

Show

</button>

</div>

</div>

</form>


<?php if($max_student){ ?>

<hr>

<div class="row mt-4">

<!-- MAX -->

<div class="col-md-6">

<div class="card shadow p-4 border-success">

<h3 class="text-success">

🏆 Maximum Mark

</h3>

<p>

<b>Subject:</b>

<?php echo $max_student['subject_name']; ?>

</p>

<p>

<b>ID:</b>

<?php echo $max_student['id']; ?>

</p>

<p>

<b>Name:</b>

<?php echo $max_student['name']; ?>

</p>

<p>

<b>Semester:</b>

<?php echo $max_student['semester']; ?>

</p>

<h1 class="text-success">

<?php echo $max_student['mark']; ?>

</h1>

</div>

</div>



<!-- MIN -->

<div class="col-md-6">

<div class="card shadow p-4 border-danger">

<h3 class="text-danger">

📉 Minimum Mark

</h3>

<p>

<b>Subject:</b>

<?php echo $min_student['subject_name']; ?>

</p>

<p>

<b>ID:</b>

<?php echo $min_student['id']; ?>

</p>

<p>

<b>Name:</b>

<?php echo $min_student['name']; ?>

</p>

<p>

<b>Semester:</b>

<?php echo $min_student['semester']; ?>

</p>

<h1 class="text-danger">

<?php echo $min_student['mark']; ?>

</h1>

</div>

</div>

</div>


<!-- Statistics -->

<div class="card shadow p-4 mt-4">

<h3>

📈 Subject Statistics

</h3>

<table class="table table-bordered">

<tr>

<th>Highest Mark</th>

<th>Lowest Mark</th>

<th>Average Mark</th>

</tr>

<tr>

<td>

<?php echo $stats['highest']; ?>

</td>

<td>

<?php echo $stats['lowest']; ?>

</td>

<td>

<?php echo round($stats['average'],2); ?>

</td>

</tr>

</table>

</div>

<?php } ?>


<div class="text-center mt-4">

<a
href="index.php"
class="btn btn-dark">

Back Dashboard

</a>

</div>

</div>

</body>
</html>