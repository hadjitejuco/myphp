<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Reservations</title>
</head>
<body>
    <h2>Stored Reservations</h2>
    <?php
    if (isset($_SESSION['reservations']) && count($_SESSION['reservations']) > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Check-in Date</th>
                    <th>Number of Nights</th>
                </tr>";
        foreach ($_SESSION['reservations'] as $reservation) {
            echo "<tr>
                    <td>" . htmlspecialchars($reservation['name']) . "</td>
                    <td>" . htmlspecialchars($reservation['email']) . "</td>
                    <td>" . htmlspecialchars($reservation['phone']) . "</td>
                    <td>" . htmlspecialchars($reservation['checkin_date']) . "</td>
                    <td>" . htmlspecialchars($reservation['nights']) . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No reservations found.</p>";
    }
    ?>
    <br>
    <a href="index.php">Make Another Reservation</a>
</body>
</html>
