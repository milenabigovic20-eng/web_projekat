<?php

session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
}

if(!isset($_GET['menuId'])) {
    header("Location: index.php");
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main-page.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" href="photos/foodZonelogo.png">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="js/profileIcon.js" defer></script>
    <script src="js/menu.js"></script>
    <title>Menu</title>
</head>
<body>

<nav class="navbar">
    <div class="logo">
        <img src="photos/foodZonelogo.png" alt="Food Zone">
        <span><a href="index.php">Food Zone</a></span>
    </div>
    <ul class="nav-links">
        <div class="profile">
            <li class="services">
                <img src="photos/icons8-account-32.png" alt="Account" id="profile-icon">
                <ul class="dropdown">
                    <li>
                        <a href="logout.php">Log out </a>
                    </li>
                    <li>
                        <a href=<?php echo $_SESSION['url'] ?>>Settings</a>
                    </li>
                    <?php
                    if($_SESSION['user_type_id'] == 1) {
                        echo "<li>";
                        echo "<a href='privileges.php'>User Privileges</a>";
                        echo "</li>";
                    }
                    ?>
                    <li>
                        <a href=<?php echo $_SESSION['url2'] ?>>Cart</a>
                    </li>
                </ul>
            </li>
        </div>
    </ul>
</nav>

<div class="landing">
    <div class="main_container">

    </div>
</div>
<input type="hidden" value="<?php echo $_GET['menuId'] ?>" id="current_restaurant">
</body>
</html>