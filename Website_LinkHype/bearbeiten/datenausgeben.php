<?php
if (!isset($_SESSION)) {
	session_start();
}
$mysqli = new mysqli("localhost","root","","linkhype");
$user = $_SESSION["user"];
$ausgabe = $mysqli->query("SELECT * FROM user WHERE email = '$user'");

while ($datensatz=mysqli_fetch_assoc($ausgabe)){
    $email = $datensatz["email"];
    $username = $datensatz["Username"];
    $vorname = $datensatz["Vorname"];
    $nachname = $datensatz["Nachname"];

}

echo "
    <form method='post' action='bearbeitenspeichern.php'>
      <br />
    <div class='input-field col s12 center'>
        <input id='username' type='text' name='ch_username' > </input>
        <label for='username'>".$username." (Username)</label>
    </div>  
      <br />
    <div class='input-field col s12 center'> 
        <input id='vorname' type='text' name='ch_vorname' > </input>
        <label for='vorname'>".$vorname." (Vorname)</label>
    </div>
        <br />
    <div class='input-field col s12 center'>
        <input id='nachname' type='text' name='ch_nachname' > </input>
        <label for='nachname'>".$nachname." (Nachname)</label>
    </div>    
        <br />
		
		
    <div class='input-field col s12 center'>
        <input id='nachname' type='password' name='ch_password' > </input>
        <label for='nachname'> (Password)</label>
    </div>    
        <br />
		
    <div class='input-field col s12 center'>
        <input id='nachname' type='password' name='ch_password2' > </input>
        <label for='nachname'> (Password erneut eingeben)</label>
    </div>    
        <br />
        
		<p><span class='indigo-text indigo-darken-3'>Wir können ihre E-mail leider nur auf persönliche Anfrage hin ändern.</span></p>
    <button class='btn waves-effect waves-indigo white lighten-1' type='submit' name='submit'><span class='indigo-text text-darken-3'>Ändern</span></button>    
    </form>
	
";
$mysqli->close();





