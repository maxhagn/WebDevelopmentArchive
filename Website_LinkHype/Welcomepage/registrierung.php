<?php
session_start();
$_SESSION["meineVariable"] = true;
$mysqli = new mysqli("localhost", "root", "", "linkhype");
$name = $_POST["reg_email"];
$password = $_POST["reg_password"];
$password2 = $_POST["reg_password2"];
$vorname = $_POST["reg_vorname"];
$nachname = $_POST["reg_nachname"];
$username = $_POST["reg_username"];
if($name != null && $password != null && $vorname != null && $nachname != null && $password == $password2 && $username != null){
	
$password = hash('md5',$password);
$mysqli->query("INSERT INTO user (email,password,Vorname,Nachname,username) VALUES('$name','$password','$vorname','$nachname','$username')");
$mysqli->close();
$_SESSION["user"] = $name;
header ('Location: http://37.75.138.43/Website/LINKHYPE/linkhype.php');
}
else{
	header('Location: index.html');
}
?>
