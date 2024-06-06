<?php
$email = "test@example.com";
$pattern = "/^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/";

if (preg_match($pattern, $email)) {
    echo "The email address is valid.";
} else {
    echo "The email address is invalid.";
}
?>
