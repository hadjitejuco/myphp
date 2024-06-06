<!DOCTYPE html>
<html>
<head>
    <title>$_ENV Example</title>
</head>
<body>
    <h2>$_ENV Example</h2>
    <?php
    $env_var = getenv('PATH');
    echo "PATH Environment Variable: " . $env_var . "<br>";
    ?>
</body>
</html>
