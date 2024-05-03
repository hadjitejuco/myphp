<?php
session_start();

// Redirect to login page if not logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}
echo "Welcome to the Video Rental System!";
require 'functions.php';
require 'menu.php';

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'add':
        require 'add.php';
        break;
    case 'edit':
        require 'edit.php';
        break;
    case 'delete':
        require 'delete.php';
        break;
    case 'view':
        require 'view.php';
        break;
    case 'view_single':
        require 'view_single.php';
        break;
    default:
        echo "<p>Welcome to the Video Rental System!</p>";
        break;
}
?>
