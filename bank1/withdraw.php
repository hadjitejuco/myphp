<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = floatval($_POST['amount']);
    if ($amount > $_SESSION['balance']) {
        $error = 'Insufficient funds.';
    } else {
        $_SESSION['balance'] -= $amount;  // Update balance
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


<?php session_start(); ?>: This line starts or resumes a session, allowing you to store and retrieve session data using $_SESSION.
$error = '';: This line initializes an empty string variable $error which will be used to store any error messages related to withdrawal.
if ($_SERVER['REQUEST_METHOD'] == 'POST') { ... }: This conditional block checks if the form has been submitted using the POST method. It ensures that the following code runs only when the form is submitted.
$amount = floatval($_POST['amount']);: This line retrieves the amount entered in the form ($_POST['amount']) and converts it to a floating-point number using floatval(). This ensures that the amount is treated as a numeric value.
if ($amount > $_SESSION['balance']) { ... } else { ... }: This conditional block checks if the withdrawal amount is greater than the current balance stored in the session. If so, it sets the $error variable to 'Insufficient funds.'. Otherwise, it deducts the withdrawal amount from the current balance, updates the session, and redirects the user to the balance page (balance.php).
<?php if ($error): ?> ... <?php endif; ?>: This PHP block checks if the $error variable is not empty. If there is an error message, it displays it in a paragraph with red color.
<form action="withdraw.php" method="post">: Form element with action attribute set to "withdraw.php" (the current page) and method attribute set to "post".
<input type="number" name="amount" min="1" step="0.01" required>: Input field where the user can enter the amount to withdraw. Similar to the deposit form, it restricts input to numeric values, specifies the minimum value allowed (1), and makes the field mandatory.
<button type="submit">Withdraw</button>: Submit button for the form.
<a href="index.php">Back to Home</a>: Link to navigate back to the home page (index.php).