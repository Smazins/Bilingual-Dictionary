<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "Feedbacks";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input and sanitize
$username = htmlspecialchars($_POST["Username"]);
$email = htmlspecialchars($_POST["Email"]);
$message = htmlspecialchars($_POST["Message"]);
$phone = htmlspecialchars($_POST["Phone"]);

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO Feedback (Username, Email, Message, Phone) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $username, $email, $message, $phone);

// Execute the statement
if ($stmt->execute()) {
    echo "Data added Successfully";
} else {
    echo "Something went wrong: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
