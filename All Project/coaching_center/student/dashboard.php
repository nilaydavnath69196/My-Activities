<?php 
session_start();
include "../db.php";   

if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['student_id'];

$student = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM students WHERE id=$id")
);

$fees = mysqli_query($conn,
    "SELECT * FROM fees WHERE student_id=$id");

$attendance = mysqli_query($conn,
    "SELECT * FROM attendance WHERE student_id=$id");

/* STATS */
$totalFeesPaid = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(amount) total FROM fees WHERE student_id=$id AND status='Paid'"))['total'] ?? 0;
$totalFeesDue  = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(amount) total FROM fees WHERE student_id=$id AND status='Due'"))['total'] ?? 0;
$totalAttendanceDays = mysqli_num_rows($attendance);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Dashboard</title>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

*{margin:0; padding:0; box-sizing:border-box; font-family:'Poppins', sans-serif;}

body{
    min-height:100vh;
    display:flex;
    background: linear-gradient(135deg, #667eea, #764ba2, #6dd5fa);
    background-size: 400% 400%;
    animation: gradientBG 15s ease infinite;
}

/* SIDEBAR */
.sidebar{
    width:250px;
    background: rgba(0,0,0,.35);
    backdrop-filter: blur(15px);
    padding:25px;
    display:flex;
    flex-direction:column;
    color:#fff;
}
.sidebar h2{
    text-align:center;
    margin-bottom:30px;
    font-size:22px;
}
.sidebar a{
    color:#fff;
    text-decoration:none;
    margin:10px 0;
    padding:10px;
    border-radius:10px;
    transition:.3s;
}
.sidebar a:hover{
    background: rgba(255,255,255,.2);
}

/* MAIN */
.main{
    flex:1;
    padding:25px;
}

/* PROFILE */
.profile{
    display:flex;
    align-items:center;
    gap:15px;
    margin-bottom:25px;
}
.profile img{
    width:60px;
    height:60px;
    border-radius:50%;
    object-fit:cover;
    border:2px solid #fff;
}
.profile h2{
    font-size:24px;
}

/* STATS CARDS */
.stats{
    display:grid;
    grid-template-columns: repeat(auto-fit,minmax(200px,1fr));
    gap:20px;
    margin-bottom:30px;
}
.card{
    background: rgba(255,255,255,0.15);
    padding:20px;
    border-radius:15px;
    backdrop-filter: blur(10px);
    box-shadow:0 8px 25px rgba(0,0,0,.3);
    text-align:center;
    transition:.3s;
}
.card:hover{ transform: translateY(-5px);}
.card h3{ margin-bottom:12px; font-size:18px;}
.card p{ font-size:22px; font-weight:bold;}

/* CONTENT CARDS */
.content-card{
    background: rgba(255,255,255,0.15);
    padding:20px;
    border-radius:15px;
    backdrop-filter: blur(10px);
    box-shadow:0 8px 25px rgba(0,0,0,.3);
    margin-bottom:25px;
}
.content-card h3{
    margin-bottom:15px;
    border-bottom:1px solid rgba(255,255,255,.3);
    padding-bottom:8px;
}

/* BUTTONS */
.btn{
    padding:10px 18px;
    background: rgba(255,255,255,.2);
    color:#fff;
    text-decoration:none;
    border-radius:10px;
    margin-top:10px;
    display:inline-block;
    transition:.3s;
}
.btn:hover{
    background: rgba(255,255,255,.35);
}

/* PRINT HEADER */
@media print{
    body{
        background:#fff !important;
        color:#000 !important;
    }
    .sidebar,.btn{ display:none !important; }
    .print-header{ display:block; text-align:center; margin-bottom:20px; }
}
.print-header{ display:none; }

/* ANIMATIONS */
@keyframes gradientBG{
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
}

/* LAYOUT */
.container{
    display:flex;
}
.main-content{ flex:1; padding-left:30px;}
</style>
</head>
<body>
<div class="container">
    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>🎓 Student Panel</h2>
        <a href="#">🏠 Dashboard</a>
        <a href="#">📋 My Profile</a>
        <a href="#">💰 Fee Status</a>
        <a href="#">🕒 Attendance</a>
        <a href="logout.php">🚪 Logout</a>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content main">
        <!-- PRINT HEADER -->
        <div class="print-header">
            <img src="../assets/logo.png" style="width:80px;"><br>
            <h1>ABC Coaching Center</h1>
            <p>Address | Phone</p>
            <hr>
        </div>

        <!-- PROFILE -->
        <div class="profile">
            <img src="../assets/default-profile.png" alt="Profile Picture">
            <h2>Welcome, <?= $student['name']; ?></h2>
        </div>

        <!-- STATS CARDS -->
        <div class="stats">
            <div class="card">
                <h3>Total Fees Paid</h3>
                <p>৳ <?= $totalFeesPaid ?></p>
            </div>
            <div class="card">
                <h3>Total Fees Due</h3>
                <p>৳ <?= $totalFeesDue ?></p>
            </div>
            <div class="card">
                <h3>Attendance Days</h3>
                <p><?= $totalAttendanceDays ?></p>
            </div>
        </div>

        <!-- FEE STATUS -->
        <div class="content-card">
            <h3>Fee Status</h3>
            <?php 
            mysqli_data_seek($fees,0); // reset pointer
            while($f = mysqli_fetch_assoc($fees)){ ?>
                <p><?= $f['month']; ?> - <b><?= $f['status']; ?></b> (৳<?= $f['amount']; ?>)</p>
            <?php } ?>
            <a href="#" onclick="window.print();" class="btn">🖨 Print Fee</a>
        </div>

        <!-- ATTENDANCE -->
        <div class="content-card">
            <h3>Attendance</h3>
            <?php 
            mysqli_data_seek($attendance,0);
            while($a = mysqli_fetch_assoc($attendance)){ ?>
                <p><?= $a['date']; ?> - <b><?= $a['status']; ?></b></p>
            <?php } ?>
            <a href="#" onclick="window.print();" class="btn">🖨 Print Attendance</a>
        </div>

    </div>
</div>
</body>
</html>















<!-- Another CSS desing
 /*   <?php 
session_start();
include "../db.php";   

if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['student_id'];

$student = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM students WHERE id=$id")
);

$fees = mysqli_query($conn,
    "SELECT * FROM fees WHERE student_id=$id");

$attendance = mysqli_query($conn,
    "SELECT * FROM attendance WHERE student_id=$id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Dashboard</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
<style>
    * {margin:0; padding:0; box-sizing:border-box; font-family: 'Roboto', sans-serif;}
    body {
        min-height: 100vh;
        background: linear-gradient(-45deg, #4e73df, #1cc88a, #36b9cc, #f6c23e);
        background-size: 400% 400%;
        animation: gradientBG 15s ease infinite;
        color: #333;
    }
    @keyframes gradientBG {
        0% {background-position: 0% 50%;}
        50% {background-position: 100% 50%;}
        100% {background-position: 0% 50%;}
    }
    header {
        background: linear-gradient(90deg, #1cc88a, #36b9cc);
        color: white;
        padding: 30px 20px;
        text-align: center;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        font-size: 26px;
        font-weight: 700;
    }
    .container {
        max-width: 900px;
        margin: 30px auto;
        padding: 0 20px;
    }
    .card {
        background: rgba(255,255,255,0.95);
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.2);
    }
    h3 {
        color: #1cc88a;
        margin-bottom: 15px;
        border-bottom: 2px solid #1cc88a;
        display: inline-block;
        padding-bottom: 5px;
    }
    .list-item {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #eee;
    }
    .list-item:last-child {
        border-bottom: none;
    }
    .status-paid {
        color: green;
        font-weight: bold;
    }
    .status-unpaid {
        color: red;
        font-weight: bold;
    }
    .logout-btn, .print-btn {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 25px;
        border-radius: 8px;
        color: white;
        text-decoration: none;
        transition: background 0.3s;
    }
    .logout-btn {
        background: #e74a3b;
    }
    .logout-btn:hover {
        background: #c0392b;
    }
    .print-btn {
        background: #4e73df;
        margin-left: 10px;
    }
    .print-btn:hover {
        background: #2e59d9;
    }
    @media (max-width: 600px){
        .list-item {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>
</head>
<body>

<header>
    Welcome, <?= htmlspecialchars($student['name']); ?>
</header>

<div class="container">

    <div class="card">
        <h3>Fee Status</h3>
        <?php while($f = mysqli_fetch_assoc($fees)){ ?>
            <div class="list-item">
                <span><?= htmlspecialchars($f['month']); ?></span>
                <span class="<?= $f['status']=='Paid' ? 'status-paid' : 'status-unpaid'; ?>">
                    <?= htmlspecialchars($f['status']); ?> (৳<?= htmlspecialchars($f['amount']); ?>)
                </span>
            </div>
        <?php } ?>
    </div>

    <div class="card">
        <h3>Attendance</h3>
        <?php while($a = mysqli_fetch_assoc($attendance)){ ?>
            <div class="list-item">
                <span><?= htmlspecialchars($a['date']); ?></span>
                <span><?= htmlspecialchars($a['status']); ?></span>
            </div>
        <?php } ?>
    </div>

    <a class="logout-btn" href="logout.php">Logout</a>
    <button class="print-btn" onclick="window.print()">Print</button>

</div>

</body>
</html>
  -->