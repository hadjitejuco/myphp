<!DOCTYPE html>
<html>
<head>
    <title>$_REQUEST Example</title>
</head>
<body>
    <h2>Received Data using $_REQUEST</h2>
    <?php
    if (isset($_REQUEST['name']) && isset($_REQUEST['email'])) {
        echo "Name: " . htmlspecialchars($_REQUEST['name']) . "<br>";
        echo "Email: " . htmlspecialchars($_REQUEST['email']) . "<br>";
    }
    ?>
</body>
</html>
