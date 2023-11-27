<?php
if(!isset($_SESSION)){
	session_start();
}
$mysqli = new mysqli("localhost", "root", "", "linkhype");

$linkid = $_POST["submit"];
echo $linkid;

echo "sadasdasd";
	if (isset($_POST["group1"])) {
		if ($_POST["group1"] == "blue") {
			$mysqli ->query("update link set farbe = 'blue'  where linkID='$linkid'");
		} else if ($_POST["group1"] == "yellow") {
			$mysqli ->query("update link set farbe = 'yellow' where linkID='$linkid'");
		} else if ($_POST["group1"] == "green") {
			$mysqli ->query("update link set farbe = 'green' where linkID='$linkid'");
		} else if ($_POST["group1"] == "red") {
			$mysqli ->query("update link set farbe = 'red' where linkID='$linkid'");
		}
	}else{
		$farbe = "blue";
	}
echo "kappa";
if(isset($_POST["ch_beschreibung"]) and $_POST["ch_beschreibung"] != ""){
	$beschreibung = $_POST["ch_beschreibung"];
	$mysqli ->query("update link set beschreibung = ''  where linkID='$linkid'");
}
$bewertung = $_POST["ch_link_rate"];
$user = $_SESSION["user"];
$mysqli -> query("update user-link-verbindung set bewertung='$bewertung' where linkverbindung='$linkid' and userverbindung='$user' ");
//header ('Location: linkhype.php');

$mysqli->close();
		   ?>