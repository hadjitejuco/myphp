<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD']== 'POST'){
    $amount = floatval($_POST['amount']);
    if ($amount > $_SESSION['balance']) {
        $error = 'Insufficient funds';
    }else{
        $_SESSION['balance'] -= $amount;
        header('Location: balance.php');
        exit();
    }
}
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Withdraw Money</title>
    </head>
    <body>
        <h1>Withdraw Money</h1>
        <?php if ($error): ?>
            <p style="color:red;"> <?php echo $error; ?> </p>
        <?php endif; ?>
        
            <form action="withdraw.php" method="post">
                <input type="number" name="amount" min="1" reqiured>
                <button type="submit">Withdraw</button>
            </form>
            <a href="index.php">return to home</a>
    </body>
</html>