<?php
$filename = "university.txt";
if (file_exists($filename)) {
$file = fopen($filename, "w");
 fwrite($file, "");
   fclose($file);

echo "File content successfully deleted, but file '$filename' still exists.";
} else {
    echo "File '$filename' does not exist.";
}
?>
