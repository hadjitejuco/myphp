<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_db2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action == 'create') {
        $last_name = $_POST['last_name'];
        $first_name = $_POST['first_name'];
        $middle_initial = $_POST['middle_initial'];
        $birthday = $_POST['birthday'];
        $age = date_diff(date_create($birthday), date_create('today'))->y;
        $city = $_POST['city'];
        $sql = "INSERT INTO users (last_name, first_name, middle_initial, birthday, age, city) VALUES ('$last_name', '$first_name', '$middle_initial', '$birthday', $age, '$city')";
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
        $last_name = $_POST['last_name'];
        $first_name = $_POST['first_name'];
        $middle_initial = $_POST['middle_initial'];
        $birthday = $_POST['birthday'];
        $age = date_diff(date_create($birthday), date_create('today'))->y;
        $city = $_POST['city'];
        $sql = "UPDATE users SET last_name='$last_name', first_name='$first_name', middle_initial='$middle_initial', birthday='$birthday', age=$age, city='$city' WHERE id=$id";
        $conn->query($sql);
    } elseif ($action == 'delete') {
        $id = $_POST['id'];
        $sql = "DELETE FROM users WHERE id=$id";
        $conn->query($sql);
    }
}

$conn->close();
?>
