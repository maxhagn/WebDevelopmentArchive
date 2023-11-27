<?php
if(!empty($_GET['q'])){
    include 'connect.php';
    $q=$_GET['q'];
	$query="SELECT * FROM links WHERE link LIKE '%$q%'  union select * from links where linkID = (select linkID from tagverbindung where tagID = (SELECT tagID FROM tags WHERE Beschreibung LIKE '%$q%')) ";
	
    //$query="SELECT * FROM links WHERE link LIKE '%$q%' ";//von der zwischentabelle ausgehen und in beide richtungen joinen
	
    $result=mysqli_query($conn, $query);
	try{
    while ($output=mysqli_fetch_assoc($result))
    {

        echo "

		<div class='col s4'>
          <div class='card small'>
            <div class='card-image'>
              <img src='".$output['bildpfad']."' height='200' width='40'>
            </div>
            <div class='card-content'>
              <p>".$output['beschreibung']."</p>
            
  		
             	
            </div>
            <div class='card-action'>
             <a href='http://".$output['link']."' style='color:".$output['farbe']."'>".$output['link']."</a>
            </div>
            
      </div>
     </div>
     ";
    }
}
catch (Exception $e){
}
}