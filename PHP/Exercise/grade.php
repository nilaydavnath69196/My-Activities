<!DOCTYPE html>
<html>
<head>
    <title>Student Grade Checker</title>
</head>
<body>

<form method="POST" >
    Enter Marks: 
    <input type="number" name="marks" required>
    <br><br>
    <input type="submit" value="Check Grade">
</form>

<?php
// Check if the form is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $marks = $_POST['marks'];
echo "Grade: ";  
    if ($marks >= 80) {
        echo " A+";
    } elseif ($marks >= 70) {
        echo " A";
    } elseif ($marks >= 60) {
        echo " A-";
    } elseif ($marks >= 50) {
        echo " B";
    } elseif ($marks >= 40) {
        echo " C";
    } elseif ($marks >= 33) {
        echo " D";
    } else {
        echo " F (Fail)";
    }
}
?>

</body>
</html>
