
<?php

require 'php/connection.php';
global $conn;

session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
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
    <script src="js/remove.js"></script>
    <title>Cart</title>
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
        <?php
        $sql = "SELECT food_title, uf.id
                FROM user_food uf
                    JOIN users u ON uf.user_id = u.id
                    JOIN food f ON uf.food_id = f.id
                WHERE u.id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $_GET['id']);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0) {
            echo "<table>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<input type='hidden' value='" . $row['id'] . "' id='food-user-id'>";
                echo "<td>" . $row['food_title'] . "</td>";
                echo "<td id='remove'><a>Remove</a></td>";
                echo "</tr>";
            }
            echo "<table>";

            echo "<br>";
            echo "<br>";
            echo "<a id='order'>Order</a>";
        } else {
            echo "<table><tr><td>Cart is empty.</td></tr></table>";
        }
        ?>
    </div>
</div>
<input type="hidden" value="<?php echo $_GET['id'] ?>" id="user-id">
</body>
</html>
