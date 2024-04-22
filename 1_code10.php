
<?php
//Example 4: Casting Arrays<?php
$original = "hello"; // This is a string.
$castToArray = (array) $original; // Cast to array.

echo "Original: $original (Type: " . gettype($original) . ")";
echo "<br>";
echo "Casted to Array: ";
print_r($castToArray); // Outputs the array structure
echo " (Type: " . gettype($castToArray) . ")";
?>