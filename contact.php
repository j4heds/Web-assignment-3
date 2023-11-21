<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "web_database";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO web_table (name, phone, email, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $phone, $email, $message);

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['message'];

if ($stmt->execute()) {
    echo "Successfully";
} else {
    echo "Error: " . $stmt->error;
}


$stmt->close();
$conn->close();
?>