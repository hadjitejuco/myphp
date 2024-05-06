<?php
session_start();
// Initialize transaction array if not already set
if (!isset($_SESSION['transactions'])) {
    $_SESSION['transactions'] = [];
    $_SESSION['balance'] = 0;  // Initialize balance
}
    
if (isset($_GET['action']) && $_GET['action'] == 'clearValue') {
    unset($_SESSION['transactions']);  // Clear the  session
    $_SESSION['feedback'] = "All devices have been cleared successfully.";
    header("Location: balance.php"); // Redirect to avoid resubmission
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Check Balance</title>
</head>
<body>
    <h1>Your Current Balance is $<?php echo number_format($_SESSION['balance'], 2); ?></h1>
    <h2>Transaction History</h2>
    <table border="1">
        <tr>
            <th>Type</th>
            <th>Amount</th>
            <th>New Balance</th>
        </tr>
        <?php foreach ($_SESSION['transactions'] as $transaction): ?>
            <tr>
                <td><?php echo $transaction['type']; ?></td>
                <td>$<?php echo number_format($transaction['amount'], 2); ?></td>
                <td>$<?php echo number_format($transaction['new_balance'], 2); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php
    echo '<form action="balance.php" method="get">
        <input type="hidden" name="action" value="clearValue">
        <button type="submit" onclick="return confirm(\'Are you sure you want to clear all values?\');">Clear All Values</button>
    </form>';
    ?>
    <a href="index.php">Back to Home</a>
</body>
</html>
