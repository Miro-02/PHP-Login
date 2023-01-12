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
    if(mysqli_num_rows($result)==TRUE){
		//echo "Email was sent to $email.";
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
        $mail->Subject = "Reset Password";
        $mail->Body = "To reset your password, go to this link: http://localhost:8000/resetPassword.php?email=$email";
        try {
            $mail->send();
            echo "Email has been sent successfully to $email.";
        } catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
	}
    else{
        echo "The email is not registrated";
    }
}
?>

<!DOCTYPE html>
<html>
	<head>
        <h1>Forgotten password</h1>
	</head>
	<body>
		<form method="POST" action="#">
			<div class = "input">
				<input type="text" name="email" placeholder="Enter your email"/>
			</div>
			<form action="index.php">
			<input type="submit" name="submit" value="Change your password" class="btn-login"/>
            </form>
		</form>
	</body>

</html>