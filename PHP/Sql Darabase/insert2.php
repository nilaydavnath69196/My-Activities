<!-- 
more easy version for insert  data

$students = [
    [104, "Nilay", "Physics", 88],
    [105, "Rohan", "Math", 75],
    [106, "Sumi", "Chemistry", 92]
];

foreach($students as $s){
    $sql = "INSERT INTO marks(roll, name, sub, marks)
            VALUES('$s[0]','$s[1]','$s[2]','$s[3]')";
    mysqli_query($connection, $sql);
}

-->

<?php 
$connection = mysqli_connect("localhost", "root", "", "Nilay_db");

if(!$connection)
{
    die("Connection failed");

}

$student_data = [

["roll"=> 01, "name"=>"NIlay Dav Nath", "sub"=>"CPP", "mark"=> 88],
["roll"=> 02, "name"=>"sowrov", "sub"=>"CPP", "mark"=> 85],
["roll"=> 03, "name"=>"ovi", "sub"=>"CPP", "mark"=> 82],
["roll"=> 04, "name"=>"omi", "sub"=>"CPP", "mark"=> 87],
["roll"=> 05, "name"=>"maruf", "sub"=>"CPP", "mark"=> 80],
["roll"=> 06, "name"=>"saikat", "sub"=>"CPP", "mark"=> 81]
];

foreach ($student_data as $data){

    $sql = "INSERT INTO marks(roll, name, sub, mark) VALUES('{$data['roll']}', '{$data['name']}', '{$data['sub']}', '{$data['mark']}')";

    mysqli_query($connection,$sql);
}
echo "Data Insert successfuly";
mysqli_close($connection);
?>