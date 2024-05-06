<?php
session_start();

// Clear previous data
//unset($_SESSION['balance']);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = floatval($_POST['amount']);
    $_SESSION['balance'] += $amount;  // Update balance
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


<?php session_start(); ?>: This line starts or resumes a session, allowing you to store and retrieve session data using $_SESSION.
if ($_SERVER['REQUEST_METHOD'] == 'POST') { ... }: This conditional block checks if the form has been submitted using the POST method. It ensures that the following code runs only when the form is submitted.
$amount = floatval($_POST['amount']);: This line retrieves the amount entered in the form ($_POST['amount']) and converts it to a floating-point number using floatval(). This ensures that the amount is treated as a numeric value.
$_SESSION['balance'] += $amount;: This line updates the $_SESSION['balance'] variable by adding the deposited amount to it. It uses the += operator to add the new deposit amount to the existing balance.
header('Location: balance.php');: This line redirects the user to the balance.php page after the deposit is processed. This page presumably displays the updated balance. The header() function is used to send an HTTP header to the browser, which triggers the redirect.
exit();: This function terminates the script immediately after the redirect header is sent. This ensures that no further code execution occurs after the redirect.
The HTML part contains a simple form where the user can input the amount to deposit. It consists of:
<h1>Deposit Money</h1>: Heading indicating the purpose of the page.
<form action="deposit.php" method="post">: Form element with action attribute set to "deposit.php" (the current page) and method attribute set to "post".
<input type="number" name="amount" min="1" step="0.01" required>: Input field where the user can enter the amount to deposit. The number type restricts input to numeric values. The min attribute specifies the minimum value allowed (1), and the step attribute specifies the minimum increment/decrement allowed (0.01). The required attribute makes the field mandatory.
<button type="submit">Deposit</button>: Submit button for the form.
<a href="index.php">Back to Home</a>: Link to navigate back to the home page (index.php).
