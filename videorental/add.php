<form action="index.php?page=add" method="post">
    <input type="text" name="title" placeholder="Title" required>
    <input type="text" name="director" placeholder="Director" required>
    <input type="number" name="release_year" placeholder="Release Year" required>
    <button type="submit" name="submit">Add Video</button>
</form>

<?php
if (isset($_POST['submit'])) {
    addVideo($_POST['title'], $_POST['director'], $_POST['release_year']);
    echo "Video added successfully.";
}
?>
