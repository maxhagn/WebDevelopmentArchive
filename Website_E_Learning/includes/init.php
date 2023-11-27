<?php
//config file
require_once('config.php');

//basic functions
require_once('functions.php');
require_once('validation_functions.php');

//load core objects
require_once('database.php');
require_once('session.php');


//database-related classes
require_once('user.php');
require_once('Quiz.php');
require_once('question.php');
require_once('scores.php');
?>