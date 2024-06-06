<!DOCTYPE html>
<html>
<head>
    <title>$_GET Example</title>
</head>
<body>
    <h2>Received Data using $_GET</h2>
    <?php
    if (isset($_GET['name']) && isset($_GET['email'])) {
        echo "Name: " . htmlspecialchars($_GET['name']) . "<br>";
        echo "Email: " . htmlspecialchars($_GET['email']) . "<br>";
    }
    ?>
</body>
</html>
