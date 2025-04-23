<?php   //antonio karam
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
  $Fname = $_POST['Fname'] ?? '';
  $Lname = $_POST['Lname'] ?? '';
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';
  $Pnumber = $_POST['Pnumber'] ?? '';  
  $Weight = $_POST['Weight'] ?? '';
  $Height = $_POST['Height'] ?? '';
  $Disabilities = $_POST['Disabilities'] ?? '';
  $Level = $_POST['Level'] ?? 'Beginner';

  try {
      $stmt = $pdo->prepare("SELECT * FROM Student WHERE Email = :email");  
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->execute();
      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($user) {
          echo json_encode(['success' => false, 'message' => 'Email already in use.']);
          exit;
      }
  } catch (PDOException $e) {
      error_log("Error checking email: " . $e->getMessage());
      echo json_encode(['success' => false, 'message' => 'Database error during email check.']);
      exit;
  }

  $hashedPassword = password_hash($password, PASSWORD_DEFAULT); //mara7ib

  try {
      $insertStmt = $pdo->prepare("
          INSERT INTO student (Fname, Lname, Email, Password, Emergency_Contact_Number, Height, Weight, Level, Disabilities)
          VALUES (:Fname, :Lname, :email, :password, :Pnumber, :Height, :Weight, :Level, :Disabilities)
      ");

      $insertStmt->bindParam(':Fname', $Fname);
      $insertStmt->bindParam(':Lname', $Lname);
      $insertStmt->bindParam(':email', $email);
      $insertStmt->bindParam(':password', $hashedPassword);
      $insertStmt->bindParam(':Pnumber', $Pnumber); 
      $insertStmt->bindParam(':Height', $Height);
      $insertStmt->bindParam(':Weight', $Weight);
      $insertStmt->bindParam(':Disabilities', $Disabilities);
      $insertStmt->bindParam(':Level', $Level);


      if ($insertStmt->execute()) {
          echo json_encode(['success' => true, 'message' => 'Signup successful!']);
      } else {
          echo json_encode(['success' => false, 'message' => 'Error during signup.']);
      }
  } catch (PDOException $e) {
      error_log("Error inserting user data: " . $e->getMessage());
      echo json_encode(['success' => false, 'message' => 'Database error during signup.']);
  }
}
?>
