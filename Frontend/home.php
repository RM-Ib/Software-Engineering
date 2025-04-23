<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haraty's Winter Crest Academy</title>
    <link rel="stylesheet" href="home.css">
    <link rel= "stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar" id="navbar">
        <img src="../Images/Logo.png" alt="academy logo" class="logo">
        <ul class="navbar_items" id="navbar_items">
    <li><a href="home.php">Home</a></li>

    <?php if (isset($_SESSION['user_id'])): ?>
        <!-- User is logged in -->
        <li><a href="UserProfile.php">My Profile</a></li>
        <li><a href="../Backend/logout.php" id="logoutBtn">Logout</a></li>
    <?php else: ?>
        <!-- User is NOT logged in -->
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
    <section class="hero">
        <div class="hero-content">
            <h1>Haraty's Winter Crest Academy</h1>
            <p>We provide a complete winter sports experience – from first steps on the snow to championship-level performance.</p>
            <a href="#activities" class="cta-button">Explore Activities</a>
           
        </div>
    </section>

    <section id="activities" class="activities">
        <h2> HWCA'S Popular Activities </h2>
        <div class="activity-grid">
            <div class="activity">
                <a href="iceclimbing.php">
                    <img src="..\Images/iceclimbing.jpg" alt="Ice Climbing">
                    <p>ICE CLIMBING</p>
                </a>
            </div>
            <div class="activity">
                <a href="SkiingPage.php">
                    <img src="..\Images/skiing.jpg" alt="Snowshoeing">
                    <p>SKIING</p>
                </a>
            </div>
            <div class="activity">
                <a href="Sledding.php">
                    <img src="..\Images/sledding.jpg" alt="Sledding">
                    <p>SLEDDING</p>
                </a>
            </div>
            <div class="activity">
                <a href="SnowBoarding.php">
                    <img src="..\Images/snowboarding.jpg" alt="Snowboarding">
                    <p>SNOW BOARDING</p>
                </a>
            </div>
        </div>
    </section>
  
    <!-- Seasonal events section -->
<section id="seasonal-events" class="seasonal-events">
    <h2>Seasonal Events</h2>
    <div class="event-grid">
      <div class="event-card">
        <p><strong>❄️ December 15:</strong> Opening Day & Welcome Ride</p>
      </div>
      <div class="event-card">
        <p><strong>🌙 January 10:</strong> Torchlight Descent Night</p>
      </div>
      <div class="event-card">
        <p><strong>🔥 March 5:</strong> Winter Farewell Bonfire</p>
      </div>
      <div class="event-card">
        <p><strong>🏔️ February 2:</strong> Alpine Adventure Challenge</p>
      </div>
            
     
    </div>
  </section>
  
    <footer class="footer" id="footer">
        <ul class="footer_items" id="footer_items">
            <li>
                <h3>About Us</h3>
                <ul>
                    <li><a href="AboutUs.php">About the Academy</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
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
