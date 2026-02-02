<?php
session_start();
include "../db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

// Fetch all attendance records with student names
$attendance = mysqli_query($conn, "
    SELECT a.id, s.name, s.class, a.status, a.date 
    FROM attendance a
    JOIN students s ON a.student_id = s.id
    ORDER BY a.date DESC, s.name ASC
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Attendance Records</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0 20px 50px 20px;
        min-height: 100vh;
        background: linear-gradient(135deg, #ff416c, #ff4b2b);
        color: #fff;
    }

    h2 {
        margin-top: 40px;
        margin-bottom: 20px;
        font-size: 32px;
        text-shadow: 1px 1px 5px rgba(0,0,0,0.3);
        overflow: hidden;
        border-right: .15em solid #fff;
        white-space: nowrap;
        letter-spacing: .1em;
        animation: typing 2s steps(25, end), blink 0.75s step-end infinite, fadeIn 1.5s ease-in-out;
    }

    /* Back button */
    .back-link {
        display: inline-block;
        margin-bottom: 20px;
        padding: 10px 20px;
        background: rgba(0,0,0,0.3);
        border-radius: 8px;
        text-decoration: none;
        color: #fff;
        font-weight: bold;
        transition: all 0.3s ease;
    }
    .back-link:hover {
        background: rgba(0,0,0,0.5);
        transform: scale(1.05);
    }

    /* Print button fixed */
    .print-btn {
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 10px 20px;
        background: rgba(0,0,0,0.3);
        border-radius: 8px;
        color: #fff;
        font-weight: bold;
        border: none;
        cursor: pointer;
        z-index: 999;
        transition: all 0.3s ease;
    }
    .print-btn:hover {
        background: rgba(0,0,0,0.5);
        transform: scale(1.05);
    }

    table {
        border-collapse: collapse;
        width: 100%;
        max-width: 1000px;
        background: rgba(255,255,255,0.1);
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0,0,0,0.3);
        animation: slideIn 1s ease-out;
        margin-bottom: 50px;
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

    /* Animations */
    @keyframes fadeIn {
        0% {opacity: 0; transform: translateY(-20px);}
        100% {opacity: 1; transform: translateY(0);}
    }

    @keyframes slideIn {
        0% {opacity: 0; transform: translateY(20px);}
        100% {opacity: 1; transform: translateY(0);}
    }

    @keyframes typing {
        from { width: 0; }
        to { width: 20ch; }
    }

    @keyframes blink {
        50% { border-color: transparent; }
    }

    @media(max-width:768px) {
        h2 {
            font-size: 24px;
        }
        th, td {
            font-size: 14px;
            padding: 8px 10px;
        }
    }

    /* Print styles */
    @media print {
        body {
            background: #fff !important;
            color: #000 !important;
        }
        table {
            background: #fff !important;
            color: #000 !important;
            box-shadow: none !important;
        }
        .print-btn, .back-link, h2 {
            display: none;
        }
    }
</style>
</head>
<body>

<h2>Attendance Records</h2>

<a href="attendance.php" class="back-link">Back to Attendance</a>
<button class="print-btn" onclick="window.print()">Print</button>

<table>
    <tr>
        <th>ID</th>
        <th>Student Name</th>
        <th>Class</th>
        <th>Status</th>
        <th>Date</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($attendance)) { ?>
    <tr>
        <td><?= $row['id']; ?></td>
        <td><?= $row['name']; ?></td>
        <td><?= $row['class']; ?></td>
        <td><?= $row['status']; ?></td>
        <td><?= date("d-m-Y", strtotime($row['date'])); ?></td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
