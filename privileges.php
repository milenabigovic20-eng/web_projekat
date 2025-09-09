
<?php

require 'php/connection.php';
global $conn;

session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
}

if($_SESSION['user_type_id'] != 1) {
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
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/main-page.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="js/privileges.js"></script>
    <script src="js/profileIcon.js" defer></script>
    <link rel="icon" href="photos/foodZonelogo.png">
    <title>User Privileges</title>
</head>
<body>
<script>

</script>
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
                        <a href='<?php echo $_SESSION['url'] ?>'>Settings</a>
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

    <?php
    $sql = "SELECT * FROM users";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        echo "<h1 class='dashboard' id='dashboard'>Admin Dashboard</h1>";
        echo "<span id='message'></span>";
        echo "<div class='db-users'>";
        echo "<table id='table_db' class='dashboard'>";
        echo "<tr>
        <td>First Name</td><td>Last Name</td><td>Email</td><td>Username</td><td>Option</td>";
        echo "</tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            if($_SESSION['username'] != $row['username']) {
                echo "<td><select id='" . $row['id'] . "' class='select-box'>
            <option value='2'" . ($row['user_type_id'] == 2 ? " selected" : "") . ">Employee</option>
            <option value='3'" . ($row['user_type_id'] == 3 ? " selected" : "") . ">Client</option>
            </select></td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        echo "<p class='text--center'><button id='privilegeSelected'>Save Changes</button></p>";
        echo "<p class='text--center'><a href='index.php'>Go Back</a></p>";
    } else {
        echo "<script>alert('No users found.')</script>";
        header("Location: index.php");
    }
    ?>
</body>
</html>
