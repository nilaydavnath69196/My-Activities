<?php
include("../includes/admin_session.php");
include("../includes/db.php");

/* ADD STUDENT */
if(isset($_POST['add_student'])){

    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $password = $_POST['password'];

    mysqli_query($conn,
    "INSERT INTO students
    (student_id,name,email,phone,department,password)
    VALUES
    ('$student_id','$name','$email','$phone','$department','$password')");
}

/* DELETE STUDENT */
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn,"DELETE FROM students WHERE student_id='$id'");
}

/* FETCH */
$result = mysqli_query($conn,"SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin - Students</title>

<style>
body{
    margin:0;
    font-family:Segoe UI;
    background:linear-gradient(135deg,#0f172a,#1e293b);
    color:white;
    display:flex;
}

/* SIDEBAR */
.sidebar{
    width:260px;
    height:100vh;
    position:fixed;
    background:rgba(255,255,255,0.06);
    backdrop-filter:blur(15px);
    padding:20px;
}

.sidebar a{
    display:block;
    padding:10px;
    margin:6px 0;
    text-decoration:none;
    color:white;
    background:rgba(255,255,255,0.05);
    border-radius:10px;
}

/* CONTENT */
.content{
    margin-left:260px;
    padding:30px;
    width:100%;
}

/* CARD */
.card{
    background:rgba(255,255,255,0.08);
    padding:20px;
    border-radius:15px;
    margin-bottom:20px;
    backdrop-filter:blur(15px);
}

/* INPUT */
input{
    width:100%;
    padding:10px;
    margin:6px 0;
    border:none;
    border-radius:8px;
    outline:none;
}

/* BUTTON */
button{
    width:100%;
    padding:10px;
    border:none;
    border-radius:10px;
    background:linear-gradient(135deg,#00c6ff,#0072ff);
    color:white;
    cursor:pointer;
}

/* TABLE */
table{
    width:100%;
    border-collapse:collapse;
    background:rgba(255,255,255,0.05);
    border-radius:10px;
    overflow:hidden;
}

th,td{
    padding:10px;
    text-align:center;
    border:1px solid rgba(255,255,255,0.1);
}

a.delete{
    color:red;
    text-decoration:none;
}
</style>

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

<h2>Admin Panel</h2>

<a href="dashboard.php">Dashboard</a>
<a href="students.php">Students</a>
<a href="professors.php">Professors</a>
<a href="analytics.php">Analytics</a>
<a href="../logout.php">Logout</a>

</div>

<!-- CONTENT -->
<div class="content">

<!-- ADD STUDENT -->
<div class="card">

<h2>Add Student</h2>

<form method="POST">

<input type="text" name="student_id" placeholder="Student ID" required>

<input type="text" name="name" placeholder="Name" required>

<input type="email" name="email" placeholder="Email" required>

<input type="text" name="phone" placeholder="Phone Number" required>

<input type="text" name="department" placeholder="Department" required>

<input type="password" name="password" placeholder="Password" required>

<button name="add_student">Add Student</button>

</form>

</div>

<!-- STUDENT LIST -->
<div class="card">

<h2>Student List</h2>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Department</th>
<th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>
<td><?php echo $row['student_id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['department']; ?></td>
<td>
<a class="delete" href="?delete=<?php echo $row['student_id']; ?>">Delete</a>
</td>
</tr>

<?php } ?>

</table>

</div>

</div>

</body>
</html>