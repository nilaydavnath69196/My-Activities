<?php
include("db.php");

/* ---------- FETCH STUDENTS ---------- */
$students = mysqli_query($conn, "SELECT id FROM students");

/* ---------- FETCH SUBJECTS ---------- */
$subjects = mysqli_query($conn, "SELECT id FROM subjects");


if(isset($_POST['add_marks'])){

    $student_id = $_POST['student_id'];
    $subject_id = $_POST['subject_id'];
    $mark = $_POST['mark'];

    // SAFE INSERT (IMPORTANT)
    $query = "INSERT INTO marks (student_id, subject_id, mark)
              VALUES ('$student_id', '$subject_id', '$mark')";

    $result = mysqli_query($conn, $query);

    if($result){
        echo "<script>alert('Marks Added Successfully');</script>";
    }
    else{
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Marks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f4f4f4;">

<div class="container mt-5">

    <div class="card p-4 shadow">

        <h2 class="text-center mb-4">Add Marks</h2>

        <form method="POST">

            <!-- STUDENT ID DROPDOWN -->
            <select name="student_id" class="form-control mb-3" required>
                <option value="">Select Student</option>
                <?php while($row = mysqli_fetch_assoc($students)){ ?>
                    <option value="<?php echo $row['id']; ?>">
                        Student ID: <?php echo $row['id']; ?>
                    </option>
                <?php } ?>
            </select>

            <!-- SUBJECT ID DROPDOWN -->
            <select name="subject_id" class="form-control mb-3" required>
                <option value="">Select Subject</option>
                <?php while($row = mysqli_fetch_assoc($subjects)){ ?>
                    <option value="<?php echo $row['id']; ?>">
                        Subject ID: <?php echo $row['id']; ?>
                    </option>
                <?php } ?>
            </select>

            <input type="number"
                   name="mark"
                   class="form-control mb-3"
                   placeholder="Enter Mark"
                   required>

            <button type="submit"
                    name="add_marks"
                    class="btn btn-warning w-100">
                Add Marks
            </button>

        </form>

    </div>

</div>

</body>
</html>