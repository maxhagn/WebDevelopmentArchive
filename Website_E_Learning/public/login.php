<?php require_once('../includes/init.php'); ?><?php
    if($session->is_logged_in()){
        redirect_to("../public/index.php");
    }
    ?>
    <!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign In</title>

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
            <nav class="navbar navbar-default navbar-fixed-top">


                <!-- Title -->
                <div class="navbar-header pull-left">
                    <a href="index.php" class="navbar-brand">DRAI</a>
                </div>

                <!-- 'Sticky' (non-collapsing) right-side menu item(s) -->
                <div class="navbar-header pull-right">
                    <ul class="nav pull-left list-inline">
                        <li class="navbar-text pull-left list-inline">
                            <button class="btn btn-warning navbar-btn navbtn" onclick="window.location.href='login.php'">Sign In</button>
                        </li>
                    </ul>

                    <!-- Required bootstrap placeholder for the collapsed menu -->
                    <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <!-- active class for what is currently on-->
                        <li class="">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="">
                            <a href="info.php">Infos</a>
                        </li>
                        <li class="">
                            <a href="contact.php">Kontakt</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="background-image">
            </div>

            <!-- Page content -->
            <div id="page-content-wrapper">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 container-div ">
                        <div class="form-signin">
                            <form action="login.php" method="post">
                                <h3>Login</h3>
                                <input type="text" class="form-control" id="usr" placeholder="Benutzername" name="username">
                                <input type="password" class="form-control" id="pwd" name="password" placeholder="Passwort">
                                <input type="submit" id="loginbtn" name="submit" class="btn btn-block btn-warning" value="Einloggen">

                            </form>
                            <button class="btn btn-block btn-warning" id="registerbtn" onclick="window.location.href='register.php'">Registrieren</button>

                            <br>
                            <?php
                            $errorlogin = "";
                            if(isset($_POST['submit'])){

                                        $username = htmlspecialchars($_POST['username']);
                                        $password = htmlspecialchars($_POST['password']);

                                        $required_fields = array("username", "password");
                                        validate_presences($required_fields);

                                        if (empty($errors)) {
                                            //Check Database to see if username/password exist.
                                            $found_user = User::authenticate($username,$password);

                                            if($found_user){
                                                $session->login($found_user);
                                                die('<META HTTP-EQUIV="Refresh" CONTENT="0;URL=dashboard.php">');
                                            } else {
                                                // username/password combo was not found in the database
                                                echo '<div class="alert alert-danger">Username or password wrong!</div>';
                                            }
                                        }else {
                                            foreach($errors as $error) {
                                                echo '<div class="alert alert-danger">'.$error.'</div>';
                                            }
                                        }
                        } else {
                          // This is probably a GET request

                        } // end: if (isset($_POST['submit']))
                        ?>
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