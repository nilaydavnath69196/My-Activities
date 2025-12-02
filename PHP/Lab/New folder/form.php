<!DOCTYPE html>
<html>
<body>

<form method="post">
    Name: <input type="text" name="name"><br><br>
    ID: <input type="text" name="id"><br><br>
    Email: <input type="text" name="email"><br><br>
    Contact: <input type="text" name="contact"><br><br>

    <input type="submit" value="Submit">
</form>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $id = $_POST['id'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    echo "<h3>Form Data:</h3>";
    echo "Name: $name <br>";
    echo "ID: $id <br>";
    echo "Email: $email <br>";
    echo "Contact: $contact <br>";
}
?>

</body>
</html>
