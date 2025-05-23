<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: Log-in.php");
    exit;
}

$student_id = $_SESSION['user_id'];

$host = "localhost";
$db = "winteracademy";
$user = "root"; 
$pass = "";     

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM student WHERE ID = :id");
    $stmt->bindParam(':id', $student_id, PDO::PARAM_INT);
    $stmt->execute();
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$student) {
        echo "Student not found.";
        exit;
    }
    $courseStmt = $conn->prepare("
        SELECT c.*
        FROM course c
        INNER JOIN student_course sc ON c.id = sc.course_id
        WHERE sc.student_id = :student_id
    ");
    $courseStmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
    $courseStmt->execute();
    $courses = $courseStmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
    exit;
}
?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>My Profile</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <!--by kareen terkawi-->
    <script>
      // $(function () {
      //   $("#navbar").load("nav.txt");
      // });
      $(function () {
        $("#footer").load("footer.txt");
      });
    </script>
    <style>
      body {
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }

      .content-wrapper {
        position: relative;
        padding: 60px 20px;
        color: #022429;
        margin-bottom: 100px;
      }

      .content-wrapper .background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('../Images/skiing.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        opacity: 0.3;
        z-index: -1;
      }

      .page-title {
        text-align: center;
        margin-bottom: 40px;
        font-size: 2.5em;
        font-weight: 700;
        color: #053557;
        text-transform: uppercase;
        letter-spacing: 2px;
        position: relative;
      }

      .page-title::after {
        content: "";
        display: block;
        width: 80px;
        height: 4px;
        background: #7393B3;
        margin: 10px auto 0;
        border-radius: 2px;
        transition: width 0.3s ease;
      }

      .page-title:hover::after {
        width: 120px;
      }

      .profile-and-content {
        display: flex;
        gap: 40px;
        flex-wrap: wrap;
        align-items: flex-start;
      }

      .profile-info {
        display: flex;
        flex-direction: column;
        gap: 30px;
      }

      .pfp, .level {
        background-color: rgba(255, 255, 255, 0.95);
        padding: 20px 30px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        max-width: 250px;
        text-align: center;
      }

      .pfp img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-bottom: 10px;
      }

      .pfp h1 {
        font-size: 18px;
        margin-bottom: 5px;
      }

      .pfp h2 {
        font-size: 14px;
        color: #444;
      }

      .level ul {
        text-align: left;
        list-style: none;
        padding-left: 0;
        margin-top: 10px;
      }

      .level li {
        margin-bottom: 8px;
      }

      .main-content-group {
        display: flex;
        gap: 30px;
        flex-wrap: wrap;
        justify-content: flex-start;
      }

      .course-and-certificate {
        display: flex;
        flex-direction: column;
        gap: 30px;
        width: 60vw;
      }

      .mycourses, .certificates, .studentinfo {
        background-color: rgba(255, 255, 255, 0.95);
        padding: 20px 30px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      }

      .mycourses h1, .certificates h1, .studentinfo h1 {
        font-size: 22px;
        margin-bottom: 10px;
        color: #022429;
      }

      .mycourses h2 {
        font-size: 18px;
        color: #053557;
        margin: 20px 0 10px;
      }

      .carousel {
        display: flex;
        overflow-x: auto;
        gap: 15px;
        scroll-snap-type: x mandatory;
        padding-bottom: 10px;
      }

      .carousel::-webkit-scrollbar {
        height: 8px;
      }

      .carousel::-webkit-scrollbar-thumb {
        background-color: #7393B3;
        border-radius: 4px;
      }

      .course-card {
        flex: 0 0 auto;
        width: 200px;
        background-color: #f3f7fa;
        border-left: 4px solid #7393B3;
        border-radius: 10px;
        padding: 15px;
        scroll-snap-align: start;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: transform 0.2s;
      }

      .course-card:hover {
        transform: scale(1.03);
      }

      .course-card p {
        margin-top: 6px;
        font-size: 14px;
        color: #444;
      }

      .studentinfo {
    max-width: 200px;
    color: #022429;
    background-color: rgba(255, 255, 255, 0.95);
    padding: 15px 20px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  }

  .studentinfo h1 {
    font-size: 20px;
    margin-bottom: 10px;
    color: #022429;
    text-align: center;
  }
      .studentinfo ul {
        list-style: none;
        padding: 0;
        margin: 0;
      }

      .studentinfo ul li {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 10px 0;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
  }

      .studentinfo ul li:last-child {
        border-bottom: none;
      }

      .studentinfo p {
    margin: 2px 0;
    font-size: 13px;
    color: #444;
    line-height: 1.4;
  }
    </style>
  </head>

  <!-- By Kareen Terkawi -->
  <body>

    <div id="navbar">
    <?php include 'nav.php'?>
    </div>

    <main class="content-wrapper">
      <div class="background"></div>
      <h1 class="page-title">Always Remember, The Sky Is The Limit!</h1>

      <div class="profile-and-content">

        <!-- Left: Profile Info -->
        <div class="profile-info">
          <div class="pfp" id="pfp">
            <img src="../Images/pfp.png" alt="profile picture">
            <h1><?php echo htmlspecialchars($student['Fname']); ?> <?php echo htmlspecialchars($student['Lname']); ?></h1>
            <h2><?php echo htmlspecialchars($student['Email']); ?></h2>
          </div>

          <div class="level" id="level">
            <h1>My Level</h1>
            <ul>
              <li><b>Skiing:</b><?php echo htmlspecialchars($student['Level']); ?></li>
              <li><b>Snowboarding:</b> <?php echo htmlspecialchars($student['Level']); ?></li>
              <li><b>Sledding:</b> <?php echo htmlspecialchars($student['Level']); ?></li>
              <li><b>Ice Climbing:</b> <?php echo htmlspecialchars($student['Level']); ?></li>
            </ul>
          </div>
        </div>
>
        <div class="main-content-group">

          <div class="course-and-certificate">
            <div class="mycourses" id="mycourses">
              <h1>My Courses</h1>

              <div class="ongoing" id="ongoing">
                <h2>Ongoing</h2>
                <div class="carousel">
                <?php foreach ($courses as $course): ?>
              <div class="course-card">
              <?php echo htmlspecialchars($course['sport']); ?>
              <p><?php echo htmlspecialchars($course['timing']); ?></p>
              </div>
              <?php endforeach; ?>
                  
                </div>
              </div>

              <div class="completed" id="completed">
                <h2>Completed</h2>
                <div class="carousel">
                  <div class="course-card">course 1<p>course 1 details</p></div>
                  <div class="course-card">course 2<p>course 2 details</p></div>
                  <div class="course-card">course 3<p>course 3 details</p></div>
                </div>
              </div>
            </div>

            <div class="certificates" id="certificates">
              <h1>Earned Certificates</h1>
              <div class="carousel">
                <div class="course-card">Certificate 1</div>
                <div class="course-card">Certificate 2</div>
                <div class="course-card">Certificate 3</div>
              </div>
            </div>
          </div>

          <div class="studentinfo" id="studentinfo">
            <h1>Student Info</h1>
            <ul>
              <li><p>Weight</p><p><?php echo htmlspecialchars($student['Weight']); ?> kg</p></li>
              <li><p>Height</p><p><?php echo htmlspecialchars($student['Height']); ?> cm</p></li>
              <li><p>Disabilities</p><p><?php echo htmlspecialchars($student['Disabilities']); ?></p></li>
              <li><p>Emergency Contact</p><p><?php echo htmlspecialchars($student['Emergency_Contact_Number']); ?></p></li>
            </ul>
          </div>

        </div>
      </div>
    </main>

    <div id="footer"></div>
  </body>
  </html>
