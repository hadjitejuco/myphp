<?php
require_once 'config.php'; //load config
include_once 'header.php'; //include header

//sanitize
require_once 'utils.php';

if (isset($_GET['page'])) {
	$page = sanitizeInput($_GET['page']);

	switch ($page) {
		case 'mugs':
			require 'products.php'; //call function 
			showMugs();
			break;
		case 'tshirts':
			require 'products.php'; //call function 
			showTShirts();
			break;
		case 'keychains':
			require 'products.php'; //call function 
			showKeychains();
			break;
		default:
			echo "<p> Welcome please select product from menu </p>";
			break;
	}
}else{
	echo "<p> Welcome please select from menu </p>";
}
//Menu
echo '<nav><ul>';
echo '<li><a href="index.php?page=mugs">Mugs</a></li>';
echo '<li><a href="index.php?page=tshirts">T-Shirts</a></li>';
echo '<li><a href="index.php?page=keychains">Keychains</a></li>';
echo '</nav></ul>';

include 'footer.php'; 

?>