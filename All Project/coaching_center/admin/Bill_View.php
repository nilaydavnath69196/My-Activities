<?php
session_start();
include "../db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

$bills = mysqli_query($conn,
"SELECT bills.*, students.name 
 FROM bills 
 JOIN students ON bills.student_id = students.id
 ORDER BY students.name");
?>

<h2>Student Wise Bill View</h2>

<table border="1" cellpadding="8">
<tr>
    <th>Student Name</th>
    <th>Month</th>
    <th>Amount</th>
    <th>Status</th>
</tr>

<?php while($b = mysqli_fetch_assoc($bills)) { ?>
<tr>
    <td><?= $b['name']; ?></td>
    <td><?= $b['month']; ?></td>
    <td><?= $b['amount']; ?></td>
    <td><?= $b['status']; ?></td>
</tr>
<?php } ?>
</table>

<br>
<a href="bill_add.php">Add Bill</a>
