
<?php 
$connection = mysqli_connect("localhost", "root", "", "Nilay_db");

if(!$connection){
    die("connection failed");
}

// Students array
$students = [
    ["roll"=>101, "name"=>"Nilay", "sub"=>"Physics", "marks"=>88],
    ["roll"=>102, "name"=>"Raju",  "sub"=>"Chemistry", "marks"=>75],
    ["roll"=>103, "name"=>"Tina",  "sub"=>"Math",      "marks"=>92],
    ["roll"=>104, "name"=>"Rafi",  "sub"=>"Physics",   "marks"=>81]
];

// Loop → Insert all
foreach($students as $stu){
    $sql = "INSERT INTO marks (roll, name, sub, marks)
            VALUES ('{$stu['roll']}', '{$stu['name']}', '{$stu['sub']}', '{$stu['marks']}')";
    mysqli_query($connection, $sql);
}

echo "All Results Added Successfully!";
mysqli_close($connection);
?>
