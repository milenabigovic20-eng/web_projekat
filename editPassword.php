<?php

session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
}

$id = $_GET['id'];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/register.css">
    <link rel="icon" href="photos/foodZonelogo.png">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="js/validation.js"></script>
    <script src="js/password.js"></script>
    <title>Update Password</title>
</head>

<body class="align">
<div class="grid">

    <span id="message"></span><br><br>

    <form class="form register">

        <div class="form__field">
            <label for="new__password"><svg class="icon">
                    <use xlink:href="#icon-lock"></use>
                </svg><span class="hidden">Username</span></label>
            <input autocomplete="username" id="password_one" type="password" name="password" class="form__input" placeholder="New Password">
        </div>

        <div class="form__field">
            <label for="confirm__password"><svg class="icon">
                    <use xlink:href="#icon-lock"></use>
                </svg><span class="hidden">Password</span></label>
            <input id="password_two" type="password" name="password" class="form__input" placeholder="Confirm Password">
        </div>

        <div class="form__field">
            <input type="submit" value="Update password" name="submit" id="passSubmit">
        </div>

    </form>

    <p class="text--center"><a href="<?php echo $_SESSION['url'] ?>">Go Back</a></p>

</div>

<input type="hidden" id="id" value="<?php echo $id ?>">

<svg xmlns="http://www.w3.org/2000/svg" class="icons">
    <symbol id="icon-lock" viewBox="0 0 1792 1792">
        <path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z" />
    </symbol>
</svg>

</body>