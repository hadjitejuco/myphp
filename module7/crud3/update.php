<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli('localhost', 'root', '', 'user_records');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $city = $_POST['city'];
    $image = $_FILES['image']['name'];

    if ($image) {
        $target = 'uploads/' . basename($image);
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo "Failed to upload image";
            $conn->close();
            exit;
        }
        $sql = "UPDATE users SET name='$name', age=$age, city='$city', image='$image' WHERE id=$id";
    } else {
        $sql = "UPDATE users SET name='$name', age=$age, city='$city' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
