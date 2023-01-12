<?php
require 'config.php';

$email = $_SESSION['email'];

//echo $email;
$sql = "SELECT * FROM application.users WHERE Email ='$email'";

//echo $sql;
$result = mysqli_query($con, $sql);
$getRow = mysqli_fetch_row($result);
 $id=$getRow[0];
// $id = $_POST['id'];
$_SESSION['id'] = $id;
echo "Email: ",$getRow[1], "</br>", "First name: ", $getRow[3], "</br>", "Last name: ", $getRow[4], "</br>";
//$id=$getRow[0];
//echo $id;
//$id = $_POST['id'];
?>

<!DOCTYPE html>
<html>
    <head>
        <h1>Profile</h1>
    </head>
<body>

<form>
    <button formaction="http://localhost:8000/login.php" >Logout</button>
    <button formaction="http://localhost:8000/changeEmail.php" >Change email</button>
    <button formaction="http://localhost:8000/changePassword.php" >Change password</button>
    <button formaction="http://localhost:8000/changeFirstName.php" >Change first name</button>
    <button formaction="http://localhost:8000/changeLastName.php" >Change last name</button>
</form>
</body>
</html>

