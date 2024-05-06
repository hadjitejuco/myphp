<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = floatval($_POST['amount']);
    if ($amount > $_SESSION['balance']) {
        $error = 'Insufficient funds.';
    } else {
        $_SESSION['balance'] -= $amount;  // Update balance
        // Record this transaction
        $_SESSION['transactions'][] = [
            'type' => 'Withdrawal',
            'amount' => $amount,
            'new_balance' => $_SESSION['balance']
        ];
        header('Location: balance.php');  // Redirect to balance page
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Withdraw Money</title>
</head>
<body>
    <h1>Withdraw Money</h1>
    <?php if ($error): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="withdraw.php" method="post">
        <input type="number" name="amount" min="1" step="0.01" required>
        <button type="submit">Withdraw</button>
    </form>
    <a href="index.php">Back to Home</a>
</body>
</html>
