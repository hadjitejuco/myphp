<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $orderDetails = trim($_POST['orderDetails']);

    $products = explode("\n", $orderDetails);
    $orderSummary = [];

    foreach ($products as $product) {
     
        $details = explode(",", $product);
        $name = trim($details[0]);
        $quantity = trim($details[1]);
        $price = trim($details[2]);

    
        $totalPrice = $quantity * $price;

        $summary = implode(" - ", [$name, "Quantity: $quantity", "Total: $" . number_format($totalPrice, 2)]);
        $orderSummary[] = $summary;
    }

    $displayOrder = implode("<br>", $orderSummary);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Order System</title>
</head>
<body>
<h1>Simple Order System</h1>

<form method="post" action="order.php">
    <label for="orderDetails">Enter order details (Format: Name,Quantity,Price per item):</label><br>
    <textarea name="orderDetails" rows="5" cols="30"></textarea><br>
    <input type="submit" value="Submit Order">
</form>

<?php
if (!empty($displayOrder)) {
    echo "<h2>Order Summary:</h2>";
    echo $displayOrder;  // Display the formatted order summary
}
?>

</body>
</html>