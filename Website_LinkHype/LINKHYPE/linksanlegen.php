<?php
if(!isset($_SESSION)){
	session_start();
}

$mysqli = new mysqli("localhost", "root", "", "linkhype");




//farbe
if (isset($_POST["color"])) {
	if ($_POST["color"] == "blue") {
		$farbe = "blue";
	} else if ($_POST["color"] == "yellow") {
		$farbe = "yellow";
	} else if ($_POST["color"] == "green") {
		$farbe = "green";
	} else if ($_POST["color"] == "red") {
		$farbe = "red";
	}
}else{
	$farbe = "blue";
	}
//file
$bewertung = $_POST["link_rate"];
//file
	echo $_FILES["file"]["name"];
if(is_uploaded_file($_FILES['file']['tmp_name'])){

	$upload_folder = '../bilder/';
	$filename = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
	echo $filename;
	$extension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));


	//Überprüfung der Dateiendung
	$allowed_extensions = array('png', 'jpg', 'jpeg');
	if(!in_array($extension, $allowed_extensions)) {
		die("Ungültige Dateiendung! Nur png, jpg und jpeg-Dateien sind erlaubt");
	}

	//Pfad zum Upload
	$new_path = $upload_folder.$filename.'.'.$extension;

	//Neuer Dateiname falls die Datei bereits existiert
	if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
		$id = 1;
		do {
			$new_path = $upload_folder.$filename.'_'.$id.'.'.$extension;
			$id++;
		} while(file_exists($new_path));
	}
	//Alles okay, verschiebe Datei an neuen Pfad
	move_uploaded_file($_FILES['file']['tmp_name'], $new_path);
	$new_path =$mysqli->real_escape_string($new_path);
	//name

}else{
	$new_path = 'images/LH_Logo.png';
}
$name= $_POST["link"];
$user = $_SESSION["user"];
$beschreibung = $_POST["beschreibung"];
$mysqli->query("INSERT INTO links (farbe,link,bildpfad,beschreibung) VALUES('$farbe','$name','$new_path','$beschreibung')");
echo $user;
$link= $mysqli->insert_id;
echo $link;
echo $bewertung;
$mysqli->query("INSERT INTO `user-link-verbindung`(`userverbindung`, `linkverbindung`, `bewertung`, `favorite`) VALUES ('$user','$link','$bewertung',0)");
if($_POST["tag"] != "" and isset($_POST["tag"])){
	$tags=$_POST["tag"];
	$dt = explode(",",$tags);
	foreach($dt as $tag){
		$prüfen= $mysqli-> query("select * from tags ")->fetch_array(MYSQLI_ASSOC);
		if(in_array($tag,$prüfen) ){
			$ergebnis = $mysqli-> query("select * from tags where Beschreibung = '$tag'")->fetch_array(MYSQLI_ASSOC);
			$id = $ergebnis["tagID"];
			echo $id;
			$mysqli->query("INSERT INTO `tagverbindung`(`linkID`, `tagID`) VALUES ('$link','$id')");
		}
		else{
			$neueID = ($mysqli -> query("select max(tagID) from tags")->fetch_array(MYSQLI_NUM))[0]+1;
			echo $neueID;
			$mysqli->query("INSERT INTO `tags`(`tagID`, `Beschreibung`) VALUES ('$neueID','$tag')");
			$mysqli->query("INSERT INTO `tagverbindung`(`linkID`, `tagID`) VALUES ('$link','$neueID')");
		}
	}
}
header ('Location: linkhype.php');


