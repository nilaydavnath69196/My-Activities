<?php
function printNumbers($n) {
    if ($n < 1) {
        return; // stop condition
    }

    echo $n . " ";
    printNumbers($n - 1); // recursive call
}

printNumbers(10);
?>
