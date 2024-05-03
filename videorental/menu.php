
<?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
<nav>
    <ul>
        <li><a href="index.php?page=add">Add Video</a></li>
        <li><a href="index.php?page=view">View All Videos</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</nav>
<?php endif; ?>
