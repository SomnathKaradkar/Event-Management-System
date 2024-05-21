<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['dob'])) {
    // Securely handle user input
    $dob = $_POST['dob'];
    $user_dob = DateTime::createFromFormat('Y-m-d', $dob);
    $current_date = new DateTime();
    $age = $current_date->diff($user_dob)->y;

    if ($age >= 21) {
        header("Location: welcome.php");
        exit();
    } else {
        header("Location: notwelcome.php");
        exit();
    }
}

// Database Interaction
$mysqli = new mysqli("localhost", "username", "password", "database");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$today = date('Y-m-d');
$sql = "SELECT * FROM bookings 
        WHERE DATE(date) > CURRENT_DATE() 
        AND dateofquote != '' 
        AND email != '' 
        AND confirmed = 0";

if ($result = $mysqli->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $date_of_quote = $row['dateofquote'];
        $datetime1 = new DateTime($today);
        $datetime2 = new DateTime($date_of_quote);
        $interval = $datetime1->diff($datetime2);
        $diff = $interval->format('%a');

        if ($diff == 2) {
            // Send email
            // Implement your email sending logic here
        } else {
            echo 'Something went wrong';
        }
    }

    // Free result set
    $result->free();
} else {
    echo "Error: " . $mysqli->error;
}

// Close connection
$mysqli->close();
?>
