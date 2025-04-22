<?php  // Reina Najjar
$host = "localhost";
$user = "root";
$password = "";
$dbname = "winteracademy";

// Create connection
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

session_start();

if(isset($_POST['register'])) {
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../Frontend/Log-in.php");
        exit;
    }
    
    $student_id = $_SESSION['user_id'];
    $course = $_POST['course'];
    $activity = $_POST['activity'];
    
        $course_id = $_POST['timing'];

        $sql = "SELECT * FROM student_course WHERE student_id='$student_id' AND  course_id= '$course_id'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            
            echo '<script>alert("You have already registered in this course before")</script>';
            
            
        } else {
            $insert = mysqli_query($conn, "INSERT INTO student_course(student_id, course_id) VALUES('$student_id', '$course_id')") or die('query failed');
            if ($insert){ 
                header("Location: ../frontend/home.php");
                exit;
            } else {
                echo "<p> There was an error when creating the subject </p>" ;
            }
        }

   
}

else if(isset($_POST['activity'])) {
    $activity = $_POST['activity'];
    if (isset($_POST['equip'])) {
        if ($_POST['equip'] === 'yes') {
        $sql = "SELECT type FROM equipment WHERE sport='$activity'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<input type="checkbox" id='.$row['type'].' name="equip" value='.$row['type'].'>
                    <label for='.$row['type'].'> '.ucfirst($row['type']).'</label><br>';
            }
        } else {
        echo 'No equipment';
        }
    }
    }
    else {
        $course = $_POST['course'];

        $sql = "SELECT id, timing FROM course WHERE sport='$activity' AND level= '$course' AND capacity > num_of_enrolled_students";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="'.$row['id'].'">'.$row['timing'].'</option>';
            }
        } else {
            echo '<option>No timing</option>';
        }
    }
  }


?>
