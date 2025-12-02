<!DOCTYPE html>
<html>

<head>
    <title>Temperature Converter</title>

    <style>
        .pre {
            text-align: center;
            color: #040404ff;
        }

        .headline {

            color: #1d0c60ff;
            text-shadow: 2px 2px 4px #8a8fecff;

        }

        body {
            font-family: 'Times New Roman', Times, serif;
            background: #f0f4ff;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 450px;
            background: white;
            margin: 60px auto;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
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
            <input type="text" name="value" placeholder="Example: 25" required>

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

            $value = $_POST["value"];
            $type = $_POST["type"];
            $result = "";

            if ($type == "c2f") {
                $result = ($value * 9 / 5) + 32;
                $text = "$value °C = $result °F";
            } else if ($type == "f2c") {
                $result = ($value - 32) * 5 / 9;
                $text = "$value °F = $result °C";
            } else if ($type == "c2k") {
                $result = $value + 273.15;
                $text = "$value °C = $result K";
            } else if ($type == "k2c") {
                $result = $value - 273.15;
                $text = "$value K = $result °C";
            } else if ($type == "f2k") {
                $result = ($value - 32) * 5 / 9 + 273.15;
                $text = "$value °F = $result K";
            } else if ($type == "k2f") {
                $result = ($value - 273.15) * 9 / 5 + 32;
                $text = "$value K = $result °F";
            }

            echo "<div class='result-box'><h3>Result: $text</h3></div>";
        }
        ?>

    </div>

</body>

</html>