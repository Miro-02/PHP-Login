<?php
    require 'config.php';

if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$password=$_POST['password'];
	$sql="SELECT* FROM application.users WHERE Email ='$email' AND Password='$password'" ;
	$result = mysqli_query($con, $sql);

	if(mysqli_num_rows($result)==TRUE){
		$_SESSION['email'] = $email;
		//header("http://localhost:8000/mainPagge.php", true, 301);
		header('Location: http://localhost:8000/mainPage.php', true, 301);

	}
	else
	{
		echo "Incorrect data";
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<h1>Login</h1>
	</head>
	<body>
		<form method="POST" action="">
			<div class = "input">
				<input type="text" name="email" placeholder="Enter your email"/>
			</div>
			<div class = "input">
				<input type="text" name="password" placeholder="Enter your password"/>
			</div>
			<form>
			<input type="submit" name="submit" value="Login" class="btn-login"  />
			</form>
		</form>
		<form>
    		<button  formaction="http://localhost:8000/registration.php" >Registration</button>
		</form>
		<form>
    		<button  formaction="http://localhost:8000/forgottenPassword.php" >Forgotten Password?</button>
		</form>
	</body>

</html>
	