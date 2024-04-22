
<?php
//Example 1: Casting Integers
$original = "100"; // This is a string.
$castToInt = (int) $original; // Cast to integer.

echo "Original: $original (Type: " . gettype($original) . ")";
echo "<br>";
echo "Casted to Int: $castToInt (Type: " . gettype($castToInt) . ")";
?>