<?php

require "php/connection.php";
global $conn;

session_start();
if(isset($_SESSION['username'])) {
    header("Location: index.php");
}

$err = '';
$username = '';
$password = '';

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT username, password, user_type_id FROM users WHERE username LIKE ? AND password LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $username;
        $_SESSION['user_type_id'] = $row['user_type_id'];
        header("Location: index.php");
    } else {
        $err = "Password or username is incorrect!";
    }
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="icon" href="photos/foodZonelogo.png">
    <script src="js/validation.js"></script>
    <title>Login</title>
</head>
<body class="align">

<h1 id="login_header">Login</h1>

<div class="logo-trop">
    <img src="photos/foodZoneLogo.png" height="250rem">
</div>

<div class="grid">

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="form login" id="loginForm">

        <div class="form__field">
            <label for="login__username"><svg class="icon">
                    <use xlink:href="#icon-user"></use>
                </svg><span class="hidden">Username</span></label>
            <input autocomplete="username" id="login__username" value="<?php echo $username ?>" type="text" name="username" class="form__input" placeholder="Username" required oninput="InvalidMsg(this);" oninvalid="InvalidMsg(this);">
        </div>

        <div class="form__field">
            <label for="login__password"><svg class="icon">
                    <use xlink:href="#icon-lock"></use>
                </svg><span class="hidden">Password</span></label>
            <input id="login__password" type="password" name="password" value="<?php echo $password ?>" class="form__input" placeholder="Password" required oninput="InvalidMsg(this);" oninvalid="InvalidMsg(this);">
        </div>

        <div class="form__field">
            <input type="submit" value="Sign In" name="submit">
        </div>

    </form>

    <p class="text--center">Not a member? <a href="register.php">Sign up now</a> <svg class="icon">
            <use xlink:href="#icon-arrow-right"></use>
        </svg></p>

</div>

<div class="err">

    <span><?php echo $err ?></span>

</div>

<svg xmlns="http://www.w3.org/2000/svg" class="icons">
    <symbol id="icon-arrow-right" viewBox="0 0 1792 1792">
        <path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z" />
    </symbol>
    <symbol id="icon-lock" viewBox="0 0 1792 1792">
        <path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z" />
    </symbol>
    <symbol id="icon-user" viewBox="0 0 1792 1792">
        <path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z" />
    </symbol>
</svg>

</body>
</html>

