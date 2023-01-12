<?php

require 'config.php';
if (isset($_POST['submit'])) {
    $id = $_SESSION['id'];
    $lastName = $_POST['lastName'];
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lastName) ) {
        echo "Only letters and white space allowed for last name";
    }
    else
    {
        $sql = "UPDATE application.users SET lastName = '$lastName' WHERE id = '$id'";
        if (mysqli_query($con, $sql)) {
        echo "Last name was successfuly changed";
        }
        else {
            echo "Error, last name was not changed";
        }
    }
}
?>

<!DOCTYPE html>
<html>
	<head>
        <h1>Change last name</h1>
	</head>
	<body>
		<form method="POST" action="">
			<div class = "input">
				<input type="text" name="lastName" placeholder="Enter your new last name"/>
			</div>
			<input type="submit" name="submit" value="Change" class="btn-login" />
		</form>
        <form>
    <button formaction="http://localhost:8000/mainPage.php" >Back</button>
    </form>
	</body>
</html>
