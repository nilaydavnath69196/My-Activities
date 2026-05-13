<?php
include("../includes/admin_session.php");
include("../includes/db.php");

if(isset($_POST['add_prof'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    mysqli_query($conn,
    "INSERT INTO professors(name,email,password)
     VALUES('$name','$email','$password')");
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn,"DELETE FROM professors WHERE professor_id=$id");
}

$result = mysqli_query($conn,"SELECT * FROM professors");
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Professors</title>

<style>
body{margin:0;font-family:Segoe UI;background:#0f172a;color:white;display:flex;}
.sidebar{width:250px;height:100vh;position:fixed;background:#111827;padding:20px;}
.sidebar a{display:block;color:white;padding:10px;margin:5px 0;text-decoration:none;background:#1f2937;border-radius:8px;}
.content{margin-left:250px;padding:30px;width:100%;}
.card{background:#1f2937;padding:20px;border-radius:12px;margin-bottom:20px;}
input{width:100%;padding:10px;margin:5px 0;border-radius:8px;border:none;}
button{padding:10px;width:100%;background:#00c6ff;border:none;color:white;border-radius:10px;}
table{width:100%;border-collapse:collapse;background:#111827;}
td,th{padding:10px;border:1px solid #374151;}
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

<div class="card">
<h2>Add Professor</h2>
<form method="POST">
<input name="name" placeholder="Name">
<input name="email" placeholder="Email">
<input name="password" placeholder="Password">
<button name="add_prof">Add</button>
</form>
</div>

<div class="card">
<h2>Professor List</h2>

<table>
<tr>
<th>ID</th><th>Name</th><th>Email</th><th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>
<tr>
<td><?= $row['professor_id'] ?></td>
<td><?= $row['name'] ?></td>
<td><?= $row['email'] ?></td>
<td>
<a style="color:red" href="?delete=<?= $row['professor_id'] ?>">Delete</a>
</td>
</tr>
<?php } ?>

</table>

</div>

</div>

</body>
</html>