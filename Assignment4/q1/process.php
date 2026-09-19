<?php

function displayHello() {
    echo "<h1>Hello PHP</h1>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST["task"] == "hello") {
        displayHello();
    }
}

?>