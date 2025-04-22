



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="registration-style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script>
    const progress = document.getElementById("progress");
    const formSteps = document.querySelectorAll(".form-step");
    const progressSteps = document.querySelectorAll(".progress-step");

    let formStepsNum = 0;

    $(document).ready(function () {
      $("#navbar").load("nav.txt");
      $("#footer").load("footer.txt");

      $(".btn-next").click(function () {
        $("#step1").hide();
        $("#step2").show();
        $("#progress-step2").addClass("progress-step-active");
        $(".progress").css("width", "100%");
      });

      $(".btn-prev").click(function () {
        $("#step2").hide();
        $("#step1").show();
        $("#progress-step2").removeClass("progress-step-active");
        $(".progress").css("width", "0%");
      });

      $("#yes").click(function () {
        let activity = $("#activity").val();
        $("#equip-select").html('');
        $.ajax({
          url: "../Backend/registration-action.php",
          type: "POST",
          data: {
            equip: 'yes',
          activity: activity
          },
          success: function(result) {
            $("#equip-select").html(result);
          }
        });
        $("#equip-select").show();
      });

      $("#no").click(function () {
        $("#equip-select").hide();
      });

      $("#omt").click(function () {
        $("#omt-warning").show();
        $("#card-details").hide();
        $("#card-num").prop( "required", false );
        $("#fname").prop( "required", false );
        $("#lname").prop( "required", false );
      });

      $("#card").click(function () {
        $("#omt-warning").hide();
        $("#card-details").show();
        $("#card-num").prop( "required", true );
        $("#fname").prop( "required", true );
        $("#lname").prop( "required", true );
      });
    });

    $(document).ready(function () {
      let activity = $("#activity").val();
      let course = $("#course").val();
      $("#timing").html('');
      $.ajax({
        url: "../Backend/registration-action.php",
        type: "POST",
        data: {
          activity: activity,
          course: course,
        },
        success: function(result) {
          $("#timing").html(result);
        }
      });
      

      $("#activity").change(function(){
        let activity = $("#activity").val();
        let course = $("#course").val();
        $("#timing").html('');
        $.ajax({
          url: "../Backend/registration-action.php",
          type: "POST",
          data: {
          activity: activity,
          course: course,
          },
          success: function(result) {
            $("#timing").html(result);
          }
        });
      });

      $("#course").change(function(){
        let activity = $("#activity").val();
        let course = $("#course").val();
        $("#timing").html('');
        $.ajax({
          url: "../Backend/registration-action.php",
          type: "POST",
          data: {
          activity: activity,
          course: course,
          },
          success: function(result) {
            $("#timing").html(result);
          }
        });
      });

      $(".register").click(function(){
        let activity = $("#activity").val();
        let course = $("#course").val();
        let timing = $("#timing").val();
        $(".error").html('');
        $.ajax({
          url: "../Backend/registration-action.php",
          type: "POST",
          data: {
          activity: activity,
          course: course,
          timing: timing
          },
          success: function(result) {
            $(".error").html(result);
          }
        });
      });
    });


  </script>
</head>

<body>
  <div id="navbar">

  </div>


  <main>
    <h1>Course Registration</h1>

    <div class="form">
      <form method="post" action="../Backend/registration-action.php">
        <!-- Progress bar -->
        <div class="progressbar">
          <div class="progress" id="progress">

          </div>
          <div id="progress-step1" class="progress-step progress-step-active">Enrollment</div>
          <div id="progress-step2" class="progress-step">Payment</div>
        </div>

        <!-- Steps -->
        <div id="step1" class="form-step form-step-active">
          <div class="input-group">
            <!-- make sure of activities -->
            <label for="activity">Activity</label>
            <select name="activity" id="activity">
              <option value="skiing">Skiing</option>
              <option value="snowshoeing">Snowshoeing</option>
              <option value="sledding">Sledding</option>
              <option value="snowboarding">Snowboarding</option>
              <option value="ice climbing">Ice Climbing</option>
            </select>
          </div>

          <div class="input-group">
            <label for="course">Course</label>
            <select name="course" id="course">
              <option value="beginner">Beginner</option>
              <option value="intermediate">Intermediate</option>
              <option value="expert">Expert</option>
            </select>
          </div>

          <div class="input-group">
            <label for="timing">Pick a time and duration</label>
            <select name="timing" id="timing">
            </select>
          </div>

          <div class="input-group">
            <p>Would you like to rent equipment?</p>
            <input type="radio" name="rent-equip" id="yes" value="yes">
            <label for="yes">Yes</label><br>
            <input type="radio" name="rent-equip" id="no" value="no" checked required>
            <label for="no">No</label>
          </div>

          <div id="equip-select" class="input-group">
          </div>

          <div class="btn btn-next width-50 ml-auto">
            Next
          </div>

        </div>

        <div id="step2" class="form-step">
          <div class="input-group">
            <p>Payment Method</p>
            <input type="radio" name="payment method" id="omt" value="omt" checked required>
            <label for="omt">OMT</label><br>
            <input type="radio" name="payment method" id="card" value="card">
            <label for="card">Credit Card</label>
          </div>

          <p id="omt-warning">Pay the fees within 5 days of the enrollment</p>

          <div id="card-details">
            <div class="input-group">
              <label for="card-num">Card Number</label><br>
              <input type="text" name="card-num" id="card-num" >
            </div>

            <div class="flex">
              <div style="width:49%">
                <label for="card-month" class="block">Month</label>
                <select name="card-month" id="card-month">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="9">10</option>
                  <option value="9">11</option>
                  <option value="9">12</option>
                </select>
              </div>

              <div style="width:49%">
                <label for="card-year" class="block">Year</label>
                <select name="card-year" id="card-year">
                  <option value="2025">2025</option>
                  <option value="2026">2026</option>
                  <option value="2027">2027</option>
                  <option value="2028">2028</option>
                  <option value="2029">2029</option>
                  <option value="2030">2030</option>
                </select>
              </div>
            </div>

            <div class="input-group">
              <label for="fname" class="block">First name</label>
              <input type="text" name="fname" id="fname" >
            </div>

            <div class="input-group">
              <label for="lname" class="block">Last name</label>
              <input type="text" name="lname" id="lname" >
            </div>
          </div>

          <div class="btns-group">
            <a href="#" class="btn btn-prev">Previous</a>
            <input type="submit" value="Submit" class="btn" name="register">
          </div>

        </div>
      </form>
      <div class="error"></div>
    </div>
  </main>

  <div id="footer">

  </div>
</body>

</html>