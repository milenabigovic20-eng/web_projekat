<?php

require 'php/connection.php';
global $conn;

session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
}

$first_name = $last_name = $email = $username = '';

$id = $_GET['id'];
$url = 'editPassword.php?id=' . $id;

$sql = 'SELECT first_name, last_name, email, username FROM users WHERE id = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $email = $row['email'];
    $username = $row['username'];
}

?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="photos/foodZonelogo.png">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/global.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="js/validation.js"></script>
    <script src="js/user.js"></script>
    <title>Settings</title>
</head>
<body>
<br>
<div class="grid">
    <div class="settings-title">
        <h1>Settings</h1>
    </div>

    <div class="logo-set">
        <img src="photos/foodZonelogo.png" height="250rem">
    </div>

    <span id="message"></span>

    <br>
    <form class="form register">

        <div class="form__field">
            <label for="register__fName"><svg class="icon">
                    <use xlink:href="#icon-user"></use>
                </svg><span class="hidden">First Name</span></label>
            <input autocomplete="username" id="edit__fName" type="text" name="fName" class="form__input" value="<?php echo $first_name ?>">
        </div>

        <div class="form__field">
            <label for="register__lName"><svg class="icon">
                    <use xlink:href="#icon-user"></use>
                </svg><span class="hidden">Last Name</span></label>
            <input autocomplete="username" id="edit__lName" type="text" name="lName" class="form__input" value="<?php echo $last_name ?>">
        </div>

        <div class="form__field">
            <label for="register__email"><svg class="icon">
                    <use xlink:href="#icon-envelope"></use>
                </svg><span class="hidden">Email</span></label>
            <input autocomplete="username" id="edit__email" type="email" name="email" class="form__input" value="<?php echo $email ?>">
        </div>

        <div class="form__field">
            <label for="register__username"><svg class="icon">
                    <use xlink:href="#icon-user"></use>
                </svg><span class="hidden">Username</span></label>
            <input autocomplete="username" id="edit__username" type="text" name="username" class="form__input" value="<?php echo $username ?>">
        </div>

        <div class="form__field">
            <input type="submit" value="Save changes" name="submit" id="save">
        </div>

    </form>

    <p class="text--center"><a id ='colored' href="<?php echo $url ?>">Change password? </a></p>
    <p class="text--center"><a href="index.php">Go Back</a></p>

</div>

<input type="hidden" id="user__id" value="<?php echo $id ?>">

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
    <symbol id="icon-envelope" viewBox="0 0 24 24">
        <path d="M21 6.41L12.71 15.71c-.39.39-1.02.39-1.41 0L3 6.41V18h18V6.41zM20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm-8 7L4.5 5h15L12 11zm0 2l3.5-3.5H8.5L12 13z"/>
    </symbol>
</svg>
</body>
</html>
