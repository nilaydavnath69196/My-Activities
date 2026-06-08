<?php
include("db.php");

if(isset($_POST['add_subject'])){

    $subject_id = $_POST['subject_id'];
    $subject_name = $_POST['subject_name'];
    $subject_code = $_POST['subject_code'];
    $credit = $_POST['credit'];

    $query = "INSERT INTO subjects
    (id,subject_name,subject_code,credit)

    VALUES

    ('$subject_id','$subject_name',
    '$subject_code','$credit')";

    mysqli_query($conn,$query);

    echo "<script>alert('Subject Added Successfully')</script>";
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Add Subject</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background:#f4f4f4;">

<div class="container mt-5">

    <div class="card p-4 shadow">

        <h2 class="text-center mb-4">
            Add Subject
        </h2>

        <form method="POST">

            <input type="number"
            name="subject_id"
            class="form-control mb-3"
            placeholder="Subject ID"
            required>


            <input type="text"
            name="subject_name"
            class="form-control mb-3"
            placeholder="Subject Name"
            required>


            <input type="text"
            name="subject_code"
            class="form-control mb-3"
            placeholder="Subject Code"
            required>


            <input type="number"
            name="credit"
            class="form-control mb-3"
            placeholder="Credit"
            required>


            <button type="submit"
            name="add_subject"
            class="btn btn-success w-100">

            Add Subject

            </button>

        </form>

    </div>

</div>

</body>
</html>