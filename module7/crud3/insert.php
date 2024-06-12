<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli('localhost', 'root', '', 'user_records');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $city = $_POST['city'];
    $image = $_FILES['image']['name'];
    $target = 'uploads/' . basename($image);

    // Check if uploads directory exists
    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true);
    }

    // Attempt to move the uploaded file
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $sql = "INSERT INTO users (name, age, city, image) VALUES ('$name', $age, '$city', '$image')";
        if ($conn->query($sql) === TRUE) {
            echo "Record added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Failed to upload image";
        error_log("Failed to move uploaded file: " . $_FILES['image']['error']);
    }
}

$conn->close();
?>
