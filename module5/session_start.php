<?php
session_start();
$_SESSION["username"] = "hadji";
$_SESSION["email"] = "hadji@example.com";
?>
<!DOCTYPE html>
<html>
<head>
    <title>$_SESSION Example</title>
</head>
<body>
    <h2>$_SESSION Example</h2>
    <p>Session variables are set.</p>
    <a href="session_view.php">View Session</a>
</body>
</html>
