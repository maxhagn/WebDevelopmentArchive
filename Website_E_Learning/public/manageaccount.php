<?php require_once('../includes/init.php'); ?>
    <?php    
if(!$session->is_logged_in()){
        redirect_to("../public/index.php");
    }
?>
        <!DOCTYPE html>

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Benutzerverwaltung</title>

            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
            <meta name="HandheldFriendly" content="true" />
            <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

            <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

            <!-- Latest compiled JavaScript -->
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

            <link rel="stylesheet" href="styles/styles-dashboard.css">
            <link rel="stylesheet" href="styles/navbar-dashboard.css">

            <style>
                .form-horizontal .control-label {
                    /* text-align:right; */
                    text-align: left;
                }
                
                .form-horizontal .form-control {
                    /* text-align:rigt; */
                    margin-right: -200px;
                }
            </style>
        </head>

        <body>
            <div class="container-fluid">


                <?php 
    $user = User::find_by_id($_SESSION['user_id']);
    ?>
                    <?php 
        $layout_context = "index";
        include('../includes/layouts/nav-dashboard.php'); 
        ?>

                        <div class="background-image">
                        </div>

                        <!-- Page content -->
                        <div id="page-content-wrapper">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1 container-div  kek">

                                    <h1>Benutzer</h1>
                                    <p>
                                        <!--  Mit Php die Daten anzeigen lassen. -->

                                        <h4>Benutzername: <?php echo htmlspecialchars($user->username)?></h4>
                                        <h4>Vorname: <?php echo htmlspecialchars($user->first_name)?></h4>
                                        <h4>Nachname: <?php echo htmlspecialchars($user->last_name)?></h4>
                                        <h4>E-mail: <?php echo htmlspecialchars($user->email)?></h4>
                                        <form class="form-horizontal" style="text-align:left;" action="manageaccount.php" method="post">
                                            <fieldset>

                                                <!-- Form Name -->
                                                <legend>Änderung</legend>

                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label" for="username">Benutzername</label>
                                                    <div class="col-md-2">
                                                        <input id="username" name="username" type="text" placeholder="" class="form-control input-md" value="<?php echo htmlspecialchars($user->username); ?>">

                                                    </div>
                                                </div>

                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label" for="vorname">Vorname</label>
                                                    <div class="col-md-2">
                                                        <input id="vorname" name="firstname" type="text" placeholder="" class="form-control input-md" value="<?php echo htmlspecialchars($user->first_name); ?>">

                                                    </div>
                                                </div>

                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label" for="nachname">Nachname</label>
                                                    <div class="col-md-2">
                                                        <input id="nachname" name="lastname" type="text" placeholder="" class="form-control input-md" value="<?php echo htmlspecialchars($user->last_name); ?>">

                                                    </div>
                                                </div>

                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label" for="email">E-mail</label>
                                                    <div class="col-md-2">
                                                        <input id="email" name="email" type="text" placeholder="" class="form-control input-md" value="<?php echo htmlspecialchars($user->email); ?>">

                                                    </div>
                                                </div>
                                                
                                                <!-- Password input-->
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label" for="password">Momentanes Passwort</label>
                                                    <div class="col-md-2">
                                                        <input id="password" name="currentpassword" type="password" placeholder="" class="form-control input-md">

                                                    </div>
                                                </div>

                                                <!-- Password input-->
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label" for="password">Neues Passwort</label>
                                                    <div class="col-md-2">
                                                        <input id="password" name="newpassword" type="password" placeholder="" class="form-control input-md">

                                                    </div>
                                                </div>

                                                <!-- Password input-->
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label" for="password2">Passwort bestätigen</label>
                                                    <div class="col-md-2">
                                                        <input id="password2" name="repeatnewpassword" type="password" placeholder="" class="form-control input-md">

                                                    </div>
                                                </div>


                                                <!-- Button -->
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label" for="submit"></label>
                                                    <div class="col-md-2">
                                                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                                <?php
                                if (isset($_POST['submit'])) {
                                    echo "<br>";
                                    $required_fields = array("username","firstname","lastname","email");
                                        validate_presences($required_fields);
                                    $fields_with_max_lengths = array("username" => 50,"email" => 40,"firstname" => 30,"lastname" => 30,"newpassword" => 254,"newpassword" => 254);
                                        validate_max_lengths($fields_with_max_lengths);
                                    
                                    if (empty($errors)) {
                                        $passwordchanged = false;
                                        $same = true;
                                        // Process the form
                                        $username = htmlspecialchars($_POST['username']);
                                        $email = htmlspecialchars($_POST['email']);
                                        $firstname = htmlspecialchars($_POST['firstname']);
                                        $lastname = htmlspecialchars($_POST['lastname']);
                                        $currentpassword = htmlspecialchars($_POST['currentpassword']);
                                        $newpassword = htmlspecialchars($_POST['newpassword']);
                                        $repeatnewpassword = htmlspecialchars($_POST['repeatnewpassword']);
                                        
                                        
                                        if(strlen($newpassword) > 1 || strlen($repeatnewpassword) > 1){
                                        $passwordchanged = true;
                                        if($newpassword != $repeatnewpassword){
                                            echo '<div class="alert alert-danger">passwords do not match</div>';
                                        } else {
                                            if(User::authenticate($user->username,$currentpassword)){
                                            $user->password = $newpassword;
                                            if($user->updatepassword()){
                                                echo '<div class="alert alert-success">Password changed!</div>';
                                            }else {
                                                echo '<div class="alert alert-danger">failed to update</div>';
                                            }
                                        } else {
                                           echo '<div class="alert alert-danger">Password is not correct!</div>';
                                        }
                                        }
                                            
                                        }
                                        
                                        $errors2 = array();
                                        
                                        if($username != $user->username){
                                            $same = false;
                                            if(User::find_by_username($username)){
                                              $errors2["username"] = "username already taken!";  
                                            } 
                                        }
                                        if($firstname != $user->first_name){
                                            $same = false;
                                        }
                                        if($lastname != $user->last_name){
                                            $same = false;
                                        }
                                        if($email != $user->email){
                                            $same = false;
                                            if(User::find_by_email($email)){
                                              $errors2["email"] = "this email is already in use!";  
                                            }   
                                        }
                                        
                                        if (empty($errors2) && $same == false) {
                                            $user->username = $username;
                                            $user->email = $email;
                                            $user->first_name = $firstname;
                                            $user->last_name = $lastname;
                                            if($user->update()){
                                                echo '<div class="alert alert-success">changed!</div>';
                                                die('<META HTTP-EQUIV="Refresh" CONTENT="1;URL=manageaccount.php">');
                                            } else {
                                                echo '<div class="alert alert-danger">failed to update</div>';
                                            }
                                        } else if($same && !$passwordchanged){
                                            echo '<div class="alert alert-info">nothing changed</div>';
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
                                            </fieldset>
                                        </form>
                                </div>
                            </div>
                        </div>
            </div>

        </body>

        </html>