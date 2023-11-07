<?php
  $connect = mysqli_connect("localhost", "root", "Sathira@1234", "itacademy");
  if(isset($_POST["email"])){
    $email = mysqli_real_escape_string($connect, $_POST["email"]);
    $query = "SELECT * FROM signup WHERE email = '".$email."'";
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) > 0){
      echo "<div style='background-color:red; padding:5px; color:white; text-align:center;'>Email already exists!</div>";

    } else {
    echo "";
      
    }
  }
?>
