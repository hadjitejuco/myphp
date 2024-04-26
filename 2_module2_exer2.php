<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Reservation System</title>
</head>
<body>
    <h1>HJT Hotel Reservation System</h1>
    <form action="reservation.php" method="post">
        <label for="roomType">Choose a room type:</label>
        <select name="roomType" id="roomType">
            
            <option value="standard">Standard</option>
            <option value="vip">VIP Room</option>
            <option value="vvip">VVIP Room</option>

        </select>

        <button type="submit">Book Room</button>


    </form>
</body>
</html>
