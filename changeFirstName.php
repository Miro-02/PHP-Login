<?php

require 'config.php';
if (isset($_POST['submit'])) {
    $id = $_SESSION['id'] ;
    $firstName = $_POST['firstName'];
    if (!preg_match("/^[a-zA-Z-' ]*$/",$firstName) ) {
        echo "Only letters and white space allowed for first name";
    }
    else
    {
        $sql = "UPDATE application.users SET firstName = '$firstName' WHERE id = '$id'";
        if (mysqli_query($con, $sql)) {
        echo "First name was successfuly changed";
        }
        else {
            echo "Error, first name was not changed";
        }
    }
}
?>

<!DOCTYPE html>
<html>
	<head>
        <h1>Change first name</h1>
	</head>
	<body>
		<form method="POST" action="">
			<div class = "input">
				<input type="text" name="firstName" placeholder="Enter your new first name"/>
			</div>
			<input type="submit" name="submit" value="Change" class="btn-login" />
		</form>
        <form>
    <button formaction="http://localhost:8000/mainPage.php" >Back</button>
    </form>
	</body>
</html>
