<?php
	$number = 1234.5678;
	echo number_format($number);
	echo '<hr>';
	$number = 1234.5678;
	echo number_format($number,2);
	echo '<hr>';
	$number = 1234.5678;
	echo number_format($number,2,',',' ');
?>