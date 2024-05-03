<?php
// Ensure the script runs after the form submission
if (isset($_POST['submit'])) {
    if (isset($_GET['id'], $_POST['title'], $_POST['director'], $_POST['release_year'])) {
        // Call the edit function and pass the new values
        editVideo($_GET['id'], $_POST['title'], $_POST['director'], $_POST['release_year']);
        echo "<p>Video updated successfully. <a href='index.php'>Return to Home</a></p>";
    } else {
        echo "<p>Error: Missing data.</p>";
    }
}

// Display the form with existing video information
if (isset($_GET['id'])) {
    $video = getVideoById($_GET['id']);
    if ($video !== null) {
?>
        <form action="index.php?page=edit&id=<?php echo $video['id']; ?>" method="post">
            <input type="text" name="title" value="<?php echo htmlspecialchars($video['title']); ?>" required>
            <input type="text" name="director" value="<?php echo htmlspecialchars($video['director']); ?>" required>
            <input type="number" name="release_year" value="<?php echo $video['release_year']; ?>" required>
            <button type="submit" name="submit">Update Video</button>
        </form>
<?php
    } else {
        echo "<p>Video not found.</p>";
    }
}
?>
