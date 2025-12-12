<?php
// Define an array with string elements
$words = array("Hello", "world", "from", "PHP");

// Use implode() to join the array elements into a single string
// The first argument is the separator (a space in this case)
// The second argument is the array variable
$combined_string = implode(" ", $words);

// Display the resulting string
echo $combined_string;

// Example without a separator (joins elements directly)
$no_separator_string = implode($words);
echo "\n" . $no_separator_string;

// Example with a hyphen separator
$hyphen_string = implode("-", $words);
echo "\n" . $hyphen_string;
?>
