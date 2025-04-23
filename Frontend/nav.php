<nav class="navbar" id="navbar">
        <img src="../Images/Logo.png" alt="academy logo" class="logo">
        <ul class="navbar_items" id="navbar_items">
    <li><a href="home.php">Home</a></li>

    <?php if (isset($_SESSION['user_id'])): ?>
        <!-- User is logged in -->
        <li><a href="UserProfile.php">My Profile</a></li>
        <li><a href="../Backend/logout.php" id="logoutBtn">Logout</a></li>
    <?php else: ?>
        <!-- User is NOT logged in -->
        <li><a href="Log-in.php">Login</a></li>
    <?php endif; ?>

    <li>
        <div class="dropdown-label">Activities ▼</div>
        <div class="activitiesnav">
            <ul>
                <li><a href="SkiingPage.php">Skiing</a></li>
                <li><a href="Snowboarding.php">Snowboarding</a></li>
                <li><a href="Sledding.php">Sledding</a></li>
                <li><a href="Iceclimbing.php">Ice Climbing</a></li>
            </ul>
        </div>
    </li>
</ul>

    </nav>