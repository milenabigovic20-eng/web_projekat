<?php

require "php/connection.php";
global $conn;

session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
}

$sql = "SELECT id FROM users WHERE username LIKE ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_SESSION['username']);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row['id'];
    $_SESSION['url'] = 'edit.php?id=' . $id;
    $_SESSION['url2'] = 'ordered.php?id=' .$id;
}

?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <link rel="stylesheet" href="css/main-page.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" href="photos/foodZonelogo.png>
    <script src="js/profileIcon.js" defer></script>
    <script src="js/search.js"></script>
    <title>Food Zone</title>
</head>
<body>
<nav class="navbar">
    <div class="logo">
        <img src="photos/foodZoneLogo.png" alt="Food Zone">
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
            <h1>Find delicious food</h1>
        <div class="search">
            <form action="" class="login">
                <div class="form__field">
                    <label for="login__username"><svg class="icon">
                            <use xlink:href="#icon-search"></use>
                        </svg><span class="hidden">Username</span></label>
                    <input autocomplete="username" id="search_bar" value="" type="text" name="search" class="form__input" placeholder="Type to search for food...">
                </div>
            </form>
        </div>
        <table id="search_result">

        </table>
    </div>
</div>

<div class="main_restaurants">
    <div class="recommended">
        <h1>We suggest:</h1>
    </div>
    <div class="recommended_container">
        <div class="card" onclick="window.location.href='menu.php?menuId=1'">
            <img src="photos/hrana.jpg" alt="Restaurant">
            <div class="container">
                <p>Earth, Wind and Flour</p>
            </div>
        </div>
        <div class="card" onclick="window.location.href='menu.php?menuId=2'">
            <img src="photos/hrana.jpg" alt="Restaurant">
            <div class="container">
                <p>Camper Bar</p>
            </div>
        </div>
        <div class="card" onclick="window.location.href='menu.php?menuId=3'">
            <img src="photos/hrana.jpg" alt="Restaurant">
            <div class="container">
                <p>Italian Pizza</p>
            </div>
        </div>

        <div class="card" onclick="window.location.href='menu.php?menuId=10'">
            <img src="photos/hrana.jpg" alt="Restaurant">
            <div class="container">
                <p>Delizia</p>
            </div>
        </div>

        <div class="card" onclick="window.location.href='menu.php?menuId=7'">
            <img src="photos/hrana.jpg" alt="Restaurant">
            <div class="container">
                <p>Victoria</p>
            </div>
        </div>

    </div>
</div>


<svg xmlns="http://www.w3.org/2000/svg" class="icons">
    <symbol id="icon-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
    </symbol>
</svg>
</body>
</html>
