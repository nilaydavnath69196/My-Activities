<?php
$file = fopen("data.txt", "r");   // open file in read mode

if ($file) {
    while (!feof($file)) {        // loop until end of file
        $line = fgets($file);     // read one line
        echo $line . "<br>";      // display line
    }
    fclose($file);                // close file
} else {
    echo "Unable to open file.";
}
?>
