<html>
<head><title>Using comments</title>
<style>body {font-family: Arial, Helvetica, sans-serif; font-size: 16px;}</style>
<body>
	<h1>02 Using comments</h1>
	<p>PHP script using comments.</p>
	<hr>
	<?php
		// Understanding the Basics: Adding Comments
		// This is a single line comment
		echo "<br />The single line comment does not appear, but this text does!";
		# Comments do not appear when viewing the page source
		echo "<br />Comments do not appear when viewing the page source either.";
		$value = 'inline comment';		// This is an inline comment
		echo "<br />The $value does not appear, but this text does!";
		/*
		 * This is a 
		 * multiline
		 * comment
		 */
		echo "<br />The multiline comment does not appear, but this text does!";
	?>
</body>
</html>