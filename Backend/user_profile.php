<?php

//kareen terkawi
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_GET['ID'])) {
    die("No user ID provided.");
}

$id = intval($_GET['ID']); // sanitizing input
    
// Connect to MySQL
$conn = new mysqli("localhost", "root", "", "winteracademy");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user by ID
$sql = "SELECT * FROM student WHERE ID = $id";
$result = $conn->query($sql);

if ($result->num_rows === 0) {
    die("User not found.");
}

$student = $result->fetch_assoc();

$conn->close();

?>
