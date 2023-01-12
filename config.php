<?php
session_start();
$con = mysqli_connect("localhost","root","","application");
if(!$con){
echo mysqli_connect_error();
die();
}
mysqli_select_db($con, "application");
?>