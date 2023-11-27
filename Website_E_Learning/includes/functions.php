<?php
function redirect_to($new_location) {
    header("Location: " . $new_location);
    exit;
}

function __autoload($class_name){
    $class_name = strtolower($class_name);
    $path = "../includes/{$class_name}.php";
    if(file_exists($path)){
        require_once($path);
    } else{
        die("The file {$class_name}.php could not be found");
    }
}

function outputLoginForm(){
        return '<h3 class="center">Log In</h3>
            <hr>
                <div class="login">
                    <form name="frm_loginform" action="index.php" method="post">
                        <input type="text" class="form-control" id="usr" placeholder="username" name="username" value="">
                        <br>
                        <input type="password" class="form-control" id="pwd" name="password" placeholder="Password">
                        <br>
                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="Log In">
                        <a href="sign-up.php" class="pull-left">sign up</a>
                        <a href="#" class="pull-right">forgot password</a>
                        <br>
                        ' .'
                    </form>
                </div>';
    }

function outputUserForm(){
    $user = User::find_by_id($_SESSION['user_id']);
    return '<div class="centerel"><span class="glyphicon glyphicon-user"></span>
            <h3>'. htmlspecialchars($user->username) .'</h3></div>
                <hr>
                <div class="loggedin">
                    <a href="manageaccount.php" class="">Manage Account</a>
                     <form name="frm_logoutform" action="logout.php" method="post">
                    <button class="btn btn-primary btn-block">Log Out</button>
                    </form>
                </div>';
}

function outputLoginError($err){
        return '<div class="alert alert-warning">'.$err.'</div>';
    }
?>