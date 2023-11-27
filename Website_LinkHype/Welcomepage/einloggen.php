<?php

	session_start();

$_SESSION["meineVariable"] = true;
$mysqli = new mysqli("localhost", "root", "", "linkhype");

$name= $_POST["log_email"];
$password = $_POST["log_password"];


$ra = $mysqli->query("SELECT password FROM user WHERE email='$name'")->fetch_object()->password;
if($ra == hash('md5',$password )) {
	$_SESSION["user"] = $name;
	$_SESSION["up1"] = 0;
	$_SESSION["up2"] = 0;
	$_SESSION["up3"] = 0;
	$_SESSION["up4"] = 0;
	$_SESSION["up5"] = 0;
	header ('Location: http://37.75.138.43/Website/LINKHYPE/linkhype.php');

}
else{
	header ('Location: index.html');
}
$mysqli->close();
 
?>