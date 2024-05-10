<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Trim to remove whitespace
    $title = trim($title);
    $description = trim($description);

    // Use ucfirst and ucwords for title and description
    $title = ucfirst($title);
    $description = ucwords($description);

    // Display cleaned but NOT secure input
    echo "<h1>" . $title . "</h1>";
    echo "<p>" . $description . "</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unsafe Text Processing Example</title>
</head>
<body>
    <h2>Submit Your Article</h2>
    <form method="post" action="">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>