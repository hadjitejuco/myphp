<?php


if ($_SERVER["REQUEST_METHOD"]=="POST") {

    $fuelType = $_POST['fuelType'];
    $quantity = $_POST['quantity'];
    $pricePerGallon = 0;

    switch ($fuelType) {
        case 'regular':
            $pricePerGallon = 2.50;
            break;
        case 'premium':
            $pricePerGallon = 3.00;
            break;
        case 'diesel':
            $pricePerGallon = 3.50;
            break;
    }

    $totalCost = $pricePerGallon * $quantity;
    echo "<p> You have selected <strong> $quantity gallons </strong> of <strong>$fuelType</strong>";
    echo "<p> Total Cost of fuel <strong>" . number_format($totalCost,2) . "</strong></p>";

}


?>
