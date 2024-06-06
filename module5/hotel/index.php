<!DOCTYPE html>
<html>
<head>
    <title>Hotel Reservation System</title>
</head>
<body>
    <h2>Hotel Reservation Form</h2>
    <form method="post" action="process_reservation.php">
        Name: <input type="text" name="name" value="<?php echo isset($_COOKIE['name']) ? htmlspecialchars($_COOKIE['name']) : ''; ?>">
        <span class="error">* <?php echo isset($_GET['nameErr']) ? htmlspecialchars($_GET['nameErr']) : ''; ?></span>
        <br><br>
        Email: <input type="text" name="email">
        <span class="error">* <?php echo isset($_GET['emailErr']) ? htmlspecialchars($_GET['emailErr']) : ''; ?></span>
        <br><br>
        Phone: <input type="text" name="phone">
        <span class="error">* <?php echo isset($_GET['phoneErr']) ? htmlspecialchars($_GET['phoneErr']) : ''; ?></span>
        <br><br>
        Check-in Date: <input type="date" name="checkin_date">
        <span class="error">* <?php echo isset($_GET['dateErr']) ? htmlspecialchars($_GET['dateErr']) : ''; ?></span>
        <br><br>
        Number of Nights: <input type="number" name="nights" min="1">
        <span class="error">* <?php echo isset($_GET['nightsErr']) ? htmlspecialchars($_GET['nightsErr']) : ''; ?></span>
        <br><br>
        <input type="submit" value="Submit">
    </form>
    <br>
    <a href="view_reservations.php">View Reservations</a>
</body>
</html>
