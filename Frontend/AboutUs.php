<!-- By Ranim Ibrahim -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="script.js"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script>
    $(function () {
      $("#navbar").load("nav.txt");
    });
    
  </script>
  <title>About Us - HWCA</title>
  <style>
   body {
  margin: 0;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background-image: url("../Images/skipic.png");
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  background-attachment: fixed; /* This keeps background fixed while scrolling */
  color: #1f4e70;
  min-height: 100vh; 
}
  
  
    .container {
      background-color: rgba(240, 248, 255, 0.94);
      max-width: 750px;
      margin: 30px auto;
      padding: 25px;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }
  
    h1 {
      font-size: 2.4em;
      color: #3399cc;
      text-align: center;
      margin-bottom: 20px;
    }
  
    p {
      font-size: 1.05rem;
      line-height: 1.65;
      margin-bottom: 18px;
    }
  
    .highlight {
      color: #228ecf;
      font-weight: bold;
    }
  
    .team {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 16px;
      margin-top: 30px;
    }
  
    .member {
      text-align: center;
      background-color: #e1f5fe;
      padding: 12px;
      border-radius: 10px;
      width: 160px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    }
  
    .member img {
      width: 90px;
      height: 90px;
      object-fit: cover;
      border-radius: 50%;
      margin-bottom: 8px;
    }
  
    .mission {
      background-color: #d0eafd;
      padding: 16px;
      border-radius: 10px;
      font-style: italic;
      color: #22688e;
      margin-top: 25px;
      font-size: 0.95rem;
      text-align: center;
    }
  </style>
  
</head>
<body>
  <div id="navbar">

  </div>

  <main>


  <div class="container">
    <h1>Our Snowy Story</h1>
    <p>
      It started with a dream, and a dad who had never touched skis. <span class="highlight">Dr. Ramzi Haraty</span>, a man who adored the beauty of Lebanon’s snowy mountains but had never ventured onto the slopes, decided it was time for a change. And not just for him, for his entire family.
    </p>
    <p>
      That’s when <span class="highlight">Software Snakes</span> entered the picture. We’re not just your typical group of Computer Science students, we’re also passionate winter sports instructors: <strong>Ranim, Reina, Kareen, Rabab,</strong> and <strong>Antonio</strong>. Five friends, bonded by code, snowflakes, and a whole lot of ambition.
    </p>
    <p>
      After a few intense months of private tutoring, Dr. Haraty’s kids competed in a national skiing competition. Their talent turned heads, but especially the heads of the marketing team from <span class="highlight">Crest</span>, the toothpaste brand. Seeing kids glide like pros with smiles as bright as the snow, Crest approached us with a sponsorship deal we couldn’t refuse.
    </p>
    <p>
      With Crest’s support and our vision, we launched <strong>Haraty’s Winter Crest Academy</strong>—a place where snow, tech, and dreams meet.
      Our academy isn’t just about learning how to ski or snowboard; it’s about building confidence, mastering new skills, and embracing the chill with a smile. ❄️
    </p>
    <p>
      Today, HWCA offers top-tier lessons in skiing, snowboarding, snowshoeing, sledding, and ice climbing. Whether you're a total newbie or a pro looking to level up, we’ve got courses tailored for everyone. Group fun? Private coaching? Equipment rental? Progress tracking? You name it, we’ve got it.
    </p>
    <p>
      Our motto, inspired by Dr. Haraty himself: <span class="highlight">"The Sky is the Limit"</span>. So get ready to lace up those boots, hit the snow, and become part of our story. Because at HWCA, you're not just joining a course, you're joining a legacy.
    </p>

    <div class="team">
      <div class="member">
        <img src="../Images/drRamziPic.jpg" alt="Dr.Haraty">
        <p><strong>Dr.Haraty</strong></p>
        <p>The Reason Behind it All</p>
      </div>

      <div class="member">
        <img src="../Images/ranimprofile.jpg"alt="Ranim">
        <p><strong>Ranim</strong></p>
        <p>The Spark & Visionary</p>
      </div>
      
      <div class="member">
        <img src="../Images/reinaprofile.jpg"; alt="Reina">
        <p><strong>Reina</strong></p>
        <p>The Chill Mastermind</p>
      </div>
      <div class="member">
        <img src="../Images/Kareenprofile.jpg" alt="Kareen">
        <p><strong>Kareen</strong></p>
        <p>The Design Queen</p>
      </div>
      <div class="member">
        <img src="../Images/rababprofile.jpg" alt="Rabab">
        <p><strong>Rabab</strong></p>
        <p>The Creative Builder</p>
      </div>
      <div class="member">
        <img src="../Images/antonioprofile.jpg"alt="Antonio">
        <p><strong>Antonio</strong></p>
        <p>The Code Wizard</p>
      </div>
      
      
    </div>

    <div class="mission">
      “From snowy hills to digital thrills, HWCA is where winter dreams begin. Come for the slopes, stay for the story.”
    </div>
  </div>

 

</main>

<nav class="navbar" id="navbar">
    <img src="../Images/Logo.png" alt="academy logo" class="logo">
    <ul class="navbar_items" id="navbar_items">
        <li><a href="home.php">Home</a></li>

        <?php if (isset($_SESSION['user_id'])): ?>
            <!-- Only visible when logged in -->
            <li><a href="UserProfile.php">My Profile</a></li>
            <li><a href="../backend/logout.php" id="logoutBtn">Logout</a></li>
        <?php else: ?>
            <!-- Only visible when NOT logged in -->
            <li><a href="Log-in.php">Login</a></li>
        <?php endif; ?>

        <li>
            <div class="dropdown-label">Activities ▼</div>
            <div class="activitiesnav">
                <ul>
                    <li><a href="SkiingPage.php">Skiing</a></li>
                    <li><a href="Snowboarding.php">Snowboarding</a></li>
                    <li><a href="Sledding.php">Sledding</a></li>
                    <li><a href="Iceclimbing.php">Ice Climbing</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>

  <footer class="footer" id="footer">
    <ul class="footer_items" id="footer_items">
        <li>
            <h3>About Us</h3>
            <ul>
                <li><a href="AboutUs.php">About the Academy</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
            </ul>
        </li>
        <li>
            <h3>Help & Policies</h3>
            <ul>
                <li><a href="FAQs.php">FAQs</a></li>
                <li><a href="privacy-policy.php">Privacy Policy</a></li>
            </ul>
        </li>
        <li>
            <h3>Follow Us</h3>
            <ul class="social-icons">
                <li><a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li>
                <li><a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
                <li><a href="https://youtube.com" target="_blank"><i class="fab fa-youtube"></i></a></li>
            </ul>
        </li>
    </ul>
  </footer>
  
</body>
</html>