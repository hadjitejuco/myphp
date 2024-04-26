<?php
session_start();
if (!isset($_SESSION["balance"])) {
    $_SESSION["balance"] = 0;  //init balance if not set
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Check Balance</title>
    </head>
    <body>
     <h1>Your current balance is $<?php echo number_format($_SESSION["balance"],2);?></h1>
     <a href="index.html">return to home</a>
    </body>
</html>