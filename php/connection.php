<?php

$server = "localhost";
$username = 'root';
$password = '';
$db = 'webdb';

$conn = new mysqli($server,$username,$password,$db);

if($conn->connect_error) {
    die("Connecting error..." . $conn->connect_error);
}