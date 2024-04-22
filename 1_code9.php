
<?php
//Example 3: Casting Booleans

$original = 0; // This is an integer.
$castToBool = (bool) $original; // Cast to boolean.

echo "Original: $original (Type: " . gettype($original) . ")";
echo "<br>";
echo "Casted to Bool: $castToBool (Type: " . gettype($castToBool) . ")"; // False will not display anything.
?>
