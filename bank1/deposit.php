<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        $amount = floatval($_POST['amount']);
        $_SESSION['balance'] += $amount; //update balance
        header('Location: balance.php'); //redirect to balance.php page
        exit();
    }   
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Deposit Money</title>
    </head>
    <body>
        <h1>Deposit Money</h1>
        <form action="deposit.php" method="post">
            <input type="number" name="amount" min="1" required>
            <button type="submit">Deposit</button>
        </form>
        <a href="index.php">Back to Home</a>
    </body>
</html>