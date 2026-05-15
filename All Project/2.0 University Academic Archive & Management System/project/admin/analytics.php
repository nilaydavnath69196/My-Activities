<?php
include("../includes/admin_session.php");
include("../includes/db.php");

$students = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM students"));
$professors = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM professors"));
$projects = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM projects"));
$messages = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM messages"));
?>

<!DOCTYPE html>
<html>
<head>
<title>Analytics</title>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
body{margin:0;font-family:Segoe UI;background:#0f172a;color:white;display:flex;}
.sidebar{width:250px;height:100vh;position:fixed;background:#111827;padding:20px;}
.sidebar a{display:block;color:white;padding:10px;margin:5px 0;text-decoration:none;background:#1f2937;border-radius:8px;}
.content{margin-left:250px;padding:30px;width:100%;}
.cards{display:grid;grid-template-columns:repeat(2,1fr);gap:20px;}
.card{background:#1f2937;padding:20px;border-radius:12px;text-align:center;}
canvas{background:white;border-radius:10px;margin-top:30px;}
</style>

</head>

<body>

<div class="sidebar">
<h2>Admin Panel</h2>
<a href="dashboard.php">Dashboard</a>
<a href="students.php">Students</a>
<a href="professors.php">Professors</a>
<a href="analytics.php">Analytics</a>
<a href="../logout.php">Logout</a>
</div>

<div class="content">

<h1>Analytics Dashboard</h1>

<div class="cards">

<div class="card">Students<br><h2><?= $students ?></h2></div>
<div class="card">Professors<br><h2><?= $professors ?></h2></div>
<div class="card">Projects<br><h2><?= $projects ?></h2></div>
<div class="card">Messages<br><h2><?= $messages ?></h2></div>

</div>

<canvas id="chart"></canvas>

<script>
new Chart(document.getElementById("chart"),{
type:"bar",
data:{
labels:["Students","Professors","Projects","Messages"],
datasets:[{
label:"System Stats",
data:[<?= $students ?>,<?= $professors ?>,<?= $projects ?>,<?= $messages ?>]
}]
}
});
</script>

</div>

</body>
</html>