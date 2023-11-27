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
            <title>Kategorie</title>

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
        $layout_context = "categories";
        include('../includes/layouts/nav-dashboard.php'); 
                    
                    
                    
                    
                    
                    
                    $categoryid = $_GET["id"];
                    
                    
                    if (isset($_GET['id'])){
                        if(Quiz::find_by_category($categoryid)){
                          $quizescat = Quiz::find_by_category($categoryid);   
                        } else {
                            $quizescat = Quiz::find_all();
                        }
                    } else {
                            $quizescat = Quiz::find_all();
                    }
        ?>

                        <div class="background-image">
                        </div>

                        <div id="wrapper">
                                    <?php
                                    $quizes = $database->query("SELECT * FROM categories");
                                    ?>

                            <!-- Page content -->
                            <div id="page-content-wrapper">
                                <div class="col-md-8 col-md-offset-2 container-div">
                                    <div class="row wow">
                                        
                                        <div class="btn-group kekgroup">
                                            <button class="btn <?php if(!isset($_GET['id'])){ echo "btn-warning"; }?>" onclick="location.href='categories.php';">Alle</button>
                                    <?php while($row = $database->fetch_array($quizes)): ?>  
                                            <button class="btn <?php if($row['id'] == $_GET['id']) { echo "btn-warning"; }?>" onclick="location.href='categories.php?id=<?php echo $row['id']?>';"><?php echo $row['category_name']?></button>
                                    <?php endwhile; ?>
                                            
                                            
                                            
                                        </div>
                                    </div>

                                    <br>
                                        <div id="quizes" class="item list-group">
                                            
                                            <?php foreach($quizescat as $quiz): ?>
                                            
                                            <div class="nah col-xs-6 col-lg-4">
                                                
                                                            <div class="thumbnail">
                                                                <a href="quizpage.php?id=<?php echo $quiz->id ?>">
                                                                        <img class="group list-group-image aaa" src="images/<?php echo utf8_encode($quiz->thumbnail) ?>" alt="<?php echo utf8_encode($quiz->thumbnail) ?>" />
                                                                    <div class="caption">
                                                                        <h4 class="heading">
                                                                            <?php echo utf8_encode($quiz->quiz_name);?></h4>
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