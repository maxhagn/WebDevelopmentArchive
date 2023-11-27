<?php
session_start();
$_SESSION["meineVariable"] = true;
$mysqli = new mysqli("localhost", "root", "", "PowerDB_Hagn");
$name = $_POST["reg_email"];
$password = $_POST["reg_password"];
$password2 = $_POST["reg_password2"];
$vorname = $_POST["reg_vorname"];
$nachname = $_POST["reg_nachname"];
$username = $_POST["reg_username"];
if($name != null && $password != null && $vorname != null && $nachname != null && $password == $password2 && $username != null){
$password = hash('md5',$password);
$mysqli->query("INSERT INTO users (email,passwort,vorname,nachname) VALUES('$name','$password','$vorname','$nachname')");
$mysqli->close();
$_SESSION["users"] = $name;
header ('Location: ../Index.html');
}
else{
	header('Location: ../Index.html');
}
?>
