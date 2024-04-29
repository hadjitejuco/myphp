<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Rental System</title>
</head>
<body>
    <h1>Computer Rental Form</h1>
    <form action="rentalSystem.php" method="post">
        <div>
            <label for="desktop">Number of Desktops:</label>
            <input type="number" id="desktop" name="desktop" value="0" min="0">
        </div>
        <div>
            <label for="laptop">Number of Laptops:</label>
            <input type="number" id="laptop" name="laptop" value="0" min="0">
        </div>
        <div>
            <label for="days">Number of Days:</label>
            <input type="number" id="days" name="days" value="1" min="1">
        </div>
        <button type="submit">Calculate Cost</button>
    </form>
</body>
</html>
