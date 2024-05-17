<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputDate = $_POST['date'];
    
    // Validate input date
    if (strtotime($inputDate) === false) {
        echo "Invalid date format. Please use YYYY-MM-DD.<br>";
    } else {
        $timestamp = strtotime($inputDate);

        // Future dates
        $oneYearLater = date("Y-m-d", strtotime("+1 year", $timestamp));
        $fiveYearsLater = date("Y-m-d", strtotime("+5 years", $timestamp));
        $oneDecadeLater = date("Y-m-d", strtotime("+10 years", $timestamp));

        // Past dates
        $oneYearBefore = date("Y-m-d", strtotime("-1 year", $timestamp));
        $fiveYearsBefore = date("Y-m-d", strtotime("-5 years", $timestamp));
        $oneDecadeBefore = date("Y-m-d", strtotime("-10 years", $timestamp));

        // Display results
        echo "Input Date: $inputDate<br>";
        echo "One Year Later: $oneYearLater<br>";
        echo "Five Years Later: $fiveYearsLater<br>";
        echo "One Decade Later: $oneDecadeLater<br>";
        echo "One Year Before: $oneYearBefore<br>";
        echo "Five Years Before: $fiveYearsBefore<br>";
        echo "One Decade Before: $oneDecadeBefore<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back to the Future Program</title>
</head>
<body>
    <h1>Time Travel Simulator</h1>
    <form method="post" action="timesample2.php">
        <label for="date">Enter a starting date (YYYY-MM-DD):</label>
        <input type="text" id="date" name="date" required><br><br>
        <input type="submit" value="Calculate Time Travel">
    </form>
</body>
</html>
