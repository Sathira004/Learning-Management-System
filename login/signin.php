<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
       <?php
      session_start();
      if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
      }
      ?>
    <title>Sign in</title>
</head>
<body>
    <div class="main">
        <form method="post" id="login-form">
            <div class="head">
                <img src="googlelogo.png" alt="" class="logo">
                <h3>Sign in</h3>
              </div>
              <h4>Use your It academy Account</h4>
            <div class="number">
                <input type="email" name="email" id="email" required>
                <label>Email</label>
              </div>
              <div class="number">
                <input type="password" name="password" id="password" required>
                <label>Password</label>
              </div>
              <a href="#" class="line3">Forgot password?</a>
              <a href="../register/register.php" class="line4">Create account</a>
              <input type="submit" value="Login" id="submit">
        </form>
     </div>  
     <?php include 'login.php'; ?>
</body>
</html>