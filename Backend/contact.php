<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   

    $name = $_POST['fullName'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
        die("Invalid name: only letters and spaces allowed.");
    }
    

    $conn = new mysqli("localhost", "root", "", "winteracademy");


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "INSERT INTO contacts (name, email, subject, message)
            VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Message sent successfully!');
        window.location.href = '../frontend/contactus.php';
              </script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }


    $conn->close();
}
?>
