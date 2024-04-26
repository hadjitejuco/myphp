<?php
// Establish connection to MySQL database
$servername = "localhost"; // Change this to your MySQL server name
$username = "root"; // Change this to your MySQL username
$password = "Themaclife123@"; // Change this to your MySQL password
$database = "useraccounts"; // Change this to your MySQL database name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assign variables from the POST data
    $age = isset($_POST['age']) ? intval($_POST['age']) : 0;
    $isStudent = isset($_POST['is_student']) ? true : false;

    // Perform fee calculation (similar to your original PHP code)
    $basePrice = 0;
    if ($age >= 18) {
        $basePrice = 100; // Adult
    } elseif ($age >= 13) {
        $basePrice = 50; // Teenager
    } else {
        $basePrice = 0; // Children
    }

    $finalPrice = $isStudent ? ($basePrice - ($basePrice * 0.20)) : $basePrice;

    // Insert registration data into database
    $sql = "INSERT INTO Registrations (Age, Student_Status, RegistrationFee) VALUES ('$age', '$isStudent', '$finalPrice')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // If not submitted
    echo "<p>No data received. Please <a href='index.html'>go back</a> and submit the form.</p>";
}

// Close database connection
$conn->close();
?>
