<h2>Video List</h2>
<table>
    <tr>
        <th>Title</th>
        <th>Director</th>
        <th>Release Year</th>
        <th>Actions</th>
    </tr>
    <?php
    $videos = getVideos();
    foreach ($videos as $video) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($video['title']) . "</td>";
        echo "<td>" . htmlspecialchars($video['director']) . "</td>";
        echo "<td>" . $video['release_year'] . "</td>";
        echo "<td>
            <a href='index.php?page=edit&id=" . $video['id'] . "'>Edit</a>
            <a href='index.php?page=delete&id=" . $video['id'] . "' onclick='return confirm(\"Are you sure?\");'>Delete</a>
            <a href='index.php?page=view_single&id=" . $video['id'] . "'>View</a>
        </td>";
        echo "</tr>";
    }
    ?>
</table>
