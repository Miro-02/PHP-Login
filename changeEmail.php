<?php

require 'config.php';
if (isset($_POST['submit'])) {
    $id = $_SESSION['id'] ;
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Invalid email format";
    } 
    else
    {
        $sql = "UPDATE application.users SET Email = '$email' WHERE id = '$id'";
        if (mysqli_query($con, $sql)) {
        echo "Email was successfuly changed";
        }
        else {
            echo "Error, email was not changed";
        }
    }
}
?>

<!DOCTYPE html>
<html>
	<head>
		<h1>Change email</h1>
	</head>
	<body>
		<form method="POST" action="">
			<div class = "input">
				<input type="text" name="email" placeholder="Enter your new email"/>
			</div>
			<input type="submit" name="submit" value="Change" class="btn-login" />
		</form>
        <form>
    <button formaction="http://localhost:8000/mainPage.php" >Back</button>
    </form>
	</body>
</html>
