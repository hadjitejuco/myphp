<?php
if (isset($_GET['id'])) {
    deleteVideo($_GET['id']);
    echo "Video deleted successfully. <a href='index.php'>Return to Home</a>";
} else {
    echo "No video ID specified.";
}
?>
