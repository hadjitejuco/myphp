<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'client.php';

if (isset($_GET['id'])) {
    $client = new Client($conn);
    $clientData = $client->getClient($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $client = new Client($conn);
    if ($client->updateClient($_POST['id'], $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address'])) {
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
    <title>Edit Client</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="mt-4">Edit Client</h1>
    <form method="post" action="edit.php">
        <input type="hidden" name="id" value="<?php echo $clientData['id']; ?>">
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo $clientData['name']; ?>" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $clientData['email']; ?>" required>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" name="phone" value="<?php echo $clientData['phone']; ?>" required>
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="address" value="<?php echo $clientData['address']; ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Update Client</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>

    </form>
</div>
</body>
</html>
