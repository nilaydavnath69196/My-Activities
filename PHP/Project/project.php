 <!--
 NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
PROJECT TOPIC - TEMPERATURE CONVERTER USINF PHP
DATE: 14/11/2025
 -->
   

<!DOCTYPE html>
<html>
<head>
    <title>Temperature Converter</title>

    <style>
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
    <h2>Temperature Converter</h2>

    <form method="post">
        <label>Enter Value:</label>
        <input type="text" name="value" required>

        <label>Choose Conversion:</label>
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
        $v=$_POST["value"];
        $t=$_POST["type"];

        if($t=="c2f") $r=($v*9/5)+32;
        if($t=="f2c") $r=($v-32)*5/9;
        if($t=="c2k") $r=$v+273.15;
        if($t=="k2c") $r=$v-273.15;
        if($t=="f2k") $r=($v-32)*5/9+273.15;
        if($t=="k2f") $r=($v-273.15)*9/5+32;

        $units=["c2f"=>"°F","f2c"=>"°C","c2k"=>"K","k2c"=>"°C","f2k"=>"K","k2f"=>"°F"];
        echo "<div class='result'><b>Result:</b> $v → $r ".$units[$t]."</div>";
    }
    ?>
</div>

</body>
</html>
