 <!--
 NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
PROJECT TOPIC - TEMPERATURE CONVERTER USINF PHP
DATE: 14/11/2025
 -->



<?php
$host = "localhost";
$user = "root";       
$pass = "";          
$db   = "Nilay_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn){
    die("Database Connection Failed");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Temperature Converter</title>

    <style>

     .pre {
            text-align: center;
            color: #040404ff;
        }
        .headline{
             color: #1d0c60ff;
            text-shadow: 2px 2px 4px #8a8fecff;
        }
        body{
            font-family: Arial;
            background:#f0f4ff;
            margin:0;
            padding:0;
        }
        .box{
            width:420px;
            background:white;
            margin:60px auto;
            padding:25px;
            border-radius:12px;
            box-shadow:0 0 12px rgba(0,0,0,0.2);
        }
        h2{text-align:center;margin-bottom:20px;color:#333}
        label{font-weight:bold}
        input,select{
            width:100%;
            padding:10px;
            margin:10px 0 18px 0;
            border:1px solid #bbb;
            border-radius:6px;
            font-size:15px;
        }
        button{
            width:100%;
            padding:12px;
            background:#4A69BD;
            color:white;
            border:none;
            border-radius:6px;
            font-size:16px;
            cursor:pointer;
        }
        .result{
            margin-top:20px;
            padding:15px;
            background:#e8f0ff;
            border-left:5px solid #4A69BD;
            border-radius:6px;
        }
    </style>
</head>
<body>

<div class="box">
 <h4 class="pre">NILAY DAV NATH</h4>
        <h4 class="pre">ID: 240242104</h4>
        <h2 class="headline">Temperature Converter</h2>
    <form method="post">
        <label>Converter Name:</label>
        <input type="text" name="fname" required>

        <label>Enter Value To Convert Temperature:</label>
        <input type="text" name="value" required>

        <label>Please Choose Conversion Type:</label>
        <select name="type">
            <option value="c2f">Celsius → Fahrenheit</option>
            <option value="f2c">Fahrenheit → Celsius</option>
            <option value="c2k">Celsius → Kelvin</option>
            <option value="k2c">Kelvin → Celsius</option>
            <option value="f2k">Fahrenheit → Kelvin</option>
            <option value="k2f">Kelvin → Fahrenheit</option>
        </select>

        <button type="submit">Convert</button>
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $name = $_POST["fname"];
        $v    = $_POST["value"];
        $t    = $_POST["type"];

        if($t=="c2f") $r=($v*9/5)+32;
        if($t=="f2c") $r=($v-32)*5/9;
        if($t=="c2k") $r=$v+273.15;
        if($t=="k2c") $r=$v-273.15;
        if($t=="f2k") $r=($v-32)*5/9+273.15;
        if($t=="k2f") $r=($v-273.15)*9/5+32;

        $units=["c2f"=>"°F","f2c"=>"°C","c2k"=>"K","k2c"=>"°C","f2k"=>"K","k2f"=>"°F"];

        // Insert WITHOUT ID
        $query = "INSERT INTO temperature(finder_name, input_value, conversion_type, result_value, date_time)
                  VALUES('$name','$v','$t','$r', NOW())";

        mysqli_query($conn, $query);

        echo "<div class='result'><b>Result:</b> $v → $r ".$units[$t]."<br>
              <b>Finder:</b> $name<br>
              <b>Saved to Database ✔</b>
              </div>";
    }
    ?>
</div>

</body>
</html>
