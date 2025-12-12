<!DOCTYPE html>
<html>
<head>
    <title>GET Form Example</title>
</head>
<body>

<form method="get">
    Name: <input type="text" name="name"><br><br>
    ID: <input type="number" name="id"><br><br>
    Email: <input type="text" name="email"><br><br>
    Contact: <input type="text" name="contact"><br><br>

    <input type="submit" value="Submit">
</form>

<?php
// Check if form submitted
if (!empty($_GET)) {

    echo "<h3>Form Data:</h3>";

    // Print all submitted values using GET
    foreach ($_GET as $key => $value) {
        echo $key . ": " . $value . "<br>";
    }
}
?>

</body>
</html>
