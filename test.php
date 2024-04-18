<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Using PHP script tags</title>
    </head>
    <body>
        <h1>My first php script</h1>
        <p>php script to display hello world and time</p>
        <?php
            echo "Hello World";
            $today = date('Y-m-d');
            echo "<p><b> today is $today </b> </p>";
        
        ?>
    </body>
</html>