<?php 
session_start();
include "../db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM students");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student List</title>
<style>
    /* Background gradient */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        min-height: 100vh;
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        display: flex;
        flex-direction: column;
        align-items: center;
        color: #fff;
    }

    h2 {
        margin-top: 40px;
        margin-bottom: 20px;
        text-shadow: 1px 1px 5px rgba(0,0,0,0.3);
        animation: fadeIn 1.5s ease-in-out;
    }

    /* Table styling */
    table {
        border-collapse: collapse;
        width: 90%;
        max-width: 1000px;
        background: rgba(255,255,255,0.1);
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        animation: slideIn 1s ease-out;
    }

    th, td {
        padding: 12px 15px;
        text-align: center;
    }

    th {
        background: rgba(255,255,255,0.2);
        font-weight: 600;
        letter-spacing: 1px;
    }

    tr {
        transition: all 0.3s ease;
        cursor: default;
    }

    tr:hover {
        background: rgba(255,255,255,0.2);
        transform: scale(1.02);
    }

    /* Action buttons */
    .action {
        padding: 5px 10px;
        border-radius: 5px;
        text-decoration: none;
        color: #fff;
        font-weight: bold;
        transition: all 0.3s ease;
        margin: 0 3px;
    }

    .edit {
        background: #28a745;
    }

    .edit:hover {
        background: #1e7e34;
        transform: scale(1.1);
    }

    .delete {
        background: #dc3545;
    }

    .delete:hover {
        background: #a71d2a;
        transform: scale(1.1);
    }

    /* Back link */
    a[href="dashboard.php"] {
        margin: 30px 0;
        display: inline-block;
        padding: 10px 20px;
        background: rgba(0,0,0,0.3);
        border-radius: 8px;
        text-decoration: none;
        color: #fff;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    a[href="dashboard.php"]:hover {
        background: rgba(0,0,0,0.5);
        transform: scale(1.05);
    }

    /* Animations */
    @keyframes fadeIn {
        0% {opacity: 0; transform: translateY(-20px);}
        100% {opacity: 1; transform: translateY(0);}
    }

    @keyframes slideIn {
        0% {opacity: 0; transform: translateY(20px);}
        100% {opacity: 1; transform: translateY(0);}
    }

    /* Responsive */
    @media(max-width:768px) {
        table, th, td {
            font-size: 14px;
        }

        h2 {
            font-size: 22px;
        }
    }
</style>
</head>
<body>

<h2>Student List</h2>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Class</th>
    <th>Phone</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?= $row['id']; ?></td>
    <td><?= $row['name']; ?></td>
    <td><?= $row['class']; ?></td>
    <td><?= $row['phone']; ?></td>
    <td><?= $row['status']; ?></td>
    <td>
        <a href="student_edit.php?id=<?= $row['id']; ?>" class="action edit">Edit</a>
        <a href="student_delete.php?id=<?= $row['id']; ?>" class="action delete">Delete</a>
    </td>
</tr>
<?php } ?>

</table>

<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>
