<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <title>Snowboarding - HWCA</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #d0eafd;
      color: #1f4e70;
    }

    .container {
      background-color: #d0eafd;
      max-width: 1200px;
      margin: 40px auto;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    h1 {
      font-size: 3.5em;
      text-align: center;
      color: #1a6f96;
      margin-bottom: 20px;
    }

    .fade-slider {
      position: relative;
      height: 300px;
      max-width: 100%;
      overflow: hidden;
      margin-bottom: 25px;
    }

    .fade-slider img {
      position: absolute;
      width: 600px;
      height: 100%;
      object-fit: cover;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      opacity: 0;
      transition: opacity 1s ease-in-out;
      left: 50%;
      transform: translateX(-50%);
    }

    .fade-slider img.active {
      opacity: 1;
      z-index: 1;
    }

    .slider-controls {
      position: absolute;
      top: 50%;
      width: 100%;
      display: flex;
      justify-content: space-between;
      transform: translateY(-50%);
      padding: 0 20px;
    }

    .slider-controls button {
      background-color: rgba(0,0,0,0.4);
      border: none;
      color: white;
      font-size: 1.5rem;
      padding: 10px 15px;
      border-radius: 50%;
      cursor: pointer;
    }

    .description-box {
      background-color: #e1f5fe;
      padding: 20px;
      margin-top: 20px;
      border-radius: 10px;
      text-align: justify;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    h2 {
      font-size: 2em;
      text-align: center;
      color: #1a6f96;
      margin-bottom: 20px;
    }

    .levels {
      display: flex;
      gap: 20px;
      justify-content: space-between;
      margin-bottom: 30px;
      flex-wrap: wrap;
    }

    .level-box {
      background-color: #e1f5fe;
      flex: 1;
      padding: 15px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      min-height: 120px;
      position: relative;
    }

    .level-box h3 {
      color: #066293;
      margin-bottom: 10px;
    }

    .level-box ul {
      margin: 10px 0 0 20px;
    }

    .timing {
      margin-top: 10px;
      background-color: #d0eafd;
      padding: 10px;
      border-radius: 8px;
      font-size: 0.95rem;
    }

    .register-btn {
      padding: 12px 25px;
      background-color: #1a6f96;
      color: white;
      font-size: 1rem;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }

    .register-btn:hover {
      background-color: #1a6f96;
    }

    .instructor-btn {
      background-color: #1a6f96;
      color: white;
      padding: 8px 15px;
      border: none;
      border-radius: 6px;
      margin-top: 15px;
      cursor: pointer;
      font-size: 0.9rem;
    }

    .modal {
      display: none;
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background-color: rgba(0,0,0,0.5);
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }

    .modal-content {
      background: white;
      padding: 20px;
      border-radius: 10px;
      max-width: 400px;
      text-align: center;
      color: #1f4e70;
    }

    .modal-content img {
      width: 100px;
      border-radius: 50%;
      margin-bottom: 10px;
    }

    .close {
      margin-top: 10px;
      background-color: #e1f5fe;
      padding: 5px 10px;
      border-radius: 6px;
      cursor: pointer;
    }

    .facts-box {
      background-color: #e3f7ff;
      padding: 15px;
      border-radius: 10px;
      font-style: italic;
      margin: 25px 0;
      text-align: center;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    /* New quiz section styles */
    .quiz-section {
      background-color: #e1f5fe;
      padding: 20px;
      margin-top: 20px;
      border-radius: 10px;
      text-align: center;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    
    .quiz-btn {
      padding: 12px 25px;
      background-color: #1a6f96;
      color: white;
      font-size: 1rem;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      text-decoration: none;
      transition: background-color 0.3s ease;
      margin-top: 15px;
    }
    
    .quiz-btn:hover {
      background-color: #1a6f96;
    }
    
    .quiz-results {
      margin-top: 20px;
      padding: 15px;
      background-color: #d0eafd;
      border-radius: 8px;
      font-weight: bold;
      display: none;
    }

    @media (max-width: 1024px) {
      .levels {
        flex-direction: column;
        align-items: center;
      }

      .level-box {
        width: 90%;
      }

      .fade-slider img {
        width: 90%;
        height: auto;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Snowboarding 🏂</h1>

    <div class="fade-slider" id="slider">
      <img src="../Images/snowboarding1.jpg" alt="Snowboarding 1" class="active" onmouseenter="playSound()">
      <img src="../Images/snowboarding2.jpg" alt="Snowboarding 2" onmouseenter="playSound()">
      <img src="../Images/snowboarding3.jpg" alt="Snowboarding 2" onmouseenter="playSound()">

      <div class="slider-controls">
        <button onclick="prevSlide()">&#8592;</button>
        <button onclick="nextSlide()">&#8594;</button>
      </div>
    </div>

    <div class="description-box">
      <p>
        Snowboarding is an exhilarating winter sport that combines athleticism with style. Whether you're learning to link turns or perfecting your tricks in the terrain park, our snowboarding program at HWCA offers progressive instruction for all levels. Our certified instructors will help you develop proper technique while having fun in the mountains. From your first day strapping in to mastering advanced maneuvers, we've got you covered!
      </p>
    </div>

    <div class="facts-box" id="factsBox">
      🏂 "Snowboarding works your core and improves balance!"
    </div>

    <h2>Courses</h2>
    <div class="levels">
      <div class="level-box">
        <h3>Beginner</h3>
        <p>Learn the fundamentals: balancing, turning, and stopping.</p>
        <ul>
          <li>Intro to Snowboarding</li>
          <li>Heel & Toe Turns</li>
          <li>Getting On/Off the Lift</li>
        </ul>
        <div class="timing">
          <strong>Offered:</strong><br>
          Mon & Wed - 12:00 PM to 2:00 PM<br>
          Sat - 10:00 AM to 12:00 PM
        </div>
        <button class="instructor-btn" onclick="openModal(0)">Meet the Instructor</button>
      </div>

      <div class="level-box">
        <h3>Intermediate</h3>
        <p>Refine your technique: carving, switch riding, and basic jumps.</p>
        <ul>
          <li>Carving Techniques</li>
          <li>Introduction to Jumps</li>
          <li>Riding Switch</li>
        </ul>
        <div class="timing">
          <strong>Offered:</strong><br>
          Tue & Thu - 9:00 AM to 11:00 AM<br>
          Sun - 10:00 AM to 12:00 PM
        </div>
        <button class="instructor-btn" onclick="openModal(1)">Meet the Instructor</button>
      </div>

      <div class="level-box">
        <h3>Advanced</h3>
        <p>Master advanced maneuvers: park tricks, powder riding, and high-speed carving.</p>
        <ul>
          <li>Terrain Park Progression</li>
          <li>Powder Riding Techniques</li>
          <li>Advanced Carving</li>
        </ul>
        <div class="timing">
          <strong>Offered:</strong><br>
          Fri - 11:00 AM to 1:00 PM<br>
          Sun - 12:00 PM to 2:00 PM
        </div>
        <button class="instructor-btn" onclick="openModal(2)">Meet the Instructor</button>
      </div>
    </div>

    <div class="register-section" style="text-align: center;">
      <a href="registration.php" class="register-btn">Register Now</a>
    </div>

    <!-- Find Your Snowboarding Level section with quiz functionality -->
    <h2 style="margin-top: 50px;">Find Your Snowboarding Level</h2>
    <div class="quiz-section">
      <p>
        Not sure which level is right for you? Take our quick assessment to find the perfect snowboarding class for your skills. Whether it's your first time on a board or you're looking to progress to advanced terrain, we'll match you with the ideal instruction.
      </p>
      <button class="quiz-btn" onclick="takeQuiz()">Start Quiz</button>
      <div id="quiz-results" class="quiz-results"></div>
    </div>

    <!-- What Our Students Say -->
    <h2 style="margin-top: 50px;">What Our Students Say</h2>
    <div class="levels">
      <div class="level-box">
        "The beginner course gave me so much confidence on my first day!"
        <br><strong>- Alex, Beginner</strong>
      </div>
      <div class="level-box">
        "I progressed from linking turns to hitting small jumps in just one season!"
        <br><strong>- Jordan, Intermediate</strong>
      </div>
      <div class="level-box">
        "The advanced coaching helped me land my first 360 in the park!"
        <br><strong>- Taylor, Advanced</strong>
      </div>
    </div>

    <!-- Seasonal Events -->
    <h2 style="margin-top: 50px;">Seasonal Events</h2>
    <div class="description-box">
      <ul>
        <li><strong>❄️ December 10:</strong> Opening Day Rail Jam</li>
        <li><strong>🎉 January 15:</strong> Night Riding Under Lights</li>
        <li><strong>🏂 February 20:</strong> Big Air Competition</li>
        <li><strong>🏆 March 25:</strong> End-of-Season Boardercross Race</li>
      </ul>
    </div>
  </div>

  <!-- Instructor Modal -->
  <div class="modal" id="modal">
    <div class="modal-content" id="modalContent"></div>
  </div>

  <audio id="hoverSound" src="https://cdn.pixabay.com/download/audio/2022/03/15/audio_3d5c7688d8.mp3?filename=button-click-124467.mp3" preload="auto"></audio>

  <script>
    // Slider
    const images = document.querySelectorAll('.fade-slider img');
    let current = 0;
    let sliderInterval;

    function showImage(index) {
      images.forEach(img => img.classList.remove('active'));
      images[index].classList.add('active');
    }

    function nextSlide() {
      current = (current + 1) % images.length;
      showImage(current);
    }

    function prevSlide() {
      current = (current - 1 + images.length) % images.length;
      showImage(current);
    }

    function startSlider() {
      sliderInterval = setInterval(nextSlide, 2000);
    }

    function stopSlider() {
      clearInterval(sliderInterval);
    }

    startSlider();

    document.getElementById("slider").addEventListener("mouseenter", stopSlider);
    document.getElementById("slider").addEventListener("mouseleave", startSlider);
    document.addEventListener("keydown", (e) => {
      if (e.key === "ArrowRight") nextSlide();
      else if (e.key === "ArrowLeft") prevSlide();
    });

    // Fun Facts
    const facts = [
      "🏂 'Snowboarding works your core and improves balance!'",
      "🏔️ 'Snowboarding was inspired by surfing and skateboarding!'",
      "🧦 'Proper snowboard socks prevent blisters and keep feet warm!'",
      "🛹 'The key to good riding is relaxation and fluid movements!'"
    ];
    let factIndex = 0;
    setInterval(() => {
      factIndex = (factIndex + 1) % facts.length;
      document.getElementById('factsBox').innerText = facts[factIndex];
    }, 4000);

    // Modal
    const instructors = [
      { name: "Ranim Ibrahim", photo: "../Images/ranimprofile.jpg", bio: "Ranim specializes in teaching first-time snowboarders with patience and encouragement." },
      { name: "Reina Najjar", photo: "../Images/reinaprofile.jpg", bio: "Reina helps intermediate riders progress their freestyle and carving skills." },
      { name: "Rabab Hassid", photo: "../Images/rababprofile.jpg", bio: "Rabab coaches advanced techniques for park, powder, and competition riding." }
    ];

    function openModal(index) {
      const modal = document.getElementById("modal");
      const content = document.getElementById("modalContent");
      const instructor = instructors[index];
      content.innerHTML = `
        <img src="${instructor.photo}" alt="${instructor.name}" />
        <h3>${instructor.name}</h3>
        <p>${instructor.bio}</p>
        <div class="close" onclick="modal.style.display='none'">Close</div>
      `;
      modal.style.display = 'flex';
    }

    // Quiz Functionality
    function takeQuiz() {
      const questions = [
        "How comfortable are you on a snowboard? (1: Never tried, 2: Can link turns, 3: Ride confidently)",
        "How often do you snowboard each season? (1: First time, 2: 1-5 times, 3: More than 5)",
        "Can you ride switch (opposite stance)? (1: No, 2: A little, 3: Yes comfortably)"
      ];
      
      let score = 0;
      
      for (let i = 0; i < questions.length; i++) {
        let answer;
        while (true) {
          answer = prompt(`Question ${i+1}/${questions.length}\n\n${questions[i]}`);
          if (answer === null) return; // User cancelled
          answer = answer.trim();
          if (["1", "2", "3"].includes(answer)) break;
          alert("Please enter 1, 2, or 3");
        }
        score += parseInt(answer);
      }
      
      let level = "";
      if (score <= 4) level = "Beginner";
      else if (score <= 7) level = "Intermediate";
      else level = "Advanced";
      
      const resultsDiv = document.getElementById("quiz-results");
      resultsDiv.innerText = `Your Snowboarding Level: ${level}`;
      resultsDiv.style.display = "block";
      
      // Scroll to results
      resultsDiv.scrollIntoView({ behavior: 'smooth' });
    }

    function playSound() {
      document.getElementById('hoverSound').play();
    }
  </script>
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
                <li><a href="ContactUs.php">Contact Us</a></li>
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
                <li><a href="https://www.linkedin.com/in/haraty-s-winter-crest-academy-226757361/" target="_blank"><i class="fa-brands fa-linkedin"></i></a></li>
            </ul>
        </li>
    </ul>
  </footer>
  
</body>
</html>