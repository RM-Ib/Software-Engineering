<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script>
//         $(function(){
//   $("#navbar").load("nav.txt");
// });
$(function(){
  $("#footer").load("footer.txt");
});
    </script>

<style>
    main {
  position: relative;
  padding: 20px;
  z-index: 1;
}

main::before {
  content: "";
  background: url("/Images/snowflakes.jpg") no-repeat center center;
  background-size: cover;
  opacity: 0.7; /* adjust fade here */
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -1;
}


    ul li a:hover, p a:hover {
        color: #4a81b8;
    }    

    .qbox {
    border: 1px solid #030742;
    margin: 15px 0;
    border-radius: 8px;
    overflow: hidden;
  }
  
  .question {
    margin: 0;
    padding: 15px;
    background-color: #d0eafd;
    cursor: pointer;
    font-size: 1.2rem;
  }
  
  .answer {
    padding: 15px;
    display: none;
    background-color:rgb(245, 252, 255);
    animation: fadeIn 0.3s ease-in-out;
  }
  
  .qbox.active .answer {
    display: block;
  }
  
  @keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
  }
</style>

</head>
<!--By Kareen Terkawi-->


<body>
    
    
    
    <div id="navbar">
        <?php include 'nav.php'?>
    </div>

    <main>

        <h1>Some Frequently Asked Questions</h1>
        

        <br>
        <div class="qbox">
            <h1 class="question">What activities does the academy offer?</h1>
            <div class="answer">
                <p>The academy offers a number of courses and private sessions for the following activities:</p>
                <ul>
                    <li>Skiing</li>
                    <li>Snowboarding</li>
                    <li>Snowshoeing</li>
                    <li>Sledding</li>
                    <li>Ice Climbing</li>
                </ul>
                <p>HWCA also hosts and participates in snow sports competitions and encourages its students to participate in such events.</p>
            </div>
        </div>
    
        <div class="qbox">
            <h1 class="question">What age groups can take lessons at HWCA?</h1>
            <div class="answer">
                <p>HWCA offers programs for a wide range of ages. You can find programs for kids (ages 4+), teens, and adults. Therefore, anyone can enjoy learning and experiencing snow sports at the academy on the one condition that they are physically capable of performing them.</p>
            </div>
        </div>
    
        <div class="qbox">
            <h1 class="question">Do I need prior experience to join?</h1>
            <div class="answer">
                <p>Absolutely no prior experience is required. At HWCA, we recognize your passion to learn and experience the extreme snow sports and we realize that not everyone has the same level of experience or knowledge in the field, which is the reason we assign you levels based on your advancement in our courses and your prior experience if any.</p>
                <p>Your assigned level will appear in your user profile upon signing up or logging into your student account.</p>
                <p>The levels are as follows:</p>
                <ul>
                    <li><b>Beginner Level:</b> a student at this level is considered to have almost no prior experience in the corresponding activity.</li>
                    <li><b>Intermediate Level:</b> a student at this level has the basic skills and is able to perform the corresponding activity with minimal to no supervision.</li>
                    <li><b>Expert Level:</b> a student at this level can perform basic moves easily and has acquired all the necessary skills to perform the corresponding activity.</li>
                </ul>
                <p>Note that the courses offered follow the hierarchy of the levels; a beginner cannot enroll in an intermediate or expert course, and an intermediate cannot enroll in an expert course.</p>
            </div>
        </div>
    
        <div class="qbox">
            <h1 class="question">What are the equipment provided for the students?</h1>
            <div class="answer">
                <p>The academy will provide all the equipment the student will need to complete a certain course. All the student has to bring along is his/her snow clothes to stay warm (we recommend waterproof clothing, gloves, goggles, and layers suitable for cold weather).</p>
                <p>In addition to that, the student has the option whether to rent equipment or get his/her own upon enrolling in a course. Each course specifies the equipment needed for it.</p>
            </div>
        </div>
    
        <div class="qbox">
            <h1 class="question">What is the duration of the courses and private sessions?</h1>
            <div class="answer">
                <p>The duration can span from a single day to months or more. Each course has a specified duration and session timings you can check out in the course details.</p>
                <p>As for the private sessions, the student will have to communicate with the preferred instructor and coordinate with them.</p>
            </div>
        </div>
    
        <div class="qbox">
            <h1 class="question">I live far from the academy and I can't commute to it all the time. Is there a place to lodge in?</h1>
            <div class="answer">
                <p>Many of our students find it difficult to commute to our academy daily during their scheduled courses and sessions. Therefore, they reside in one of the hotels nearby for the course or session period. You can view the hotels' websites and book a room for yourself through the following links:</p>
                <ul>
                    <li><a href="nosource">dummy hotel 1</a></li>
                    <li><a href="nosource">dummy hotel 2</a></li>
                    <li><a href="nosource">dummy hotel 3</a></li>
                </ul>
                <p>This way, you can enjoy the full experience of the snow, not just the extreme activities it offers.</p>
            </div>
        </div>
    
        <div class="qbox">
            <h1 class="question">What is the difference between courses and private sessions?</h1>
            <div class="answer">
                <p>In a course, several students are grouped together with one or more instructors and learn on scheduled timings. You cannot enroll in a course with a skill level above yours. To enroll in a course, simply click on the register button underneath the course section for each activity.</p>
                <p>Private sessions, on the other hand, offer you a one-on-one learning session with an instructor of your choosing and a timing you agree on with that instructor. To book a private session, simply contact the instructor of your choice.</p>
            </div>
        </div>
    
        <div class="qbox">
            <h1 class="question">What payment methods are accepted?</h1>
            <div class="answer">
                <p>You can pay using one of the following: OMT, WHISH Money, Visa Card. Note that you have to pay the fees within 5 days of the enrollment or booking if you are using OMT.</p>
            </div>
        </div>
        
        <br>
        <p>If you have any other questions, feel free to <a href="contactus.php">contact us</a>. We are happy to help!</p>
    </main>
    

    
    <div id="footer">

    </div>

</body>

<script>
    document.querySelectorAll('.question').forEach(q => {
      q.addEventListener('click', () => {
        q.parentElement.classList.toggle('active');
      });
    });

    
  </script>
  
</html>