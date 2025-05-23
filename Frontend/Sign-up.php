<!DOCTYPE html> 
<html lang="en"> <!-- By Antonio Karam -->
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign up - Haraty's Winter Crest Academy</title>
    <style>
    /* by Antonio Karam */
      body, html {
          display: flex;
          justify-content: center;
          margin: 0;
      }

      body{
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }

      .background::before {
        content: "";
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background-color: rgba(255, 255, 255, 0.6); 
        z-index: 1;
        pointer-events: none; 
    }

	.background {
	  transform: scale(1.1);
          position: fixed;  
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background-image: url("../Images/skipic.png");
	      background-color: white;
          background-size: cover;
          background-position: center;
	  z-index: -1; 
      }
	
	  	

      a {
        
        color: #7393B3; 
        
      }
      
      .full_container {
	    flex-direction: column;
            display: flex;
            justify-content: center;  
            align-items: center;
            padding: 20px;
      }
      
      .outer_container {
	    flex-direction: column;
            display: flex;
            justify-content: center;  
            align-items: center;
            padding: 20px;
            width:400px;
            margin-top: 50px;
            background-color: #7393B3;
            border-radius: 25px;
box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.7), 
                0px 4px 8px rgba(0, 0, 0, 0.6);
      }
      
      .eLabel{
        padding: 2px;
        display: block;
        text-align: center;
      }
      
      
      .signup-container {
          background: white;
          padding: 20px;
          border-radius: 10px;
          box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
          text-align:center;
          width: 350px;
      }
      
      input[type="text"], input[type="password"], input[type="email"] {
        display: block;
        margin: 0 auto;
        width: 80%; 
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
      }
		
      input[type="submit"]:hover {
    	cursor: pointer;
      }

      
      input[type="submit"] {
            width: 100%;
            padding: 10px;
            background: #1a6f96;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 5px;
            text-decoration: none;
            display: inline-block;
      }


@keyframes fadeInLogo {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

      
      .logo {
	animation: fadeInLogo 1s ease-out;
        width: 200px;  
        height: auto;  
        object-fit: contain;
        display: block;
        margin: 0 auto 20px auto; 
      }

input[type="submit"]:hover {
  background-color:#145a7a; 
  cursor: pointer;
  transform: scale(1.05); 
  transition: background-color 0.3s ease, transform 0.3s ease;
}
    </style>
    
        
  </head>

  <body>

    <div class='background'></div>


    <div class="full_container">
    <div class="signup-container">
      <h1>Sign up</h1>
      
      <form id="SignupForm" method="POST" onsubmit="return false;">
      <div id="errorMessage" style="display:none; color:red; margin-top:10px;"></div>
        <div class=eLabel>
        <label for="Fname">First name</label><br>
        <input type="text" id="Fname" name="Fname" required><br>
        </div>
        <div class=eLabel>
        <label for="Lname">Last name</label><br>
        <input type="text" id="Lname" name="Lname" required><br>
        </div>
        <div class=eLabel>
        <label for="Pnumber">Emergency contact number</label><br>
        <input type="text" id="Pnumber" name="Pnumber" required><br>
        </div>
        <div class=eLabel>
        <label for="email">Email</label><br>
        <input type="email" id="email" name="email" required><br>
        </div>
        <div class=eLabel>
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password" required><br><br>
        </div>
        <div class=eLabel>
            <label for="Weight">Weight (in Kilograms)</label><br>
            <input type="text" id="Weight" name="Weight" required><br><br>
        </div>
        <div class=eLabel>
            <label for="Height">Height (in centimeters)</label><br>
            <input type="text" id="Height" name="Height" required><br><br>
        </div>
        <div class=eLabel>
            <label for="Disabilities">Disabilities (if any)</label><br>
            <input type="text" id="Disabilities" name="Disabilities"><br><br>
        </div>     
        <input type="submit" value="Sign up"><br>


    <script>
    document.getElementById("SignupForm").addEventListener("submit", function(event) {
      event.preventDefault();  
      submitSignupForm();       
    });

    function submitSignupForm() {
      const Fname = document.getElementById("Fname").value;
      const Lname = document.getElementById("Lname").value;
      const Pnumber = document.getElementById("Pnumber").value;
      const email = document.getElementById("email").value;
      const password = document.getElementById("password").value;
      const Weight = document.getElementById("Weight").value;
      const Height = document.getElementById("Height").value;
      const Disabilities = document.getElementById("Disabilities").value;

    if (!Fname || !Lname || !email || !password || !Pnumber || !Weight || !Height) {
      alert("All fields are required.");
      return false; 
    }

    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailPattern.test(email)) {
      alert("Please enter a valid email address.");
      return false;
    }

    if (Pnumber.length < 8) {
    alert("Phone number must be at least 8 characters long.");
    return false;
    }


    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
    if (!passwordPattern.test(password)) {
    alert("Password must be at least 8 characters long, and include:\n- One uppercase letter\n- One lowercase letter\n- One number\n- One special character (e.g. @, &, #)");
    return false;
    }

    const xhr = new XMLHttpRequest();
      xhr.open("POST", "../backend/Signup_handler.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      const data = `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}&Pnumber=${encodeURIComponent(Pnumber)}&Fname=${encodeURIComponent(Fname)}&Lname=${encodeURIComponent(Lname)}&Weight=${encodeURIComponent(Weight)}&Height=${encodeURIComponent(Height)}&Disabilities=${encodeURIComponent(Disabilities)}`;

    xhr.onload = function() {
        if (xhr.status === 200) {
          try {
            const response = JSON.parse(xhr.responseText);
            if (response.success) {
              window.location.href = "Log-in.php";
            } else {
              document.getElementById("errorMessage").innerText = response.message;
              document.getElementById("errorMessage").style.display = "block";
            }
          } catch (e) {
            console.error("JSON parse error", e);
            document.getElementById("errorMessage").innerText = "Server error. Please try again.";
            document.getElementById("errorMessage").style.display = "block";
          }
        } else {
          console.error("Request failed with status:", xhr.status);
        }
      };

      xhr.send(data);
  };

    </script>

    
    
    
  </body>
</html>