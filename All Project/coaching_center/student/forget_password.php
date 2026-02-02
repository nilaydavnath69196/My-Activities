<?php
include "../db.php";

if (isset($_POST['reset'])) {
    $phone = $_POST['phone'];

    $q = mysqli_query($conn,
        "SELECT * FROM students WHERE phone='$phone'");

    if (mysqli_num_rows($q) == 1) {
        $student = mysqli_fetch_assoc($q);
        $msg = "Your Password is: <b>".$student['password']."</b>";
    } else {
        $msg = "Phone number not found!";
    }
}
?>

<h2>Forget Password</h2>

<form method="post">
    Enter Phone Number:<br>
    <input type="text" name="phone" required><br><br>
    <input type="submit" name="reset" value="Recover Password">
</form>

<?php if(isset($msg)) echo "<p>$msg</p>"; ?>

<br>
<a href="login.php">Back to Login</a>
