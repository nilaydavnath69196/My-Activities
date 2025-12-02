 <!--
 NILAY DAV NATH
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
PROJECT TOPIC - TEMPERATURE CONVERTER USINF PHP
DATE: 14/11/2025
 -->

 <?php
    $value = "";
    $type = "c2f";
    $text = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $value = $_POST["value"];
        $type = $_POST["type"];

        if ($type == "c2f") {
            $r = ($value * 9 / 5) + 32;
            $text = "$value °C = $r °F";
        }
        if ($type == "f2c") {
            $r = ($value - 32) * 5 / 9;
            $text = "$value °F = $r °C";
        }
        if ($type == "c2k") {
            $r = $value + 273.15;
            $text = "$value °C = $r K";
        }
        if ($type == "k2c") {
            $r = $value - 273.15;
            $text = "$value K = $r °C";
        }
        if ($type == "f2k") {
            $r = ($value - 32) * 5 / 9 + 273.15;
            $text = "$value °F = $r K";
        }
        if ($type == "k2f") {
            $r = ($value - 273.15) * 9 / 5 + 32;
            $text = "$value K = $r °F";
        }
    }
    ?>
 <!DOCTYPE html>
 <html>

 <head>
     <title>Temperature Converter</title>
     <style>
         body {
             font-family: Arial;
             background: #eef3ff;
             margin: 0;
             padding: 0
         }

         .box {
             width: 420px;
             background: #fff;
             margin: 60px auto;
             padding: 25px;
             border-radius: 12px;
             box-shadow: 0 0 15px rgba(0, 0, 0, 0.2)
         }

         h2 {
             text-align: center;
             margin-bottom: 20px;
             color: #333
         }

         label {
             font-size: 16px;
             font-weight: bold
         }

         input,
         select {
             width: 100%;
             padding: 10px;
             margin-top: 8px;
             margin-bottom: 18px;
             border: 1px solid #bbb;
             border-radius: 6px;
             font-size: 15px
         }

         button {
             width: 100%;
             padding: 12px;
             background: #4A69BD;
             color: #fff;
             border: none;
             border-radius: 6px;
             font-size: 16px;
             cursor: pointer
         }

         .result {
             margin-top: 20px;
             background: #e8f0ff;
             padding: 15px;
             border-left: 5px solid #4A69BD;
             border-radius: 6px
         }
     </style>
     <script>
         function changeLabel() {
             let t = document.getElementById("type").value;
             let l = document.getElementById("label");
             if (t == "c2f" || t == "c2k") l.innerHTML = "Enter temperature in Celsius:";
             if (t == "f2c" || t == "f2k") l.innerHTML = "Enter temperature in Fahrenheit:";
             if (t == "k2c" || t == "k2f") l.innerHTML = "Enter temperature in Kelvin:";
         }
     </script>
 </head>

 <body>
     <div class="box">
         <h2>Temperature Converter</h2>

         <form method="post">
             <label id="label">Enter temperature:</label>
             <input type="text" name="value" value="<?php echo $value; ?>" required>

             <label>Select conversion:</label>
             <select name="type" id="type" onchange="changeLabel()">
                 <option value="c2f" <?php if ($type == "c2f") echo "selected"; ?>>Celsius → Fahrenheit</option>
                 <option value="f2c" <?php if ($type == "f2c") echo "selected"; ?>>Fahrenheit → Celsius</option>
                 <option value="c2k" <?php if ($type == "c2k") echo "selected"; ?>>Celsius → Kelvin</option>
                 <option value="k2c" <?php if ($type == "k2c") echo "selected"; ?>>Kelvin → Celsius</option>
                 <option value="f2k" <?php if ($type == "f2k") echo "selected"; ?>>Fahrenheit → Kelvin</option>
                 <option value="k2f" <?php if ($type == "k2f") echo "selected"; ?>>Kelvin → Fahrenheit</option>
             </select>

             <button type="submit">Convert</button>
         </form>

         <?php if ($text != "") { ?>
             <div class="result"><?php echo $text; ?></div>
         <?php } ?>

     </div>

     <script>
         changeLabel();
     </script>
 </body>

 </html>