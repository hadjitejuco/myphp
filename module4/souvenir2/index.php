<?php
require_once 'config.php';
require_once 'header.php';
require_once 'utils.php';

if (isset($_GET['page'])) {
    $page = sanitizeInput($_GET['page']);
    
    switch ($page) {
        case 'mugs':
            require 'products.php';
            showMugs();
            break;
        case 'tshirts':
            require 'products.php';
            showTShirts();
            break;
        case 'keychains':
            require 'products.php';
            showKeychains();
            break;
        default:
            echo "<section><p>Please select a product category.</p></section>";
            break;
    }
} else {
    echo "<section><p>Welcome! Please select a category from the menu above.</p></section>";
}

require_once 'footer.php';
?>
