<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //database connection logic
    $db = mysqli_connect("localhost", "root", "Sathira@1234", "itacademy");
    $sql = "SELECT * FROM signup WHERE email='$email' and password='$password'";
    $result = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result);

	if($email=='admin@gmail.com' && $password=='admin')
	{
		header("Location:http://localhost/php/LMS/pages/Admin/Interface.html");
	}
    if ($count == 1) {
		header("Location:http://localhost/php/LMS/pages/grade6/interface.html");
    } else {
      echo "<script>alert('Email or password is invalid.');</script>";
    }
  }
?>