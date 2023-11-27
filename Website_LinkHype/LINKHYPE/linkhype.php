  <!DOCTYPE html>
  <html lang="en" xmlns="http://www.w3.org/1999/html">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>LinkHype</title>
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
  
  <!-- Modal initializing -->
  <script type="application/javascript">
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });

	function goback() {
    	history.go(-1);
	}
</script>
      <!-- Searchbar -->
      <script type="text/javascript">
          $(document).ready(function (e) {
              $("#search").keyup(function () {
                  $("#here").show();
                  var x = $(this).val();
                  $.ajax(
                      {
                          type:'GET',
                          url:'fetch.php',
                          data:'q='+x,
                          success:function (data) {
                              $("#here").html(data);
                          }
                      });
              });

          });
      </script>

      <script type="text/javascript">
          $(document).ready(function(){
              $('.tooltipped').tooltip({delay: 50});
          });
      </script>
     
  
  <!-- jQuery Code -->	
  <?php
  if(!isset($_SESSION)){
      session_start();
  }
  ?>
  </head>
  <body>
    <nav class="white" role="navigation">
      <div class="nav-wrapper container">
        <a id="logo-container" href="#" class="brand-logo"></a>
        <img src="images/LH_logo.png" alt="LinkHype" id="logo" href="#" class="brand-logo" style="height:65px">
       
       <ul class="right hide-on-med-and-down">
          <li><a href="#suchen">Suchen</a></li>
          <li><a href="#addlink">Links hinzufügen</a></li>
          <li><a href="#mylinks">Meine Links</a></li>
          <li><a href="http://37.75.138.43/Website/bearbeiten/bearbeiten.php">Profil bearbeiten</a></li>
          <li><a href="http://37.75.138.43/Website/Welcomepage/index.html">Abmelden</a></li>
        </ul>
  
        <ul id="nav-mobile" class="side-nav">
           <li><a href="#suchen">Suchen</a></li>
          <li><a href="#addlink">Links hinzufügen</a></li>
          <li><a href="#mylinks">Meine Links</a></li>
          <li><a href="http://37.75.138.43/Website/bearbeiten/bearbeiten.php">Profil bearbeiten</a></li>
          <li><a href="http://37.75.138.43/Website/Welcomepage/index.html">Abmelden</a></li>
        </ul>
        </div>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
      
    </nav>
  
    <div id="index-banner" class="parallax-container">
   
      <div class="section no-pad-bot">
       
        <div class="container">
         
          <h1 class="header center light">LinkHype</h1>
          <br><br>

          <div class="row center" style="margin-top: 25px">
            <h5 class="header col s12 light">Welcome to LinkHype - We keep your links safe!</h5>
          </div>
  
        </div>
      </div>
      <div class="parallax"><img src="images/background1.jpg" alt="Unsplashed background img 1"></div>
    </div>
  
  
    <div class="container">
      <div class="section">
      
      
  
        <div class="row">
          <div class="col s12 center indigo-text text-darken-3">           
            <br id="suchen" />
            <br />
            <h4>Suchen</h4>
            <br />

                      <form method="post" action="">
                          <div class="col s12 center input-field">
                              <input id="search" name="search" type="search" class="validate">
                              <label for="search">Geben Sie Ihren Suchtext ein</label>

                              <div class="row">
                                  <div class="col s12 center">
                                      <div id="here">



                                      </div>
                                  </div>
                              </div>
                          </div>
                          </form>




          </div>
        </div>
  
      </div>
    </div>
  
  
    <div class="parallax-container valign-wrapper">
      <div class="section no-pad-bot">
        <div class="container">
          <div class="row center">
            <h5 class="header col s12 light"></h5>
          </div>
        </div>
      </div>
      <div class="parallax"><img src="images/background2.jpg" alt="Unsplashed background img 2"></div>
    </div>
  
    <div class="container">
      <div class="section">
  
        <div class="row">
          <div class="col s12 center indigo-text text-darken-3">
           
            <h3 id="addlink"><i class="mdi-content-send indigo-text text-darken-3"></i></h3>
            <br />
            <h4 style="text-align:center">Links hinzufügen</h4>
       		<form method="post" action="linksanlegen.php" enctype="multipart/form-data">
          	  <ul class="collapsible popout" data-collapsible="accordion">
              	
    			<li>
      				<div class="collapsible-header "><i class="material-icons">filter_drama</i>Link</div>
      				<div class="collapsible-body"><p>
                    	<div class="input-field col s12 center">
                        
           				<input id="link" type="text" name="link" class="validate">
            			<label for="link" style="text-align:center">Link</label>
            			</div>
                        <br />
                    </p></div>
    			</li>
    			<li>
                  	<div class="collapsible-header"><i class="material-icons">invert_colors</i>Farbe</div>
                  	<div class="collapsible-body"><p>
                    <div class="input-field center">
                   	 	<input class="#" name="color" type="radio" id="blau"  value="blue"/>
      					<label for="blau">Blau</label>
                        
                        <input class="#" name="color" type="radio" id="gruen"  value="green"/>
      					<label for="gruen">Grün</label>
                        
                        <input class="#" name="color" type="radio" id="rot"  value="red"/>
      					<label for="rot">Rot</label>
                        
                        <input class="#" name="color" type="radio" id="gelb"  value="yellow"/>
      					<label for="gelb">Gelb</label>
                    </div>
                    </p></div>
                </li>
   				<li>
      				<div class="collapsible-header"><i class="material-icons">star_rate</i>Bewertung</div>
      				<div class="collapsible-body"><p>
                        <p class="range-field indigo-text text-darken-3">
                          <input type="range" id="link_rate" name="link_rate" min="0" max="100" />
                        </p>
                    </p></div>
    			</li>
                <li>
                
      				<div class="collapsible-header"><i class="material-icons">picture_in_picture</i>Bild hinzufügen</div>
      				<div class="collapsible-body"><p>
                    <div class="file-field input-field">
                      <div class="btn indigo">
                        <span><i class="material-icons">add</i></span>
                        <input type="file" name="file" id="file">
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                      </div>
                    </div>
					 <p> Bilder über 4 MB sollten nicht hochgeladen werden</p>
                    </p></div>
    			</li>
                <li>
      				<div class="collapsible-header"><i class="material-icons">Tags</i>Tags</div>
                  	<div class="collapsible-body"><p>
                            <div class="input-field center tooltipped" data-position="top" data-delay="50" data-tooltip="Tags mit Semikolon trennen">
						    <input type="text" id="tag" name="tag" class="validate">
                            <label for="tag" style="text-align: center">Geben Sie Ihre Tags ein</label>
                          </div>
                    </p></div>
                   
    			</li>
				 <li>
      				<div class="collapsible-header"><i class="material-icons">Beschreibung</i>Beschreibung</div>
                  	<div class="collapsible-body"><p>
						<div class="input-field">
            <input id="beschreibung" type="text" name="beschreibung" class="validate">
            <label for="beschreibung">Geben Sie Ihre Beschreibung ein</label>
                    </p></div>
                   
    			</li>

                <br>
                <button class="btn waves-effect waves-indigo white lighten-1" type="submit" name="submit"><span class="indigo-text text-darken-3">Anlegen</span></button>
				
  			</ul>
            </form>
           </div>
          </div>
        </div>
  
      </div>
   
  
  
    <div class="parallax-container valign-wrapper">
      <div class="section no-pad-bot">
        <div class="container">
          <div class="row center">
          </div>
        </div>
      </div>
      <div class="parallax"><img src="images/background3.jpg" alt="Unsplashed background img 3"></div>
    </div>
 
  <div class="container">
      <div class="section">
  
        <div class="row">
          <div class="col s12 center indigo-text text-darken-3">
            <h3><i class="mdi-content-send indigo-text text-darken-3"></i></h3>
            <h4 id="mylinks">Ihre Links</h4>
           
           	<?php
			include("linksaus.php");
			?>
          </div>
        </div>
  
      </div>
    </div>
     
    <footer class="page-footer indigo">
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
        Made by <a class="brown-text text-lighten-3">Team LinkHype</a>
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
