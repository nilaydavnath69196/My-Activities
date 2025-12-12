<?php
function isPrime($num) {

    if ($num < 2) {
        return false;     // 0, 1 are not prime
    }

    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false;  // divisible → not prime
        }
    }
    return true;  // no divisors → prime
}

// Test
$number = 15;

if (isPrime($number)) {
    echo "$number is a Prime Number";
} else {
    echo "$number is NOT a Prime Number";
}
?>
