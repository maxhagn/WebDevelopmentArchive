<?php require_once('../includes/init.php'); ?>
<?php if($session->is_logged_in()){
    redirect_to("../public/dashboard.php");
} ?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frontpage</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="HandheldFriendly" content="true" />
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="styles/frontpagestyles.css">
    <link rel="stylesheet" href="styles/navbar.css">
</head>

<body>
    <div class="container-fluid">

        <?php 
        $layout_context = "index";
        include('../includes/layouts/nav.php'); 
        ?>

        <div class="background-image">
        </div>

        <div id="wrapper">
            <!-- Page content -->
            <div id="page-content-wrapper">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <!--<h1 id="title">Video Quiz</h1>-->

                        <div class="title">
                        <a href="login.php" id="Frontpagebtn">Jetzt Lernen ...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include('../includes/layouts/nav.php'); 
?>
</body>
</html>