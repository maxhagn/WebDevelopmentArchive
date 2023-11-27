<?php
if(!isset($_SESSION)){
	session_start();
}
$mysqli = new mysqli("localhost", "root", "", "linkhype");
$user = $_SESSION["user"];
$ausgabe = $mysqli->query("SELECT * FROM `user-link-verbindung` join links on linkverbindung = linkID where userverbindung = '$user'");



while ($datensatz=mysqli_fetch_assoc($ausgabe))
{
$linkid = $datensatz["linkID"];
$link = $mysqli->real_escape_string($datensatz["link"]);
$bewertungen = $datensatz["bewertung"];
if($datensatz["bildpfad"] != null){
$bild = $datensatz["bildpfad"];
}
else{
	$bild = "images/LH_Logo.png";
}
if ($datensatz["beschreibung"]!= null){
	$beschreibung = $datensatz["beschreibung"];
}
else{
	$beschreibung ="Dieser Link hat keine Beschreibung";
}
if ($datensatz["farbe"]!= null){
	$farbe = $datensatz["farbe"];
}
else{
	$farbe = "blue";
}


	echo "

		<div class='col s6'>
          <div class='card medium'>
            <div class='card-image'>
              <img src='".$bild."' height='230' width='30'>
            </div>
            <div class='card-content'>
              <p>".$beschreibung."</p>
              
              <p>
              
              <table>
              		
				  <tr>
					  <td style='padding-left: 2rem'>
					  	  <a class='btn-flat waves-effect waves-indigo modal-trigger' href='#modal1'><i class='material-icons'>settings</i></a>
						  
					   </td>
					   <td>
					   		Rating: ".$bewertungen."
					   </td>
					   <td style='padding-right: 2rem'>
					   	   <form method='post' action='linksloeschen.php'>
						   <button class='btn-flat waves-effect waves-indigo' type='submit' name='delete' value='".$linkid."'> <i class='material-icons'>delete</i></button>
						   </form>
						</td>
					</tr>
				</table>

			</p>
  		<!-- Modal Structure -->
		  <div id='modal1' class='modal modal-fixed-footer bottom-sheet'>
                    <form method='post' action='linkaendern.php' >
                    <div class='modal-content'>
                      <h4>Link ändern</h4>
                      
                      
                      	<div class='input-field col s12 center'>
           				<input id='change_link' type='text' class='validate' name='ch_beschreibung'>
            			<label for='change_link' style='text-align:center'>Link</label>
            			</div>
                    
                      <br />
                      <p class='center'>
                   	 	<input class='#' name='group1' type='radio' id='change_blue' value='blue' />
      					<label for='change_blue'>Blau</label>
                        
                        <input class='#' name='group1' type='radio' id='change_green'  value='green'/>
      					<label for='change_green'>Grün</label>
                        
                        <input class='#' name='group1' type='radio' id='change_red'  value='red'/>
      					<label for='change_red'>Rot</label>
                        
                        <input class='#' name='group1' type='radio' id='change_yellow'  value='yellow'/>
      					<label for='change_yellow'>Gelb</label>
                    </p>
                    <p class='range-field indigo-text text-darken-3'>
                          <input type='range' id='change_link_rate' min='0' max='100' name='ch_link_rate'/>
                        </p>
					<p>
                    <div class='file-field input-field'>
                      <div class='btn indigo'>
                        <span><i class='material-icons'>add</i></span>
                        <input type='file' name='aendern' id ='aendern'>
                      </div>
                      <div class='file-path-wrapper'>
                        <input class='file-path validate' type='text' name='änd'>
                      </div>
                    </div>
                    </p>
                    </div>
                    <div class='modal-footer'>
                      <button class='btn waves-effect waves-indigo white lighten-1' type='submit' name='submit' value='".$linkid."'><span class='indigo-text indigo-darken-3'>Ändern</span></button>
                    </div>
                    </form>

                  </div>
					  
             	
            </div>
            <div class='card-action'>
             <a href='http://".$link."' style='color:".$farbe."'>".$link."</a>
            </div>
            
      </div>
     </div>
     ";




}

