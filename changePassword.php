<?php

require 'config.php';
if (isset($_POST['submit'])) {
    $id = $_SESSION['id'];
    $password = $_POST['password'];
    if (strlen($password)<8) {
        echo "Password is too short";
    }
    else
    {
        $sql = "UPDATE application.users SET password = '$password' WHERE id = '$id'";
        if (mysqli_query($con, $sql)) {
        echo "password was successfuly changed";
        }
        else {
            echo "Error, password was not changed";
        }
    }
}
?>

<!DOCTYPE html>
<html>
	<head>
        <h1>Change password</h1>
	</head>
	<body>
		<form method="POST" action="">
			<div class = "input">
				<input type="text" name="password" placeholder="Enter your new password"/>
			</div>
			<input type="submit" name="submit" value="Change" class="btn-login" />
		</form>
        <form>
    <button formaction="http://localhost:8000/mainPage.php" >Back</button>
    </form>
	</body>
</html>

