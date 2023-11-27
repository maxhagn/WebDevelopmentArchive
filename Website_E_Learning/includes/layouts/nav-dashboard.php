<nav class="navbar navbar-default navbar-fixed-top">


    <!-- Title -->
    <div class="navbar-header pull-left">
        <a href="dashboard.php" class="navbar-brand">Dashboard</a>
    </div>

    <!-- 'Sticky' (non-collapsing) right-side menu item(s) -->
    <div class="navbar-header pull-right">
        <ul class="nav pull-left list-inline">
            <!-- This works well for static text, like a username -->
            <li class="navbar-text pull-left list-inline">
                <button onclick="location.href='manageaccount.php';" class="btn btn-warning navbar-btn navbtn usrbtn" onclick="">
                    <?php echo htmlspecialchars($user->username);?>
                </button>
                <button onclick="location.href='logout.php';" class="btn btn-danger navbar-btn navbtn logoutbtn"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></button>
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
        <ul class="nav navbar-nav meh">
            <li <?php if ($layout_context == "dashboard") { echo 'class="active"'; } ?>>
                <a href="dashboard.php">Quiz</a>
            </li>
            <li <?php if ($layout_context == "categories") { echo 'class="active"'; } ?>>
                <a href="categories.php" class="divider">Kategorien</a>
            </li>
            <!--<li <?php if ($layout_context == "stats") { echo 'class="active"'; } ?>>
                <a href="stats.php" class="divider">Stats</a>
            </li>-->
        </ul>
    </div>
</nav>