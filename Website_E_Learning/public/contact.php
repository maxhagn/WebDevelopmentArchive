<?php require_once('../includes/init.php'); ?>
<?php if($session->is_logged_in()){
    redirect_to("../public/dashboard.php");
} ?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Über uns</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="HandheldFriendly" content="true" />
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/navbar.css">
</head>

<body>
    <div class="container-fluid">
        <?php 
        $layout_context = "contact";
        include('../includes/layouts/nav.php'); 
        ?>

        <div class="background-image">
        </div>

        <!-- Page content -->
        <div id="page-content-wrapper">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 container-div">
				<h1>Wir über uns!</h1>
					<img class="foto_gruppe" src="images/drai_group-1.jpg" alt="drai">
					<p>Wir sind Drai! Unser Team entstand Anfang 2016. Wir hatten das Ziel, ein super cooles Quiz zu programmieren, das jeder wann und wo er will spielen kann. 
						Unser Projekt wuchs im Laufe des Jahres gewaltig. Wir hatten immer mehr Ideen und Ziele vor Augen, die wir unbedingt verwirklichen wollten. 
						Das haben wir auch geschafft! Mit dem Quiz "Drai" haben wir ein unglaublich faszinierendes Spiel für alle Wissbegierigen erschaffen.
					<hr>
				<h1>Projektteam Drai</h1>
					<p><b>Projektleiter:</b> Benjamin Böhm<br>
						<b>Projektleiter Stv.:</b> Lukas Haider<br>
						<br>
						<b>Mitarbeiter:</b><br>
						Ethem Gülfirat<br>
						Jan Schröpfer<br>
						David Lakic</p>
					<hr>	
					<h1>Kontaktdaten</h1>
					<p><b>Straße:	</b>Rennweg 89B<br>
					<b>Stadt:		</b>1030 Wien<br>
					<b>Land:		</b>Österreich<br>
					<b>Telefon:		</b> +43 1 242 15-10<br>
                    <b>E-Mail:		</b>Benjamin-boehm@kabsi.at<br>
					<b>Internet:	</b>www.htl.rennweg.at</p>
					<hr>
					<h1>Bildernachweis</h1>
					<p>Alle im Quiz verwendeten Bilder : <a href="https://creativecommons.org/licenses/by/2.0/">creative commons</a></p>
				<hr>
				<a href="mailto:Benjamin-boehm@kabsi.at" class="btn btn-warning navbar-btn navbtn">kontaktieren Sie uns bei Fragen oder Problemen!</a>
				<br>
				<hr>
                </div>
            </div>
        </div>
    </div>
<?php
?>
</body>
</html>