<html>
<head><title>05 PHP Variables</title>
<style>body {font-family: Arial, Helvetica, sans-serif; font-size: 16px;}</style>
<body>
	<h1>05 PHP Variables</h1>
	<p>Using / Declaring PHP Variables</p>
	<hr>
	<?php
		// Understanding the Basics: Creating Variables in PHP
		// variables are used to store values
		// use "=" to assign a value
		$company = 'XYZ Consulting';

		// always start variable names with a "$" followed by a letter or underscore
		$name 	  = 'VALUE';
		$_another = 23;
		$name2 	  = 'OTHER';

		// do not use single letters: hard to debug later!
		$a = 1;
		$b = 'Some Text';

		// use camelCase: take advantage of fact variables are case sensitive
		$firstName 			 = 'Jeiven';
		$cityStatePostalCode = 'Malolos,  Bulacan 3000';
		$hourlyRate 		 = 55.22;

		// long names are allowed but can get out of hand!
		$theQuickBrownFoxJumpsOverTheLazyDog = 'TEST';
		echo $theQuickBrownFoxJumpsOverTheLazyDog;
	?>
</body>
</html>