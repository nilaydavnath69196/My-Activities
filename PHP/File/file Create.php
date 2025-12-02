<?php
$filename = "university.txt";
$mode = "w";
$file = fopen($filename, $mode);
$content = "BGC Trust University";

$bytes_written = 0;
$content_length = strlen($content);

while ($bytes_written < $content_length) {
    $bytes_written += fwrite($file, substr($content, $bytes_written));
}

fclose($file);
echo "Data successfully written to $filename using a while loop.";
?>