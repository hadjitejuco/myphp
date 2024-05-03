<?php
if (isset($_GET['id'])) {
    $video = getVideoById($_GET['id']);
    if ($video !== null) {
        echo "<h2>Video Details</h2>";
        echo "Title: " . htmlspecialchars($video['title']) . "<br>";
        echo "Director: " . htmlspecialchars($video['director']) . "<br>";
        echo "Release Year: " . $video['release_year'] . "<br>";
    } else {
        echo "Video not found.";
    }
} else {
    echo "No video ID specified.";
}
?>
