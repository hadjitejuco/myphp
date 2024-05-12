<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        header, footer {
            background: #004D99;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }
        nav {
            background: #333;
            padding: 10px 0;
            text-align: center;
        }
        nav a {
            color: white;
            margin: 0 10px;
            text-decoration: none;
            font-size: 18px;
        }
        nav a:hover {
            text-decoration: underline;
        }
        section {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<header>
    <h1>Welcome to <?= APP_NAME ?></h1>
</header>
<nav>
    <a href="index.php?page=mugs">Mugs</a>
    <a href="index.php?page=tshirts">T-Shirts</a>
    <a href="index.php?page=keychains">Keychains</a>
</nav>
