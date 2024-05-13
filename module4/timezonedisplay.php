<?php
// Function to display date and time for 	a specific time zone
function displayDateTime($timeZone, $cityName) {
    date_default_timezone_set($timeZone);  // Set the time zone
    $dateTime = date("Y-m-d H:i:s");  // Get the current date and time
    echo "Current date and time in $cityName: $dateTime<br>";
}

// Display date and time using DateTime and DateTimeZone classes
function displayDateTimeOO($timeZone, $cityName) {
    $dt = new DateTime("now", new DateTimeZone($timeZone));
    echo "Current date and time in $cityName: " . $dt->format('Y-m-d H:i:s') . "<br>";
}

// Using procedural approach
displayDateTime('America/New_York', 'New York');
displayDateTime('Europe/London', 'London');
displayDateTime('Asia/Tokyo', 'Tokyo');
displayDateTime('Asia/Manila', 'Manila');

echo "<br>";
// Using object-oriented approach
displayDateTimeOO('Australia/Sydney', 'Sydney');
displayDateTimeOO('Europe/Berlin', 'Berlin');
displayDateTimeOO('America/Los_Angeles', 'Los Angeles');
displayDateTimeOO('Asia/Manila', 'Manila');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Zone Display</title>
</head>
<body>
    <h1>Time Zone Display</h1>
    <p>PHP manages time across different global cities.</p>
</body>
</html>
