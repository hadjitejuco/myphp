<?php
function sanitizeInput($data){
	return htmlspecialchars(stripcslashes(trim($data)));
}
?>