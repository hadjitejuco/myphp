<?php
echo "<p>Display Current Date:</p>";
echo date("Y-m-d"); 
echo "<br>";
echo "<p>Display Current Time:</p>";
echo date("H:i:s");
echo "<br>";
echo "<p>Format Date and Time</p>";
echo date("Y-m-d H:i:s");
echo "<br>";
echo "<p>Display the Day of the Week</p>";
echo date("l");
echo "<br>";

echo "<p>Getting the Default Time Zone</p>";
echo date_default_timezone_get();
echo "<p>Setting the Default Time Zone</p>";
date_default_timezone_set('Asia/Manila');
echo date("Y-m-d H:i:s");
echo "<br>";
echo "<p>mktime():</p>";	
echo mktime();
?>
