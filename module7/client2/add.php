<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'client.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_initials = $_POST['middle_initials'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $client = new Client($conn);
    if ($client->addClient($first_name, $last_name, $middle_initials, $gender, $email, $phone, $address)) {
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Client</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="mt-4">Add New Client</h1>
    <form method="post" action="add.php">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" class="form-control" name="first_name" required>
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" name="last_name" required>
        </div>
        <div class="form-group">
            <label>Middle Initials</label>
            <input type="text" class="form-control" name="middle_initials">
        </div>
        <div class="form-group">
            <label>Gender</label>
            <select class="form-control" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" name="phone" required placeholder="+123-456-7890">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="address" required>
        </div>
        <button type="submit" class="btn btn-success">Add Client</button>
    </form>
</div>
</body>
</html>
