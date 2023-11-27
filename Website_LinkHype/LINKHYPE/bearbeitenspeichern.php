<?php
session_start();
if($_POST["update"] ==6 ){
$mysqli = new mysqli("localhost", "root", "", "linkhype");
$mysqli ->query("ALTER  TABLE user WITH NOCHECK CONSTRAINT ALL");
$mysqli ->query("ALTER  TABLE user-link-verbindung WITH NOCHECK CONSTRAINT ALL");
$ergebnis = $mysqli -> query("select * from user")->fetch_array(MYSQLI_ASSOC);
$altemail = $_SESSION["user"];
if($_SESSION["up1"] = true){
$vorname = $_POST["vorname"];
}
else{
	$vorname = $ergebnis["Vorname"];
}
if($_SESSION["up2"] = true){
$nachname = $_POST["nachname"];
}
else{
	$nachname = $ergebnis["Nachname"];
}
if($_SESSION["up3"] = true){
	$name = $_POST["email"];
	$mysqli ->query("update user-link-verbindung set userverbindung='$name'");
	 $_SESSION["user"] = $name;
}
else{
	$name = $altemail;
}
if($_SESSION["up4"] = true){
	$password = $_POST["password"];
	$password = hash('md5',$password);
	}

else{
$password = $ergebnis["password"];	
}


$ergebnis = mysqli_fetch_assoc($mysqli -> query ("select * from user"));
$mysqli->query("update user  set email='$name' ,password ='$password' , Vorname = '$vorname' , Nachname = '$nachname' where email = '$altemail'"); 

$mysqli ->query("ALTER  TABLE user WITH CHECK CONSTRAINT ALL");
$mysqli ->query("ALTER  TABLE user-link-verbindung WITH CHECK CONSTRAINT ALL");

$_SESSION["up1"] = 0;
$_SESSION["up2"] = 0;
$_SESSION["up3"] = 0;
$_SESSION["up4"] = 0;
$_SESSION["up5"] = 0;
$mysqli->close();
header ('Location: ../../LINKHYPE/linkhype.php');
}
else{
	
	if($_POST["update"] == 1){
	$_SESSION["up1"] = 1;
}
if($_POST["update"] == 2){
	$_SESSION["up2"] = 1;
}
if($_POST["update"] == 3){
	$_SESSION["up3"] = 1;
}
if($_POST["update"] == 4){
	$_SESSION["up4"] = 1;
}

if($_POST["update"] ==5){
	$_SESSION["up5"] = 1;
}
header ('Location: bearbeiten.php');
}	
?>