<?php
$text = "The price is 45 dollars and 30 cents.";
$pattern = "/\d+/";

preg_match_all($pattern, $text, $matches);

echo "Extracted numbers: ";
print_r($matches[0]);
?>
