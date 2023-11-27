<?php require_once('../includes/init.php'); ?>
<?php    
if(!$session->is_logged_in()){
        redirect_to("../public/index.php");
    }
?>
<?php
$quizid = $_GET["id"];

if(isset($_GET['id'])){
    if(Quiz::find_by_id($quizid)){
      $cquiz = Quiz::find_by_id($quizid);   
    } else {
        redirect_to("quizpage.php?id=".Quiz::find_random());
    }
} else {
    redirect_to("quizpage.php?id=".Quiz::find_random());
}
?>
            <!DOCTYPE html>

            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Quiz</title>

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
        $layout_context = "quizpage";
        include('../includes/layouts/nav-empty.php'); 
        ?>
                    <?php
                    $questions = question::find_all_by_quiz($cquiz->id);
                    shuffle($questions);
                    ?>
                            <div id="wrapper">
                                <!-- Page content -->
                                <div id="page-content-wrapper">

                                    <div class="content">
                                        
                                        
                                        <button class="btn btn-success button-accept float" data-stack="stack_slamet"><i class="my-float glyphicon glyphicon-chevron-right"></i></button>
                                        

                                        <form action="validatequiz.php" method="post" id="qquest">
                                            <input type="hidden" value="<?php echo $cquiz->id; ?>" name="quizid">
                                        <ul id="stack_slamet" class="stack stack--slamet">
                                            <?php foreach($questions as $question): ?>
                                                <li class="stack__item">


                                                    <?php if ($question->picture != ""): ?>
                                                        <div class="quizimage"><img src="images/<?php echo utf8_encode($question->picture); ?>" class="" alt="<?php echo $question->picture; ?>" /></div>
                                                    <?php endif; ?>
                                            
                                                <h3><?php echo utf8_encode($question->question); ?></h3>
                                                    <ul class="answers">
                                                        <?php 
                                                        $answers = array($question->answer1, $question->answer2, $question->answer3);
                                                        shuffle($answers);
                                                        
                                                        foreach ($answers as $answer) {
                                                                echo '<li> <input type="radio" id="'.utf8_encode($answer).'" name="'.str_replace(array(' ', '.'), '', utf8_encode($question->question)).'" value="'.utf8_encode($answer).'"> <label for="'.utf8_encode($answer).'">'. utf8_encode($answer).'</label></li>';
                                                        }
                                                        ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                            <!--<input type="submit" class="btn btn-info">-->
                                            </form>
                                    </div>
                                </div>
                            </div>
		<script src="CardStackEffects/classie.js"></script>
		<!--
		click feedback effect : see more at http://tympanus.net/codrops/2015/02/11/subtle-click-feedback-effects/
		-->
		<script>
			// http://stackoverflow.com/a/11381730/989439
			function mobilecheck() {
				var check = false;
				(function(a){if(/(android|ipad|playbook|silk|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
				return check;
			}

			var clickeventtype = mobilecheck() ? 'touchstart' : 'click';

			(function() {
				var support = { animations : Modernizr.cssanimations },
					animEndEventNames = { 'WebkitAnimation' : 'webkitAnimationEnd', 'OAnimation' : 'oAnimationEnd', 'msAnimation' : 'MSAnimationEnd', 'animation' : 'animationend' },
					animEndEventName = animEndEventNames[ Modernizr.prefixed( 'animation' ) ],
					onEndAnimation = function( el, callback ) {
						var onEndCallbackFn = function( ev ) {
							if( support.animations ) {
								if(ev.target != this) return;
								this.removeEventListener( animEndEventName, onEndCallbackFn);
							}
							if(callback && typeof callback === 'function') {callback.call();}
						};
						if( support.animations ) {
							el.addEventListener(animEndEventName, onEndCallbackFn);
						}
						else {
							onEndCallbackFn();
						}
					};

				[].slice.call(document.querySelectorAll('.button--sonar')).forEach(function(el) {
					el.addEventListener(clickeventtype, function(ev) {
						if( el.getAttribute('data-state') !== 'locked' ) {
							classie.add(el, 'button--active');
							onEndAnimation(el, function() {
								classie.remove(el, 'button--active');
							});
						}
					});
				});
			})();
		</script>
		<script src="CardStackEffects/dynamics.min.js"></script>
		<script src="CardStackEffects/main.js"></script>
		<script>
			(function() {
				
				var support = { animations : Modernizr.cssanimations },
					animEndEventNames = { 'WebkitAnimation' : 'webkitAnimationEnd', 'OAnimation' : 'oAnimationEnd', 'msAnimation' : 'MSAnimationEnd', 'animation' : 'animationend' },
					animEndEventName = animEndEventNames[ Modernizr.prefixed( 'animation' ) ],
					onEndAnimation = function( el, callback ) {
						var onEndCallbackFn = function( ev ) {
							if( support.animations ) {
								if(ev.target != this) return;
								this.removeEventListener( animEndEventName, onEndCallbackFn);
							}
							if(callback && typeof callback === 'function') {callback.call();}
						};
						if( support.animations ) {
							el.addEventListener(animEndEventName, onEndCallbackFn);
						}
						else {
							onEndCallbackFn();
						}
					};

				function nextSibling(el) {
					var nextSibling = el.nextSibling;
					while(nextSibling && nextSibling.nodeType != 1) {
					nextSibling = nextSibling.nextSibling
					}
					return nextSibling;
				}

					var slamet = new Stack(document.getElementById('stack_slamet'), {
						infinite: false,
						perspective: 1400,
						onEndStack: function(instance) {
							setTimeout(function() {
                                document.getElementById("qquest").submit();
								//instance.restart();
								//document.querySelector('#counter > .counter_number').innerHTML = 0;
							}, 300);
						}
					});
            


				document.querySelector('.button-accept[data-stack = stack_slamet]').addEventListener(clickeventtype, function(ev) { 
					var callback = function() {
						// increment counter
						var counter = document.querySelector('.counter_number'),
							count = parseInt(counter.innerHTML);
						counter.innerHTML = count + 1;

					};
					slamet.reject(callback);
				});
				//document.querySelector('.button--reject[data-stack = stack_slamet]').addEventListener(clickeventtype, function() { slamet.reject(); });	

				[].slice.call(document.querySelectorAll('.button--sonar')).forEach(function(bttn) {
					bttn.addEventListener(clickeventtype, function() {
						bttn.setAttribute('data-state', 'locked');
					});
				});

				[].slice.call(document.querySelectorAll('.button--material')).forEach(function(bttn) {
					var radialAction = nextSibling(bttn.parentNode);

					bttn.addEventListener(clickeventtype, function(ev) {
						var boxOffset = radialAction.parentNode.getBoundingClientRect(),
							offset = bttn.getBoundingClientRect();

						radialAction.style.left = Number(offset.left - boxOffset.left) + 'px';
						radialAction.style.top = Number(offset.top - boxOffset.top) + 'px';

						classie.add(radialAction, classie.has(bttn, 'button--reject') ? 'material-circle--reject' : 'material-circle--accept');
						classie.add(radialAction, 'material-circle--active');
						onEndAnimation(radialAction, function() {
							classie.remove(radialAction, classie.has(bttn, 'button--reject') ? 'material-circle--reject' : 'material-circle--accept');
							classie.remove(radialAction, 'material-circle--active');
						});
					});
				});
			})();
		</script>
                </div>
            </body>

            </html>