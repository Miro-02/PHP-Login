<?php

 require 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";
require "PHPMailer/src/Exception.php";




if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $sql = "SELECT* FROM application.users WHERE Email ='$email'";
    $result = mysqli_query($con, $sql);
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Invalid email format";
    } 
    elseif(mysqli_num_rows($result)==false){
		//echo "Email was sent to '.$email.'";
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = 'sendmail885@gmail.com';
        $mail->Password = 'hplbtkdujohlyxbg';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('sendmail885@gmail.com'); 
        $mail->addAddress($email);
        $mail->Subject = "Registration";
        $mail->Body = "To register, go to this link: http://localhost:8000/registration.php?email=$email";
        try {
            $mail->send();
            echo "Message has been sent successfully";
        } catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
	}
    else{
        echo "The email is already registered";
    }
}
?>

<!DOCTYPE html>
<html>
	<head>
        <h1>Registration</h1>
	</head>
	<body>
		<form method="POST" action="#">
			<div class = "input">
				<input type="text" name="email" placeholder="Enter your email"/>
			</div>
			<form action="index.php">
			<input type="submit" name="submit" value="Submit your email" class="btn-login"/>
            </form>
		</form>
	</body>
    <form>
    <button formaction="http://localhost:8000/forgottenPassword.php" >Forgotten Password?</button>
    </form>
    <form>
    <button formaction="http://localhost:8000/login.php?" >Login</button>
    </form>
</html>