<nav class="navbar navbar-default navbar-fixed-top">


    <!-- Title -->
    <div class="navbar-header pull-left">
        <a href="dashboard.php" class="navbar-brand">Video Quiz</a>
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
    </div>




    <?php if ($layout_context == "quizpage"): ?>
        <div class="text-center">
            <ul class="nav navbar-nav">
                <li>
                    <div class="round-button Status counter_number">1</div>
                </li>
            </ul>
        </div>
        <?php endif; ?>
</nav>