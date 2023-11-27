<?php require_once('../includes/init.php'); ?>
<?php if($session->is_logged_in()){
    redirect_to("../public/dashboard.php");
} ?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information</title>

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
        $layout_context = "infos";
        include('../includes/layouts/nav.php'); 
        ?>

        <div class="background-image">
        </div>

        <!-- Page content -->
        <div id="page-content-wrapper">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 container-div">
                    <h1>Information</h1>
                    <p> Ziel des Projektes ist es ein Applikation zu erschaffen, welches den Spielern pro Frage drei Antwortmöglichkeiten bietet. Das Quiz befindet sich auf einer Webseite und beinhaltet drei Themenbereiche. Diese sind Geschichte, Geografie und Physik. Dem Spieler wird ein Feedback über ein episches Bewertungs- und Punktesystem gegeben. Gewonnene Punkte aus dem Spiel werden dem Spieler auf sein Konto übertragen die ihm verhelfen seine Level zu steigern bzw. sich mit anderen Spielern zu messen. Spieler können sich mit einer einfachen Email und einem Passwort registrieren oder optional durch Facebook. Zusätzlich ist die Webseite modern gestaltet. Mit diesem Projekt versuchen wir moderne Medien mit dem klassischen Unterricht zu kombinieren. Diese Kombination soll zu mehr Spaß beim Lernen führen.
                </div>
            </div>
        </div>
    </div>
<?php
    include('../includes/layouts/nav.php'); 
?>
</body>
</html>