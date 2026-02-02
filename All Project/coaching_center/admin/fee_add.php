<?php
session_start();
include "../db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

$students = mysqli_query($conn, "SELECT * FROM students");

if (isset($_POST['save'])) {
    $student = $_POST['student_id'];
    $month   = $_POST['month'];
    $amount  = $_POST['amount'];
    $status  = $_POST['status'];
    $date    = date("Y-m-d");

    mysqli_query($conn, "INSERT INTO fees 
        (student_id, month, amount, status, date)
        VALUES ('$student','$month','$amount','$status','$date')");

    $msg = "Fee Added Successfully ✅";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Add Student Fee</title>
<style>
    body{
        margin:0;
        min-height:100vh;
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #667eea, #764ba2);
        display:flex;
        align-items:center;
        justify-content:center;
        color:#fff;
    }

    .card{
        width:100%;
        max-width:420px;
        background: rgba(255,255,255,0.12);
        padding:30px;
        border-radius:15px;
        box-shadow:0 10px 30px rgba(0,0,0,.3);
        animation: slideIn .8s ease;
    }

    h2{
        text-align:center;
        margin-bottom:20px;
        letter-spacing:1px;
    }

    .msg{
        background: rgba(0,0,0,.3);
        padding:10px;
        border-radius:8px;
        text-align:center;
        margin-bottom:15px;
    }

    label{
        display:block;
        margin-top:12px;
        font-size:14px;
    }

    input, select{
        width:100%;
        padding:10px;
        border:none;
        border-radius:8px;
        margin-top:5px;
        outline:none;
        font-size:14px;
    }

    input[type="submit"]{
        margin-top:20px;
        background:#00ffcc;
        color:#000;
        font-weight:bold;
        cursor:pointer;
        transition:.3s;
    }

    input[type="submit"]:hover{
        background:#00ddb3;
        transform:scale(1.03);
    }

    .back{
        display:block;
        margin-top:15px;
        text-align:center;
        color:#fff;
        text-decoration:none;
        font-size:14px;
        opacity:.8;
    }

    .back:hover{
        opacity:1;
    }

    @keyframes slideIn{
        from{opacity:0; transform:translateY(20px);}
        to{opacity:1; transform:translateY(0);}
    }
</style>
</head>

<body>

<div class="card">
    <h2>Add Student Fee</h2>

    <?php if(isset($msg)){ ?>
        <div class="msg"><?= $msg; ?></div>
    <?php } ?>

    <form method="post">

        <label>Student (ID + Name)</label>
        <select name="student_id" required>
            <option value="">-- Select Student --</option>
            <?php while($s = mysqli_fetch_assoc($students)){ ?>
                <option value="<?= $s['id']; ?>">
                    ID: <?= $s['id']; ?> | <?= $s['name']; ?>
                </option>
            <?php } ?>
        </select>

        <label>Month</label>
        <input type="text" name="month" placeholder="January" required>

        <label>Amount</label>
        <input type="number" name="amount" required>

        <label>Status</label>
        <select name="status">
            <option>Paid</option>
            <option>Due</option>
        </select>

        <input type="submit" name="save" value="Save Fee">
    </form>

    <a href="dashboard.php" class="back">← Back to Dashboard</a>
</div>

</body>
</html>



<!--  

<?php
session_start();
include "../db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

$students = mysqli_query($conn, "SELECT * FROM students");

if (isset($_POST['save'])) {
    $student = $_POST['student_id'];
    $month   = $_POST['month'];
    $amount  = $_POST['amount'];
    $status  = $_POST['status'];
    $date    = date("Y-m-d");

    mysqli_query($conn, "INSERT INTO fees 
        (student_id, month, amount, status, date)
        VALUES ('$student','$month','$amount','$status','$date')");

    $msg = "✅ Fee Added Successfully!";
}
?>
