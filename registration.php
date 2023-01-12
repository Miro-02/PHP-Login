<?php
    require 'config.php';

if(isset($_POST['submit'])){
    $email = $_GET['email'];
	$password=$_POST['password'];
    $firstName=$_POST['firstName'];
	$lastName=$_POST['lastName'];
    $sql="SELECT* FROM application.users WHERE Email ='$email'" ;

	$result = mysqli_query($con, $sql);
    if(strlen($password)<8)
    {
        echo "Password is too short";
    }
    elseif ((!preg_match("/^[a-zA-Z-' ]*$/",$firstName))||(!preg_match("/^[a-zA-Z-' ]*$/",$firstName)) ) {
        echo "Only letters and white space allowed for first/last name";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
    }
    elseif(mysqli_num_rows($result)>0){
        echo "Email already in use";
	}
	else
	{
        $sql = "INSERT INTO application.users  VALUES (DEFAULT,'$email', '$password', '$firstName', '$lastName')";
        if (mysqli_query($con, $sql)==true) {
            echo "Registration successful";
        }
        else
        {
            echo "Registration not successful";
        }
        
	}
}
?>

<!DOCTYPE html>
<html>
<body>

<h1>Registration</h1>

<form method="POST" action="">
	<div class = "input">
		<input type="text" name="password" placeholder="Enter your password" required value=""/>
	</div>
	<div class = "input">
		<input type="text" name="firstName" placeholder="Enter your first name" required value=""/>
	</div>
	<div class = "input">
		<input type="text" name="lastName" placeholder="Enter your last name" required value=""/>
	</div>
	<form>
    <input type="submit" name="submit" value="Register" class="btn-login"/>
    </form>
    <form>
    <button formaction="http://localhost:8000/login.php?" >Login</button>
    </form>
<form>
    <button formaction="http://localhost:8000/forgottenPassword.php" >Forgotten Password?</button>
</form>

</body>
</html>