<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Add a video
function addVideo($title, $director, $release_year) {
    $new_id = count($_SESSION['videos']) + 1;
    $_SESSION['videos'][] = [
        'id' => $new_id,
        'title' => $title,
        'director' => $director,
        'release_year' => $release_year
    ];
}

// Get all videos
function getVideos() {
    return $_SESSION['videos'];
}

// Get a single video by ID
function getVideoById($id) {
    foreach ($_SESSION['videos'] as $video) {
        if ($video['id'] == $id) {
            return $video;
        }
    }
    return null;
}

// Update a video
function editVideo($id, $title, $director, $release_year) {
    foreach ($_SESSION['videos'] as $key => $video) {
        if ($video['id'] == $id) {
            $_SESSION['videos'][$key] = [
                'id' => $id,
                'title' => $title,
                'director' => $director,
                'release_year' => $release_year
            ];
            break;
        }
    }
}

function deleteVideo($id) {
    // Assuming you store videos in the $_SESSION['videos']
    foreach ($_SESSION['videos'] as $key => $video) {
        if ($video['id'] == $id) {
            unset($_SESSION['videos'][$key]);
            $_SESSION['videos'] = array_values($_SESSION['videos']); // Re-index array after unsetting
            return true;
        }
    }
    return false; // Return false if no video was found to delete
}



?>
