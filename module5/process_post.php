<!DOCTYPE html>
<html>
<head>
    <title>$_POST Example</title>
</head>
<body>
    <h2>Received Data using $_POST</h2>
    <?php
    if (isset($_POST['name']) && isset($_POST['email'])) {
        echo "Name: " . htmlspecialchars($_POST['name']) . "<br>";
        echo "Email: " . htmlspecialchars($_POST['email']) . "<br>";
    }
    ?>
</body>
</html>
