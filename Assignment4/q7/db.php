<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "vikash@2006";
$db_name = "college";

$conn = mysqli_connect(
    $db_server,
    $db_user,
    $db_pass,
    $db_name
);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>