<?php require_once('../includes/init.php'); ?>
    <?php
if($session->is_logged_in()){
    redirect_to("index.php");
}
?>
        <!DOCTYPE html>

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Sign Up</title>

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
                            <form class="form-signin" action="register.php" method="post">
                                <h3>Registrierung</h3>

                                <input type="text" class="form-control" id="usr" placeholder="Benutzername" name="username">

                                <input type="text" class="form-control" id="firstname" placeholder="Vorname" name="firstname">

                                <input type="text" class="form-control" id="lastname" placeholder="Nachname" name="lastname">

                                <input type="email" class="form-control" id="email" placeholder="E-Mail" name="email">

                                <input type="password" class="form-control" id="pwd" name="password" placeholder="Passwort">

                                <input type="password" class="form-control" id="rpt" name="confirmpassword" placeholder="Passwort bestätigen">

                                <input type="submit" id="submit" name="submit" class="btn btn-block btn-warning registrierungsbutton" value="Registrieren">

                                <?php
                        if (isset($_POST['submit'])) {
                            $required_fields = array("username","firstname","lastname","email","password","confirmpassword");
                                validate_presences($required_fields);
                            $fields_with_max_lengths = array("username" => 50,"password" => 254,"email" => 40,"firstname" => 30,"lastname" => 30);
                                validate_max_lengths($fields_with_max_lengths);

                            if (empty($errors)) {
                                // Process the form
                                $username = htmlspecialchars($_POST['username']);
                                $email = htmlspecialchars($_POST['email']);
                                $firstname = htmlspecialchars($_POST['firstname']);
                                $lastname = htmlspecialchars($_POST['lastname']);
                                $password = htmlspecialchars($_POST['password']);
                                $passwordconfirm = htmlspecialchars($_POST['confirmpassword']);

                                $errors2 = array();

                                if($password != $passwordconfirm){
                                  $errors2["password"] = "passwords do not match!";
                                } 
                                if(User::find_by_username($username)){
                                  $errors2["username"] = "username already taken!";  
                                } 
                                if(User::find_by_email($email)){
                                  $errors2["email"] = "email adress already in use!";  
                                }
                                
                                #if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
                                #     $errors2["noemail"] = "Not a valid Email adress!";  
                                #}

                                if (empty($errors2)) {
                                    $user = new User();
                                    $user->username = $username;
                                    $user->email = $email;
                                    $user->first_name = $firstname;
                                    $user->last_name = $lastname;
                                    $user->password = $password;
                                    if($user->create()){
                                        $session->login($user);
                                        die('<META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php">');
                                    } else{
                                        echo '<div class="alert alert-danger">failed to create User!</div>';
                                    }
                                } else {
                                    foreach($errors2 as $error) {
                                        echo '<div class="alert alert-warning">'.$error.'</div>';
                                    }
                                }  
                            } else{
                               foreach($errors as $error) {
                                   echo '<div class="alert alert-danger">'.$error.'</div>';
                               }
                            }
                        } else {
                          // This is probably a GET request

                        } // end: if (isset($_POST['submit']))
                        ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
include('../includes/layouts/nav.php'); 
?>
        </body>

        </html>