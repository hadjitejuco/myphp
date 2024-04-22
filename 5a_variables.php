<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Variables in PHP</title>
    </head>
    <body>
        <h1>Using VAR in PHP</h1>
    <?php
        $name = "John Doe"; // String type
        $age = 30;          // Integer type
        $temperature = 98.6; // Float type
        $is_admin = true;   // Boolean type

        echo "Name: $name, Age: $age, Temperature: $temperature, Admin: $is_admin";

        echo "<br>";

        $firstname = "Hadji";
        $lastname = "Tejuco";
        $fullname = $firstname . " " . $lastname;

        echo "Fullname is $fullname";
    ?>

    </body>
</html>