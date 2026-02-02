<?php
session_start();
include "../db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

$income = mysqli_fetch_assoc(
    mysqli_query($conn,"
        SELECT 
            SUM(CASE WHEN status='Paid' THEN amount ELSE 0 END) AS paid,
            SUM(CASE WHEN status='Due' THEN amount ELSE 0 END) AS due
        FROM fees
    ")
);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Monthly Report</title>

<style>
    body{
        margin:0;
        min-height:100vh;
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #8360c3, #2ebf91);
        color:#fff;
        padding:30px;
    }

    /* HIGHLIGHT TITLE */
    .title{
        text-align:center;
        margin-bottom:30px;
        font-size:28px;
        font-weight:bold;
        padding:12px 30px;
        display:inline-block;
        background: linear-gradient(90deg, #ffdd00, #ff9f1a);
        color:#333;
        border-radius:40px;
        box-shadow:0 5px 20px rgba(0,0,0,.3);
        animation: glow 1.5s infinite alternate;
    }

    @keyframes glow{
        from{box-shadow:0 0 10px rgba(255,221,0,.5);}
        to{box-shadow:0 0 25px rgba(255,221,0,1);}
    }

    /* PRINT HEADER */
    .print-header{
        display:none;
        text-align:center;
        margin-bottom:20px;
    }

    .print-header img{
        width:90px;
        margin-bottom:10px;
    }

    .print-header h1{
        margin:0;
        font-size:26px;
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

    .report-wrapper{
        display:flex;
        justify-content:center;
        gap:30px;
        flex-wrap:wrap;
        margin-top:10px;
    }

    .report-box{
        width:260px;
        padding:25px;
        border-radius:15px;
        text-align:center;
        box-shadow:0 10px 25px rgba(0,0,0,.3);
        transition:.3s;
    }

    .report-box:hover{
        transform:translateY(-8px);
    }

    .paid{
        background: linear-gradient(135deg, #00c9a7, #00b894);
    }

    .due{
        background: linear-gradient(135deg, #ff7675, #d63031);
    }

    .report-box h3{
        margin-bottom:10px;
        font-size:20px;
    }

    .report-box p{
        font-size:28px;
        font-weight:bold;
        margin:0;
    }

    .chart-container{
        width:300px;
        margin:40px auto 0;
        background: rgba(255,255,255,.15);
        padding:20px;
        border-radius:20px;
        box-shadow:0 10px 25px rgba(0,0,0,.3);
    }

    /* BACK BUTTON */
    .back{
        display:inline-block;
        margin:35px auto 0;
        padding:12px 28px;
        background: rgba(0,0,0,.35);
        border-radius:10px;
        color:#fff;
        text-decoration:none;
        font-weight:bold;
        transition:.3s;
    }

    .back:hover{
        background: rgba(0,0,0,.6);
        transform:scale(1.05);
    }

    /* PRINT MODE */
    @media print{
        body{
            background:#fff !important;
            color:#000 !important;
            padding:0;
        }

        .print-btn,
        .chart-container,
        .back{
            display:none !important;
        }

        .title{
            display:none;
        }

        .print-header{
            display:block;
        }

        .report-box{
            box-shadow:none !important;
            color:#000 !important;
        }

        .paid, .due{
            background:#f5f5f5 !important;
        }
    }
</style>
</head>

<body>

<!-- PRINT HEADER -->
<div class="print-header">
    <img src="../assets/logo.png">
    <h1>Dorpon Coaching Center</h1>
    <p>Chittagong, Bangladesh</p>
    <p>Phone: 01XXXXXXXXX</p>
    <hr>
    <h3>Monthly Financial Report</h3>
</div>

<center>
    <div class="title">📊 Monthly Report</div>
</center>

<button class="print-btn" onclick="window.print()">Print</button>

<div class="report-wrapper">
    <div class="report-box paid">
        <h3>Paid Amount</h3>
        <p>৳ <?= $income['paid'] ?? 0; ?></p>
    </div>

    <div class="report-box due">
        <h3>Due Amount</h3>
        <p>৳ <?= $income['due'] ?? 0; ?></p>
    </div>
</div>

<div class="chart-container">
    <canvas id="feeChart"></canvas>
</div>

<center>
    <a href="dashboard.php" class="back">← Back to Dashboard</a>
</center>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('feeChart');
new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Paid', 'Due'],
        datasets: [{
            data: [<?= $income['paid'] ?? 0 ?>, <?= $income['due'] ?? 0 ?>],
            backgroundColor: ['#00c9a7', '#ff7675']
        }]
    }
});
</script>

</body>
</html>
