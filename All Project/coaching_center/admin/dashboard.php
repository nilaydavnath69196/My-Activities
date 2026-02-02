<?php
session_start();
include "../db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

/* LIVE STATS */
$totalStudents = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) total FROM students"))['total'];
$paid = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(amount) total FROM fees WHERE status='Paid'"))['total'] ?? 0;
$due  = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(amount) total FROM fees WHERE status='Due'"))['total'] ?? 0;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>

<style>
:root{
    --bg: linear-gradient(135deg,#667eea,#764ba2);
    --card: rgba(255,255,255,.15);
    --text:#fff;
}

body.dark{
    --bg: linear-gradient(135deg,#111,#222);
    --card: rgba(255,255,255,.08);
    --text:#eee;
}

*{
    margin:0;
    box-sizing:border-box;
    font-family:Segoe UI, sans-serif;
}

body{
    background:var(--bg);
    color:var(--text);
    min-height:100vh;
    display:flex;
}

/* SIDEBAR */
.sidebar{
    width:260px;
    background:rgba(0,0,0,.35);
    backdrop-filter:blur(15px);
    padding:25px;
}

.sidebar h2{
    text-align:center;
    margin-bottom:30px;
}

.menu a{
    display:block;
    padding:14px;
    margin-bottom:12px;
    color:#fff;
    text-decoration:none;
    border-radius:12px;
    transition:.3s;
}

.menu a:hover{
    background:rgba(255,255,255,.2);
    transform:translateX(6px);
}

/* MAIN */
.main{
    flex:1;
    padding:25px 35px;
}

/* TOP BAR */
.topbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;
}

.right-icons{
    display:flex;
    gap:20px;
    align-items:center;
}

.icon{
    font-size:22px;
    cursor:pointer;
    position:relative;
}

.icon span{
    position:absolute;
    top:-6px;
    right:-8px;
    background:red;
    color:#fff;
    font-size:11px;
    padding:2px 6px;
    border-radius:50%;
}

/* PROFILE */
.profile{
    position:relative;
}

.profile-box{
    display:none;
    position:absolute;
    right:0;
    top:40px;
    background:#333;
    padding:15px;
    border-radius:12px;
}

.profile:hover .profile-box{
    display:block;
}

/* STATS */
.stats{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:25px;
}

.card{
    background:var(--card);
    padding:25px;
    border-radius:20px;
    box-shadow:0 10px 25px rgba(0,0,0,.3);
    transition:.3s;
}

.card:hover{
    transform:translateY(-8px);
}

.card h3{
    margin-bottom:10px;
}

.card p{
    font-size:30px;
    font-weight:bold;
}

/* TOGGLE */
.toggle{
    cursor:pointer;
    font-size:20px;
}

/* FOOTER */
footer{
    margin-top:40px;
    text-align:center;
    opacity:.8;
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>🎓 Admin Panel</h2>
    <div class="menu">
        <a href="dashboard.php">🏠 Dashboard</a>
        <a href="student_add.php">➕ Add Student</a>
        <a href="student_list.php">📋 Student List</a>
        <a href="attendance.php">🕒 Attendance</a>
        <a href="fee_add.php">💰 Add Fee</a>
        <a href="fee_list.php">📊 Fee Records</a>
        <a href="report.php">📈 Reports</a>
        <a href="logout.php">🚪 Logout</a>
    </div>
</div>

<!-- MAIN -->
<div class="main">

    <!-- TOP BAR -->
    <div class="topbar">
        <h1>Welcome, Admin 👋</h1>

        <div class="right-icons">
            <div class="icon">🔔<span>3</span></div>

            <div class="toggle" onclick="toggleMode()">🌙</div>

            <div class="profile">
                👤
                <div class="profile-box">
                    <p><b>NILAY DAV NATH</b></p>
                    <hr>
                    <a href="#" style="color:#fff;">Settings</a><br>
                    <a href="logout.php" style="color:#fff;">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- STATS -->
    <div class="stats">
        <div class="card">
            <h3>Total Students</h3>
            <p><?= $totalStudents ?></p>
        </div>

        <div class="card">
            <h3>Paid Amount</h3>
            <p>৳ <?= $paid ?></p>
        </div>

        <div class="card">
            <h3>Due Amount</h3>
            <p>৳ <?= $due ?></p>
        </div>
    </div>

    <footer>
        © <?= date("Y"); ?> nilaytech ltd. | Admin Dashboard
    </footer>

</div>

<script>
function toggleMode(){
    document.body.classList.toggle("dark");
}
</script>

</body>
</html>





<!-- Another UI Desing -->
<!--  
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>

<style>
    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family: "Segoe UI", Tahoma, sans-serif;
    }

    body{
        min-height:100vh;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color:#fff;
        padding:40px 20px;
    }

    /* HEADER */
    .dashboard-header{
        text-align:center;
        margin-bottom:50px;
        animation: fadeDown 1s ease;
    }

    .dashboard-header h1{
        font-size:36px;
        margin-bottom:10px;
    }

    .dashboard-header p{
        font-size:16px;
        opacity:.9;
        letter-spacing:1px;
    }

    /* GRID */
    .dashboard{
        display:grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap:30px;
        max-width:1100px;
        margin:auto;
        animation: fadeUp 1.2s ease;
    }

    /* CARD BUTTON */
    .btn{
        text-decoration:none;
        color:#fff;
        padding:35px 20px;
        border-radius:20px;
        text-align:center;
        font-size:20px;
        font-weight:600;
        backdrop-filter: blur(15px);
        background: rgba(255,255,255,0.15);
        box-shadow: 0 15px 40px rgba(0,0,0,.25);
        transition: .4s ease;
        position:relative;
        overflow:hidden;
    }

    .btn::before{
        content:'';
        position:absolute;
        inset:0;
        background: linear-gradient(120deg, transparent, rgba(255,255,255,.4), transparent);
        transform:translateX(-100%);
        transition:.6s;
    }

    .btn:hover::before{
        transform:translateX(100%);
    }

    .btn:hover{
        transform: translateY(-12px) scale(1.03);
        box-shadow:0 25px 60px rgba(0,0,0,.4);
    }

    /* COLOR THEMES */
    .add{ background: linear-gradient(135deg, #00c9a7, #00b894); }
    .list{ background: linear-gradient(135deg, #74b9ff, #0984e3); }
    .attendance{ background: linear-gradient(135deg, #ffeaa7, #fdcb6e); color:#333; }
    .report{ background: linear-gradient(135deg, #a29bfe, #6c5ce7); }
    .logout{ background: linear-gradient(135deg, #ff7675, #d63031); }

    /* FOOTER */
    footer{
        text-align:center;
        margin-top:60px;
        opacity:.85;
        font-size:14px;
    }

    /* ANIMATIONS */
    @keyframes fadeUp{
        from{opacity:0; transform:translateY(30px);}
        to{opacity:1; transform:translateY(0);}
    }

    @keyframes fadeDown{
        from{opacity:0; transform:translateY(-30px);}
        to{opacity:1; transform:translateY(0);}
    }

    /* MOBILE */
    @media(max-width:600px){
        .dashboard-header h1{
            font-size:28px;
        }
        .btn{
            font-size:18px;
            padding:30px 15px;
        }
    }
</style>
</head>

<body>

<div class="dashboard-header">
    <h1>👋 Welcome Admin</h1>
    <p>NILAY DAV NATH | Coaching Center Management System</p>
</div>

<div class="dashboard">

    <a href="student_add.php" class="btn add">
        ➕ Add Student
    </a>

    <a href="student_list.php" class="btn list">
        📋 Student List
    </a>

    <a href="attendance.php" class="btn attendance">
        🕒 Attendance
    </a>

    <a href="fee_add.php" class="btn add">
        💰 Add Fee
    </a>

    <a href="fee_list.php" class="btn list">
        📊 Fee Records
    </a>

    <a href="report.php" class="btn report">
        📈 Reports
    </a>

    <a href="logout.php" class="btn logout">
        🚪 Logout
    </a>

</div>

<footer>
    © <?= date("Y"); ?> nilaytech ltd. | All Rights Reserved
</footer>

</body>
</html>
   -->