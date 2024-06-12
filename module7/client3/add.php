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
    $region = $_POST['region_text'];
    $province = $_POST['province_text'];
    $city = $_POST['city_text'];
    $barangay = $_POST['barangay_text'];
    $street = $_POST['street_text'];

    $client = new Client($conn);
    if ($client->addClient($first_name, $last_name, $middle_initials, $gender, $email, $phone, $region, $province, $city, $barangay, $street)) {
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            <label>Region</label>
            <select name="region" class="form-control" id="region"></select>
            <input type="hidden" name="region_text" id="region-text" required>
        </div>
        <div class="form-group">
            <label>Province</label>
            <select name="province" class="form-control" id="province"></select>
            <input type="hidden" name="province_text" id="province-text" required>
        </div>
        <div class="form-group">
            <label>City/Municipality</label>
            <select name="city" class="form-control" id="city"></select>
            <input type="hidden" name="city_text" id="city-text" required>
        </div>
        <div class="form-group">
            <label>Barangay</label>
            <select name="barangay" class="form-control" id="barangay"></select>
            <input type="hidden" name="barangay_text" id="barangay-text" required>
        </div>
        <div class="form-group">
            <label>Street (Optional)</label>
            <input type="text" class="form-control" name="street_text">
        </div>
        <button type="submit" class="btn btn-success">Add Client</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script src="ph-address-selector.js"></script>
</body>
</html>
