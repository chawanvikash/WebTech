<?php

$server = "localhost";
$username = "root";
$password = "vikash@2006";
$database = "assignment5";

$conn = mysqli_connect(
    $server,
    $username,
    $password,
    $database
);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>