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
            <title>Dashboard</title>

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

            <!-- Important Owl stylesheet -->
            <link rel="stylesheet" href="owl-carousel/owl.carousel.css">

            <!-- Default Theme -->
            <link rel="stylesheet" href="owl-carousel/owl.theme.css">

            <!-- Include js plugin -->
            <script src="owl-carousel/owl.carousel.js"></script>
        </head>

        <body>
            <?php 
    $user = User::find_by_id($_SESSION['user_id']);
    ?>
                <div class="container-fluid">
                    <?php 
        $layout_context = "dashboard";
        include('../includes/layouts/nav-dashboard.php'); 
        ?>

                        <div id="wrapper">
                                    <?php
                                        $quizes = Quiz::find_8();
                                        $quizesscore = $database->query("SELECT quiz.id, quiz.quiz_name, quiz.category_id, quiz.thumbnail, scores.percent FROM quiz CROSS JOIN scores ON quiz.id=quiz_id WHERE user_id=".$_SESSION['user_id']." ORDER BY scores.id desc LIMIT 8");
                                    ?>

                            <!-- Page content -->
                            <div id="page-content-wrapper">
                                <div class="col-md-8 col-md-offset-2 container-div">
                                    <div class="row">
                                        <h2 class="desc" style="color:#FFF">Neu:</h2>
                                        <div id="owl-demo">
                                            
                                            <?php foreach($quizes as $quiz): ?>
                                                    <div class="item">
                                                        <a href="quizpage.php?id=<?php echo $quiz->id ?>"><img src="images/<?php echo $quiz->thumbnail ?>" alt="<?php echo $quiz->thumbnail ?>"><span class="title"><?php echo utf8_encode($quiz->quiz_name);?></span></a>
                                                    </div>
                                            <?php endforeach; ?>

                                        </div>
                                    </div>
                                    <hr>
                                        <h2 class="desc" style="color:#FFF">Fertig:</h2>
                                        <div id="quizes" class="item list-group">
                                            
                                            <?php foreach($quizesscore as $quiz): ?>
                                            
                                            <?php 
                                               // $quiz =  Quiz::find_by_id($quiz['quiz_id']);  
                                            ?>
                                            <div class="nah col-xs-6 col-lg-4">
                                                
                                                            <div class="thumbnail pe">
                                                                <a href="quizpage.php?id=<?php echo $quiz['id']; ?>">
                                                                        <img class="group list-group-image bbb" src="images/<?php echo utf8_encode($quiz['thumbnail']); ?>" alt="<?php echo utf8_encode($quiz['thumbnail']) ?>" />
                                                                    <div class="caption">
                                                                        <h4 class="heading desc2">
                                                                            <?php echo utf8_encode($quiz['quiz_name']);?> : <?php echo utf8_encode($quiz['percent']);?>%</h4>
                                                                    </div>
                                                                </a>
                                                            </div>
                                            </div>
           
                                            <?php endforeach; ?>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function() {

                                $("#owl-demo").owlCarousel({
                                    items: 4,
                                    itemsDesktop: [1199, 3],
                                    itemsDesktopSmall: [979, 3]
                                });

                            });
                        </script>
        </body>

        </html>