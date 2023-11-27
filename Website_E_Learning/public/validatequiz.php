<?php require_once('../includes/init.php'); ?>
<?php    
if(!$session->is_logged_in()){
        redirect_to("../public/index.php");
    }
?>
<?php
$quizid = $_POST['quizid'];

if(isset($_POST['quizid'])){
    if(Quiz::find_by_id($quizid)){
      $cquiz = Quiz::find_by_id($quizid);   
    } else {
        redirect_to("../public/index.php");
    }
} else {
    redirect_to("../public/index.php");
}
?>
            <!DOCTYPE html>

            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Auswertung</title>

                <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
                <meta name="HandheldFriendly" content="true" />
                <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
                <!-- Latest compiled and minified CSS -->
                <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

                <!-- jQuery library -->
                <script src="js/jquery-2.2.4.min.js"></script>

                <!-- Latest compiled JavaScript -->
                <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

                <link rel="stylesheet" href="styles/styles-dashboard.css">
                <link rel="stylesheet" href="styles/navbar-dashboard.css">
                <link rel="stylesheet" href="CardStackEffects/component.css">
                <script src="CardStackEffects/modernizr-custom.js"></script>
            </head>

            <body>
                <div class="container-fluid">
                    <?php 
    $user = User::find_by_id($_SESSION['user_id']);
    ?>

                        <?php 
                        $layout_context = "index";
                        include('../includes/layouts/nav-empty.php'); 
                        ?>
                    <?php
                    $questions = question::find_all_by_quiz($cquiz->id);
                    
                    $counter = 0;
                    
                    ?>
                            <div id="wrapper">
                                <!-- Page content -->
                                <div id="page-content-wrapper">
                                                                    <div class="col-md-10 col-md-offset-1 container-div  kek">

                                    <div class="content">
                                        
                                        <?php foreach($questions as $question): ?>                                            
                                            <?php 
                                            if($_POST[str_replace(array(' ', '.'), '', utf8_encode($question->question))]==utf8_encode($question->answer1)){
                                                $counter++;
                                            }
                                            ?>
                                        <?php endforeach; ?>
                                        <h1 class="text-center">Auswertung</h1>
                                        <h2 class="text-center"><?php echo $counter; ?>/<?php echo count($questions); ?> Fragen richtig</h2>
                                        
                                        <ul>
                                        <?php foreach($questions as $question): ?> 
                                        <li><h4>
                                        <?php echo utf8_encode($question->question) ?>
                                        </h4>
                                            
                                            <div class="alert alert-success">
                                              <strong>richtig:</strong> <?php echo utf8_encode($question->answer1) ?>
                                            </div>
                                            
                                            <?php if ($_POST[str_replace(array(' ', '.'), '', utf8_encode($question->question))]==utf8_encode($question->answer1)): ?>
                                            <div class="alert alert-success">
                                              <strong>deine Antwort:</strong> <?php echo $_POST[str_replace(array(' ', '.'), '', utf8_encode($question->question))] ?>
                                            </div>
                                            <?php else: ?>   
                                            <div class="alert alert-danger">
                                              <strong>deine Antwort:</strong> <?php echo $_POST[str_replace(array(' ', '.'), '', utf8_encode($question->question))] ?>
                                            </div>
                                            <?php endif; ?>    
                                        </li>
                                        <?php endforeach; ?>
                                        </ul>
                                        
                                        
                                     <button class="btn btn-primary" onclick="location.href='dashboard.php';">Zum Dashboard</button>  

                                        
                                        
                            <?php
                                    $score = new scores();
                                    $score->percent = ($counter / count($questions)) * 100;
                                    $score->user_id = $_SESSION['user_id'];
                                    $score->quiz_id = $quizid;
                                    if(!$score->create()){
                                        echo '<div class="alert alert-danger">failed to save score!</div>';
                                    }
                            ?>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                    

                </div>
            </body>

            </html>