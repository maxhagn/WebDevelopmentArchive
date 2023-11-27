<?php
    if(!isset($_SESSION)){
        session_start();
    }
    
    $mysqli = new mysqli("localhost", "root", "", "linkhype");
    $user =$_SESSION["user"];
	echo $user;
    $ID = $_POST["delete"];
	echo $ID;
    $mysqli->query("DELETE FROM `user-link-verbindung` WHERE linkverbindung = '$ID' AND userverbindung='$user'");
    $mysqli->query("DELETE FROM `links` WHERE linkID = '$ID' ");
    header('Location: linkhype.php');
    $mysqli->close();
	?>


