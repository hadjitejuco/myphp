<!DOCTYPE html>
<html>
<head>
    <title>$_SERVER Example</title>
</head>
<body>
    <h2>$_SERVER Example</h2>
    <?php
    echo "PHP Self: " . $_SERVER['PHP_SELF'] . "<br>";
    echo "Server Name: " . $_SERVER['SERVER_NAME'] . "<br>";
    echo "HTTP Host: " . $_SERVER['HTTP_HOST'] . "<br>";
    echo "HTTP User Agent: " . $_SERVER['HTTP_USER_AGENT'] . "<br>";
    echo "Script Name: " . $_SERVER['SCRIPT_NAME'] . "<br>";
    ?>
</body>
</html>
