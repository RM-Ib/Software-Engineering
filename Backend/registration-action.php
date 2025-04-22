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

if($_POST['activity']) {
    $activity = $_POST['activity'];
  
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
    else {
        $course = $_POST['course'];

        $sql = "SELECT timing FROM course WHERE sport='$activity' AND  level= '$course' AND capacity > num_of_enrolled_students";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value='.$row['timing'].'>'.$row['timing'].'</option>';
            }
        } else {
            echo '<option>No timing</option>';
        }
    }
  }


?>
