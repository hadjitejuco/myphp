<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $usernameLower = strtolower($username);
    $usernameUpper = strtoupper($username);

    if (strlen($username) < 5 || strlen($username) > 15) {
        echo "Username must be between 5 and 15 characters.<br>";
    }

    if (strpos($email, '@') === false) {
        echo "Invalid email format. No '@' found.<br>";
    }

    echo "Reversed Username: " . strrev($username) . "<br>";

    echo "First 5 characters of username: " . substr($username, 0, 5) . "<br>";

    echo "Username in lowercase: $usernameLower<br>";
    echo "Username in uppercase: $usernameUpper<br>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
<h2>User Registration</h2>

<form method="post" action="registration.php">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <input type="submit" value="Register">
</form>

</body>
</html>