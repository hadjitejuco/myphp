<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $size = $_POST['size'];  
    $toppings = $_POST['toppings'] ?? [];  
    $quantity = $_POST['quantity'];  
   

    $sizePrices = [
        'small' => 8.00,
        'medium' => 10.00,
        'large' => 12.00
    ];


    $toppingPrices = [
        'pepperoni' => 1.50,
        'mushrooms' => 1.00,
        'onions' => 0.75,
        'sausage' => 1.25,
        'extraCheese' => 1.50
    ];

    $baseCost = $sizePrices[$size];

    $toppingCost = 0;
    
    foreach ($toppings as $topping) {
        $toppingCost += $toppingPrices[$topping];
    }

    $totalCost = ($baseCost + $toppingCost) * $quantity;

    // Output the order summary
    echo "<h1>Your Pizza Order</h1>";
    echo "<p>You ordered $quantity $size pizza(s) with " . implode(", ", $toppings) . ".";
    echo " The total cost of your order is \$$totalCost.</p>";
}
?>
