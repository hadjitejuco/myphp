<?php
$text = "I love cats. Cats are great!";
$pattern = "/cats/i";
$replacement = "dogs";

$result = preg_replace($pattern, $replacement, $text);

echo $result;
?>
