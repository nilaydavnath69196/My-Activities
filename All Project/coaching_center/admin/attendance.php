<?php
session_start();
include "../db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

$students = mysqli_query($conn, "SELECT * FROM students WHERE status='Active'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Attendance</title>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        min-height: 100vh;
        background: linear-gradient(135deg, #11998e, #38ef7d);
        display: flex;
        flex-direction: column;
        align-items: center;
        color: #fff;
    }

    h2 {
        margin-top: 40px;
        margin-bottom: 30px;
        font-size: 32px;
        letter-spacing: 2px;
        border-right: 3px solid #fff;
        white-space: nowrap;
        overflow: hidden;
        animation: typing 2s steps(12), blink .7s infinite;
    }

    form {
        background: rgba(255,255,255,0.12);
        padding: 30px 40px;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.25);
        width: 95%;
        max-width: 650px;
        animation: slideIn 1s ease;
    }

    .student-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
        padding: 12px 15px;
        margin-bottom: 12px;
        border-radius: 10px;
        background: rgba(255,255,255,0.08);
        transition: all 0.3s ease;
    }

    .student-row:hover {
        background: rgba(255,255,255,0.18);
        transform: scale(1.02);
    }

    .student-info {
        display: flex;
        gap: 15px;
        align-items: center;
        font-weight: bold;
    }

    .student-id {
        background: rgba(0,0,0,0.4);
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 13px;
    }

    select {
        padding: 6px 12px;
        border-radius: 6px;
        border: none;
        font-weight: bold;
        outline: none;
    }

    input[type="submit"] {
        margin-top: 20px;
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 10px;
        background: #fff;
        color: #0b7935;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }

    input[type="submit"]:hover {
        background: #e6ffe6;
        transform: scale(1.04);
    }

    .view-btn, .back-link {
        margin: 15px 5px;
        padding: 10px 25px;
        background: rgba(0,0,0,0.35);
        border-radius: 10px;
        text-decoration: none;
        color: #fff;
        font-weight: bold;
        transition: 0.3s;
        display: inline-block;
    }

    .view-btn:hover, .back-link:hover {
        background: rgba(0,0,0,0.55);
        transform: scale(1.05);
    }

    @keyframes typing {
        from { width: 0 }
        to { width: 11ch }
    }

    @keyframes blink {
        50% { border-color: transparent }
    }

    @keyframes slideIn {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @media(max-width: 600px) {
        .student-row {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>
</head>

<body>

<h2>Attendance</h2>

<form method="post" action="attendance_save.php">
    <?php while ($s = mysqli_fetch_assoc($students)) { ?>
    <div class="student-row">
        <div class="student-info">
            <span class="student-id">ID: <?= $s['id']; ?></span>
            <span><?= $s['name']; ?></span>
        </div>

        <input type="hidden" name="student_id[]" value="<?= $s['id']; ?>">

        <select name="status[]">
            <option value="Present">Present</option>
            <option value="Absent">Absent</option>
        </select>
    </div>

    <?php } ?>

    <input type="submit" value="Save Attendance">
</form>

<a href="attendance_view.php" class="view-btn">View Attendance</a>
<a href="dashboard.php" class="back-link">Back to Dashboard</a>

</body>
</html>
