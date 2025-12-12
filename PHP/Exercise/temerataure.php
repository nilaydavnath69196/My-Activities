<?php
// Array of temperatures
$temperatures = array(25, 30, 18, 22, 35, 28, 19, 40, 21, 26, 33, 24, 20);

// Calculate average temperature
$average = array_sum($temperatures) / count($temperatures);
echo "Average temperature: " . $average . "<br>";

// Sort the array in ascending order
sort($temperatures);

// Display the five lowest temperatures
$lowest = array_slice($temperatures, 0, 5);
echo "Five lowest temperatures: ";
print_r($lowest);
echo "<br>";

// Display the five highest temperatures
$highest = array_slice($temperatures, -5);
echo "Five highest temperatures: ";
print_r($highest);
?>
