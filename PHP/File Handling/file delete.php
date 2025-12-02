<?php
$filename = "university.txt";

if (file_exists($filename)) {
    if (unlink($filename)) {
        echo "File '$filename' successfully deleted.";
    } else {
        echo "Error deleting the file.";
    }
} else {
    echo "File '$filename' does not exist.";
}
?>
