<?php

$host = 'localhost';       
$dbname = 'winteracademy'; 
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) { 
    die("Database connection failed: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
  
  
    $stmt = $pdo->prepare("SELECT * FROM student WHERE Email = :email");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
  
    if ($user) {
      if (password_verify($password, $user['Password'])) {
        session_start();
        $_SESSION['user_id'] = $user['ID'];
        echo json_encode(['success' => true]);
      } else {
        echo json_encode(['success' => false, 'message' => 'Invalid email or password.']);
      }
    } else {
      echo json_encode(['success' => false, 'message' => 'No user found with this email.']);
    }
  }

?>