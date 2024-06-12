<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'client.php';

if (isset($_GET['id'])) {
    $client = new Client($conn);
    if ($client->deleteClient($_GET['id'])) {
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
