<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Material Icons' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Sign up</title>
  </head>
  <body>
  <div id="email-availability-status"></div>
    <div class="main">
    <form class="" action="singnup.php" method="post" id="form">
      <div class="head">
        <img src="./img/googlelogo.png" alt="" class="logo">
        <h3>Create your It Academy Account</h3>
      </div>
      <!--Getting user inputs-->
      <div class="name">
        <input type="name" id="username" name="firstName" required>
        <label>First name</label>
      </div>
      <div class="name">
        <input type="name" id="lastname" name="lastName" required>
        <label>Last name</label>
      </div>
      <div class="user-name">
        <input type="email" id="email" name="email" required>
        <label>Email</label>
        <span class="gmail">@your mail</span>
      </div>
      <div>
        <select name="grade">
          <option value="select" disabled selected>Select your grade</option>
          <option value="Grade 6">Grade 6</option>
          <option value="Grade 7">Grade 7</option>
          <option value="Grade 8">Grade 8</option>
        </select>
      </div>
      <div class="pass">
        <input type="password" class="password" name="password" id="pass1"  maxlength="15" required>
        <label>Password</label>
      </div>
      <div class="pass">
        <input type="password" class="password" name="password" id="pass2"  maxlength="15" required>
        <label>Confirm</label>
        </div>
        <div class="iconeye">
      <img src="./img/eyehide.png" onclick="show();" id="eye">
      </div>
      <div class="number">
        <input type="tel" name="mobile" required>
        <label>Phone number</label>
      </div>
      <a href="../login/signin.php" class="line4">Already have an account?</a>
      <input type="submit" value="Finish" id="submit" class="btn">
    </form>
    <div class="side-image">
      <img src="./img/sideimage.png" alt="" class="side-logo">
    </div>
    </div>
    <script type="text/javascript">

          function show(){
            //Get references to the two password fields and the eye icon
            var password= document.getElementById('pass1');
            confirm= document.getElementById('pass2');
            image= document.getElementById('eye');

            // Check if both password fields have type "password"
            if (password.type==="password",confirm.type==="password") {
            // If yes, change the type to "text" and update the eye icon source to "eyeshow.png"
              password.type="text";
              password.type="text";
              confirm.type="text";
              image.setAttribute('src', './img/eyeshow.png');

            // If both password fields have type "text", change the type to "password" and update the eye icon source to "eyehide.png"
            }else if (password.type==="text",confirm.type==="text"){
              password.type="password";
              confirm.type="password";
              image.setAttribute('src', './img/eyehide.png');
            }

          }
          //password validation
          document.querySelector('.btn').onclick = function()
            {
              // Get the values of the two password fields
              var pw1 = document.getElementById('pass1').value,
                pw2 = document.getElementById('pass2').value;

                if(pw1=="")                            // Check if the first password field is empty
                {
                  alert("password can't be empty ");   // If yes, display an alert with the message "password can't be empty"
                  return false
                }
                else if (pw1!=pw2)                    
                {
                  alert("Password didn't match");       // If the two password fields don't match, display an alert with the message "Password didn't match"
                  return false
                }
                else if (pw1==pw2)                      // If the two password fields match, return true
                {
                  return true
                }
            }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
  $(document).ready(function(){
    $("#email").keyup(function(){   // Attach keyup event handler to email input field
      var email = $(this).val();    // Get the value of the email input field
      $.ajax({                      // Send an AJAX request to the check-email.php file with the email as data
        url: "check-email.php",     // Display the response from the server in the email-availability-status element
        method: "POST",
        data: { email: email },
        success:function(data){
          $("#email-availability-status").html(data);
          if(data ==  "<div style='background-color:red; padding:5px; color:white; text-align:center;'>Email already exists!</div>"){
            $("#submit").attr("disabled", true);     // If the email already exists, disable the submit button and change its background color to red
            $("#submit").css("background-color", "red");    
          } else {
            $("#submit").attr("disabled", false);      // If the email is available, enable the submit button and change its background color to blue.
            $("#submit").css("background-color", "#4971f6");
          }
        }
      });
    });
  });

  </script>
  
  </body>
</html>
