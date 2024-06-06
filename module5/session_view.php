<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>$_SESSION Example</title>
</head>
<body>
    <h2>View $_SESSION Example</h2>
    <?php
    echo "Username: " . $_SESSION["username"] . "<br>";
    echo "Email: " . $_SESSION["email"] . "<br>";
    ?>
</body>
</html>
