<?php

require 'connection.php';
global $conn;

$sql = "UPDATE users SET password = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $_POST['password_two'], $_POST['id']);
$stmt->execute();