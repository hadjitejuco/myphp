<?php
//sorting functions
$array1 = [5,4,3,2,1];
sort($array1);
echo "<pre>";
print_r($array1);
echo "</pre>";
echo "<br/>";
rsort($array1);
echo "<pre>";
print_r($array1);
echo "</pre>";

$array2 =["banana", "apple", "cherry"];
sort($array2);
echo "<pre>";
print_r($array2);
echo "</pre>";
echo "<br/>";
rsort($array2);
echo "<pre>";
print_r($array2);
echo "</pre>";
echo "<br/>";


$array3 = ["c" => 3, "a" => 1, "b"=>2];
asort($array3);
echo "<pre>";
print_r($array3);
echo "</pre>";
echo "<br/>";
arsort($array3);
echo "<pre>";
print_r($array3);
echo "</pre>";
echo "<br/>";


















?> 
