<?php
	if (!isset($layout_context)) {
		$layout_context = "";
	}
?>


<!-- Navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">

            <!-- Title -->
            <div class="navbar-header pull-left">
                <a href="index.php" class="navbar-brand">Video Quiz</a>
            </div>

            <!-- 'Sticky' (non-collapsing) right-side menu item(s) -->
            <div class="navbar-header pull-right">
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
                    <li <?php if ($layout_context == "index") { echo 'class="active"'; } ?>>
                        <a href="index.php">Home</a>
                    </li>
                    <li <?php if ($layout_context == "infos") { echo 'class="active"'; } ?>>
                        <a href="info.php">Idee / Konzept</a>
                    </li>
                    <li <?php if ($layout_context == "contact") { echo 'class="active"'; } ?>>
                        <a href="contact.php">Kontakt</a>
                    </li>
                </ul>

                <div class="nav navbar-header pull-right">
                <ul>
                    <li class="navbar-text pull-left list-inline" <?php if ($layout_context == "login") { echo 'class="active"'; } ?>>
                        <a href="login.php">Login</a>
                    </li>
                <li class="navbar-text pull-left list-inline" <?php if ($layout_context == "register") { echo 'class="active"'; } ?>>
                    <a href="register.php">Registration</a>
                </li>
                </ul>
                </div>
            </div>
    </nav>