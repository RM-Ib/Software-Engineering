<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us - Haraty's Winter Crest Academy</title>
  <style>
    /* Reset and Base Styles */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body, html {
      height: 100%;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* Background Styles */
    .background {
      position: fixed;
      top: 0; 
      left: 0; 
      right: 0; 
      bottom: 0;
      background-image: url("../Images/skipic.png");
      background-size: cover;
      background-position: center;
      z-index: -2;
    }

    .overlay {
      position: fixed;
      top: 0; 
      left: 0; 
      right: 0; 
      bottom: 0;
      background-color: rgba(255, 255, 255, 0.6);
      z-index: -1;
    }

    /* Navbar Styles */
    .navbar {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 70px;
      background-color: #8baccc;
      color: white;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 20px;
      z-index: 1000;
    }

    .navbar img {
      height: 50px;
    }

    .navbar_items {
      list-style: none;
      display: flex;
      gap: 25px;
    }

    .navbar_items li a {
      color: white;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s;
    }

    .navbar_items li a:hover {
      color: #022429;
    }

    /* Dropdown Styles */
    .navbar_items li {
      position: relative;
    }

    .activitiesnav {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.3s ease, opacity 0.3s ease;
      opacity: 0;
      position: absolute;
      background-color: #8baccc; 
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      padding: 10px 0;
      z-index: 999;
      min-width: 150px;
      border-radius: 6px;
      border: 1px solid #053557;
    }

    .activitiesnav ul {
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .activitiesnav ul li {
      padding: 10px 20px;
      transition: background-color 0.3s;
    }

    .activitiesnav ul li a {
      text-decoration: none;
      color: white;
      display: block;
    }

    .navbar_items li:hover .activitiesnav {
      max-height: 500px;
      opacity: 1;
      padding: 10px 0;
    }

    .activitiesnav ul li:hover {
      background-color: #f0f0f0;
    }

    /* Main Content Styles */
    main {
      flex: 1;
      width: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding-top: 70px; /* Account for fixed navbar */
      padding-bottom: 50px;
    }

    /* Contact Form Styles */
    .contact-form {
      background-color: white;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
      width: 90%;
      max-width: 500px;
      text-align: center;
      margin: 50px 0;
    }

    .contact-form h2 {
      color:   #1a6f96;  
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 15px;
      text-align: left;
    }

    label {
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
    }

    input, textarea {
      width: 100%;
      padding: 10px;
      font-size: 14px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    textarea {
      height: 120px;
      resize: vertical;
    }

    button {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      background-color:#1a6f96;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: transform 0.2s ease;
    }

    button:hover {
      transform: scale(1.05);
      background-color: #145a7a;  
    }

    .social-media {
      margin-top: 25px;
    }

    .social-links a {
      margin: 0 8px;
      color: #7393B3;
      text-decoration: none;
      font-weight: bold;
    }

    .social-links a:hover {
      text-decoration: underline;
    }

    /* Footer Styles */
    .footer {
      background-color: #8baccc;
      padding: 30px 20px;
      width: 100%;
    }

    .footer_items {
      list-style: none;
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      padding: 0;
      margin: 0;
    }

    .footer_items > li {
      margin: 20px;
      min-width: 200px;
    }

    .footer_items h3 {
      position: relative;
      display: inline-block;
      margin-bottom: 10px;
      font-size: 18px;
      color: white;
    }

    .footer_items h3::after {
      content: "";
      position: absolute;
      bottom: -5px;
      left: 0;
      width: 50%;
      height: 2px;
      background-color: #0077cc;
    }

    .footer_items ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .footer_items ul li {
      margin: 8px 0;
    }

    .footer_items ul li a {
      color: white;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .footer_items ul li a:hover {
      color: #022429;
    }

    .social-icons {
      display: flex;
      gap: 10px;
      margin-top: 10px;
    }

    .social-icons li {
      display: inline-block;
    }

    .social-icons a {
      font-size: 20px;
      color: #0077cc;
      transition: color 0.3s ease;
    }

    .social-icons a:hover {
      color: #022429;
    }

    .footer::after {
      content: "© 2025 Haraty's Winter Crest Academy. All rights reserved.";
      display: block;
      text-align: center;
      font-size: 0.85rem;
      color: white;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="background"></div>
  <div class="overlay"></div>

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


  <main>
    <div class="contact-form">
      <h2>Contact Us</h2>
      <form method="POST" action="../Backend/contact.php">
        <div class="form-group">
          <label for="fullName">Full Name</label>
          <input type="text" id="fullName" name="fullName" required pattern="[A-Za-z\s]+" title="Please enter letters only.">
        </div>

        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
          <label for="subject">Subject</label>
          <input type="text" id="subject" name="subject" required>
        </div>

        <div class="form-group">
          <label for="message">Message</label>
          <textarea id="message" name="message" required></textarea>
        </div>

        <button type="submit">Submit</button>
      </form>

      <div class="social-media">
        <p>💬 Stay connected:</p>
        <div class="social-links">
          
        <a href="H.wintercrestacademy@outlook.com">Email Us</a>

        <a href="https://www.linkedin.com/in/haraty-s-winter-crest-academy-226757361/" target="_blank">LinkedIn</a>
          
        </div>
      </div>
    </div>
  </main>

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