

<?php
//Example 5: Casting Objects
class SimpleClass {}
$original = new SimpleClass(); // This is an object.

$castToArray = (array) $original; // Cast to array.

echo "Original: Object of class SimpleClass";
echo "<br>";
echo "Casted to Array: ";
print_r($castToArray); // Outputs the array structure
echo " (Type: " . gettype($castToArray) . ")";
?>