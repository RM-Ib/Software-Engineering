<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Ice Climbing - HWCA</title>
  <!-- Preload slider images -->
  <link rel="preload" href="../Images/ice-climbing1.jpg" as="image">
  <link rel="preload" href="../Images/ice-climbing2.jpg" as="image">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color:  #d0eafd;
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
      backface-visibility: hidden;
    }

    .fade-slider img {
      position: absolute;
      width: 600px;
      height: 100%;
      object-fit: cover;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      opacity: 0;
      transition: opacity 1.1s cubic-bezier(0.4, 0, 0.2, 1);
      left: 50%;
      transform: translateX(-50%);
      will-change: opacity;
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
      z-index: 2;
    }

    .slider-controls button {
      background-color: rgba(0,0,0,0.4);
      border: none;
      color: white;
      font-size: 1.5rem;
      padding: 10px 15px;
      border-radius: 50%;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .slider-controls button:hover {
      background-color: rgba(0,0,0,0.7);
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
      display: inline-block;
      margin-top: 10px;
    }

    .register-btn:hover {
      background-color: #145a7a;
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
      transition: background-color 0.3s;
    }

    .instructor-btn:hover {
      background-color: #145a7a;
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
      padding: 25px;
      border-radius: 10px;
      max-width: 400px;
      text-align: center;
      color: #1f4e70;
      box-shadow: 0 4px 20px rgba(0,0,0,0.2);
    }

    .modal-content img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      margin-bottom: 15px;
      object-fit: cover;
      border: 3px solid #d0eafd;
    }

    .close {
      margin-top: 15px;
      background-color: #1a6f96;
      color: white;
      padding: 8px 16px;
      border-radius: 6px;
      cursor: pointer;
      display: inline-block;
      transition: background-color 0.3s;
    }

    .close:hover {
      background-color: #145a7a;
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

    .quiz-section {
      background-color: #e1f5fe;
      padding: 25px;
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
      display: inline-block;
    }
    
    .quiz-btn:hover {
      background-color: #145a7a;
    }
    
    .quiz-results {
      margin-top: 20px;
      padding: 15px;
      background-color: #d0eafd;
      border-radius: 8px;
      font-weight: bold;
      display: none;
      animation: fadeIn 0.5s ease-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 1024px) {
      .levels {
        flex-direction: column;
        align-items: center;
      }

      .level-box {
        width: 90%;
        margin-bottom: 20px;
      }

      .fade-slider {
        height: 250px;
      }
      
      .fade-slider img {
        width: 90%;
      }
    }

    @media (max-width: 768px) {
      .container {
        margin: 20px auto;
        padding: 20px;
      }
      
      h1 {
        font-size: 2em;
      }
      
      h2 {
        font-size: 1.5em;
      }
      
      .fade-slider {
        height: 200px;
      }
    }

    @media (max-width: 480px) {
      .container {
        margin: 10px auto;
        padding: 15px;
      }
      
      .fade-slider {
        height: 150px;
      }
      
      .slider-controls button {
        padding: 8px 12px;
        font-size: 1.2rem;
      }
      
      .level-box {
        padding: 12px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Ice Climbing ⛏️🧊</h1>

    <div class="fade-slider" id="slider">
      <img src="../Images/iceclimb1.jpg" alt="Ice climber ascending frozen waterfall" class="active">
      <img src="../Images/iceclimb2.jpg" alt="Climber using ice axes on vertical ice">
      <img src="../Images/iceclimb3.jpg" alt="Climber using ice axes on vertical ice">
      <img src="../Images/iceclimb4.jpg" alt="Climber using ice axes on vertical ice">

      <div class="slider-controls">
        <button onclick="prevSlide()">&#8592;</button>
        <button onclick="nextSlide()">&#8594;</button>
      </div>
    </div>

    <div class="description-box">
      <p>
        Experience the ultimate winter adventure with HWCA's ice climbing programs! Ascend frozen waterfalls and ice formations under the guidance of our certified instructors. Whether you're a first-timer or an experienced climber, we offer tailored instruction to help you master the techniques of swinging ice tools, kicking crampons, and reading ice conditions. Our carefully selected ice climbing sites provide challenges for all ability levels in a spectacular winter environment.
      </p>
    </div>

    <div class="facts-box" id="factsBox">
      ⛏️ "Ice climbing builds incredible upper body and core strength!"
    </div>

    <h2>Programs</h2>
    <div class="levels">
      <div class="level-box">
        <h3>Beginner</h3>
        <p>Learn fundamental techniques on low-angle ice in a controlled environment.</p>
        <ul>
          <li>Basic tool and crampon techniques</li>
          <li>Safety systems and belaying</li>
          <li>Top-rope climbing on easy ice</li>
        </ul>
        <div class="timing">
          <strong>Offered:</strong><br>
          Saturdays - 9:00 AM to 12:00 PM<br>
          (December to March)
        </div>
        <button class="instructor-btn" onclick="openModal(0)">Meet the Guide</button>
      </div>

      <div class="level-box">
        <h3>Intermediate</h3>
        <p>Develop skills on steeper terrain with varied ice conditions.</p>
        <ul>
          <li>Efficient movement on vertical ice</li>
          <li>Ice screw placement</li>
          <li>Lead climbing fundamentals</li>
        </ul>
        <div class="timing">
          <strong>Offered:</strong><br>
          Sundays - 9:00 AM to 2:00 PM<br>
          (January to March)
        </div>
        <button class="instructor-btn" onclick="openModal(1)">Meet the Guide</button>
      </div>

      <div class="level-box">
        <h3>Advanced</h3>
        <p>Tackle challenging multi-pitch routes and technical ice formations.</p>
        <ul>
          <li>Mixed climbing techniques</li>
          <li>Advanced anchor building</li>
          <li>Route finding in complex terrain</li>
        </ul>
        <div class="timing">
          <strong>Offered:</strong><br>
          Weekends by appointment<br>
          (January to February)
        </div>
        <button class="instructor-btn" onclick="openModal(2)">Meet the Guide</button>
      </div>
    </div>

    <div style="text-align: center; margin-top: 30px;">
      <a href="registration.php" class="register-btn">Book Your Climb</a>
    </div>

    <h2 style="margin-top: 50px;">Find Your Climbing Level</h2>
    <div class="quiz-section">
      <p>
        Not sure which ice climbing program matches your skills? Take our quick assessment to determine the best starting point for your ice climbing journey. We'll recommend the ideal program based on your experience and goals.
      </p>
      <button class="quiz-btn" onclick="takeQuiz()">Start Assessment</button>
      <div id="quiz-results" class="quiz-results"></div>
    </div>

    <h2 style="margin-top: 50px;">What Our Climbers Say</h2>
    <div class="levels">
      <div class="level-box">
        "The beginner program gave me confidence to swing ice tools for the first time!"
        <br><strong>- Emma, First-Time Climber</strong>
      </div>
      <div class="level-box">
        "The intermediate course helped me progress to leading my first ice route!"
        <br><strong>- David, Aspiring Guide</strong>
      </div>
      <div class="level-box">
        "The advanced techniques I learned took my ice climbing to the next level!"
        <br><strong>- Carlos, Experienced Alpinist</strong>
      </div>
    </div>

    <h2 style="margin-top: 50px;">Ice Climbing Events</h2>
    <div class="description-box">
      <ul>
        <li><strong>⛏️ December 15:</strong> Ice Climbing Season Kickoff</li>
        <li><strong>🧗 January 20:</strong> Women's Ice Climbing Day</li>
        <li><strong>🏔️ February 10-12:</strong> Advanced Ice Climbing Weekend</li>
        <li><strong>🏆 March 5:</strong> Annual Ice Climbing Festival</li>
      </ul>
    </div>
  </div>

  <!-- Guide Modal -->
  <div class="modal" id="modal">
    <div class="modal-content" id="modalContent"></div>
  </div>

  <audio id="hoverSound" src="https://cdn.pixabay.com/download/audio/2022/03/15/audio_3d5c7688d8.mp3?filename=button-click-124467.mp3" preload="auto"></audio>

  <script>
    // Optimized Slider with Smooth Transitions
    const images = document.querySelectorAll('.fade-slider img');
    let current = 0;
    let isTransitioning = false;
    let sliderInterval;

    function preloadNextImage() {
      const nextIndex = (current + 1) % images.length;
      images[nextIndex].style.opacity = '0.01';
    }

    function showImage(index) {
      if (isTransitioning || index === current) return;
      isTransitioning = true;

      images[current].style.opacity = '0';
      const prevIndex = current;
      current = index;

      setTimeout(() => {
        images[current].style.opacity = '1';
        isTransitioning = false;
        preloadNextImage();
      }, 100);
    }

    function nextSlide() {
      showImage((current + 1) % images.length);
    }

    function prevSlide() {
      showImage((current - 1 + images.length) % images.length);
    }

    // Initialize slider
    document.addEventListener('DOMContentLoaded', () => {
      images[0].style.opacity = '1';
      preloadNextImage();
      
      // Ice climbing-specific timing (8 seconds)
      sliderInterval = setInterval(nextSlide, 8000);
      
      document.getElementById("slider").addEventListener("mouseenter", () => {
        clearInterval(sliderInterval);
      });

      document.getElementById("slider").addEventListener("mouseleave", () => {
        sliderInterval = setInterval(nextSlide, 8000);
      });
    });

    document.addEventListener("keydown", (e) => {
      if (e.key === "ArrowRight") nextSlide();
      else if (e.key === "ArrowLeft") prevSlide();
    });

    // Fun Facts
    const facts = [
      "⛏️ 'Ice climbing builds incredible upper body and core strength!'",
      "🧊 'Ice tools can withstand over 1,000 pounds of force!'",
      "🧗 'The WI grading system classifies ice climbing difficulty from WI1 to WI7!'",
      "⛑️ 'Proper helmet use reduces head injury risk by 85% in ice climbing!'"
    ];
    let factIndex = 0;
    setInterval(() => {
      factIndex = (factIndex + 1) % facts.length;
      document.getElementById('factsBox').innerText = facts[factIndex];
    }, 6000);

    // Modal
    const guides = [
      { 
        name: "Antonio Karam", 
        photo: "../Images/antonioprofile.jpg", 
        bio: "Antonio specializes in introducing beginners to ice climbing with a focus on safety and fundamental techniques. AMGA Certified Ice Instructor." 
      },
      { 
        name: "Rabab Hassid", 
        photo: "../Images/rababprofile.jpg", 
        bio: "Rabab coaches intermediate climbers in efficient movement and lead climbing. Veteran of ice climbs in Canada and Norway." 
      },
      { 
        name: "Ranim Ibrahim", 
        photo: "../Images/ranimprofile.jpg", 
        bio: "Ranim trains advanced climbers in technical ice and mixed climbing. First ascents of several difficult ice routes." 
      }
    ];

    function openModal(index) {
      const modal = document.getElementById("modal");
      const content = document.getElementById("modalContent");
      const guide = guides[index];
      content.innerHTML = `
        <img src="${guide.photo}" alt="${guide.name}" />
        <h3>${guide.name}</h3>
        <p>${guide.bio}</p>
        <div class="close" onclick="modal.style.display='none'">Close</div>
      `;
      modal.style.display = 'flex';
      playSound();
    }

    // Quiz Functionality
    function takeQuiz() {
      const questions = [
        "What describes your climbing experience? (1: None, 2: Some rock climbing, 3: Previous ice climbing)",
        "How comfortable are you with exposure to heights? (1: Nervous, 2: Somewhat comfortable, 3: Very comfortable)",
        "What are your ice climbing goals? (1: Try it out, 2: Develop skills, 3: Push limits)"
      ];
      
      let score = 0;
      
      for (let i = 0; i < questions.length; i++) {
        let answer;
        while (true) {
          answer = prompt(`Question ${i+1}/${questions.length}\n\n${questions[i]}`);
          if (answer === null) return;
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
      resultsDiv.innerHTML = `
        <strong>Recommended Program:</strong> ${level}<br><br>
        ${getProgramDescription(level)}
      `;
      resultsDiv.style.display = "block";
      
      resultsDiv.scrollIntoView({ behavior: 'smooth' });
      playSound();
    }

    function getProgramDescription(level) {
      const descriptions = {
        "Beginner": "Perfect for first-time ice climbers! You'll learn essential techniques in a safe, supportive environment.",
        "Intermediate": "Great for climbers ready to progress! Develop your skills on more challenging terrain with expert guidance.",
        "Advanced": "For experienced climbers! Tackle technical ice and complex routes with our most challenging program."
      };
      return descriptions[level] || "";
    }

    function playSound() {
      const sound = document.getElementById('hoverSound');
      sound.currentTime = 0;
      sound.play();
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