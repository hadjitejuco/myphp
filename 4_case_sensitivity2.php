<html>
<head><title>04 Case sensitivity</title>
<style>body {font-family: Arial, Helvetica, sans-serif; font-size: 16px;}</style>
<body>
	<h1>04 Case sensitivity</h1>
	<p>PHP script showing case sensitivity.</p>
	<hr>
	<?php
		$color = "red";
		echo "My car is " . $color . "<br>";
		echo "My house is " . $COLOR . "<br>";
		echo "My boat is " . $coLOR . "<br>";
	?>
</body>
</html>