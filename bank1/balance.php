<?php
session_start();
if (!isset($_SESSION['balance'])) {
    $_SESSION['balance'] = 0;  // Initialize balance if not set
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
    <a href="index.php">Back to Home</a>
</body>
</html>


<?php session_start(); ?>: This line starts or resumes a session. Sessions are used to persist data across multiple page requests. It initializes the session mechanism, allowing you to store and retrieve session data using $_SESSION superglobal array.
<?php if (!isset($_SESSION['balance'])) { $_SESSION['balance'] = 0; } ?>: This PHP block checks if the session variable $_SESSION['balance'] is not set. If it's not set (i.e., if it's the user's first visit to the page or if the session has expired), it initializes the balance to 0 by setting $_SESSION['balance'] = 0;. This ensures that the balance is initialized before displaying it on the page.
<!DOCTYPE html>: This line specifies the document type and version of HTML being used, in this case, HTML5.
<html lang="en">: This line specifies the language of the document, which is English (en).
<head>: This section contains metadata and links to external resources, such as CSS files or scripts.
<meta charset="UTF-8">: This meta tag specifies the character encoding of the document as UTF-8, which supports a wide range of characters.
<title>Check Balance</title>: This line sets the title of the webpage displayed on the browser's title bar or tab.
</head>: Closing tag for the <head> section.
<body>: This section contains the content of the webpage that is visible to the user.
<h1>Your Current Balance is $<?php echo number_format($_SESSION['balance'], 2); ?></h1>: This line displays the current balance stored in the $_SESSION['balance'] variable. The number_format() function is used to format the balance as a currency value with two decimal places. The balance is echoed within the <h1> heading element.
<a href="index.php">Back to Home</a>: This line creates a hyperlink (<a>) that points to index.php, allowing the user to navigate back to the home page.
</body>: Closing tag for the <body> section.
</html>: Closing tag for the <html> section.