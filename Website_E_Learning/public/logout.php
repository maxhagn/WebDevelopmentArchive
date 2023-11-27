<?php require_once("../includes/init.php"); ?><?php
// v2: destroy session
// assumes nothing else in session to keep
session_start();
$_SESSION = array();
if (isset($_COOKIE[session_name()])){
    setcookie(session_name(), '', time()-42000,'/');
}
session_destroy();
redirect_to("index.php");
?>
