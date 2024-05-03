
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$videos = isset($_SESSION['videos']) ? $_SESSION['videos'] : [];


?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">All Videos</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Director</th>
                    <th>Release Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $videos = getVideos();
                if (count($videos) > 0) {
                    foreach ($videos as $video) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($video['title']) . "</td>";
                        echo "<td>" . htmlspecialchars($video['director']) . "</td>";
                        echo "<td>" . htmlspecialchars($video['release_year']) . "</td>";
                        echo "<td>
                            <a href='index.php?page=edit&id={$video['id']}' class='btn btn-info'>Edit</a>
                            <a href='index.php?page=delete&id={$video['id']}' class='btn btn-danger'>Delete</a>
                            <a href='index.php?page=view_single&id={$video['id']}' class='btn btn-primary'>View Details</a>
                            </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>No videos found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
