<?php
session_start();

// Define the initial state of books in the library
$initialBooks = [
    'The Great Gatsby' => 5,
    'War and Peace' => 3,
    'ABC' => 4
];


if (!isset($_SESSION['books'])) {
    $_SESSION['books'] = $initialBooks;
}


function checkoutBook($bookName, $quantity) {
    if ($_SESSION['books'][$bookName] >= $quantity) {
        $_SESSION['books'][$bookName] -= $quantity;
        $message = "You have successfully checked out $quantity copy/copies of $bookName.";
    } else {
        $message = "Sorry, not enough copies of $bookName are available.";
    }
    echo "<script>alert('$message'); window.location.href='exer4.php';</script>";
}


function returnBook($bookName, $quantity) {
    global $initialBooks;
    if ($_SESSION['books'][$bookName] + $quantity > $initialBooks[$bookName]) {
        $message = "Cannot return $quantity copies of $bookName. It exceeds initial stock.";
    } else {
        $_SESSION['books'][$bookName] += $quantity;
        $message = "You have successfully returned $quantity copy/copies of $bookName.";
    }
    echo "<script>alert('$message'); window.location.href='exer4.php';</script>";
}


function resetBooks() {
    global $initialBooks;
    $_SESSION['books'] = $initialBooks;
    echo "<script>alert('All books have been reset to initial quantities.'); window.location.href='exer4.php';</script>";
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['checkout']) && !empty($_POST['quantity'])) {
        checkoutBook($_POST['book'], intval($_POST['quantity']));
    } elseif (isset($_POST['return']) && !empty($_POST['quantity'])) {
        returnBook($_POST['book'], intval($_POST['quantity']));
    } elseif (isset($_POST['reset'])) {
        resetBooks();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HJT Library Management System</title>
</head>
<body>
    <h1>HJT Library Management System</h1>
    <h2>Available Books</h2>
    <ul>
        <?php foreach ($_SESSION['books'] as $book => $qty): ?>
            <li>
                <?php echo htmlspecialchars($book) . " - Available: $qty"; ?>
                <form method="POST" action="exer4.php" style="display: inline;">
                    <input type="hidden" name="book" value="<?php echo htmlspecialchars($book); ?>">
                    <input type="number" name="quantity" min="1" value="1" style="width: 40px;">
                    <button type="submit" name="checkout">Checkout</button>
                    <button type="submit" name="return">Return</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <form method="POST" action="exer4.php">
        <button type="submit" name="reset">Reset Books</button>
    </form>
</body>
</html>
