<?php

require 'config.php';
if (isset($_POST['submit'])) {
    
    $email = $_GET['email'];
    //echo $email;
    $password = $_POST['password'];
    if (strlen($password)<8) {
        echo "Password is too short";
    }
    else
    {
        $sql = "UPDATE application.users SET password = '$password' WHERE Email = '$email'";
        if (mysqli_query($con, $sql)) {
        echo "Password was successfuly changed";
        }
        else {
            echo "Error, password was not changes";
        }
    }
}
?>

<!DOCTYPE html>
<html>
	<head>
		<h1>Reset Password</h1>
	</head>
	<body>
		<form method="POST" action="">
			<div class = "input">
				<input type="text" name="password" placeholder="Enter your new password"/>
			</div>
			<input type="submit" name="submit" value="RESET" class="btn-login" />
		</form>
        <form>
    <button formaction="http://localhost:8000/login.php?" >Login</button>
    </form>
	</body>
</html>