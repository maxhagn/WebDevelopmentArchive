<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Bearbeiten</title>
  <link rel="icon" href="icon.ico" type="image/ico">

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  
    <!-- jQuery Code -->	
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
  // jQuery laden
  google.load("jquery", "1.3.2");
</script>

<!-- jQuery Code -->	

  
</head>
<body>
 <div class="navbar">
  <nav class="white" >
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">
    <img src="images/LH_logo.png" alt="LinkHype" id="logo" href="http://37.75.138.43/Website/Impressum+Kontakt/Impressum.html" class="brand-logo" style="height:65px"></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="http://37.75.138.43/Website/LINKHYPE/linkhype.php" style="color:;">Zurück</a></li>
        
        
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="http://37.75.138.43/Website/LINKHYPE/linkhype.html" style="color:;">Zurück</a></li>
        
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
   </nav>
  </div>

  <div id="index-banner" class="parallax-container">
   
      <div class="section no-pad-bot">
       
        <div class="container">

          <h1 class="header center light">Profil bearbeiten</h1>

        </div>
      </div>
      <div class="parallax"><img src="bilder/background3.jpg" alt="Unsplashed background img 1"></div>
    </div>
<div class="container">
    <div class="section">
      <div class="row">
          <div class="col s12 center indigo-text text-darken-3">
            <h4>Bitte geben Sie Ihre neuen Benutzerdaten ein!</h4>
            <br />
              <?php
              include("datenausgeben.php");
              ?>

          </div>
	</div>
 </div>
 </div>
 
   <footer class="page-footer indigo" style="bottom:0; width:100%">
      <div class="container">
        <div class="row center">
          <div class="col l3 s12">
            <p> </p>
          </div>
          <div class="col l3 s12">
            <a class="white-text" href="http://37.75.138.43/Website/Impressum+Kontakt/ImpressumKontakt.html">Kontakt</a>
          
          </div>
          <div class="col l3 s12">
            <a class="white-text" href="http://37.75.138.43/Website/Impressum+Kontakt/ImpressumKontakt.html">Impressum</a>
            
          </div>
        </div>
        
      </div>
      <div class="footer-copyright">
        <div class="container">
        Made by <a class="brown-text text-lighten-3">LinkHype</a>
        </div>
      </div>
    </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  
  
  <script type="text/javascript"> 
	
	$(document).ready(function() {
		// Alle internen Links auswählen
		$('a[href*=#]').bind("click", function(event) {
			// Standard Verhalten unterdrücken
			event.preventDefault();
			// Linkziel in Variable schreiben
			var ziel = $(this).attr("href");
			//Scrollen der Seite animieren, body benötigt für Safari
			$('html,body').animate({
				//Zum Ziel scrollen (Variable)
				scrollTop: $(ziel).offset().top
			// Dauer der Animation und Callbackfunktion die nach der Animation aufgerufen wird, sie stellt das Standardverhalten wieder her und ergänzt die URL
			}, 1000 , function (){location.hash = ziel;});
	   });
	return false;
	});
</script>

  </body>
</html>
