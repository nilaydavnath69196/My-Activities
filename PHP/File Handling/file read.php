<?php
$filename = "university.txt";

if (file_exists($filename)) {
    $content = file_get_contents($filename);
    echo "File Content: " . $content;
} else {
    echo "File '$filename' does not exist.";
}
?>
