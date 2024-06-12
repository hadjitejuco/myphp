<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action == 'create') {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $city = $_POST['city'];
        $sql = "INSERT INTO users (name, age, city) VALUES ('$name', $age, '$city')";
        $conn->query($sql);
    } elseif ($action == 'read') {
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        echo json_encode($users);
    } elseif ($action == 'update') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $city = $_POST['city'];
        $sql = "UPDATE users SET name='$name', age=$age, city='$city' WHERE id=$id";
        $conn->query($sql);
    } elseif ($action == 'delete') {
        $id = $_POST['id'];
        $sql = "DELETE FROM users WHERE id=$id";
        $conn->query($sql);
    }
}

$conn->close();
?>
