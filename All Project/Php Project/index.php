<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Temperature Converter</title>

    <!-- IMPORTANT FOR MOBILE -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f0f4ff;
            margin: 0;
            padding: 0;
        }

        .pre {
            text-align: center;
            color: #040404;
            margin: 5px 0;
        }

        .headline {
            text-align: center;
            color: #1d0c60;
            text-shadow: 2px 2px 4px #8a8fec;
        }

        .container {
            max-width: 450px;
            width: 100%;
            background: #fff;
            margin: 40px auto;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        label {
            font-size: 16px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 18px;
            border: 1px solid #bbb;
            border-radius: 6px;
            font-size: 15px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #4A69BD;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #3b55a0;
        }

        .result-box {
            margin-top: 25px;
            padding: 15px;
            background: #e8f0ff;
            border-left: 5px solid #4A69BD;
            border-radius: 6px;
        }

        .result-box h3 {
            margin: 0;
        }
    </style>
</head>

<body>

    <div class="container">
        <h4 class="pre">NILAY DAV NATH</h4>
        <h4 class="pre">ID: 240242104</h4>

        <h2 class="headline">Temperature Converter</h2>

        <form method="post">
            <label>Enter Temperature Value:</label>
            <input type="number" step="any" name="value" placeholder="Example: 25" required>

            <label>Please Select Conversion Type:</label>
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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $value = floatval($_POST["value"]);
            $type  = $_POST["type"];
            $result = 0;

            if ($type == "c2f") {
                $result = ($value * 9 / 5) + 32;
                $text = "$value °C = $result °F";
            } elseif ($type == "f2c") {
                $result = ($value - 32) * 5 / 9;
                $text = "$value °F = $result °C";
            } elseif ($type == "c2k") {
                $result = $value + 273.15;
                $text = "$value °C = $result K";
            } elseif ($type == "k2c") {
                $result = $value - 273.15;
                $text = "$value K = $result °C";
            } elseif ($type == "f2k") {
                $result = ($value - 32) * 5 / 9 + 273.15;
                $text = "$value °F = $result K";
            } elseif ($type == "k2f") {
                $result = ($value - 273.15) * 9 / 5 + 32;
                $text = "$value K = $result °F";
            }

            echo "<div class='result-box'><h3>Result: $text</h3></div>";
        }
        ?>
    </div>

</body>
</html>
