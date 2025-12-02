<!DOCTYPE html>
<html>
<body>

<form method="post">

<h3>Personal Details</h3>

Salutation:
<select name="salutation">
    <option value="">-- None --</option>
    <option value="Mr">Mr</option>
    <option value="Ms">Ms</option>
    <option value="Mrs">Mrs</option>
</select>
<br><br>

First Name: <input type="text" name="fname"><br><br>
Last Name: <input type="text" name="lname"><br><br>

Gender:
<input type="radio" name="gender" value="Male"> Male
<input type="radio" name="gender" value="Female"> Female
<br><br>

Email: <input type="text" name="email"><br><br>

Date of Birth: <input type="date" name="dob"><br><br>

Address:<br>
<textarea name="address" rows="4" cols="40"></textarea><br><br>

<input type="submit" value="Submit">

</form>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    echo "<h3>Submitted Information:</h3>";
    echo "Salutation: " . $_POST['salutation'] . "<br>";
    echo "First Name: " . $_POST['fname'] . "<br>";
    echo "Last Name: " . $_POST['lname'] . "<br>";
    echo "Gender: " . $_POST['gender'] . "<br>";
    echo "Email: " . $_POST['email'] . "<br>";
    echo "Date of Birth: " . $_POST['dob'] . "<br>";
    echo "Address: " . $_POST['address'] . "<br>";
}
?>

</body>
</html>
