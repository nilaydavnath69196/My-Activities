 <!--
 NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
PROJECT TOPIC - WEIGHT CONVERTER
DATE: 14/11/2025
 -->

<!DOCTYPE html>
<html>
<head>
    <title>Weight Converter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 40px;
        }
        .box {
            width: 400px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        input, select, button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            font-size: 16px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        button {
            background: #007bff;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background: #e9ffe9;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Weight Converter</h2>

    <form method="post">
        <input type="number" step="0.01" name="value" placeholder="Enter weight" required>

        <select name="unit">
            <option value="kg">Kilogram (kg)</option>
            <option value="g">Gram (g)</option>
            <option value="lb">Pound (lb)</option>
            <option value="oz">Ounce (oz)</option>
            <option value="st">Stone (st)</option>
        </select>

        <button type="submit">Convert</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $value = $_POST["value"];
        $unit  = $_POST["unit"];


        function convertWeight($value, $unit) {
            $toKg = [
                "kg" => 1,
                "g"  => 0.001,
                "lb" => 0.453592,
                "oz" => 0.0283495,
                "st" => 6.35029
            ];
            $kg = $value * $toKg[$unit];
            return [
                "kg" => $kg,
                "g"  => $kg * 1000,
                "lb" => $kg * 2.20462,
                "oz" => $kg * 35.274,
                "st" => $kg * 0.157473
            ];
        }

        $result = convertWeight($value, $unit);

        echo "<div class='result'>";
        echo "<h3>Result for: $value $unit</h3>";
        echo "Kilogram (kg): " . round($result['kg'], 4) . "<br>";
        echo "Gram (g): " . round($result['g'], 4) . "<br>";
        echo "Pound (lb): " . round($result['lb'], 4) . "<br>";
        echo "Ounce (oz): " . round($result['oz'], 4) . "<br>";
        echo "Stone (st): " . round($result['st'], 4) . "<br>";
        echo "</div>";
    }
    ?>

</div>

</body>
</html>