<?php

require 'connection.php';
global $conn;

$sql = "UPDATE users SET user_type_id = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $_POST['userType'], $_POST['userId']);
$stmt->execute();