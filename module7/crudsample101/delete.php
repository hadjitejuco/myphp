<?php
// delete.php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete user
    $sql = "DELETE FROM users WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully<br>";
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
    }
}
?>
