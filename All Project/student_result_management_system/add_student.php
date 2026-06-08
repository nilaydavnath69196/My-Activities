<?php
include("db.php");

if(isset($_POST['add_student'])){

    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $semester = $_POST['semester'];
    $session = $_POST['session'];

    $query = "INSERT INTO students
    (id,name,phone,department,semester,session)

    VALUES

    ('$student_id','$name','$phone',
    '$department','$semester','$session')";

    mysqli_query($conn,$query);

    echo "<script>alert('Student Added Successfully')</script>";
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Add Student</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background:#f4f4f4;">

<div class="container mt-5">

    <div class="card p-4 shadow">

        <h2 class="text-center mb-4">
            Add Student
        </h2>

        <form method="POST">

            <input type="number"
            name="student_id"
            class="form-control mb-3"
            placeholder="Student ID"
            required>


            <input type="text"
            name="name"
            class="form-control mb-3"
            placeholder="Student Name"
            required>


            <input type="text"
            name="phone"
            class="form-control mb-3"
            placeholder="Phone Number"
            required>


            <input type="text"
            name="department"
            class="form-control mb-3"
            placeholder="Department"
            required>


            <input type="text"
            name="semester"
            class="form-control mb-3"
            placeholder="Semester"
            required>


            <input type="text"
            name="session"
            class="form-control mb-3"
            placeholder="Session"
            required>


            <button type="submit"
            name="add_student"
            class="btn btn-primary w-100">

            Add Student

            </button>

        </form>

    </div>

</div>

</body>
</html>