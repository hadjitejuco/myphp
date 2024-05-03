<?php
function addVideo($title, $director, $release_year) {
    $new_id = count($_SESSION['videos']) + 1;
    $_SESSION['videos'][] = [
        'id' => $new_id,
        'title' => $title,
        'director' => $director,
        'release_year' => $release_year
    ];
}

function getVideos() {
    return $_SESSION['videos'];
}

function getVideoById($id) {
    foreach ($_SESSION['videos'] as $video) {
        if ($video['id'] == $id) {
            return $video;
        }
    }
    return null;
}

function editVideo($id, $title, $director, $release_year) {
    foreach ($_SESSION['videos'] as $key => $video) {
        if ($video['id'] == $id) {
            $_SESSION['videos'][$key] = [
                'id' => $id,
                'title' => $title,
                'director' => $director,
                'release_year' => $release_year
            ];
        }
    }
}

function deleteVideo($id) {
    foreach ($_SESSION['videos'] as $key => $video) {
        if ($video['id'] == $id) {
            unset($_SESSION['videos'][$key]);
            $_SESSION['videos'] = array_values($_SESSION['videos']);
        }
    }
}
?>
