<?php
$conn = new mysqli('localhost', 'root', '', 'user_records');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['age']}</td>
                <td>{$row['city']}</td>
                <td><a href='#' class='image-link' data-src='uploads/{$row['image']}'>View Image</a></td>
                <td><button class='btn btn-success edit-btn' data-id='{$row['id']}'>Edit</button></td>
                <td><button class='btn btn-danger delete-btn' data-id='{$row['id']}'>Delete</button></td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='7'>No records found</td></tr>";
}

$conn->close();
?>
