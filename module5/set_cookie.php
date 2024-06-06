<?php
$cookie_name = "user";
$cookie_value = "Hadji Tejuco";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<!DOCTYPE html>
<html>
<head>
    <title>$_COOKIE Example</title>
</head>
<body>
    <h2>$_COOKIE Example</h2>
    <?php
    if(!isset($_COOKIE[$cookie_name])) {
        echo "Cookie named '" . $cookie_name . "' is not set!";
    } else {
        echo "Cookie '" . $cookie_name . "' is set!<br>";
        echo "Value: " . $_COOKIE[$cookie_name];
    }
    ?>
</body>
</html>
