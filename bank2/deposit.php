<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = floatval($_POST['amount']);
    $_SESSION['balance'] += $amount;  // Update balance
    // Record this transaction
    $_SESSION['transactions'][] = [
        'type' => 'Deposit',
        'amount' => $amount,
        'new_balance' => $_SESSION['balance']
    ];
    header('Location: balance.php');  // Redirect to balance page
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Deposit Money</title>
</head>
<body>
    <h1>Deposit Money</h1>
    <form action="deposit.php" method="post">
        <input type="number" name="amount" min="1" step="0.01" required>
        <button type="submit">Deposit</button>
    </form>
    <a href="index.php">Back to Home</a>
</body>
</html>
