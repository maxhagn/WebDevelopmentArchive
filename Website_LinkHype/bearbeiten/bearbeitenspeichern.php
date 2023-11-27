<?php
session_start();
	
#Verbindungsaufbau 
$mysqli = new mysqli("localhost", "root", "", "linkhype");

#ausschalten der Überprüfung der Constraints 
$mysqli ->query("ALTER  TABLE user WITH NOCHECK CONSTRAINT ALL");
$mysqli ->query("ALTER  TABLE user-link-verbindung WITH NOCHECK CONSTRAINT ALL");
$altemail = $_SESSION["user"];
$ergebnis = $mysqli -> query("select * from user where email='$altemail'")->fetch_array(MYSQLI_ASSOC);
#einzelne Werte abfragen
#Vorname abfragen 
if(isset($_POST["ch_vorname"]) and $_POST["ch_vorname"] != ""){
$vorname = $_POST["ch_vorname"];
echo "1";
}
else{
	$vorname = $ergebnis["Vorname"];
}

#Nachname abfragen 
if(isset($_POST["ch_nachname"] ) and $_POST["ch_nachname"] != ""){
$nachname = $_POST["ch_nachname"];
echo "2";
}
else{
	$nachname = $ergebnis["Nachname"];
}

#Email abfragen
 
if(isset($_POST["ch_email"] )and $_POST["ch_email"]!= ""){
	$name = $_POST["ch_email"];
	$mysqli ->query("update user-link-verbindung set userverbindung='$name' where userverbindung='$altemail'");
	 $_SESSION["user"] = $name;
	 echo "3";
}
else{
	$name = $altemail;
}
#Username überprüfen 
if(isset($_POST["ch_username"] ) and $_POST["ch_username"] != ""){
	$Username = $_POST["ch_username"];	
	echo "4";
	}
else{
$Username = $ergebnis["Username"];	
}

#Password überprüfen 
if(isset($_POST["ch_password"] )and $_POST["ch_password"] != ""){
	if($_POST["ch_password"]==$_POST["ch_password2"]){
	$password = $_POST["ch_password"];
	$password = hash('md5',$password);
	echo "5";
	}
}
else{
$password = $ergebnis["password"];	
}

#ubernehmen der Änderungen
$mysqli->query("update user set email='$name' where email='$altemail'");
$mysqli->query("update user  set password ='$password' , Vorname = '$vorname' , Nachname = '$nachname', Username='$Username' where email = '$name'"); 
#einschalten der Überprüfung der Konstraints
$mysqli ->query("ALTER  TABLE user WITH CHECK CONSTRAINT ALL");
$mysqli ->query("ALTER  TABLE user-link-verbindung WITH CHECK CONSTRAINT ALL");
$mysqli->close();
header ('Location: http://37.75.138.43/Website/LINKHYPE/linkhype.php');	
?>