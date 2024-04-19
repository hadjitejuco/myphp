<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>My First PHP script</title>
    </head>
    <body>
        <h1>Using PHP script</h1>
        <p>This will display hello world with current date</p>
        
        <?php
            //comments
            echo "Hello World";
            //display current date
            $today = date('Y-m-d');
            //display the date
            echo "<p><b>Today is $today </b></p>";
        ?>
    </body>
</html>