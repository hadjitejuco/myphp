<?php
session_start();
if (!isset($_SESSION['videos'])) {
    $_SESSION['videos'] = array();
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
       
        break;
}
?>
