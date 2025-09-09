<?php

require 'connection.php';
global $conn;

$sql = "UPDATE users SET first_name = ?, last_name = ?, email = ?, username = ? WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['username'], $_POST['id']);
$stmt->execute();
