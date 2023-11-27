<?php

	session_start();

$_SESSION["meineVariable"] = true;
$mysqli = new mysqli("localhost", "root", "", "PowerDB_Hagn");

$name= $_POST["log_email"];
$password = $_POST["log_password"];


$ra = $mysqli->query("SELECT passwort FROM users WHERE email='$name'")->fetch_object()->passwort;
if($ra == hash('md5',$password )) {
	$_SESSION["user"] = $name;
	$_SESSION["up1"] = 0;
	$_SESSION["up2"] = 0;
	$_SESSION["up3"] = 0;
	$_SESSION["up4"] = 0;
	$_SESSION["up5"] = 0;
	header ('Location: ../Contact.html');

}
else{
	header ('Location: ../Index.html');
}
$mysqli->close();

?>
