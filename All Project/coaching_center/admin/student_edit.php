<?php
session_start();
include "../db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM students WHERE id=$id"));

if (isset($_POST['update'])) {
    $name   = $_POST['name'];
    $class  = $_POST['class'];
    $phone  = $_POST['phone'];
    $status = $_POST['status'];

    mysqli_query($conn, "UPDATE students SET 
        name='$name', class='$class', phone='$phone', status='$status' 
        WHERE id=$id");

    header("Location: student_list.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }
        .card {
            width: 500px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }
        .card-header {
            border-radius: 15px 15px 0 0;
        }
        .btn-custom {
            background: linear-gradient(135deg, #2575fc, #6a11cb);
            color: #fff;
            font-weight: bold;
            border: none;
        }
        .btn-custom:hover {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
    </style>
</head>
<body>

<div class="card">
    <div class="card-header bg-primary text-white text-center">
        <h3>Edit Student</h3>
    </div>
    <div class="card-body">
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" value="<?= $data['name']; ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Class</label>
                <input type="text" name="class" value="<?= $data['class']; ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" value="<?= $data['phone']; ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option <?= $data['status']=="Active"?"selected":""; ?>>Active</option>
                    <option <?= $data['status']=="Inactive"?"selected":""; ?>>Inactive</option>
                </select>
            </div>

            <button type="submit" name="update" class="btn btn-custom w-100">Update Student</button>
        </form>
    </div>
</div>

</body>
</html>
