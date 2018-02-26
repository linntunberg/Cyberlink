<?php declare(strict_types=1); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><?php echo $config['title']; ?></a>

    <img src="logowithtype.png" alt="Cyberlink logo" id="logo">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/about.php' ? 'active' : ''; ?>" href="/index.php">Home</a>
        </li><!-- /nav-item -->


        <li class="nav-item">
            <a class="nav-link" href="/profile.php">Profile</a>
        </li><!-- /nav-item -->
        <li class="nav-item">
            <a class="nav-link" href="/signup.php">Sign Up</a>
        </li><!-- /nav-item -->

        <li class="nav-item">
            <?php
            if(isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true): ?>

            <a class="nav-link" href="/../createposts.php">Create Post</a>
        </li>
            <a class="nav-link" href="/../myposts.php">My Posts</a>
        </li>
        <?php endif ?>
        </li><!-- /nav-item -->
        <li class="nav-item">
            <?php if (isset($_SESSION['user'])): ?>
                <a class="nav-link" href="/app/auth/alogout.php">Logout</a>
            <?php else: ?>
                <a class="nav-link" href="login.php">Login</a>
            <?php endif; ?>

        </li><!-- /nav-item -->
    </ul><!-- /navbar-nav -->
</nav><!-- /navbar -->
