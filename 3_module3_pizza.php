<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Parlor Ordering System</title>
</head>
<body>
    <h1>Pizza Order Form</h1>
    <form action="orderPizza.php" method="post">
        <div>
            <label for="size">Choose pizza size:</label>
            <select id="size" name="size">
                <option value="small">Small</option>
                <option value="medium">Medium</option>
                <option value="large">Large</option>
            </select>
        </div>
        <div>
            <label for="toppings">Select toppings:</label>
            <br>
            <input type="checkbox" id="pepperoni" name="toppings[]" value="pepperoni">
            <label for="pepperoni">Pepperoni</label><br>
            <input type="checkbox" id="mushrooms" name="toppings[]" value="mushrooms">
            <label for="mushrooms">Mushrooms</label><br>
            <input type="checkbox" id="onions" name="toppings[]" value="onions">
            <label for="onions">Onions</label><br>
            <input type="checkbox" id="sausage" name="toppings[]" value="sausage">
            <label for="sausage">Sausage</label><br>
            <input type="checkbox" id="extraCheese" name="toppings[]" value="extraCheese">
            <label for="extraCheese">Extra Cheese</label>
        </div>
        <div>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="1" min="1">
        </div>
        <button type="submit">Calculate Cost</button>
    </form>
</body>
</html>
