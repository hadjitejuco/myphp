<?php
// edit.php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch user data
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "No user found with ID $id<br>";
    }
}

// Handle form submission for updating users
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    if (empty($name) || empty($email)) {
        echo "Name and Email are required<br>";
    } else {
        $sql = "UPDATE users SET name = '$name', email = '$email' WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully<br>";
            header('Location: index.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $user['name']; ?>" required><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br>
        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>
