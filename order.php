<?php

require 'php/connection.php';
global $conn;

session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
}

if(!isset($_GET['foodId'])) {
    header("Location: index.php");
}

$url = $_SESSION['url'];
$parts = explode('=', $url);
$user_id = $parts[1];

$sql = "INSERT INTO user_food(user_id, food_id) VALUES (?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $_GET['foodId']);
$stmt->execute();
header("Location: ordered.php?id=".$user_id);
