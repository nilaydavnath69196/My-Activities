<?php

$order_file = "orders.txt";

if (isset($_GET['view']) && $_GET['view'] == "orders") {
    $all = file_exists($order_file) ? file_get_contents($order_file) : "No orders found.";
    echo "
    <h2>All Orders</h2>
    <pre>$all</pre>
    <a href='index.php'>Back</a>
    ";
    exit;
}

if (isset($_POST['place_order'])) {
    $food_list = $_POST['food_list'];
    $total     = $_POST['total'];
    $name      = $_POST['name'];
    $address   = $_POST['address'];
    $phone     = $_POST['phone'];

    $order_id = uniqid("ORD");
    $time = date("Y-m-d H:i:s");

    $data =
"Order ID: $order_id
Date: $time
Food: $food_list
Total: $$total
Name: $name
Address: $address
Phone: $phone
---------------------------\n";

    file_put_contents($order_file, $data, FILE_APPEND);

    echo "
    <h2>Order Placed Successfully!</h2>
    <p>Your Order ID: <b>$order_id</b></p>
    <a href='index.php'>Order Again</a> | 
    <a href='?view=orders'>View All Orders</a>
    ";
    exit;
}
if (isset($_POST['food'])) {
    $items = $_POST['food'];
    $list = "";
    $total = 0;

    foreach ($items as $item) {
        list($name, $price) = explode(":", $item);
        $list .= "$name (\$$price), ";
        $total += $price;
    }

    $list = rtrim($list, ", ");

    echo "
    <h2>Your Selected Items</h2>
    <p>$list</p>
    <h3>Total: $$total</h3>

    <form method='post'>
        <input type='hidden' name='food_list' value='$list'>
        <input type='hidden' name='total' value='$total'>

        Name: <input type='text' name='name' required><br><br>
        Address: <input type='text' name='address' required><br><br>
        Phone: <input type='text' name='phone' required><br><br>

        <button type='submit' name='place_order'>Place Order</button>
    </form>
    ";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Food Order</title>
</head>
<body>

<h2>Food Menu</h2>

<form method="post">
    <label><input type="checkbox" name="food[]" value="Burger:5"> Burger - $5</label><br>
    <label><input type="checkbox" name="food[]" value="Pizza:8"> Pizza - $8</label><br>
    <label><input type="checkbox" name="food[]" value="Pasta:7"> Pasta - $7</label><br>
    <label><input type="checkbox" name="food[]" value="Sandwich:4"> Sandwich - $4</label><br><br>

    <button type="submit">Next</button>
</form>

<br>
<a href="?view=orders">View All Orders</a>

</body>
</html>
