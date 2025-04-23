<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    // Get form data
    $name = $_POST['fullName'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    // name validation (no numbers )
    if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
        die("Invalid name: only letters and spaces allowed.");
    }
    
    // Connect to MySQL
    $conn = new mysqli("localhost", "root", "", "winteracademy");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Insert into database
    $sql = "INSERT INTO contacts (name, email, subject, message)
            VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Message sent successfully!');
         window.location.href = window.location.href;</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }


    $conn->close();
}
?>
