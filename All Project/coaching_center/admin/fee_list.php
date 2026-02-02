<?php
session_start();
include "../db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

$result = mysqli_query($conn,"
    SELECT fees.*, students.name 
    FROM fees 
    JOIN students ON fees.student_id = students.id
    ORDER BY fees.date DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Fee Records</title>

<style>
    body{
        margin:0;
        min-height:100vh;
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #43cea2, #185a9d);
        color:#fff;
        padding:30px;
    }

    h2{
        text-align:center;
        margin-bottom:25px;
    }

    /* PRINT HEADER (hidden on screen) */
    .print-header{
        display:none;
        text-align:center;
        margin-bottom:20px;
    }

    .print-header img{
        width:80px;
        margin-bottom:10px;
    }

    .print-header h1{
        margin:0;
        font-size:24px;
    }

    .print-header p{
        margin:3px 0;
        font-size:14px;
    }

    /* PRINT BUTTON */
    .print-btn{
        position:fixed;
        top:20px;
        right:20px;
        padding:10px 22px;
        background: rgba(0,0,0,.35);
        border:none;
        border-radius:8px;
        color:#fff;
        font-weight:bold;
        cursor:pointer;
        z-index:999;
    }

    .table-box{
        max-width:1000px;
        margin:auto;
        background: rgba(255,255,255,0.12);
        border-radius:15px;
        overflow:hidden;
        box-shadow:0 10px 30px rgba(0,0,0,.3);
    }

    table{
        width:100%;
        border-collapse:collapse;
    }

    th, td{
        padding:12px;
        text-align:center;
    }

    th{
        background: rgba(0,0,0,.3);
    }

    .paid{ 
        color:#0222C7; font-weight:bold; 
    }
    .due{ 
        color: #BD0226; font-weight:bold; 
        }

    .back{
        display:inline-block;
        margin-top:25px;
        padding:10px 20px;
        background: rgba(0,0,0,.3);
        border-radius:8px;
        color:#fff;
        text-decoration:none;
        font-weight:bold;
    }

    /* PRINT MODE */
    @media print{
        body{
            background:#fff !important;
            color:#000 !important;
            padding:0;
        }

        .print-btn, .back, h2{
            display:none !important;
        }

        .print-header{
            display:block;
        }

        .table-box{
            box-shadow:none !important;
            background:#fff !important;
        }

        th{
            background:#eee !important;
            color:#000 !important;
        }
    }
</style>
</head>

<body>

<!-- PRINT HEADER -->
<div class="print-header">
    <!-- CHANGE LOGO PATH -->
    <img src="../assets/logo.png">
    <h1>Dorpon Coaching Center</h1>
    <p>Chittagong, Bangladesh</p>
    <p>Phone: 01XXXXXXXXX</p>
    <hr>
</div>

<h2>Fee Records</h2>

<button class="print-btn" onclick="window.print()">Print</button>

<div class="table-box">
<table>
<tr>
    <th>Student ID</th>
    <th>Name</th>
    <th>Month</th>
    <th>Amount</th>
    <th>Status</th>
    <th>Date</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>
<tr>
    <td><?= $row['student_id']; ?></td>
    <td><?= $row['name']; ?></td>
    <td><?= $row['month']; ?></td>
    <td><?= $row['amount']; ?></td>
    <td class="<?= strtolower($row['status']); ?>">
        <?= $row['status']; ?>
    </td>
    <td><?= date("d-m-Y", strtotime($row['date'])); ?></td>
</tr>
<?php } ?>
</table>
</div>

<center>
<a href="dashboard.php" class="back">← Back to Dashboard</a>
</center>

</body>
</html>
