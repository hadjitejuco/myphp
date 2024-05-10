<?php
	//Simple Constant

	// define ("SITE_URL","https://hadjitejuco.com");
	// echo SITE_URL;

	//Constant with Condition
	// define("MAX_USERS", 50);
	// if (MAX_USERS > 30) {
	// 	echo "High volume of users ";
	// }

	//Array
	// define ("CREDENTIALS", [
	// 	"username" => "admin",
	// 	"password" => "secret"
	// ]);

	// echo CREDENTIALS['username'];
	
	define ("API_KEY", "1234abcdef");

	function connectApi() {
		echo "Connecting to API KEY " . API_KEY;
	}

	connectApi();
?>
