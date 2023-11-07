    <html>
    <head>
        <script src="./js/sweet.js"></script>
    </head>
</html>
<?php

$servername ="localhost";
$username = "root";
$password = "Sathira@1234";
$dbname = "itacademy";

$conn = new mysqli($servername, $username, $password, $dbname);

if(isset($_GET['code']))
{
    $verification_code = mysqli_real_escape_string ($conn,$_GET['code']);

    $query = "SELECT * FROM signup WHERE verification_code = '{$verification_code}'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) ==1)
    {
        $query = "UPDATE signup SET is_active = true, verification_code = NULL WHERE 
        verification_code = '{$verification_code}' LIMIT 1";

        $result = mysqli_query($conn, $query);

        if(mysqli_affected_rows($conn)==1)
        {
            session_start();
            $_SESSION['message'] = '<script>alert("Your email successfully verified", "Please login to your account ", "success");</script>';
            header('Location: http://localhost/php/LMS/pages/login/signin.php');
            exit;
           
        }
        else{
            
            ?>
            <script>
                alert("ERROR");
            </script>
            <?php

        }
    }
}

?>