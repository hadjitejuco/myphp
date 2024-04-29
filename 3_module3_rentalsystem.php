<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $desktopCount = $_POST['desktop']; //3
    $laptopCount = $_POST['laptop']; //4
    $rentalDays = $_POST['days']; //1
 
    //array
    $costs = [
        'desktop' => 15,  
        'laptop' => 20    
    ];

    //user defined function
    function calculateTotalCost($desktopCount, $laptopCount, $rentalDays, $costs) {
        $totalDesktopCost = $desktopCount * $costs['desktop'] * $rentalDays;
        $totalLaptopCost = $laptopCount * $costs['laptop'] * $rentalDays;
        return $totalDesktopCost + $totalLaptopCost;
    }

    $totalCost = calculateTotalCost($desktopCount, $laptopCount, $rentalDays, $costs);

    echo "<h1>Total Cost of Rental</h1>";
    echo "<p>Total cost for renting $desktopCount desktop(s) and $laptopCount laptop(s) for $rentalDays day(s) is: \$$totalCost.</p>";
}
?>
