<?php
// //values only
// $array = [1,2,3,4,5];
// foreach ($array as $value) {
//     echo $value . " ";
//     //echo "$value<br/>";
// }
// echo "<br>";

// $array2 = ['apple','banana','cherry'];
// foreach ($array2 as $fruit) {
//     echo $fruit . " ";
// } 
// echo "<br>";echo "<br>";
// //with keys
// $array = [1,2,3,4,5];
// foreach ($array as $key => $value) {
//     echo "$key => $value     ";
// }

// echo "<br>";
// $array2 = ['apple','banana','cherry'];
// foreach ($array2 as $key => $fruit) {
//     echo "$key => $fruit  ";
// }
//multi-dim array
$users = [
    ["name"=>"hadji", "age"=>"30"],
    ["name"=>"joan", "age"=>"25"]
];

foreach ($users as $user) {
    echo $user['name'] . " is " . $user['age'] . " years old.<br>";
}











?>
