<?php
session_start();

$nameErr = $emailErr = $phoneErr = $dateErr = $nightsErr = "";
$name = $email = $phone = $checkin_date = "";
$nights = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = true;

    // Validate name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $valid = false;
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
            $valid = false;
        } else {
            setcookie("name", $name, time() + (86400 * 30), "/");
        }
    }

    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $valid = false;
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $valid = false;
        }
    }

    // Validate phone
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required";
        $valid = false;
    } else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^[0-9]{10}$/", $phone)) {
            $phoneErr = "Invalid phone number";
            $valid = false;
        }
    }

    // Validate check-in date
    if (empty($_POST["checkin_date"])) {
        $dateErr = "Check-in date is required";
        $valid = false;
    } else {
        $checkin_date = test_input($_POST["checkin_date"]);
    }

    // Validate number of nights
    if (empty($_POST["nights"])) {
        $nightsErr = "Number of nights is required";
        $valid = false;
    } else {
        $nights = test_input($_POST["nights"]);
        if (!filter_var($nights, FILTER_VALIDATE_INT) || $nights < 1) {
            $nightsErr = "Invalid number of nights";
            $valid = false;
        }
    }

    if ($valid) {
        // Store reservation data in session
        if (!isset($_SESSION['reservations'])) {
            $_SESSION['reservations'] = [];
        }
        $_SESSION['reservations'][] = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'checkin_date' => $checkin_date,
            'nights' => $nights
        ];
        header("Location: view_reservations.php");
        exit;
    } else {
        // Redirect back with error messages
        $query = http_build_query([
            'nameErr' => $nameErr,
            'emailErr' => $emailErr,
            'phoneErr' => $phoneErr,
            'dateErr' => $dateErr,
            'nightsErr' => $nightsErr
        ]);
        header("Location: index.php?$query");
        exit;
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
