<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "user_login"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$pass = $_POST['password'];
$telephone = $_POST['telephone'];

$stmt = $conn->prepare("INSERT INTO users (name, surname, email, password, telephone) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $surname, $email, $pass, $telephone);

if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->error;
}


$stmt->close();
$conn->close();
?>